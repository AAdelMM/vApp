<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VEntry extends Model
{
    use HasFactory;

    protected $table = 'v_entry';
    protected $fillable = [
        'vno',
        'vdate',
        'vtime',
        'plate',
        'fleet',
        'user',
        'v_des_en',
    ];

    public function vehicleData()
    {
        return $this->belongsTo(VehicleData::class, 'plate', 'id');
    }

    public function violationType()
    {
        return $this->belongsTo(ViolationType::class, 'v_des_en', 'id');
    }
   
}