<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelayStatus extends Model
{
    protected $table = 'relay_status';
    use HasFactory;
    protected $fillable = [
        'relay_1_status',
        'relay_2_status',
        'relay_id',
        'duration',
        'note'
    ];
}
