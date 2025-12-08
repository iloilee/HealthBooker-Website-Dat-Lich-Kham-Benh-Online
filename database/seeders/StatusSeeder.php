<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->truncate();
        DB::table('statuses')->insert([
            ['id' => 1, 'name' => 'Chờ xác nhận', 'created_at' => '2025-11-28 20:40:38', 'updated_at' => '2025-11-28 20:40:38'],
            ['id' => 2, 'name' => 'Đã xác nhận', 'created_at' => '2025-11-28 20:40:38', 'updated_at' => '2025-11-28 20:40:38'],
            ['id' => 3, 'name' => 'Đã khám', 'created_at' => '2025-11-28 20:40:38', 'updated_at' => '2025-11-28 20:40:38'],
            ['id' => 4, 'name' => 'Hủy', 'created_at' => '2025-11-28 20:40:38', 'updated_at' => '2025-11-28 20:40:38'],
        ]);
    }
}