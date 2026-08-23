<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleData extends Model
{
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
