<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelayData extends Model
{
    /** @use HasFactory<\Database\Factories\RelayDataFactory> */
    use HasFactory;
    protected $table = 'relay_data';
    protected $fillable = [
        'relay_1_status',
        'relay_2_status',
        'relay_3_status',
        'relay_4_status',
        'relay_id',
        'duration',
        'note',
        'device_id'
    ];
}
