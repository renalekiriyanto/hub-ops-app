<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcelRequest;
use App\Services\DriverService;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $driverService;
    public function __construct(DriverService $driverService)
    {
        $this->driverService = $driverService;
    }

    public function index(Request $request)
    {
        $drivers = $this->driverService->fetchDrivers($request->all());
        return view("driver.index", compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fleetOverview(Request $request)
    {
        $data = $this->driverService->fleetOverview();
        return $data;
        $data = null;
        return view("driver.fleet-overview", compact('data'));
    }

    // Additional action
    public function import(ImportExcelRequest $request)
    {
        // Handle file upload and import logic here
        $result = $this->driverService->importExcel($request->file('file_import'));
        return $result;
    }
}
