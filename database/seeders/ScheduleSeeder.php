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

        $doctors = [1];
        for ($i = 3; $i <= 41; $i++) {
            $doctors[] = $i;
        }

        // $doctors = [1,3,4,5,6,7,8,9];

        $startDate = Carbon::now()->startOfMonth();
        $endDate   = Carbon::now()->endOfMonth();

        $insertData = [];
        $batchSize = 500;

        for ($currentDate = $startDate->copy(); $currentDate->lte($endDate); $currentDate->addDay()) {
            foreach ($doctors as $doctorId) {
                foreach (array_merge($morning, $afternoon) as $time) {
                    $insertData[] = [
                        'doctorId'   => $doctorId,
                        'date'       => $currentDate->toDateString(),
                        'time'       => $time,
                        'maxBooking' => 2,
                        'sumBooking' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    if (count($insertData) >= $batchSize) {
                        DB::table('schedules')->insert($insertData);
                        $insertData = [];
                    }
                }
            }
        }

        if (!empty($insertData)) {
            DB::table('schedules')->insert($insertData);
        }
    }
}
