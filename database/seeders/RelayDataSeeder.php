<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelayDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RelayDataSeeder::create([
            'condition_name' => 'default_setting',
            'temp_condition' => '{"high": 35, "med_min": 25, "med_max": 35, "low": 25}',
            'humi_condition' => '{"high": 60, "med_min": 45, "med_max": 60, "low": 45}',
            'lumi_condition' => '{"high": 70, "med_min": 40, "med_max": 70, "low": 40}',
            'soil_condition' => '{"high": 70, "med_min": 40, "med_max": 70, "low": 40}',
            'rain_condition' => '{"heavy": 0.1, "mid_max": 0.4, "mid_min": 0.1, "light_max": 0.6, "light_min": 0.4, "none": 0.6}'
        ]);
    }
}
