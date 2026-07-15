<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GardenData;

class GardenDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GardenData::create([
            'id'                => 1,
            'garden_name'       => 'Kebun 1',
            'garden_description'=> 'Kebun atas rumah',
            'garden_picture'    => 'gardens/1783930543_dashboard_image.jpg',
            'created_at'        => '2026-07-13 08:15:43',
            'updated_at'        => '2026-07-13 08:15:43',
        ]);
    }
}
