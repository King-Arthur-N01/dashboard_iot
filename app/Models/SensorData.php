<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    /** @use HasFactory<\Database\Factories\SensorDataFactory> */
    use HasFactory;
    protected $fillable = [
        'temp',
        'humi',
        'lumi',
        'soil'
    ];
}
