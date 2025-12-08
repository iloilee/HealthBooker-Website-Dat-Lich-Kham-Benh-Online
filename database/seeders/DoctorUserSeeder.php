<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('doctor_users')->truncate();
        DB::table('doctor_users')->insert([
            ['id' => 1, 'doctorId' => 7, 'clinicId' => 1, 'specializationId' => 1, 'phone' => '0909123456', 'photo' => 'doctor1.jpg', 'created_at' => '2025-11-26 18:01:09'],
            ['id' => 3, 'doctorId' => 8, 'clinicId' => 1, 'specializationId' => 2, 'phone' => '0912345678', 'photo' => 'doctoc2.jpg', 'created_at' => '2025-11-26 12:35:01'],
            ['id' => 4, 'doctorId' => 9, 'clinicId' => 2, 'specializationId' => 3, 'phone' => '0987654321', 'photo' => 'doctor3.jpg', 'created_at' => '2025-11-26 12:35:01'],
            ['id' => 5, 'doctorId' => 10, 'clinicId' => 2, 'specializationId' => 4, 'phone' => '0909000004', 'photo' => 'doctor4.jpg', 'created_at' => '2025-11-28 20:27:13'],
            ['id' => 6, 'doctorId' => 11, 'clinicId' => 3, 'specializationId' => 5, 'phone' => '0909000005', 'photo' => 'doctor5.jpg', 'created_at' => '2025-11-28 20:27:13'],
            ['id' => 7, 'doctorId' => 12, 'clinicId' => 4, 'specializationId' => 6, 'phone' => '0909000006', 'photo' => 'doctor6.jpg', 'created_at' => '2025-11-28 20:27:13'],
            ['id' => 8, 'doctorId' => 13, 'clinicId' => 5, 'specializationId' => 7, 'phone' => '0909000007', 'photo' => 'doctor7.jpg', 'created_at' => '2025-11-28 20:27:13'],
            ['id' => 9, 'doctorId' => 14, 'clinicId' => 1, 'specializationId' => 8, 'phone' => '0909000008', 'photo' => 'doctor8.jpg', 'created_at' => '2025-11-28 20:27:13'],
        ]);
    }
}