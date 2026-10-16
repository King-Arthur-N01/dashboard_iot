<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GardenLog extends Model
{
    protected $table = 'garden_log';
    protected $fillable = [
        'schedule_id',
        'log_data'
    ];
}
