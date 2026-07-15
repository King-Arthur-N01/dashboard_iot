<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ScheduleData;

class ScheduleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduleData::create([
            'id'             => 1,
            'schedule_name'  => 'Jadwal musim kering',
            'schedule_date'  => json_encode(["senin","selasa","rabu","kamis","jumat","sabtu","minggu"]),
            'schedule_time'  => json_encode(["07:00","12:00","16:00","21:00"]),
            'schedule_cycle' => 4,
            'relay_id'       => 1,
            'garden_id'      => 1,
            'created_at'     => '2026-07-13 08:15:43',
            'updated_at'     => '2026-07-13 08:15:43',
        ]);
    }
}
