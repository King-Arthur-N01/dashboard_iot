<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GardenSensor extends Model
{
    protected $table = 'garden_sensors';
    protected $fillable = [
        'garden_temp',
        'garden_humi',
        'garden_lumi',
        'garden_soil',
        'device_id',
    ];
}
