<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupporterLogSeeder extends Seeder
{
    public function run()
    {
        DB::table('supporterlogs')->truncate();
        DB::table('supporterlogs')->insert([
            ['id' => 1, 'patientId' => 16, 'supporterId' => 7, 'content' => 'Hỗ trợ bệnh nhân đăng ký lịch thành công.', 'created_at' => '2025-11-28 08:00:00'],
            ['id' => 2, 'patientId' => 17, 'supporterId' => 8, 'content' => 'Giải đáp thắc mắc về thông tin bác sĩ.', 'created_at' => '2025-11-28 08:05:00'],
            ['id' => 3, 'patientId' => 18, 'supporterId' => 7, 'content' => 'Hỗ trợ thanh toán dịch vụ.', 'created_at' => '2025-11-28 08:10:00'],
            ['id' => 4, 'patientId' => 19, 'supporterId' => 9, 'content' => 'Gửi thông báo thay đổi lịch hẹn.', 'created_at' => '2025-11-28 08:15:00'],
            ['id' => 5, 'patientId' => 20, 'supporterId' => 8, 'content' => 'Hướng dẫn cài đặt ứng dụng HealthBooker.', 'created_at' => '2025-11-28 08:20:00'],
            ['id' => 6, 'patientId' => 21, 'supporterId' => 7, 'content' => 'Cập nhật thông tin cá nhân bệnh nhân.', 'created_at' => '2025-11-28 08:25:00'],
        ]);
    }
}