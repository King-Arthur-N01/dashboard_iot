<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GardenData extends Model
{
    protected $table = 'garden_data';
    protected $fillable = [
        'garden_name',
        'garden_description',
        'garden_picture'
    ];
}
