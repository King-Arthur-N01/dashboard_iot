<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleData extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleDataFactory> */
    use HasFactory;
    protected $table = 'schedule_data';
    protected $fillable = [
        'schedule_name',
        'schedule_date',
        'schedule_time',
        'schedule_cycle',
        'relay_id',
        'garden_id'
    ];
}
