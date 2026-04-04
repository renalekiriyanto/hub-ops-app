<?php

namespace App\Services;

use App\Models\Inbound;

class MonitoringService
{
    public function storeInbound($request)
    {
        // Logic for storing inbound data
        $data = $request->validate([
            'date' => 'required|date',
            'arrival_time' => 'required|date_format:Y-m-d H:i:s,Y-m-d\TH:i',
            'slot_name' => 'required|string|max:255',
            'is_additional_slot' => 'boolean',
            'lh_number' => 'nullable|string|max:255',
            'lh_trip_name' => 'nullable|string|max:255',
            'vehicle_plat_number' => 'nullable|string|max:255',
            'driver_name' => 'nullable|string|max:255',
            'driver_id' => 'nullable|string|max:255',
            'total_order' => 'integer|min:0',
            'total_bulky' => 'integer|min:0',
            'total_bag'   => 'integer|min:0',
        ]);

        // Simpan data ke database
        $inbound = Inbound::create($data);

        return $inbound;
    }

    public function updateInbound($request, $inbound)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'arrival_time' => 'required|date_format:Y-m-d H:i:s,Y-m-d\TH:i',
            'slot_name' => 'required|string|max:255',
            'is_additional_slot' => 'boolean',
            'lh_number' => 'nullable|string|max:255',
            'lh_trip_name' => 'nullable|string|max:255',
            'vehicle_plat_number' => 'nullable|string|max:255',
            'driver_name' => 'nullable|string|max:255',
            'driver_id' => 'nullable|string|max:255',
            'total_order' => 'integer|min:0',
            'total_bulky' => 'integer|min:0',
            'total_bag'   => 'integer|min:0',
        ]);

        // Update data ke database
        $inbound->update($data);

        return $inbound;
    }
}
