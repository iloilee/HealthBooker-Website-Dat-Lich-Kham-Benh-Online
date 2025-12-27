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
            ['id' => 1, 'name' => 'Tim mạch', 'description' => 'Chuyên khoa tim mạch', 'image' => 'storage/specializations/YMHINczsgqWEIQmE92pyq3nFvViN7DWnZgxeET86.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 2, 'name' => 'Da liễu', 'description' => 'Chuyên khoa da liễu', 'image' => 'storage/specializations/i0ZyMq1mBb3JF8fgVMx1tZiMvPx8I6UeM1DOeA6m.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 3, 'name' => 'Nhi khoa', 'description' => 'Chuyên khoa nhi', 'image' => 'storage/specializations/U94u7hxIFxNeC4EA9EH4PpLSJ1Pz9anCX7CQMCo5.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 4, 'name' => 'Tiêu hóa', 'description' => 'Chuyên khoa tiêu hóa', 'image' => 'storage/specializations/DtZ1TsotNQDpeWqY10IqzmwCtteoHKChoFQt0pZA.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 5, 'name' => 'Sản phụ khoa', 'description' => 'Chuyên khoa sản phụ khoa', 'image' => 'storage/specializations/6uE31L57wXr7WhcMfxHQjVvQxqpoMmMIhHfKPuR3.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 6, 'name' => 'Cơ xương khớp', 'description' => 'Chuyên khoa cơ xương khớp', 'image' => 'storage/specializations/9bXJ4x7rn70E22tgi3RTjMzgNNQpkI6zUvdGRLEJ.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 7, 'name' => 'Mắt', 'description' => 'Chuyên khoa nhãn khoa', 'image' => 'storage/specializations/1WCpXLL3Eat6aJb0I7xJ59yhpCEXaRXiX9WC0oVJ.png', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 8, 'name' => 'Nha Khoa', 'description' => 'Chuyên khoa Nha Khoa', 'image' => 'storage/specializations/Ry33A3mB2VNjV4AapyCCujPdUe49TJxAbhQbKEJF.png', 'created_at' => '2025-11-26 11:00:17', 'updated_at' => '2025-11-26 11:00:17'],
        ]);
    }
}