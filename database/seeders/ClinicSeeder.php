<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicSeeder extends Seeder
{
    public function run()
    {
        DB::table('clinics')->truncate();
        DB::table('clinics')->insert([
            [
                'id' => 1, 
                'name' => 'Phòng khám Cần Thơ', 
                'address' => '123 Đường Mạc Thiên Tích, Cần Thơ', 
                'phone' => '0909123456', 
                'introductionHTML' => '<h3>Phòng khám Đa khoa Cần Thơ</h3><p>Với hơn 15 năm kinh nghiệm, chúng tôi cung cấp dịch vụ y tế chất lượng cao cho người dân khu vực Đồng bằng sông Cửu Long.</p>',
                'introductionMarkdown' => '### Phòng khám Đa khoa Cần Thơ\n\nVới hơn 15 năm kinh nghiệm, chúng tôi cung cấp dịch vụ y tế chất lượng cao cho người dân khu vực Đồng bằng sông Cửu Long.',
                'description' => 'Phòng khám đa khoa uy tín tại Cần Thơ với đội ngũ bác sĩ giàu kinh nghiệm và trang thiết bị hiện đại.',
                'image' => 'https://anviethouse.vn/wp-content/uploads/2022/12/thiet-ke-phong-kham-da-khoa-2.jpg',
                'created_at' => now(), 
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 2, 
                'name' => 'Phòng khám Vĩnh Long', 
                'address' => '456 Đường Nguyễn Huệ, Vĩnh Long', 
                'phone' => '0909876543', 
                'introductionHTML' => '<h3>Phòng khám Chuyên khoa Vĩnh Long</h3><p>Tiên phong trong chăm sóc sức khỏe toàn diện với các chuyên khoa mũi nhọn và dịch vụ tận tâm.</p>',
                'introductionMarkdown' => '### Phòng khám Chuyên khoa Vĩnh Long\n\nTiên phong trong chăm sóc sức khỏe toàn diện với các chuyên khoa mũi nhọn và dịch vụ tận tâm.',
                'description' => 'Phòng khám chuyên khoa chất lượng cao tại Vĩnh Long, tập trung vào các dịch vụ y tế chuyên sâu.',
                'image' => 'https://www.hyperbaricmedicalsolutions.com/hubfs/Blog_Art/HOSPITAL%20OUTPATIENT%20CLINICS%20VS.%20PRIVATE%20MEDICAL%20CENTERS.jpg',
                'created_at' => now(), 
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 3, 
                'name' => 'Phòng khám Đà Nẵng', 
                'address' => '789 Đường Phan Văn Trị, Đà Nẵng', 
                'phone' => '0909988776', 
                'introductionHTML' => '<h3>Phòng khám Quốc tế Đà Nẵng</h3><p>Áp dụng công nghệ tiên tiến và tiêu chuẩn quốc tế trong khám chữa bệnh, mang đến trải nghiệm y tế tốt nhất.</p>',
                'introductionMarkdown' => '### Phòng khám Quốc tế Đà Nẵng\n\nÁp dụng công nghệ tiên tiến và tiêu chuẩn quốc tế trong khám chữa bệnh, mang đến trải nghiệm y tế tốt nhất.',
                'description' => 'Phòng khám đạt tiêu chuẩn quốc tế tại Đà Nẵng với hệ thống trang thiết bị hiện đại và đội ngũ bác sĩ được đào tạo bài bản.',
                'image' => 'https://www.pcmh-mo.org/wp-content/uploads/bb-plugin/cache/Clinics-02-circle-a41183e29fbd1549b23b553df6b0daca-5f495421e082c.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 4, 
                'name' => 'Phòng khám Hồ Chí Minh', 
                'address' => '12 Nguyễn Huệ, Quận 1, TP.HCM', 
                'phone' => '0911222333', 
                'introductionHTML' => '<h3>Phòng khám Đa khoa TP.HCM</h3><p>Địa chỉ y tế tin cậy tại trung tâm thành phố với đầy đủ các chuyên khoa và dịch vụ khám chữa bệnh toàn diện.</p>',
                'introductionMarkdown' => '### Phòng khám Đa khoa TP.HCM\n\nĐịa chỉ y tế tin cậy tại trung tâm thành phố với đầy đủ các chuyên khoa và dịch vụ khám chữa bệnh toàn diện.',
                'description' => 'Phòng khám đa khoa hiện đại tại trung tâm TP.HCM, cung cấp các dịch vụ y tế chất lượng cao với đội ngũ chuyên gia đầu ngành.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/A_patient_exam_room_at_an_urgent_care_clinic_and_doctor%E2%80%99s_office_in_North_Carolina%2C_United_States_06.jpg/1200px-A_patient_exam_room_at_an_urgent_care_clinic_and_doctor%E2%80%99s_office_in_North_Carolina%2C_United_States_06.jpg',
                'created_at' => now(), 
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'id' => 5, 
                'name' => 'Phòng khám Hà Nội', 
                'address' => '88 Trần Duy Hưng, Cầu Giấy, Hà Nội', 
                'phone' => '0933444555', 
                'introductionHTML' => '<h3>Phòng khám Chuyên sâu Hà Nội</h3><p>Kết hợp giữa y học hiện đại và truyền thống, mang đến giải pháp chăm sóc sức khỏe tối ưu cho người dân thủ đô.</p>',
                'introductionMarkdown' => '### Phòng khám Chuyên sâu Hà Nội\n\nKết hợp giữa y học hiện đại và truyền thống, mang đến giải pháp chăm sóc sức khỏe tối ưu cho người dân thủ đô.',
                'description' => 'Phòng khám chuyên sâu tại Hà Nội với sự kết hợp hoàn hảo giữa y học hiện đại và y học cổ truyền, đáp ứng mọi nhu cầu chăm sóc sức khỏe.',
                'image' => 'https://hbr.org/resources/images/article_assets/2024/10/Oct24_10_2149396562_NOGLOBAL.jpg',
                'created_at' => now(), 
                'updated_at' => now(),
                'deleted_at' => null
            ],
        ]);
    }
}