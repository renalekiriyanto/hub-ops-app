<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class DriverService
{
    // Fetching data
    public function fetchDrivers($request)
    {
        $query = Driver::query();

        if (! empty($request['search'])) {
            $search = $request['search'];
            $query->where(function ($q) use ($search) {
                $q->where('driver_id', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('vehicle_type', 'like', "%$search%")
                    ->orWhere('contract_type', 'like', "%$search%");
            });
        }

        return $query->paginate(10);
    }

    public function fleetOverview()
    {
        $url = 'https://spx.shopee.co.id/mgmt/api/pc/forward/data/api_mart/mgmt_app/data_api/operation__lm_delivery_progress_all_fleets_id__10m_v3';
        $requestData = Http::withoutVerifying()
        ->withHeaders([
            'User-Agent' => 'insomnia/12.3.1',
            'Cookie' => 'SPC_R_T_ID=aYBJ67hv6aBTD/67TNh5o7+mtO4rSRN67LVVmpSOeo6DRnGhicNXqAo01NzrshdSYLl9rfbsXZwtO8oTM59Ztw/2/RAZkELPUjgkqVh+jztfptQ3mnNNmzcU1QSX1HLIi1oQcpZ1FqmNhkgnSuddrX5e0kSstTfnTsHzA2Y57/4=; SPC_T_ID=aYBJ67hv6aBTD/67TNh5o7+mtO4rSRN67LVVmpSOeo6DRnGhicNXqAo01NzrshdSYLl9rfbsXZwtO8oTM59Ztw/2/RAZkELPUjgkqVh+jztfptQ3mnNNmzcU1QSX1HLIi1oQcpZ1FqmNhkgnSuddrX5e0kSstTfnTsHzA2Y57/4=; SPC_T_IV=ZjhYRENhZUZzNEpqRzZ5Ug==; SPC_F=kKWQHELvGCaT3muObFqElElA9gZUv1PP; REC_T_ID=ad7ff8e2-0588-11f1-af9b-1aea008f8f1a; SPC_R_T_IV=ZjhYRENhZUZzNEpqRzZ5Ug==; SPC_CLIENTID=a0tXUUhFTHZHQ2FUmzpbnzoteomhihml; _gcl_gs=2.1.k1$i1772225066$u23716088; _gcl_au=1.1.332819406.1772225069; _fbp=fb.2.1772225069368.162622204668082644; language=id; google_auth_redirect=https://spx.shopee.co.id/; csrftoken=c0a3240b30304051980643386d521af6; fms_user_id=15359295; fms_user_skey=5nyFiiD0EZGEotDKFTWhKgOccHSUPI2sGRbG02ckVwl6Gw5FvOIttpXtnLAxqNCz; fms_display_name=renal.riyanto; spx_st=1; spx_cid=ID; spx_uid=15359295; spx_uk=5nyFiiD0EZGEotDKFTWhKgOccHSUPI2sGRbG02ckVwl6Gw5FvOIttpXtnLAxqNCz; spx_st=1; spx_cid=ID; spx_uid=15359295; spx_uk=5nyFiiD0EZGEotDKFTWhKgOccHSUPI2sGRbG02ckVwl6Gw5FvOIttpXtnLAxqNCz; spx_dn=renal.riyanto; SPC_SI=CTiNaQAAAAB0WElGUmZKdWzuHwIAAAAAT2MwYVpvTjY=; _med=refer; _ga=GA1.3.423332332.1772225077; _gid=GA1.3.1899534823.1772326192; _ga_SW6D8G0HXK=GS2.1.s1772326191$o3$g1$t1772327965$j60$l0$h1497477209; spx-admin-lang=en; spx-lang=en; spx-admin-device-id=7e311e21d2d86f5b98bde1cb3af9033c; spx_mgmt_livetest=0',
            'X-Csrftoken' => 'c0a3240b30304051980643386d521af6',
            'X-Sap-Ri' => 'f0baa3691d9809f6c539e83101012306dc5abfa67e31a6a95313',
        ])
            ->post($url);

        return $requestData->body();
    }

    // Action
    public function importExcel($file)
    {
        DB::beginTransaction();

        try {

            $rows = Excel::toArray([], $file);
            $sheet = $rows[0];

            $totalRow = count($sheet) - 1;

            foreach ($sheet as $index => $row) {

                // Skip header
                if ($index === 0) {
                    continue;
                }

                // Skip jika driver_id kosong
                if (empty($row[0])) {
                    continue;
                }
                $keywordsContractType = ['dedicated', 'plus', 'mitra'];
                $driverId = trim($row[0]);
                $driverName = trim($row[1] ?? '');
                $vehicleType = strtolower(preg_match('/\((.*?)\)/', trim($row[10] ?? '') ?? '', $matches) ? $matches[1] : '');
                $contract = strtolower($row[24] ?? '');
                $match = collect($keywordsContractType)->first(fn ($word) => str_contains($contract, $word));

                $contractType = $match ?? 'other';

                Driver::updateOrCreate(
                    [
                        'driver_id' => $driverId,
                    ],
                    [
                        'name' => $driverName,
                        'vehicle_type' => $vehicleType,
                        'contract_type' => $contractType,
                    ]
                );
            }

            DB::commit();

            return [
                'status' => true,
                'message' => 'Import driver berhasil',
                'total_row' => $totalRow,
            ];
        } catch (\Throwable $e) {

            DB::rollBack();

            return [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
