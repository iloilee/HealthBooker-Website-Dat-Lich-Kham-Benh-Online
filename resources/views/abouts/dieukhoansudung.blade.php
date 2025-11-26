@extends('layouts.app')
@section('content')
<div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <div class="flex flex-1 justify-center">
          <div
            class="layout-content-container flex flex-col max-w-[1280px] flex-1"
          >
            <main>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 bg-slate-50 dark:bg-slate-900"
              >
                <div class="mx-auto max-w-4xl text-center">
                  <h1
                    class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight tracking-tighter"
                  >
                    Điều Khoản Sử Dụng
                  </h1>
                  <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">
                    Vui lòng đọc kỹ các điều khoản và điều kiện trước khi sử
                    dụng dịch vụ của HealthBooker.
                  </p>
                  <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Cập nhật lần cuối: 20/07/2024
                  </p>
                </div>
              </section>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="mx-auto max-w-4xl">
                  <div
                    class="space-y-12 text-slate-700 dark:text-slate-300 prose prose-lg dark:prose-invert max-w-none prose-h2:font-bold prose-h2:text-2xl prose-h2:mb-4 prose-h2:text-slate-900 dark:prose-h2:text-white prose-p:leading-relaxed prose-ul:list-disc prose-ul:pl-6 prose-ul:space-y-2"
                  >
                    <div>
                      <h2>1. Chấp nhận Điều khoản</h2>
                      <p>
                        Bằng việc truy cập hoặc sử dụng trang web HealthBooker
                        ("Dịch vụ"), bạn đồng ý bị ràng buộc bởi các Điều khoản
                        Sử dụng này. Nếu bạn không đồng ý với bất kỳ phần nào
                        của điều khoản, bạn không được phép truy cập Dịch vụ.
                      </p>
                    </div>
                    <div>
                      <h2>2. Mô tả Dịch vụ</h2>
                      <p>
                        HealthBooker là một nền tảng trực tuyến cho phép người
                        dùng tìm kiếm thông tin về các cơ sở y tế, bác sĩ và đặt
                        lịch hẹn khám bệnh. Chúng tôi không cung cấp dịch vụ y
                        tế hay tư vấn y khoa. Mọi thông tin trên trang web chỉ
                        mang tính chất tham khảo.
                      </p>
                    </div>
                    <div>
                      <h2>3. Quyền và Trách nhiệm của Người dùng</h2>
                      <ul>
                        <li>
                          Cung cấp thông tin cá nhân chính xác, đầy đủ và cập
                          nhật khi đăng ký tài khoản và đặt lịch.
                        </li>
                        <li>
                          Chịu trách nhiệm bảo mật thông tin tài khoản và mật
                          khẩu của mình.
                        </li>
                        <li>
                          Tuân thủ lịch hẹn đã đặt hoặc thông báo hủy hẹn theo
                          quy định của cơ sở y tế.
                        </li>
                        <li>
                          Không sử dụng Dịch vụ cho bất kỳ mục đích bất hợp pháp
                          nào hoặc vi phạm quyền của người khác.
                        </li>
                        <li>
                          Không đăng tải nội dung sai lệch, lừa đảo, phỉ báng
                          hoặc xúc phạm.
                        </li>
                      </ul>
                    </div>
                    <div>
                      <h2>4. Quyền và Trách nhiệm của HealthBooker</h2>
                      <ul>
                        <li>
                          Cung cấp nền tảng công nghệ để kết nối người dùng với
                          các cơ sở y tế.
                        </li>
                        <li>
                          Nỗ lực đảm bảo thông tin về bác sĩ và cơ sở y tế là
                          chính xác, tuy nhiên không thể đảm bảo tuyệt đối.
                        </li>
                        <li>
                          Có quyền tạm ngưng hoặc chấm dứt quyền truy cập của
                          người dùng nếu phát hiện vi phạm các điều khoản này.
                        </li>
                        <li>
                          HealthBooker được miễn trừ trách nhiệm đối với chất
                          lượng dịch vụ khám chữa bệnh, chẩn đoán, và điều trị
                          tại các cơ sở y tế.
                        </li>
                        <li>
                          Không chịu trách nhiệm cho bất kỳ thiệt hại trực tiếp
                          hay gián tiếp nào phát sinh từ việc sử dụng hoặc không
                          thể sử dụng Dịch vụ.
                        </li>
                      </ul>
                    </div>
                    <div>
                      <h2>5. Đặt lịch và Hủy lịch</h2>
                      <p>
                        Người dùng có trách nhiệm tuân thủ các quy định về đặt
                        lịch và hủy lịch của từng cơ sở y tế được công bố trên
                        nền tảng. Việc hủy lịch hẹn không đúng quy định có thể
                        ảnh hưởng đến khả năng sử dụng Dịch vụ trong tương lai.
                      </p>
                    </div>
                    <div>
                      <h2>6. Sở hữu trí tuệ</h2>
                      <p>
                        Toàn bộ nội dung, thiết kế, logo và các tài sản trí tuệ
                        khác trên trang web HealthBooker thuộc quyền sở hữu của
                        chúng tôi hoặc các đối tác được cấp phép. Mọi hành vi
                        sao chép, sửa đổi, phân phối mà không có sự cho phép
                        bằng văn bản đều bị nghiêm cấm.
                      </p>
                    </div>
                    <div>
                      <h2>7. Thay đổi Điều khoản</h2>
                      <p>
                        Chúng tôi có quyền sửa đổi hoặc thay thế các Điều khoản
                        này vào bất kỳ lúc nào. Nếu có sự thay đổi quan trọng,
                        chúng tôi sẽ cố gắng cung cấp thông báo ít nhất 30 ngày
                        trước khi các điều khoản mới có hiệu lực. Việc bạn tiếp
                        tục sử dụng Dịch vụ sau khi các thay đổi có hiệu lực
                        đồng nghĩa với việc bạn chấp nhận các điều khoản mới.
                      </p>
                    </div>
                    <div>
                      <h2>8. Liên hệ</h2>
                      <p>
                        Nếu bạn có bất kỳ câu hỏi nào về các Điều khoản Sử dụng
                        này, vui lòng liên hệ với chúng tôi qua email:
                        <a
                          class="text-primary hover:underline"
                          href="mailto:support@healthbooker.com"
                          >support@healthbooker.com</a
                        >.
                      </p>
                    </div>
                  </div>
                </div>
              </section>
            </main>
          </div>
        </div>
      </div>
    </div>
@endsection