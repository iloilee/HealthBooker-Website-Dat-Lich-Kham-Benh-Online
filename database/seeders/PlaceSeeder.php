<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    public function run()
    {
        DB::table('places')->truncate();
        DB::table('places')->insert([
            ['id' => 1, 'name' => 'Cần Thơ', 'created_at' => '2025-11-28 20:43:21', 'updated_at' => '2025-11-28 20:43:21'],
            ['id' => 2, 'name' => 'Vĩnh Long', 'created_at' => '2025-11-28 20:43:21', 'updated_at' => '2025-11-28 20:43:21'],
            ['id' => 3, 'name' => 'Đà Nẵng', 'created_at' => '2025-11-28 20:43:21', 'updated_at' => '2025-11-28 20:43:21'],
            ['id' => 4, 'name' => 'Hồ Chí Minh', 'created_at' => '2025-11-28 20:43:21', 'updated_at' => '2025-11-28 20:43:21'],
            ['id' => 5, 'name' => 'Hà Nội', 'created_at' => '2025-11-28 20:43:21', 'updated_at' => '2025-11-28 20:43:21'],
        ]);
    }
}