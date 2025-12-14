@extends('layouts.app')
@section('content')
<div
  class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
>
  <div class="layout-container flex h-full grow flex-col">
    <div
      class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5"
    >
      <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        <main class="w-full py-10 md:py-16">
          <div class="flex flex-col gap-10 px-4">
            <div class="text-center">
              <h1
                class="text-slate-900 dark:text-slate-50 text-4xl font-black leading-tight tracking-[-0.033em] md:text-5xl"
              >
                Liên Hệ Với Chúng Tôi
              </h1>
              <p
                class="mt-3 text-slate-600 dark:text-slate-400 text-base md:text-lg max-w-2xl mx-auto"
              >
                Chúng tôi luôn sẵn sàng lắng nghe bạn. Vui lòng điền vào biểu
                mẫu bên dưới hoặc sử dụng thông tin liên hệ trực tiếp.
              </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
              <div
                class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
              >
                <h2
                  class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-6"
                >
                  Gửi Tin Nhắn
                </h2>
                <form class="space-y-6">
                  <div>
                    <label
                      class="text-sm font-medium text-slate-700 dark:text-slate-300"
                      for="name"
                      >Họ và Tên</label
                    >
                    <input
                      class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                      id="name"
                      placeholder="Nguyễn Văn A"
                      type="text"
                    />
                  </div>
                  <div>
                    <label
                      class="text-sm font-medium text-slate-700 dark:text-slate-300"
                      for="email"
                      >Email</label
                    >
                    <input
                      class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                      id="email"
                      placeholder="email@example.com"
                      type="email"
                    />
                  </div>
                  <div>
                    <label
                      class="text-sm font-medium text-slate-700 dark:text-slate-300"
                      for="message"
                      >Tin nhắn của bạn</label
                    >
                    <textarea
                      class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                      id="message"
                      placeholder="Nội dung tin nhắn..."
                      rows="5"
                    ></textarea>
                  </div>
                  <button
                    class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-slate-50 text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors"
                    type="submit"
                  >
                    <span class="truncate">Gửi đi</span>
                  </button>
                </form>
              </div>
              <div class="space-y-8">
                <div
                  class="flex items-start gap-4 p-6 bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
                >
                  <div
                    class="flex-shrink-0 size-12 bg-primary/10 text-primary rounded-full flex items-center justify-center"
                  >
                    <span class="material-symbols-outlined">location_on</span>
                  </div>
                  <div>
                    <h3
                      class="text-lg font-bold text-slate-900 dark:text-slate-50"
                    >
                      Địa chỉ văn phòng
                    </h3>
                    <a href="https://maps.google.com/?q=Phường+8,+Thành+phố+Vĩnh+Long" target="_blank">
                      <p class="text-slate-600 dark:text-slate-400 mt-1">
                        123 Đường ABC, Phường 8, Thành phố Vĩnh Long, tỉnh Vĩnh
                        Long
                      </p>
                    </a>
                  </div>
                </div>
                <div
                  class="flex items-start gap-4 p-6 bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
                >
                  <div
                    class="flex-shrink-0 size-12 bg-primary/10 text-primary rounded-full flex items-center justify-center"
                  >
                    <span class="material-symbols-outlined">mail</span>
                  </div>
                  <div>
                    <h3
                      class="text-lg font-bold text-slate-900 dark:text-slate-50"
                    >
                      Email
                    </h3>
                    <a href="mailto:contact@healthbooker.com">
                      <p class="text-slate-600 dark:text-slate-400 mt-1">
                        contact@healthbooker.com
                      </p>
                    </a>
                  </div>
                </div>
                <div
                  class="flex items-start gap-4 p-6 bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
                >
                  <div
                    class="flex-shrink-0 size-12 bg-primary/10 text-primary rounded-full flex items-center justify-center"
                  >
                    <span class="material-symbols-outlined">call</span>
                  </div>
                  <div>
                    <h3
                      class="text-lg font-bold text-slate-900 dark:text-slate-50"
                    >
                      Điện thoại
                    </h3>
                    <a href="tel:02838123456">
                      <p class="text-slate-600 dark:text-slate-400 mt-1">
                        (028) 3812 3456
                      </p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-12">
              <h2
                class="text-3xl font-bold text-slate-900 dark:text-slate-50 text-center mb-6"
              >
                Vị Trí Của Chúng Tôi
              </h2>

              <div
                class="w-full h-96 bg-slate-200 dark:bg-slate-700 rounded-xl overflow-hidden"
              >
                <iframe
                  width="100%"
                  height="100%"
                  style="border: 0"
                  loading="lazy"
                  allowfullscreen
                  referrerpolicy="no-referrer-when-downgrade"
                  src="https://www.google.com/maps?q=Phường+8,+Thành+phố+Vĩnh+Long&output=embed"
                ></iframe>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection