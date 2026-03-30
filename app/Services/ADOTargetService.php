<?php

namespace App\Services;

use App\Models\ADOTarget;

class ADOTargetService
{
    public function fetchDataADOTarget($request){
        $data = ADOTarget::query();
        return $data->paginate(10);
    }
}
