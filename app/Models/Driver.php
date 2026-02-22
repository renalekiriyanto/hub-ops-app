<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'driver_id',
        'name',
        'phone_number',
        'vehicle_type',
        'contract_type',
        'status',
    ];
}
