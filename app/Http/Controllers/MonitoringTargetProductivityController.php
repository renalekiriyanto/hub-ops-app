<?php

namespace App\Http\Controllers;

use App\Services\ADOTargetService;
use Illuminate\Http\Request;

class MonitoringTargetProductivityController extends Controller
{
    public $adoTargetService;

    public function __construct()
    {
        $this->adoTargetService = new ADOTargetService();
    }
    public function listDataADO(Request $request){
        $data = $this->adoTargetService->fetchDataADOTarget($request);
        return view('monitoring.ado-target.index', compact('data')); 
    }
}
