<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            RoleSeeder::class,
            PlaceSeeder::class,
            StatusSeeder::class,
            SpecializationSeeder::class,
            ClinicSeeder::class,

            UserSeeder::class,
            DoctorUserSeeder::class,

            PatientSeeder::class,
            ExtraInfoSeeder::class,
            PostSeeder::class,//
            ScheduleSeeder::class,
            FeedbackSeeder::class,
            SupporterLogSeeder::class,
            
            Add32DoctorSeeder::class,
            DoctorRatingSeeder::class,
            FaqSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
