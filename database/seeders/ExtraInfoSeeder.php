<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtraInfoSeeder extends Seeder
{
    public function run()
    {
        DB::table('extra_infos')->truncate();
        DB::table('extra_infos')->insert([
            ['id' => 9, 'patientId' => 16, 'historyBreath' => 'Không có tiền sử hô hấp nghiêm trọng', 'placeId' => 1, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Bệnh nhân dễ bị cảm lạnh', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 10, 'patientId' => 17, 'historyBreath' => 'Đôi khi khó thở khi vận động', 'placeId' => 1, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Cần theo dõi huyết áp', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 11, 'patientId' => 18, 'historyBreath' => 'Có tiền sử hen nhẹ', 'placeId' => 5, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Dị ứng phấn hoa mùa xuân', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 12, 'patientId' => 19, 'historyBreath' => 'Khó thở nhẹ khi mệt', 'placeId' => 2, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Cần ăn uống hợp lý', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 13, 'patientId' => 20, 'historyBreath' => 'Không có triệu chứng hô hấp', 'placeId' => 3, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Theo dõi thể trạng cơ xương', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 14, 'patientId' => 21, 'historyBreath' => 'Đôi khi ho về đêm', 'placeId' => 5, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Kiểm tra mắt định kỳ', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 15, 'patientId' => 22, 'historyBreath' => 'Tiền sử viêm phổi năm 2020', 'placeId' => 1, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Cần chăm sóc răng miệng tốt', 'created_at' => '2025-11-28 13:49:34'],
            ['id' => 16, 'patientId' => 23, 'historyBreath' => 'Không có vấn đề hô hấp', 'placeId' => 2, 'oldForms' => '[]', 'sendForms' => '[]', 'moreInfo' => 'Khám sản phụ khoa định kỳ', 'created_at' => '2025-11-28 13:49:34'],
        ]);
    }
}