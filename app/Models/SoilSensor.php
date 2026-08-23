<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoilSensor extends Model
{
    protected $table = 'soil_sensors';
    protected $fillable = [
        'soil_1',
        'soil_2',
        'soil_3',
        'soil_4',
        'soil_5',
        'soil_6',
        'soil_7',
        'soil_8',
        'soil_9'
    ];
}
