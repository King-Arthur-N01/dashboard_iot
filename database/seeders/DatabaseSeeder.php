<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'System Administrator',
            'nik' => '11379',
            'password' => bcrypt('admin123'),
        ]);

        $this->call(GardenDataSeeder::class);
        $this->call(ScheduleDataSeeder::class);
    }
}
