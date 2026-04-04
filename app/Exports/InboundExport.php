<?php

namespace App\Exports;

use App\Models\Inbound;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InboundExport implements FromQuery, WithHeadings, WithMapping
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $search = $this->request->input('search');
        $startDate = $this->request->input('start_date');
        $endDate = $this->request->input('end_date');
        $startArrivalTime = $this->request->input('start_arrival_time');
        $endArrivalTime = $this->request->input('end_arrival_time');

        $query = Inbound::query();

        if ($search) {
            $query->where('driver_name', 'like', '%' . $search . '%');
        }

        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        if ($startArrivalTime) {
            $query->where('arrival_time', '>=', $startArrivalTime);
        }

        if ($endArrivalTime) {
            $query->where('arrival_time', '<=', $endArrivalTime);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date',
            'Arrival Time',
            'Slot Name',
            'Total Bag',
            'Total Bulky',
            'Total Order',
        ];
    }

    public function map($inbound): array
    {
        return [
            $inbound->id,
            $inbound->date,
            $inbound->arrival_time,
            $inbound->slot_name,
            $inbound->total_bag,
            $inbound->total_bulky,
            $inbound->total_order,
        ];
    }
}
