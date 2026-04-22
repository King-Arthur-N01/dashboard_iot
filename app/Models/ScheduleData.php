<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleData extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleDataFactory> */
    use HasFactory;
    protected $fillable = [
        'schedule_name',
        'schedule_date',
        'schedule_time',
        'schedule_cycle',
        'relay_id',
    ];
}
