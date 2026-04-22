<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelayData extends Model
{
    /** @use HasFactory<\Database\Factories\RelayDataFactory> */
    use HasFactory;
    // protected $table = 'relay_status';
    protected $fillable = [
        'condition_name',
        'temp_condition',
        'humi_condition',
        'lumi_condition',
        'soil_condition',
        'rain_condition',
        'relay_1_status',
        'relay_2_status'
    ];
    protected $casts = [
    'temp_condition' => 'array',
    'humi_condition' => 'array',
    'lumi_condition' => 'array',
    'soil_condition' => 'array',
    'rain_condition' => 'array',
];

}
