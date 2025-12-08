<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'ADMIN', 'created_at' => '2025-11-26 12:44:36', 'updated_at' => '2025-11-26 12:44:36'],
            ['id' => 2, 'name' => 'DOCTOR', 'created_at' => '2025-11-26 12:44:36', 'updated_at' => '2025-11-26 12:44:36'],
            ['id' => 3, 'name' => 'PATIENT', 'created_at' => '2025-11-26 12:44:36', 'updated_at' => '2025-11-26 12:44:36'],
            ['id' => 4, 'name' => 'SUPPORTER', 'created_at' => '2025-11-28 19:40:39', 'updated_at' => '2025-11-28 19:40:39'],
        ]);
    }
}