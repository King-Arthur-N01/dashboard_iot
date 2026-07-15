<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankSensor extends Model
{
    /** @use HasFactory<\Database\Factories\SensorDataFactory> */
    use HasFactory;
    protected $table = 'tank_sensors';
    protected $fillable = [
        'tank_temp',
        'tank_humi',
        'tank_vol',
        'tank_stat',
        'device_id',
    ];
}
