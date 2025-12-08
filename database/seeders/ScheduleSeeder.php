<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        DB::table('schedules')->truncate();
        DB::table('schedules')->insert([
            ['id' => 7, 'doctorId' => 1, 'date' => '2025-01-05', 'time' => '08:00:00', 'maxBooking' => 2, 'sumBooking' => 0, 'created_at' => '2025-11-28 14:19:14'],
            ['id' => 8, 'doctorId' => 1, 'date' => '2025-01-05', 'time' => '09:00:00', 'maxBooking' => 2, 'sumBooking' => 1, 'created_at' => '2025-11-28 14:19:14'],
            ['id' => 9, 'doctorId' => 1, 'date' => '2025-01-06', 'time' => '14:00:00', 'maxBooking' => 1, 'sumBooking' => 0, 'created_at' => '2025-11-28 14:19:14'],
            ['id' => 10, 'doctorId' => 3, 'date' => '2025-01-05', 'time' => '08:00:00', 'maxBooking' => 2, 'sumBooking' => 0, 'created_at' => '2025-11-28 14:19:14'],
            ['id' => 11, 'doctorId' => 3, 'date' => '2025-01-06', 'time' => '10:00:00', 'maxBooking' => 1, 'sumBooking' => 0, 'created_at' => '2025-11-28 14:19:14'],
            ['id' => 12, 'doctorId' => 3, 'date' => '2025-01-07', 'time' => '15:00:00', 'maxBooking' => 2, 'sumBooking' => 0, 'created_at' => '2025-11-28 14:19:14'],
        ]);
    }
}