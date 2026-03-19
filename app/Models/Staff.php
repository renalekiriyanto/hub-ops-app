<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $primaryKey = 'id_staff';
    public $incrementing = false; // Tambahkan ini jika id_staff berupa string (contoh: 'STF001')
    protected $keyType = 'string'; // Tambahkan ini jika id_staff berupa string

    protected $fillable = [
        'id_staff',
        'name',
        'phone_number',
        'vehicle_type',
        'title',
        'contract_type',
        'status',
    ];
}
