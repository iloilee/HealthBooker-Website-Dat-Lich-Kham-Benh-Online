<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'category' => 'dat-lich',
            'question' => 'Làm thế nào để đặt lịch khám qua HealthBooker?',
            'answer' => 'Bạn có thể đặt lịch bằng cách tìm kiếm bác sĩ hoặc chuyên khoa, chọn thời gian phù hợp và xác nhận thông tin. Quá trình chỉ mất vài phút.',
        ]);

        Faq::create([
            'category' => 'dat-lich',
            'question' => 'Tôi có thể thay đổi hoặc hủy lịch hẹn không?',
            'answer' => 'Có, bạn có thể dễ dàng thay đổi hoặc hủy lịch hẹn trong phần "Quản lý lịch hẹn" trên tài khoản của mình. Vui lòng thực hiện trước 24 giờ so với thời gian khám để tránh phí hủy.',
        ]);

        Faq::create([
            'category' => 'dat-lich',
            'question' => 'Làm sao để biết lịch hẹn của tôi đã được xác nhận?',
            'answer' => 'Sau khi đặt lịch thành công, bạn sẽ nhận được email và thông báo xác nhận từ HealthBooker. Trạng thái lịch hẹn cũng sẽ được cập nhật trong tài khoản của bạn.',
        ]);

        Faq::create([
            'category' => 'thanh-toan',
            'question' => 'HealthBooker chấp nhận những hình thức thanh toán nào?',
            'answer' => 'Chúng tôi chấp nhận thanh toán qua thẻ tín dụng/ghi nợ (Visa, Mastercard), chuyển khoản ngân hàng và ví điện tử phổ biến.',
        ]);

        Faq::create([
            'category' => 'thanh-toan',
            'question' => 'Phí đặt khám trên HealthBooker là bao nhiêu?',
            'answer' => 'HealthBooker không thu phí đặt lịch của bệnh nhân. Bạn chỉ cần thanh toán chi phí khám bệnh theo bảng giá của cơ sở y tế.',
        ]);

        Faq::create([
            'category' => 'ho-so',
            'question' => 'Thông tin sức khỏe của tôi có được bảo mật không?',
            'answer' => 'Tuyệt đối. Chúng tôi tuân thủ các tiêu chuẩn bảo mật cao nhất để đảm bảo thông tin cá nhân và y tế của bạn luôn được an toàn và riêng tư.',
        ]);

        Faq::create([
            'category' => 'ho-so',
            'question' => 'Tôi quên mật khẩu, làm thế nào để lấy lại?',
            'answer' => 'Bạn có thể sử dụng chức năng "Quên mật khẩu" trên trang đăng nhập. Chúng tôi sẽ gửi một liên kết để đặt lại mật khẩu mới vào email của bạn.',
        ]);
    }
}
