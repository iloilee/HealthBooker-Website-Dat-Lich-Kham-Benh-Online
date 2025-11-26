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
                class="relative py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div
                  class="absolute inset-0 bg-primary/10 dark:bg-primary/20"
                ></div>
                <div class="relative z-10 mx-auto max-w-4xl text-center">
                  <h1
                    class="text-4xl md:text-6xl font-extrabold text-slate-900 dark:text-white leading-tight tracking-tighter"
                  >
                    Về HealthBooker
                  </h1>
                  <p
                    class="mt-6 text-lg md:text-xl text-slate-600 dark:text-slate-300"
                  >
                    Sứ mệnh của chúng tôi là cách mạng hóa trải nghiệm chăm sóc
                    sức khỏe, giúp mọi người dễ dàng kết nối với các chuyên gia
                    y tế uy tín và chủ động quản lý sức khỏe của mình.
                  </p>
                </div>
              </section>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="grid md:grid-cols-2 gap-12 items-center">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                    data-alt="A diverse group of medical professionals standing together and smiling."
                    style="
                      background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCVEq8wZaTqOSvspPT5pKn2R_x25RgxE9z2n4eByNnv8TGRWnwxfeaRqNMlboCLE7wqIXaEvhKAeyeeOAbnyZ_-n7y-oB6Y31fUw2vOFgj05_RC4PyyW3KiwrTZNvBgSfupl_BqvhK8UjKzG_nH-3BFrdgk7LpGm9y-MIcdHzrIicN8VkLfb1BjEU-bDw4t87SXmGXQ8jCf4Il_F07dh0hX_2jMprIyQbtq82tzsfciKKRDywqJ89BA-3xE3vNC7AfL_7l2mxXX64g');
                    "
                  ></div>
                  <div class="space-y-8">
                    <div>
                      <h2
                        class="text-3xl font-bold text-slate-900 dark:text-white mb-4"
                      >
                        Tầm Nhìn Của Chúng Tôi
                      </h2>
                      <p
                        class="text-slate-600 dark:text-slate-300 leading-relaxed"
                      >
                        Trở thành nền tảng chăm sóc sức khỏe kỹ thuật số hàng
                        đầu tại Việt Nam, nơi mọi người đều có thể tiếp cận dịch
                        vụ y tế chất lượng cao một cách thuận tiện và minh bạch.
                      </p>
                    </div>
                    <div>
                      <h2
                        class="text-3xl font-bold text-slate-900 dark:text-white mb-4"
                      >
                        Sứ Mệnh Của Chúng Tôi
                      </h2>
                      <p
                        class="text-slate-600 dark:text-slate-300 leading-relaxed"
                      >
                        Kết nối bệnh nhân với các bác sĩ và cơ sở y tế phù hợp
                        nhất thông qua công nghệ, đơn giản hóa quy trình đặt
                        lịch khám và nâng cao chất lượng chăm sóc sức khỏe toàn
                        diện.
                      </p>
                    </div>
                  </div>
                </div>
              </section>
              <section
                class="py-16 md:py-24 bg-slate-50 dark:bg-slate-900 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="mx-auto max-w-4xl text-center mb-12">
                  <h2
                    class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white"
                  >
                    Giá Trị Cốt Lõi
                  </h2>
                  <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">
                    Những nguyên tắc định hướng mọi hoạt động của chúng tôi.
                  </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                  <div
                    class="text-center p-6 bg-white dark:bg-slate-800 rounded-xl shadow-sm"
                  >
                    <div
                      class="flex items-center justify-center h-16 w-16 rounded-full bg-primary/10 text-primary mx-auto mb-4"
                    >
                      <span class="material-symbols-outlined !text-4xl"
                        >favorite</span
                      >
                    </div>
                    <h3
                      class="text-xl font-bold mb-2 text-slate-900 dark:text-white"
                    >
                      Tận tâm vì bệnh nhân
                    </h3>
                    <p class="text-slate-600 dark:text-slate-300">
                      Đặt lợi ích và sức khỏe của bệnh nhân lên hàng đầu trong
                      mọi quyết định.
                    </p>
                  </div>
                  <div
                    class="text-center p-6 bg-white dark:bg-slate-800 rounded-xl shadow-sm"
                  >
                    <div
                      class="flex items-center justify-center h-16 w-16 rounded-full bg-primary/10 text-primary mx-auto mb-4"
                    >
                      <span class="material-symbols-outlined !text-4xl"
                        >verified_user</span
                      >
                    </div>
                    <h3
                      class="text-xl font-bold mb-2 text-slate-900 dark:text-white"
                    >
                      Uy tín và minh bạch
                    </h3>
                    <p class="text-slate-600 dark:text-slate-300">
                      Xây dựng niềm tin bằng sự minh bạch trong thông tin và
                      chất lượng dịch vụ.
                    </p>
                  </div>
                  <div
                    class="text-center p-6 bg-white dark:bg-slate-800 rounded-xl shadow-sm"
                  >
                    <div
                      class="flex items-center justify-center h-16 w-16 rounded-full bg-primary/10 text-primary mx-auto mb-4"
                    >
                      <span class="material-symbols-outlined !text-4xl"
                        >lightbulb</span
                      >
                    </div>
                    <h3
                      class="text-xl font-bold mb-2 text-slate-900 dark:text-white"
                    >
                      Đổi mới không ngừng
                    </h3>
                    <p class="text-slate-600 dark:text-slate-300">
                      Luôn tiên phong áp dụng công nghệ để cải tiến và nâng cao
                      trải nghiệm người dùng.
                    </p>
                  </div>
                </div>
              </section>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="mx-auto max-w-4xl text-center mb-12">
                  <h2
                    class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white"
                  >
                    Hành Trình Của Chúng Tôi
                  </h2>
                  <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">
                    Từ ý tưởng đến nền tảng y tế số hàng đầu.
                  </p>
                </div>
                <div
                  class="relative border-l-2 border-primary/30 ml-6 md:ml-0 md:border-l-0 md:border-t-2 md:pt-6"
                >
                  <div class="md:grid md:grid-cols-3 md:gap-12">
                    <div class="mb-10 md:mb-0">
                      <div class="flex items-center md:flex-col md:items-start">
                        <div
                          class="flex justify-center items-center w-12 h-12 bg-primary rounded-full -ml-6 md:ml-0 md:-mt-6"
                        >
                          <span class="material-symbols-outlined text-white"
                            >flag</span
                          >
                        </div>
                        <div class="ml-4 md:ml-0 md:mt-4">
                          <h4
                            class="text-lg font-bold text-slate-900 dark:text-white"
                          >
                            2021: Khởi đầu
                          </h4>
                          <p class="mt-1 text-slate-600 dark:text-slate-300">
                            HealthBooker ra đời từ ý tưởng đơn giản hóa việc đặt
                            lịch khám bệnh.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="mb-10 md:mb-0">
                      <div
                        class="flex items-center md:flex-col md:items-center"
                      >
                        <div
                          class="flex justify-center items-center w-12 h-12 bg-primary rounded-full -ml-6 md:ml-0 md:-mt-6"
                        >
                          <span class="material-symbols-outlined text-white"
                            >rocket_launch</span
                          >
                        </div>
                        <div class="ml-4 md:ml-0 md:mt-4 md:text-center">
                          <h4
                            class="text-lg font-bold text-slate-900 dark:text-white"
                          >
                            2022: Ra mắt phiên bản đầu tiên
                          </h4>
                          <p class="mt-1 text-slate-600 dark:text-slate-300">
                            Chính thức ra mắt nền tảng với hơn 100 bác sĩ đối
                            tác.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="mb-10 md:mb-0">
                      <div class="flex items-center md:flex-col md:items-end">
                        <div
                          class="flex justify-center items-center w-12 h-12 bg-primary rounded-full -ml-6 md:ml-0 md:-mt-6"
                        >
                          <span class="material-symbols-outlined text-white"
                            >emoji_events</span
                          >
                        </div>
                        <div class="ml-4 md:ml-0 md:mt-4 md:text-right">
                          <h4
                            class="text-lg font-bold text-slate-900 dark:text-white"
                          >
                            2024: Cán mốc 1 triệu lượt đặt
                          </h4>
                          <p class="mt-1 text-slate-600 dark:text-slate-300">
                            Trở thành một trong những nền tảng được tin dùng
                            nhất Việt Nam.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section
                class="py-16 md:py-24 bg-slate-50 dark:bg-slate-900 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="mx-auto max-w-4xl text-center mb-12">
                  <h2
                    class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white"
                  >
                    Đội Ngũ Lãnh Đạo
                  </h2>
                  <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">
                    Những con người tâm huyết đứng sau thành công của
                    HealthBooker.
                  </p>
                </div>
                <div
                  class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                  <div class="text-center">
                    <img
                      class="w-40 h-40 rounded-full mx-auto mb-4 object-cover"
                      data-alt="Portrait of a male CEO"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuCd0FW_gOIdK7DCSwUp7NpOOuMqF_g2LiK2Iw4ItgepJcDsxI7rbJcmaSTP_y0tZhlxH_u7NCiJUg1LpuE5w6e_bREKsYemCVvoMuMdTYu31qTHhoivLBWfaqXQVoDHlOMNNtMpE6jT8GR3Vp4fgMhF65iI94Y-U7GpnYoxdQH0sdJpdc485ggtyQFwvtE7Ho75ZpyES9d-F2UIj7sUb6-N5gJcc8TG-_mkWJnx3qmV5CKiDzswNqNin87ux06mo1n3zpGb8XTLy7g"
                    />
                    <h4
                      class="text-xl font-bold text-slate-900 dark:text-white"
                    >
                      Nguyễn Văn An
                    </h4>
                    <p class="text-primary">Giám đốc Điều hành (CEO)</p>
                  </div>
                  <div class="text-center">
                    <img
                      class="w-40 h-40 rounded-full mx-auto mb-4 object-cover"
                      data-alt="Portrait of a female CTO"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGDg6SJ-BFHs3MQMY4MzUMemrdYxuZHNfSMjy-ZUxoOEKt6P-plFIG3crJ1uHtMWG0SyzAwGtxj7ri94iFTn53cyJ8oJ67hd0rpLY_NzGnhxwLXSSYHzLW3gYp6bmAIgB4YPFGuqrU3ILqifq5uvafe6Q0WOw7qJB5RRkgIUWPUtJvc4AGl4B-W4IElE59MFua0pzXtUbGfHgrDDbYy37gJNByBik3sSwGikaFOWRlXukU7p2KKNJAB0_-U5812cxo1KDu_sXVQK4"
                    />
                    <h4
                      class="text-xl font-bold text-slate-900 dark:text-white"
                    >
                      Trần Thị Bích
                    </h4>
                    <p class="text-primary">Giám đốc Công nghệ (CTO)</p>
                  </div>
                  <div class="text-center">
                    <img
                      class="w-40 h-40 rounded-full mx-auto mb-4 object-cover"
                      data-alt="Portrait of a male CPO"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuByaBX-BOURiKoyLplzgM736XMJviuhDO7p2V3tDtUGYevZ36A_BdfwcaO6mF49JlUc6BFuNEbFY7zVbcPgGt-LjBEF7DyZ7YLKLKLXtACJQVrtoMlmThqVIHU3Kq7N4L2fGtwZR07WUvSTHooFb6eQOs9EPY76-wI331_fdinMFN-LsLldcnJrKinM53H-6o6WwxE-jkOmSWm0UaP8oKpqFbB3ucYd9iqGkBqQKQ6nxjeqpmBYe3aR05QAt5FOfnxZ-V7fmoJHIu8"
                    />
                    <h4
                      class="text-xl font-bold text-slate-900 dark:text-white"
                    >
                      Lê Minh Cường
                    </h4>
                    <p class="text-primary">Giám đốc Sản phẩm (CPO)</p>
                  </div>
                </div>
              </section>
            </main>
        
          </div>
        </div>
    </div>
@endsection