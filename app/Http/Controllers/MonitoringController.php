<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Services\MonitoringService;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{

    public $monitoringService;

    public function __construct()
    {
        $this->monitoringService = new MonitoringService();
    }

    public function indexInbound(Request $request)
    {
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $startArrivalTime = $request->input('start_arrival_time');
        $endArrivalTime = $request->input('end_arrival_time');

        // Query untuk monitoring inbound
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

        $data = $query->paginate(10);

        return view('monitoring.inbound.index', compact('data'));
    }

    public function createInbound()
    {
        return view('monitoring.inbound.create');
    }

    public function storeInbound(Request $request)
    {
        // Logic for storing inbound data
        $data = $this->monitoringService->storeInbound($request);

        return redirect()->route('monitoring.inbound.index')->with('success', 'Data inbound berhasil disimpan.');
    }

    public function exportInbound(Request $request)
    {
        $fileName = 'inbound_monitoring_' . now()->format('Y-m-d') . '.xlsx';
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\InboundExport($request), $fileName);
    }

    public function editInbound($id)
    {
        $inbound = Inbound::findOrFail($id);
        return view('monitoring.inbound.edit', compact('inbound'));
    }

    public function updateInbound(Request $request, $id)
    {
        // Logic for updating inbound data
        $inbound = Inbound::findOrFail($id);
        
        $this->monitoringService->updateInbound($request, $inbound);

        return redirect()->route('monitoring.inbound.index')->with('success', 'Data inbound berhasil diperbarui.');
    }

    public function destroyInbound($id)
    {
        // Logic for deleting inbound data
        $inbound = Inbound::findOrFail($id);
        $inbound->delete();

        return redirect()->route('monitoring.inbound.index')->with('success', 'Data inbound berhasil dihapus.');
    }
}
