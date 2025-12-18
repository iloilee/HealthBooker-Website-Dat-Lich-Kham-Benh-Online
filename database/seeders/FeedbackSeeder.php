<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    public function run()
    {
        DB::table('feedbacks')->truncate();
        DB::table('feedbacks')->insert([
            ['id' => 31, 'doctorId' => 7, 'patientId' => 16, 'timeBooking' => '08:00:00', 'dateBooking' => '2025-12-01', 'content' => 'Bác sĩ rất nhiệt tình, khám kỹ.', 'rating' => 5, 'created_at' => '2025-11-28 07:00:00'],
            ['id' => 32, 'doctorId' => 8, 'patientId' => 17, 'timeBooking' => '09:00:00', 'dateBooking' => '2025-12-01', 'content' => 'Rất hài lòng với cách tư vấn.', 'rating' => 4, 'created_at' => '2025-11-28 07:05:00'],
            ['id' => 33, 'doctorId' => 4, 'patientId' => 18, 'timeBooking' => '10:00:00', 'dateBooking' => '2025-12-02', 'content' => 'Thái độ thân thiện, giải thích dễ hiểu.', 'rating' => 5, 'created_at' => '2025-11-28 07:10:00'],
            ['id' => 34, 'doctorId' => 10, 'patientId' => 19, 'timeBooking' => '11:00:00', 'dateBooking' => '2025-12-02', 'content' => 'Chờ hơi lâu nhưng bác sĩ khám kỹ.', 'rating' => 4, 'created_at' => '2025-11-28 07:15:00'],
            ['id' => 35, 'doctorId' => 11, 'patientId' => 20, 'timeBooking' => '08:30:00', 'dateBooking' => '2025-12-03', 'content' => 'Khám nhanh, có lưu ý thêm cho bệnh nhân.', 'rating' => 3, 'created_at' => '2025-11-28 07:20:00'],
            ['id' => 36, 'doctorId' => 12, 'patientId' => 17, 'timeBooking' => '14:00:00', 'dateBooking' => '2025-12-03', 'content' => 'Bác sĩ giải thích chi tiết, dễ hiểu.', 'rating' => 5, 'created_at' => '2025-11-28 07:25:00'],
            ['id' => 37, 'doctorId' => 13, 'patientId' => 22, 'timeBooking' => '15:30:00', 'dateBooking' => '2025-12-04', 'content' => 'Hơi đông bệnh nhân nhưng vẫn chu đáo.', 'rating' => 4, 'created_at' => '2025-11-28 07:30:00'],
            ['id' => 38, 'doctorId' => 14, 'patientId' => 21, 'timeBooking' => '13:00:00', 'dateBooking' => '2025-12-04', 'content' => 'Rất chuyên nghiệp, nhiệt tình với bệnh nhân.', 'rating' => 5, 'created_at' => '2025-11-28 07:35:00'],
            ['id' => 39, 'doctorId' => 7, 'patientId' => 20, 'timeBooking' => '09:30:00', 'dateBooking' => '2025-12-05', 'content' => 'Chưa hài lòng lắm, bác sĩ hơi vội.', 'rating' => 3, 'created_at' => '2025-11-28 07:40:00'],
            ['id' => 40, 'doctorId' => 4, 'patientId' => 23, 'timeBooking' => '07:00:00', 'dateBooking' => '2025-12-05', 'content' => 'Khám tốt, tư vấn kỹ, sẽ quay lại.', 'rating' => 5, 'created_at' => '2025-11-28 07:45:00'],
            ['id' => 41, 'doctorId' => 8, 'patientId' => 16, 'timeBooking' => '08:00:00', 'dateBooking' => '2025-12-01', 'content' => 'Bác sĩ rất nhiệt tình, khám kỹ.', 'rating' => 4, 'created_at' => '2025-11-28 07:00:00'],
        ]);
    }
}