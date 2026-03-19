<?php

namespace App\Imports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaffImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Staff([
            'id_staff'      => $row['driver_id'] ?? null,
            'name'          => $row['driver_name'] ?? null,
            'phone_number'  => null, // Not present in the excel snippet
            'vehicle_type'  => $this->mapVehicleType($row['vehicle_type'] ?? ''),
            'title'         => $this->mapTitle($row['driver_group'] ?? ''),
            'contract_type' => $this->mapContractType($row['contract_type'] ?? ''),
            'status'        => $this->mapStatus($row['spx_status'] ?? ''),
        ]);
    }

    private function mapVehicleType($value)
    {
        $value = strtoupper($value);
        if (str_contains($value, '2WH')) return '2wh';
        if (str_contains($value, '4WH')) return '4wh';
        return null;
    }

    private function mapTitle($value)
    {
        $value = strtoupper($value);
        if (str_contains($value, 'RIDER')) return 'Rider';
        if (str_contains($value, 'DRIVER')) return 'Driver';
        if (str_contains($value, 'ADMIN')) return 'Admin';
        if (str_contains($value, 'OPERATOR')) return 'Operator';
        if (str_contains($value, 'HL')) return 'HL';
        if (str_contains($value, 'SL')) return 'SL';
        return null;
    }

    private function mapContractType($value)
    {
        $value = strtoupper($value);
        if (str_contains($value, 'MITRA')) return 'mitra';
        if (str_contains($value, 'PLUS')) return 'plus';
        if (str_contains($value, 'DEDICATED')) return 'dedicated';
        return null;
    }

    private function mapStatus($value)
    {
        $value = strtolower($value);
        if ($value === 'active' || str_contains($value, 'active')) return 'normal';
        if (str_contains($value, 'suspend')) return 'suspended';
        if (str_contains($value, 'terminate')) return 'terminated';
        return 'normal';
    }
}
