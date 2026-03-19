<?php

namespace App\Exports;

use App\Services\StaffService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffExport implements FromCollection, WithHeadings, WithMapping
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = clone $request;
        $this->request->merge(['export' => 'true']);
    }

    public function collection()
    {
        return (new StaffService())->getAll($this->request);
    }

    public function headings(): array
    {
        return [
            'ID Staff',
            'Name',
            'Phone Number',
            'Vehicle Type',
            'Title',
            'Contract Type',
            'Status',
        ];
    }

    public function map($staff): array
    {
        return [
            $staff->id_staff,
            $staff->name,
            $staff->phone_number,
            $staff->vehicle_type,
            $staff->title,
            $staff->contract_type,
            $staff->status,
        ];
    }
}
