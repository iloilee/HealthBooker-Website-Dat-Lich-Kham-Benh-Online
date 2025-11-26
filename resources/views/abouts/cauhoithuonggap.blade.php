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
              <section class="relative py-16 md:py-24 px-4 sm:px-8">
                <div
                  class="absolute inset-0 bg-primary/10 dark:bg-primary/20"
                ></div>
                <div class="relative z-10 mx-auto max-w-4xl text-center">
                  <h1
                    class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight tracking-tighter"
                  >
                    Câu Hỏi Thường Gặp
                  </h1>
                  <p
                    class="mt-4 text-lg md:text-xl text-slate-600 dark:text-slate-300"
                  >
                    Tìm câu trả lời cho các câu hỏi phổ biến nhất về
                    HealthBooker.
                  </p>
                  <div class="mt-8 mx-auto max-w-lg">
                    <div class="relative">
                      <input
                        class="w-full h-14 pl-12 pr-4 rounded-full border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                        placeholder="Tìm kiếm câu hỏi..."
                        type="search"
                      />
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 dark:text-slate-400"
                      >
                        <span class="material-symbols-outlined">search</span>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="grid lg:grid-cols-3 gap-12">
                  <aside class="lg:col-span-1">
                    <h2
                      class="text-2xl font-bold text-slate-900 dark:text-white mb-6"
                    >
                      Chủ đề
                    </h2>
                    <ul class="space-y-2">
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-300 font-semibold"
                          href="#dat-lich"
                          >Đặt lịch &amp; Quản lý hẹn</a
                        >
                      </li>
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 font-medium"
                          href="#thanh-toan"
                          >Thanh toán &amp; Chi phí</a
                        >
                      </li>
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 font-medium"
                          href="#ho-so"
                          >Hồ sơ &amp; Tài khoản</a
                        >
                      </li>
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 font-medium"
                          href="#dich-vu"
                          >Dịch vụ &amp; Chuyên khoa</a
                        >
                      </li>
                    </ul>
                  </aside>
                  <div class="lg:col-span-2 space-y-12">
                    <div id="dat-lich">
                      <h3
                        class="text-3xl font-bold text-slate-900 dark:text-white mb-6"
                      >
                        Đặt lịch &amp; Quản lý hẹn
                      </h3>
                      <div class="space-y-4">
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            Làm thế nào để đặt lịch khám qua HealthBooker?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            Bạn có thể đặt lịch bằng cách tìm kiếm bác sĩ hoặc
                            chuyên khoa, chọn thời gian phù hợp và xác nhận
                            thông tin. Quá trình chỉ mất vài phút.
                          </div>
                        </details>
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            Tôi có thể thay đổi hoặc hủy lịch hẹn không?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            Có, bạn có thể dễ dàng thay đổi hoặc hủy lịch hẹn
                            trong phần "Quản lý lịch hẹn" trên tài khoản của
                            mình. Vui lòng thực hiện trước 24 giờ so với thời
                            gian khám để tránh phí hủy.
                          </div>
                        </details>
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            Làm sao để biết lịch hẹn của tôi đã được xác nhận?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            Sau khi đặt lịch thành công, bạn sẽ nhận được email
                            và thông báo xác nhận từ HealthBooker. Trạng thái
                            lịch hẹn cũng sẽ được cập nhật trong tài khoản của
                            bạn.
                          </div>
                        </details>
                      </div>
                    </div>
                    <div id="thanh-toan">
                      <h3
                        class="text-3xl font-bold text-slate-900 dark:text-white mb-6"
                      >
                        Thanh toán &amp; Chi phí
                      </h3>
                      <div class="space-y-4">
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            HealthBooker chấp nhận những hình thức thanh toán
                            nào?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            Chúng tôi chấp nhận thanh toán qua thẻ tín dụng/ghi
                            nợ (Visa, Mastercard), chuyển khoản ngân hàng và ví
                            điện tử phổ biến.
                          </div>
                        </details>
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            Phí đặt khám trên HealthBooker là bao nhiêu?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            HealthBooker không thu phí đặt lịch của bệnh nhân.
                            Bạn chỉ cần thanh toán chi phí khám bệnh theo bảng
                            giá của cơ sở y tế.
                          </div>
                        </details>
                      </div>
                    </div>
                    <div id="ho-so">
                      <h3
                        class="text-3xl font-bold text-slate-900 dark:text-white mb-6"
                      >
                        Hồ sơ &amp; Tài khoản
                      </h3>
                      <div class="space-y-4">
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            Thông tin sức khỏe của tôi có được bảo mật không?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            Tuyệt đối. Chúng tôi tuân thủ các tiêu chuẩn bảo mật
                            cao nhất để đảm bảo thông tin cá nhân và y tế của
                            bạn luôn được an toàn và riêng tư.
                          </div>
                        </details>
                        <details
                          class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300"
                        >
                          <summary
                            class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white"
                          >
                            Tôi quên mật khẩu, làm thế nào để lấy lại?
                            <span
                              class="material-symbols-outlined rotate-icon transition-transform duration-300"
                              >expand_more</span
                            >
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            Bạn có thể sử dụng chức năng "Quên mật khẩu" trên
                            trang đăng nhập. Chúng tôi sẽ gửi một liên kết để
                            đặt lại mật khẩu mới vào email của bạn.
                          </div>
                        </details>
                      </div>
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