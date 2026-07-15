<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GardenSensor extends Model
{
    /** @use HasFactory<\Database\Factories\SensorDataFactory> */
    use HasFactory;
    protected $table = 'garden_sensors';
    protected $fillable = [
        'garden_temp',
        'garden_humi',
        'garden_lumi',
        'garden_soil',
        'device_id',
    ];
}
