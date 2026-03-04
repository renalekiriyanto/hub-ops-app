<?php

namespace App\Imports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\ToModel;

class DriverImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $vehicleType = strtolower(preg_match('/\((.*?)\)/', $row['Vehicle Type'] ?? '', $matches));
        return $row;
        return new Driver([
            'id' => $row['Driver ID'], // sesuai header excel
            'name' => $row['Driver Name'],
            'phone_number' => $row['Phone Number'] ?? null,
            'contract_type' => $row['Contract Type'] ?? 'dedicated',
            'vehicle_type' => $vehicleType ? $vehicleType : '2wh',
            'status' => $row['Status'] ?? 'normal',
        ]);
    }
}
