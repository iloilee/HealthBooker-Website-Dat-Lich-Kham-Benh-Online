<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->truncate();
        DB::table('patients')->insert([
            ['id' => 16, 'doctorId' => 1, 'statusId' => 1, 'name' => 'Nguyễn Vân Anh', 'phone' => '0909123456', 'dateBooking' => '2025-12-01', 'timeBooking' => '08:00:00', 'email' => 'patient1@gmail.com', 'gender' => 'Nam', 'year' => '1990', 'address' => 'Cần Thơ', 'description' => 'Khám tổng quát', 'isSentForms' => 1, 'created_at' => '2026-01-28 20:41:18'],
            ['id' => 17, 'doctorId' => 3, 'statusId' => 2, 'name' => 'Nguyễn Nhật Minh', 'phone' => '0912345678', 'dateBooking' => '2025-12-01', 'timeBooking' => '09:00:00', 'email' => 'patient2@gmail.com', 'gender' => 'Nam', 'year' => '1992', 'address' => 'Cần Thơ', 'description' => 'Khám tim mạch', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 18, 'doctorId' => 4, 'statusId' => 3, 'name' => 'Thái Thị Mỹ', 'phone' => '0987654321', 'dateBooking' => now()->toDateString(), 'timeBooking' => '10:00:00', 'email' => 'patient3@gmail.com', 'gender' => 'Nữ', 'year' => '1995', 'address' => 'Hà Nội', 'description' => 'Khám da liễu', 'isSentForms' => 1, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 19, 'doctorId' => 5, 'statusId' => 3, 'name' => 'Trần Thị Tuyết', 'phone' => '0909000001', 'dateBooking' => '2025-12-30', 'timeBooking' => '11:00:00', 'email' => 'patient4@gmail.com', 'gender' => 'Nữ', 'year' => '1988', 'address' => 'Vĩnh Long', 'description' => 'Khám tiêu hóa', 'isSentForms' => 1, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 20, 'doctorId' => 6, 'statusId' => 2, 'name' => 'Trần Văn Toàn', 'phone' => '0909000002', 'dateBooking' => '2025-12-30', 'timeBooking' => '08:30:00', 'email' => 'patient5@gmail.com', 'gender' => 'Nam', 'year' => '1991', 'address' => 'Đà Nẵng', 'description' => 'Khám cơ xương khớp', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 21, 'doctorId' => 7, 'statusId' => 1, 'name' => 'Nguyễn Thị Lan', 'phone' => '0909000003', 'dateBooking' => '2025-12-30', 'timeBooking' => '09:30:00', 'email' => 'patient6@gmail.com', 'gender' => 'Nữ', 'year' => '1993', 'address' => 'Hà Nội', 'description' => 'Khám mắt', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 22, 'doctorId' => 8, 'statusId' => 4, 'name' => 'Phạm Văn Hùng', 'phone' => '0909000004', 'dateBooking' => '2025-12-30', 'timeBooking' => '08:00:00', 'email' => 'patient7@gmail.com', 'gender' => 'Nam', 'year' => '1985', 'address' => 'Cần Thơ', 'description' => 'Khám răng', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 23, 'doctorId' => 9, 'statusId' => 3, 'name' => 'Lê Thị Hoa', 'phone' => '0909000005', 'dateBooking' => '2025-12-30', 'timeBooking' => '10:00:00', 'email' => 'patient8@gmail.com', 'gender' => 'Nữ', 'year' => '1990', 'address' => 'Vĩnh Long', 'description' => 'Khám sản phụ khoa', 'isSentForms' => 1, 'created_at' => '2025-11-28 20:41:18'],
            ['id' => 24, 'doctorId' => 4, 'statusId' => 2, 'name' => 'Trần Văn Hoa', 'phone' => '0987654321', 'dateBooking' => '2026-05-15', 'timeBooking' => '10:00:00', 'email' => 'patient9@gmail.com', 'gender' => 'Nam', 'year' => '1995', 'address' => 'Hà Nội', 'description' => 'Khám tổng quát', 'isSentForms' => 1, 'created_at' => '2025-11-28 21:41:18'],
            ['id' => 25, 'doctorId' => 4, 'statusId' => 1, 'name' => 'Trần Mạnh Hùng', 'phone' => '0987654321', 'dateBooking' => now()->toDateString(), 'timeBooking' => '15:00:00', 'email' => 'patient10@gmail.com', 'gender' => 'Nam', 'year' => '1995', 'address' => 'Hà Nội', 'description' => 'Khám mắt', 'isSentForms' => 1, 'created_at' => '2025-12-28 21:41:18'],
            ['id' => 26, 'doctorId' => 4, 'statusId' => 1, 'name' => 'Nguyễn Ngọc', 'phone' => '0987654321', 'dateBooking' => now()->addDay()->toDateString(), 'timeBooking' => '15:00:00', 'email' => 'patient11@gmail.com', 'gender' => 'Nam', 'year' => '1995', 'address' => 'Hà Nội', 'description' => 'Khám đau bụng', 'isSentForms' => 1, 'created_at' => '2025-12-28 21:41:18'],
        ]);
    }
}