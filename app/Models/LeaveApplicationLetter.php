<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveApplicationLetter extends Model
{
    use softDeletes;
    protected $fillable = [
        'id_staff',
        'start_date',
        'end_date',
        'description',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff', 'id_staff');
    }
}
