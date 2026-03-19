<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public $staffService;
    public function __construct()
    {
        $this->staffService = new StaffService();
    }
    public function index(Request $request)
    {
        $data = $this->staffService->getAll($request);
        return view('staff.index', compact('data'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\StaffImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data staff berhasil diimport!');
    }

    public function export(Request $request)
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\StaffExport($request), 'staff.xlsx');
    }

    public function show($id)
    {
        $staff = \App\Models\Staff::where('id_staff', $id)->first();
        return view('staff.show', compact('staff')); // you will need to create this view
    }

    public function edit($id)
    {
        $staff = \App\Models\Staff::where('id_staff', $id)->first();
        return view('staff.edit', compact('staff')); // you will need to create this view
    }

    public function update(Request $request, $id)
    {
        $this->staffService->update($request, $id);
        return redirect()->route('staff.index')->with('success', 'Data staff berhasil diupdate!');
    }

    public function destroy($id)
    {
        \App\Models\Staff::where('id_staff', $id)->delete();
        return redirect()->route('staff.index')->with('success', 'Data staff berhasil dihapus!');
    }
}
