<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        DB::table('schedules')->truncate();

        $morning = ['07:00:00', '08:00:00', '09:00:00', '10:00:00'];
        $afternoon = ['13:00:00', '14:00:00', '15:00:00', '16:00:00'];

        $date = now()->toDateString();

        $doctors = [1, 3, 4, 5, 6, 7, 8, 9];

        $startDate = Carbon::now()->startOfMonth();
        $endDate   = Carbon::now()->endOfMonth();
        $insertData = [];

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            foreach ($doctors as $doctorId) {
                foreach ($morning as $time) {
                    $insertData[] = [
                        'doctorId'   => $doctorId,
                        'date'       => $date->toDateString(),
                        'time'       => $time,
                        'maxBooking' => 2,
                        'sumBooking' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                foreach ($afternoon as $time) {
                    $insertData[] = [
                        'doctorId'   => $doctorId,
                        'date'       => $date->toDateString(),
                        'time'       => $time,
                        'maxBooking' => 2,
                        'sumBooking' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        DB::table('schedules')->insert($insertData);
    }
}
