<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GardenData extends Model
{
    /** @use HasFactory<\Database\Factories\GardenDataFactory> */
    use HasFactory;
    protected $table = 'schedule_data';
}
