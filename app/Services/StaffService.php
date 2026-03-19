<?php

namespace App\Services;

use App\Models\Staff;

class StaffService
{
    public function getAll($request){
        $data = Staff::query();
        $data->when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        });
        $data->when($request->vehicle_type, function ($query) use ($request) {
            $query->where('vehicle_type', 'like', '%' . $request->vehicle_type . '%');
        });
        $data->when($request->title, function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->title . '%');
        });
        $data->when($request->contract_type, function ($query) use ($request) {
            $query->where('contract_type', 'like', '%' . $request->contract_type . '%');
        });
        $data->when($request->status, function ($query) use ($request) {
            $query->where('status', 'like', '%' . $request->status . '%');
        });
        if ($request->has('export') && $request->export == 'true') {
            return $data->get();
        }
        return $data->paginate(10);
    }

    public function update($request, $id)
    {
        $staff = Staff::where('id_staff', $id)->first();
        $staff->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'vehicle_type' => $request->vehicle_type,
            'title' => $request->title,
            'contract_type' => $request->contract_type,
            'status' => $request->status,
        ]);
        return $staff;
    }
}
