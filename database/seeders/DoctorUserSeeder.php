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
                'specializationId' => 1, // Tim mạch
                'phone' => '0909123456',
                'bio' => 'Bác sĩ chuyên khoa tim mạch, hơn 10 năm kinh nghiệm chẩn đoán và điều trị các bệnh lý tim mạch.',
                'experience_years' => 10,
                'certification' => 'Bác sĩ chuyên khoa I Tim mạch – Đại học Y Dược TP.HCM',
                'date_of_birth' => '1980-05-12',
                'created_at' => '2025-11-26 18:01:09',
                'updated_at' => '2025-11-26 18:01:09',
            ],
            [
                'id' => 3,
                'doctorId' => 8,
                'clinicId' => 1,
                'specializationId' => 2, // Da liễu
                'phone' => '0912345678',
                'bio' => 'Bác sĩ chuyên khoa da liễu, nhiều kinh nghiệm điều trị các bệnh về da, tóc và móng.',
                'experience_years' => 12,
                'certification' => 'Bác sĩ chuyên khoa Da liễu – Đại học Y Hà Nội',
                'date_of_birth' => '1982-09-20',
                'created_at' => '2025-11-26 12:35:01',
                'updated_at' => '2025-11-26 12:35:01',
            ],
            [
                'id' => 4,
                'doctorId' => 9,
                'clinicId' => 2,
                'specializationId' => 3, // Nhi khoa
                'phone' => '0987654321',
                'bio' => 'Bác sĩ chuyên khoa nhi, giàu kinh nghiệm trong khám và điều trị bệnh lý cho trẻ em.',
                'experience_years' => 15,
                'certification' => 'Bác sĩ chuyên khoa I Nhi – Đại học Y Dược Huế',
                'date_of_birth' => '1978-03-15',
                'created_at' => '2025-11-26 12:35:01',
                'updated_at' => '2025-11-26 12:35:01',
            ],
            [
                'id' => 5,
                'doctorId' => 10,
                'clinicId' => 2,
                'specializationId' => 4, // Tiêu hóa
                'phone' => '0909000004',
                'bio' => 'Bác sĩ chuyên khoa tiêu hóa, có nhiều năm kinh nghiệm nội soi và điều trị bệnh đường tiêu hóa.',
                'experience_years' => 8,
                'certification' => 'Thạc sĩ Y học – Chuyên ngành Tiêu hóa',
                'date_of_birth' => '1987-11-02',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 6,
                'doctorId' => 11,
                'clinicId' => 3,
                'specializationId' => 5, // Sản phụ khoa
                'phone' => '0909000005',
                'bio' => 'Bác sĩ chuyên khoa sản phụ khoa, nhiều kinh nghiệm theo dõi thai kỳ và chăm sóc sức khỏe phụ nữ.',
                'experience_years' => 9,
                'certification' => 'Bác sĩ chuyên khoa I Sản phụ khoa – Đại học Y Dược Cần Thơ',
                'date_of_birth' => '1985-01-18',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 7,
                'doctorId' => 12,
                'clinicId' => 4,
                'specializationId' => 6, // Cơ xương khớp
                'phone' => '0909000006',
                'bio' => 'Bác sĩ chuyên khoa cơ xương khớp, điều trị các bệnh lý về xương, khớp và cột sống.',
                'experience_years' => 11,
                'certification' => 'Bác sĩ chuyên khoa I Cơ xương khớp – Đại học Y Hà Nội',
                'date_of_birth' => '1981-07-09',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 8,
                'doctorId' => 13,
                'clinicId' => 5,
                'specializationId' => 7, // Mắt
                'phone' => '0909000007',
                'bio' => 'Bác sĩ chuyên khoa mắt, nhiều kinh nghiệm điều trị các bệnh lý về mắt và thị lực.',
                'experience_years' => 14,
                'certification' => 'Bác sĩ chuyên khoa Mắt – Đại học Y Dược TP.HCM',
                'date_of_birth' => '1979-12-28',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
            [
                'id' => 9,
                'doctorId' => 14,
                'clinicId' => 1,
                'specializationId' => 8, // Nha khoa
                'phone' => '0909000008',
                'bio' => 'Bác sĩ chuyên khoa nha, có nhiều năm kinh nghiệm điều trị và thẩm mỹ răng hàm mặt.',
                'experience_years' => 13,
                'certification' => 'Bác sĩ Răng Hàm Mặt – Đại học Y Dược Huế',
                'date_of_birth' => '1983-04-22',
                'created_at' => '2025-11-28 20:27:13',
                'updated_at' => '2025-11-28 20:27:13',
            ],
        ]);
    }
}
