<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    public function run()
    {
        DB::table('specializations')->truncate();
        DB::table('specializations')->insert([
            ['id' => 1, 'name' => 'Tim mạch', 'description' => 'Chuyên khoa tim mạch', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 2, 'name' => 'Da liễu', 'description' => 'Chuyên khoa da liễu', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 3, 'name' => 'Nhi khoa', 'description' => 'Chuyên khoa nhi', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 4, 'name' => 'Tiêu hóa', 'description' => 'Chuyên khoa tiêu hóa', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 5, 'name' => 'Sản phụ khoa', 'description' => 'Chuyên khoa sản phụ khoa', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 6, 'name' => 'Cơ xương khớp', 'description' => 'Chuyên khoa cơ xương khớp', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 7, 'name' => 'Nhãn khoa', 'description' => 'Chuyên khoa nhãn khoa', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 8, 'name' => 'Nha Khoa', 'description' => 'Chuyên khoa Nha Khoa', 'created_at' => '2025-11-26 11:00:17', 'updated_at' => '2025-11-26 11:00:17'],
        ]);
    }
}