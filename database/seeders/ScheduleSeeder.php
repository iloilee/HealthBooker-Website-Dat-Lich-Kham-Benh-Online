<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        DB::table('schedules')->truncate();

        $morning = ['07:00:00', '08:00:00', '09:00:00', '10:00:00'];
        $afternoon = ['13:00:00', '14:00:00', '15:00:00', '16:00:00'];

        $date = now()->toDateString();

        $doctors = [1, 4];

        $insertData = [];

        foreach ($doctors as $doctorId) {
            foreach ($morning as $time) {
                $insertData[] = [
                    'doctorId'   => $doctorId,
                    'date'       => $date,
                    'time'       => $time,
                    'maxBooking' => 2,
                    'sumBooking' => 0,
                    'created_at' => now(),
                ];
            }

            foreach ($afternoon as $time) {
                $insertData[] = [
                    'doctorId'   => $doctorId,
                    'date'       => $date,
                    'time'       => $time,
                    'maxBooking' => 2,
                    'sumBooking' => 0,
                    'created_at' => now(),
                ];
            }
        }

        DB::table('schedules')->insert($insertData);
    }
}
