<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::where('id', 2)->update([
            'phone' => '0918234567',
            'address' => '22 Nguyễn Huệ, Quận 1, TP Hồ Chí Minh',
        ]);

        \App\Models\User::where('id', 3)->update([
            'phone' => '0934675123',
            'address' => '88 Cầu Giấy, Quận Cầu Giấy, Hà Nội',
        ]);

        \App\Models\User::where('id', 4)->update([
            'phone' => '0972346591',
            'address' => '45 Hùng Vương, TP Huế',
        ]);

        \App\Models\User::where('id', 5)->update([
            'phone' => '0908456732',
            'address' => '67 Nguyễn Văn Linh, TP Đà Nẵng',
        ]);

        \App\Models\User::where('id', 6)->update([
            'phone' => '0987621534',
            'address' => '12 Lê Lợi, TP Cần Thơ',
        ]);
        
        \App\Models\User::where('id', 7)->update([
            'phone' => '0947851263',
            'address' => '101 Lê Duẩn, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 8)->update([
            'phone' => '0912345678',
            'address' => '123 Nguyễn Huệ, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 9)->update([
            'phone' => '0935124789',
            'address' => '45 Phạm Thái Bường, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 10)->update([
            'phone' => '0982456712',
            'address' => '78 Trương Định, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 11)->update([
            'phone' => '0903567891',
            'address' => '12 Lý Thường Kiệt, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 12)->update([
            'phone' => '0975681245',
            'address' => '56 Nguyễn Trãi, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 13)->update([
            'phone' => '0968432157',
            'address' => '34 Phan Đình Phùng, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 14)->update([
            'phone' => '0923675184',
            'address' => '89 Trần Đại Nghĩa, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 1)->update([
            'avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBI852zzHGYCool7feEvRZCttYLwzvmcIRuFkihwR-ztZiPzAAqUcdK9KExfvU5sPx3kE95EgKP-p15zgsynLpNqmzaTLw8n3HMHDQaAgW7QDv0_s4sTK9MtMnUx7oZUPfzsWGZvNAArA0jail_lwmpQHmaVETEe6EB8DFuDuJAzwyRtaY-6t-k-bx2SD9Q9PGgPPHQ46C8NmL8wGIWp9ktTUAP08WtC-RihFpsWz7DdzbD3FEQyqt5Xjx8KlrsDmvcUtiX4b9z0B0',
        ]);

        // Thêm dữ liệu chi tiết cho các bác sĩ (users 7-14)
        \App\Models\DoctorUser::where('doctorId', 7)->update([
            'bio' => 'Bác sĩ Trịnh Trần Phương Hướng là chuyên gia hàng đầu trong lĩnh vực Tim mạch can thiệp. Với hơn 15 năm kinh nghiệm, bác sĩ đã thực hiện thành công hàng ngàn ca phẫu thuật phức tạp.',
            'experience_years' => 15,
            'certification' => 'ThS. Bác sĩ Chuyên khoa II - Đại học Y Dược TPHCM',
            'date_of_birth' => '1978-05-15'
        ]);

        \App\Models\DoctorUser::where('doctorId', 8)->update([
            'bio' => 'Bác sĩ Trần Mạnh Hùng chuyên về da liễu với kinh nghiệm hơn 12 năm. Bác sĩ có chuyên môn cao trong điều trị các bệnh da phức tạp.',
            'experience_years' => 12,
            'certification' => 'Bác sĩ Chuyên khoa II - Đại học Y Dược Hà Nội',
            'date_of_birth' => '1981-08-22'
        ]);

        \App\Models\DoctorUser::where('doctorId', 9)->update([
            'bio' => 'Bác sĩ Phan Văn Tương là nhi khoa viên tại bệnh viện với 10 năm kinh nghiệm chăm sóc trẻ em.',
            'experience_years' => 10,
            'certification' => 'Bác sĩ - Đại học Y Dược Cần Thơ',
            'date_of_birth' => '1983-03-10'
        ]);

        \App\Models\DoctorUser::where('doctorId', 10)->update([
            'bio' => 'Bác sĩ Nguyễn An chuyên về sản phụ khoa với hơn 14 năm kinh nghiệm trong điều trị và chăm sóc sức khỏe phụ nữ.',
            'experience_years' => 14,
            'certification' => 'TS. Bác sĩ Chuyên khoa II - Đại học Y Dược TPHCM',
            'date_of_birth' => '1979-07-28'
        ]);

        \App\Models\DoctorUser::where('doctorId', 11)->update([
            'bio' => 'Bác sĩ Lê Bảo là chuyên gia cơ xương khớp với 11 năm kinh nghiệm. Bác sĩ đã điều trị thành công nhiều ca bệnh về cột sống phức tạp.',
            'experience_years' => 11,
            'certification' => 'Bác sĩ Chuyên khoa II - Đại học Y Dược Đà Nẵng',
            'date_of_birth' => '1982-11-05'
        ]);

        \App\Models\DoctorUser::where('doctorId', 12)->update([
            'bio' => 'Bác sĩ Trần Cường chuyên về nhãn khoa với 9 năm kinh nghiệm. Bác sĩ có năng lực cao trong phẫu thuật mắt và điều trị các bệnh về mắt.',
            'experience_years' => 9,
            'certification' => 'Bác sĩ Chuyên khoa - Trường Đại học Y Tế Công Cộng',
            'date_of_birth' => '1984-06-18'
        ]);

        \App\Models\DoctorUser::where('doctorId', 13)->update([
            'bio' => 'Bác sĩ Phạm Di là nha khoa viên tại nha khoa trung tâm với 8 năm kinh nghiệm. Bác sĩ có chuyên môn về cấy ghép implant và thẩm mỹ nha khoa.',
            'experience_years' => 8,
            'certification' => 'ThS. Bác sĩ - Đại học Nha Khoa TPHCM',
            'date_of_birth' => '1985-09-12'
        ]);

        \App\Models\DoctorUser::where('doctorId', 14)->update([
            'bio' => 'Bác sĩ Nguyễn Hạnh là chuyên gia tiêu hóa với 13 năm kinh nghiệm. Bác sĩ có chuyên môn cao trong nội soi tiêu hóa và điều trị các bệnh đường tiêu hóa.',
            'experience_years' => 13,
            'certification' => 'Bác sĩ Chuyên khoa II - Đại học Y Dược Huế',
            'date_of_birth' => '1980-02-14'
        ]);
    }
}