<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ADOTarget extends Model
{
    use SoftDeletes;
    protected $table = 'ado_targets';
    protected $fillable = [
        'start_date', 'end_date', 'type_target_id', 'target', 'current'
    ];

    public function typeTarget()
    {
        return $this->belongsTo(TypeTarget::class, 'type_target_id', 'id');
    }
}
