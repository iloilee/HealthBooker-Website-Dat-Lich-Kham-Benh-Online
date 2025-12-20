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
            // patient1@gmail.com (user id = 2) có 4 lịch hẹn
            ['id' => 13, 'userId' => 2, 'doctorId' => 12, 'statusId' => 3, 'name' => 'Nguyễn Vân Anh', 'phone' => '0909123456', 'dateBooking' => '2025-12-01', 'timeBooking' => '08:00:00', 'email' => 'patient1@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1990-02-12', 'address' => 'Cần Thơ', 'description' => 'Khám mac e', 'isSentForms' => 1, 'created_at' => '2026-01-28 20:41:18'],
            ['id' => 14, 'userId' => 2, 'doctorId' => 11, 'statusId' => 3, 'name' => 'Nguyễn Vân Anh', 'phone' => '0909123456', 'dateBooking' => '2025-12-10', 'timeBooking' => '08:00:00', 'email' => 'patient1@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1990-02-12', 'address' => 'Cần Thơ', 'description' => 'Khám dau bung', 'isSentForms' => 1, 'created_at' => '2026-01-28 20:41:18'],
            ['id' => 15, 'userId' => 2, 'doctorId' => 4, 'statusId' => 1, 'name' => 'Nguyễn Vân Anh', 'phone' => '0909123456', 'dateBooking' => now()->toDateString(), 'timeBooking' => '15:00:00', 'email' => 'patient1@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1990-02-12', 'address' => 'Cần Thơ', 'description' => 'Khám tieu hoa', 'isSentForms' => 1, 'created_at' => '2026-01-28 20:41:18'],
            ['id' => 16, 'userId' => 2, 'doctorId' => 4, 'statusId' => 1, 'name' => 'Nguyễn Vân Anh', 'phone' => '0909123456', 'dateBooking' => now()->toDateString(), 'timeBooking' => '08:00:00', 'email' => 'patient1@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1990-02-12', 'address' => 'Cần Thơ', 'description' => 'Khám tổng quát', 'isSentForms' => 1, 'created_at' => '2026-01-28 20:41:18'],
            
            // patient2@gmail.com (user id = 3)
            ['id' => 17, 'userId' => 3, 'doctorId' => 3, 'statusId' => 2, 'name' => 'Nguyễn Nhật Minh', 'phone' => '0912345678', 'dateBooking' => '2025-12-01', 'timeBooking' => '09:00:00', 'email' => 'patient2@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1992-06-20', 'address' => 'Cần Thơ', 'description' => 'Khám tim mạch', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient3@gmail.com (user id = 4)
            ['id' => 18, 'userId' => 4, 'doctorId' => 4, 'statusId' => 3, 'name' => 'Thái Thị Mỹ', 'phone' => '0987654321', 'dateBooking' => now()->toDateString(), 'timeBooking' => '10:00:00', 'email' => 'patient3@gmail.com', 'gender' => 'Nữ', 'date_of_birth' => '1995-06-13', 'address' => 'Hà Nội', 'description' => 'Khám da liễu', 'isSentForms' => 1, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient4@gmail.com (user id = 5)
            ['id' => 19, 'userId' => 5, 'doctorId' => 5, 'statusId' => 3, 'name' => 'Trần Thị Tuyết', 'phone' => '0909000001', 'dateBooking' => '2025-12-30', 'timeBooking' => '11:00:00', 'email' => 'patient4@gmail.com', 'gender' => 'Nữ', 'date_of_birth' => '1988-08-21', 'address' => 'Vĩnh Long', 'description' => 'Khám tiêu hóa', 'isSentForms' => 1, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient5@gmail.com (user id = 6)
            ['id' => 20, 'userId' => 6, 'doctorId' => 6, 'statusId' => 2, 'name' => 'Trần Văn Toàn', 'phone' => '0909000002', 'dateBooking' => '2025-12-30', 'timeBooking' => '08:30:00', 'email' => 'patient5@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1991-09-21', 'address' => 'Đà Nẵng', 'description' => 'Khám cơ xương khớp', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient6@gmail.com (user id = 51)
            ['id' => 21, 'userId' => 51, 'doctorId' => 7, 'statusId' => 1, 'name' => 'Nguyễn Thị Lan', 'phone' => '0909000003', 'dateBooking' => '2025-12-30', 'timeBooking' => '09:30:00', 'email' => 'patient6@gmail.com', 'gender' => 'Nữ', 'date_of_birth' => '1993-12-21', 'address' => 'Hà Nội', 'description' => 'Khám mắt', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient7@gmail.com (user id = 52)
            ['id' => 22, 'userId' => 52, 'doctorId' => 8, 'statusId' => 4, 'name' => 'Phạm Văn Hùng', 'phone' => '0909000004', 'dateBooking' => '2025-12-30', 'timeBooking' => '08:00:00', 'email' => 'patient7@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1985-10-12', 'address' => 'Cần Thơ', 'description' => 'Khám răng', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient8@gmail.com (user id = 53)
            ['id' => 23, 'userId' => 53, 'doctorId' => 9, 'statusId' => 3, 'name' => 'Lê Thị Hoa', 'phone' => '0909000005', 'dateBooking' => '2025-12-30', 'timeBooking' => '10:00:00', 'email' => 'patient8@gmail.com', 'gender' => 'Nữ', 'date_of_birth' => '1990-09-12', 'address' => 'Vĩnh Long', 'description' => 'Khám sản phụ khoa', 'isSentForms' => 1, 'created_at' => '2025-11-28 20:41:18'],
            
            // patient9@gmail.com (user id = 54)
            ['id' => 24, 'userId' => 54, 'doctorId' => 4, 'statusId' => 2, 'name' => 'Trần Văn Hoa', 'phone' => '0987654321', 'dateBooking' => '2026-05-15', 'timeBooking' => '10:00:00', 'email' => 'patient9@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1995-12-21', 'address' => 'Hà Nội', 'description' => 'Khám tổng quát', 'isSentForms' => 1, 'created_at' => '2025-11-28 21:41:18'],
            
            // patient10@gmail.com (user id = 48)
            ['id' => 25, 'userId' => 48, 'doctorId' => 4, 'statusId' => 1, 'name' => 'Trần Chấn Hào', 'phone' => '0987654321', 'dateBooking' => now()->toDateString(), 'timeBooking' => '15:00:00', 'email' => 'patient10@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1995-11-21', 'address' => 'Hà Nội', 'description' => 'Khám mắt', 'isSentForms' => 1, 'created_at' => '2025-12-28 21:41:18'],
            
            // patient11@gmail.com (user id = 49)
            ['id' => 26, 'userId' => 49, 'doctorId' => 4, 'statusId' => 1, 'name' => 'Nguyễn Ngọc', 'phone' => '0987654321', 'dateBooking' => now()->addDay()->toDateString(), 'timeBooking' => '15:00:00', 'email' => 'patient11@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1995-08-21', 'address' => 'Hà Nội', 'description' => 'Khám đau bụng', 'isSentForms' => 1, 'created_at' => '2025-12-28 21:41:18'],
            
            // Thêm các patient records cho patient12@gmail.com (user id = 50)
            ['id' => 27, 'userId' => 50, 'doctorId' => 10, 'statusId' => 1, 'name' => 'Trần Văn Tủn', 'phone' => '0909000002', 'dateBooking' => '2025-12-31', 'timeBooking' => '14:00:00', 'email' => 'patient12@gmail.com', 'gender' => 'Nam', 'date_of_birth' => '1991-09-21', 'address' => 'Đà Nẵng', 'description' => 'Khám tổng quát', 'isSentForms' => 0, 'created_at' => '2025-11-28 20:41:18'],
        ]);
    }
}