<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicSeeder extends Seeder
{
    public function run()
    {
        DB::table('clinics')->truncate();
        DB::table('clinics')->insert([
            ['id' => 1, 'name' => 'Phòng khám Cần Thơ', 'address' => '123 Đường Mạc Thiên Tích, Cần Thơ', 'phone' => '0909123456', 'created_at' => '2025-11-26 17:57:22', 'updated_at' => '2025-11-26 17:57:22'],
            ['id' => 2, 'name' => 'Phòng khám Vĩnh Long', 'address' => '456 Đường Nguyễn Huệ, Vĩnh Long', 'phone' => '0909876543', 'created_at' => '2025-11-26 17:57:22', 'updated_at' => '2025-11-26 17:57:22'],
            ['id' => 3, 'name' => 'Phòng khám Đà Nẵng', 'address' => '789 Đường Phan Văn Trị, Đà Nẵng', 'phone' => '0909988776', 'created_at' => '2025-11-26 17:57:22', 'updated_at' => '2025-11-26 17:57:22'],
            ['id' => 4, 'name' => 'Phòng khám Hồ Chí Minh', 'address' => '12 Nguyễn Huệ, Quận 1, TP.HCM', 'phone' => '0911222333', 'created_at' => '2025-11-28 10:57:22', 'updated_at' => '2025-11-28 10:57:22'],
            ['id' => 5, 'name' => 'Phòng khám Hà Nội', 'address' => '88 Trần Duy Hưng, Cầu Giấy, Hà Nội', 'phone' => '0933444555', 'created_at' => '2025-11-28 10:57:22', 'updated_at' => '2025-11-28 10:57:22'],
        ]);
    }
}