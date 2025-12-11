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
            [
                'id' => 1,
                'doctorId' => 7,
                'clinicId' => 1,
                'specializationId' => 1,
                'phone' => '0909123456',
                'photo' => 'doctor1.jpg',
                'bio' => 'Bác sĩ chuyên khoa nội với hơn 10 năm kinh nghiệm.',
                'experience_years' => 10,
                'certification' => 'Chứng chỉ hành nghề nội tổng quát',
                'date_of_birth' => '1980-05-12',
                'created_at' => '2025-11-26 18:01:09',
                'updated_at' => '2025-11-26 18:01:09',
            ],
            [
                'id' => 3,
                'doctorId' => 8,
                'clinicId' => 1,
                'specializationId' => 2,
                'phone' => '0912345678',
                'photo' => 'doctor2.jpg',
                'bio' => 'Chuyên gia tim mạch với nhiều công trình nghiên cứu.',
                'experience_years' => 12,
                'certification' => 'Chứng chỉ chuyên khoa tim mạch',
                'date_of_birth' => '1982-09-20',
                'created_at' => '2025-11-26 12:35:01',
                'updated_at' => '2025-11-26 12:35:01',
            ],
            [
                'id' => 4,
                'doctorId' => 9,
                'clinicId' => 2,
                'specializationId' => 3,
                'phone' => '0987654321',
                'photo' => 'doctor3.jpg',
                'bio' => 'Bác sĩ ngoại khoa chuyên phẫu thuật tiêu hóa.',
                'experience_years' => 15,
                'certification' => 'Chứng chỉ phẫu thuật tiêu hóa nâng cao',
                'date_of_birth' => '1978-03-15',
                'created_at' => '2025-11-26 12:35:01',
                'updated_at' => '2025-11-26 12:35:01',
            ],
            [
                'id' => 5,
                'doctorId' => 10,
                'clinicId' => 2,
                'specializationId' => 4,
                'phone' => '0909000004',
                'photo' => 'doctor4.jpg',
                'bio' => 'Bác sĩ nhi khoa tận tâm với trẻ em.',
                'experience_years' => 8,
                'certification' => 'Chứng chỉ chuyên ngành nhi',
                'date_of_birth' => '1987-11-02',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 6,
                'doctorId' => 11,
                'clinicId' => 3,
                'specializationId' => 5,
                'phone' => '0909000005',
                'photo' => 'doctor5.jpg',
                'bio' => 'Bác sĩ da liễu chuyên điều trị các bệnh mãn tính.',
                'experience_years' => 9,
                'certification' => 'Chứng chỉ da liễu chuyên sâu',
                'date_of_birth' => '1985-01-18',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 7,
                'doctorId' => 12,
                'clinicId' => 4,
                'specializationId' => 6,
                'phone' => '0909000006',
                'photo' => 'doctor6.jpg',
                'bio' => 'Bác sĩ xương khớp với 11 năm kinh nghiệm.',
                'experience_years' => 11,
                'certification' => 'Chứng chỉ cơ xương khớp',
                'date_of_birth' => '1981-07-09',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 8,
                'doctorId' => 13,
                'clinicId' => 5,
                'specializationId' => 7,
                'phone' => '0909000007',
                'photo' => 'doctor7.jpg',
                'bio' => 'Bác sĩ thần kinh học với kinh nghiệm điều trị chứng đau đầu mãn tính.',
                'experience_years' => 14,
                'certification' => 'Chứng chỉ chuyên ngành thần kinh',
                'date_of_birth' => '1979-12-28',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 9,
                'doctorId' => 14,
                'clinicId' => 1,
                'specializationId' => 8,
                'phone' => '0909000008',
                'photo' => 'doctor8.jpg',
                'bio' => 'Bác sĩ sản khoa với hơn 13 năm kinh nghiệm.',
                'experience_years' => 13,
                'certification' => 'Chứng chỉ sản phụ khoa',
                'date_of_birth' => '1983-04-22',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
        ]);
    }
}
