<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inbound extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'date',
        'arrival_time',
        'slot_name',
        'is_additional_slot',
        'total_bag',
        'total_bulky',
        'total_order'
    ];

}
