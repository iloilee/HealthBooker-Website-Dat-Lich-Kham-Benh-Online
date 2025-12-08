<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Tắt kiểm tra khóa ngoại để tránh lỗi khi insert dữ liệu có ID cố định
        Schema::disableForeignKeyConstraints();

        $this->call([
            // 1. Dữ liệu danh mục (Master Data)
            RoleSeeder::class,
            PlaceSeeder::class,
            StatusSeeder::class,
            SpecializationSeeder::class,
            ClinicSeeder::class,

            // 2. Dữ liệu người dùng và bác sĩ (Core Users)
            UserSeeder::class,
            DoctorUserSeeder::class,

            // 3. Dữ liệu hoạt động (Operational Data)
            PatientSeeder::class,
            ExtraInfoSeeder::class,
            PostSeeder::class,
            ScheduleSeeder::class,
            FeedbackSeeder::class,
            SupporterLogSeeder::class,
        ]);

        // Bật lại kiểm tra khóa ngoại
        Schema::enableForeignKeyConstraints();
    }
}
