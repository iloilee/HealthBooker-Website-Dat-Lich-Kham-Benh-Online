@extends('layouts.app')
@section('content')
<div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <div
          class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5"
        >
          <div class="layout-content-container flex flex-col max-w-7xl flex-1">
            <div
              class="relative w-full h-[500px] rounded-xl overflow-hidden mt-10"
            >
              <div
                id="sliderTrack"
                class="absolute inset-0 w-full h-full flex transition-transform duration-500 ease-in-out"
                style="transform: translateX(0%)"
              >
                <div
                  class="w-full h-full flex-shrink-0 bg-cover bg-center"
                  style="
                    background-image: url('https://png.pngtree.com/background/20231212/original/pngtree-young-team-or-group-of-doctors-family-teamwork-medicare-photo-picture-image_6800430.jpg');
                  "
                ></div>
                <div
                  class="w-full h-full flex-shrink-0 bg-cover bg-center"
                  style="
                    background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAEDHMUO95or1Omxa4z6J3jVrim0rf3TmZY9I_nZMBVYLxUFgNHKpnHsDG_0AgSggVLXcJ6ufNWcF9Y6FZg_Q56-KTkkN542FPmBxytOo6A5EZVm5HwMJ3JmaUkIOztGQ6vzUM_-1ToekXC7g-U8yiGjO2dpopwtSSr895xqOwHElBLJAOe2rs1P5LeLldlJf1cLVIeA5LNXaevmPgSqdhUm2hI2lq7NDHaFdmBJglef_HjDAs9B4TLZGQWCkqFpT2mytFDuYbyAV0');
                  "
                ></div>
                <div
                  class="w-full h-full flex-shrink-0 bg-cover bg-center"
                  style="
                    background-image: url('https://hn.ss.bfcplatform.vn/tckt/2020/06/20A06001.jpg');
                  "
                ></div>
                <div
                  class="w-full h-full flex-shrink-0 bg-cover bg-center"
                  style="
                    background-image: url('https://png.pngtree.com/png-clipart/20231015/original/pngtree-team-of-doctors-and-nurses-file-photo-png-image_13304628.png');
                  "
                ></div>
              </div>
              <div class="absolute inset-0 bg-black/40"></div>
              <div
                class="absolute inset-0 flex flex-col items-center justify-center p-4"
              >
                <div class="w-full max-w-4xl text-center">
                  <h1
                    class="text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]"
                  >
                    Đặt Lịch Khám Bệnh Dễ Dàng, Nhanh Chóng
                  </h1>
                  <p class="text-slate-200 mt-4 text-lg">
                    Tìm kiếm bác sĩ, chuyên khoa, hoặc triệu chứng
                  </p>
                <div class="mt-8 mx-auto flex w-full max-w-2xl items-center gap-2">
                    <div class="relative w-full">
                        <form id="searchForm" class="w-full flex items-center gap-2">
                            <div class="relative w-full flex-1">
                                <button 
                                  type="submit"
                                  class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 z-10"><span >search</span></button>
                                <input
                                    id="searchInput"
                                    name="keyword"
                                    class="w-full h-14 pl-12 pr-4 rounded-full border border-slate-300 focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-base"
                                    placeholder="Tìm kiếm bác sĩ, chuyên khoa..."
                                    type="text"
                                    autocomplete="off"
                                />
                                
                                <!-- Dropdown kết quả tìm kiếm -->
                                <div id="searchDropdown" class="absolute top-full left-0 right-0 mt-2 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 max-h-[500px] overflow-y-auto z-50 hidden">
                                    <!-- Loading state -->
                                    <div id="searchLoading" class="hidden p-6 text-center">
                                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                                        <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm">Đang tìm kiếm...</p>
                                    </div>
                                    
                                    <!-- Kết quả -->
                                    <div id="searchResultsDropdown"></div>
                                    
                                    <!-- Không có kết quả -->
                                    <div id="searchEmpty" class="hidden p-6 text-center">
                                        <span class="material-symbols-outlined text-4xl text-slate-300">search_off</span>
                                        <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm">
                                            Không tìm thấy bác sĩ phù hợp
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button
                                type="button"
                                onclick="window.location.href='{{ route('booking.index') }}';"
                                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-6 bg-primary text-slate-50 text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors"
                            >
                                <span class="truncate">Đặt lịch khám ngay</span>
                            </button>
                        </form>
                    </div>
                </div>

                </div>
              </div>
              <div
                class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2"
              >
                <button class="dot w-2.5 h-2.5 rounded-full bg-white"></button>
                <button class="dot w-2.5 h-2.5 rounded-full bg-white/50"></button>
                <button class="dot w-2.5 h-2.5 rounded-full bg-white/50"></button>
                <button class="dot w-2.5 h-2.5 rounded-full bg-white/50"></button>
              </div>
            </div>
            <div class="flex flex-col gap-10 px-4 py-10 @container mt-10">
              <div class="flex flex-col gap-4">
                <h2
                  class="text-slate-900 dark:text-slate-50 tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]"
                >
                  Tại Sao Nên Chọn Chúng Tôi?
                </h2>
                <p
                  class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal max-w-[720px]"
                >
                  Chúng tôi mang đến giải pháp đặt lịch khám bệnh tiện lợi, giúp
                  bạn tiết kiệm thời gian và chủ động chăm sóc sức khỏe.
                </p>
              </div>
              <div
                class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4 p-0"
              >
                <div
                  class="flex flex-1 gap-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-4 flex-col"
                >
                  <div class="text-primary">
                    <span class="material-symbols-outlined !text-3xl"
                      >schedule</span
                    >
                  </div>
                  <div class="flex flex-col gap-1">
                    <h3
                      class="text-slate-900 dark:text-slate-50 text-base font-bold leading-tight"
                    >
                      Tiết kiệm thời gian
                    </h3>
                    <p
                      class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal"
                    >
                      Đặt lịch hẹn nhanh chóng mọi lúc mọi nơi mà không cần chờ
                      đợi.
                    </p>
                  </div>
                </div>
                <div
                  class="flex flex-1 gap-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-4 flex-col"
                >
                  <div class="text-primary">
                    <span class="material-symbols-outlined !text-3xl"
                      >group</span
                    >
                  </div>
                  <div class="flex flex-col gap-1">
                    <h3
                      class="text-slate-900 dark:text-slate-50 text-base font-bold leading-tight"
                    >
                      Lựa chọn đa dạng
                    </h3>
                    <p
                      class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal"
                    >
                      Dễ dàng tìm kiếm và lựa chọn bác sĩ, chuyên khoa phù hợp.
                    </p>
                  </div>
                </div>
                <div
                  class="flex flex-1 gap-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-4 flex-col"
                >
                  <div class="text-primary">
                    <span class="material-symbols-outlined !text-3xl"
                      >lock</span
                    >
                  </div>
                  <div class="flex flex-col gap-1">
                    <h3
                      class="text-slate-900 dark:text-slate-50 text-base font-bold leading-tight"
                    >
                      Bảo mật thông tin
                    </h3>
                    <p
                      class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal"
                    >
                      Thông tin cá nhân và lịch sử khám bệnh của bạn được bảo
                      mật an toàn.
                    </p>
                  </div>
                </div>
                <div
                  class="flex flex-1 gap-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-4 flex-col"
                >
                  <div class="text-primary">
                    <span class="material-symbols-outlined !text-3xl"
                      >notifications_active</span
                    >
                  </div>
                  <div class="flex flex-col gap-1">
                    <h3
                      class="text-slate-900 dark:text-slate-50 text-base font-bold leading-tight"
                    >
                      Nhắc nhở lịch hẹn
                    </h3>
                    <p
                      class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal"
                    >
                      Hệ thống tự động gửi thông báo nhắc bạn về lịch hẹn sắp
                      tới.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-6 px-4 py-10">
              <div class="flex items-center justify-between">
                  <h2 class="text-slate-900 dark:text-slate-50 text-[22px] font-bold leading-tight tracking-[-0.015em] sm:text-3xl">
                      Khám Phá Các Chuyên Khoa Phổ Biến
                  </h2>
              </div>
              <div class="relative group">
                <!-- Nút điều hướng trái -->
                <button
                    id="prevBtn"
                    class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -ml-3 xl:-ml-6 z-10 h-12 w-12 items-center justify-center rounded-full border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-500 shadow-lg transition-transform hover:scale-110 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary"
                >
                    <span class="material-symbols-outlined !text-3xl">chevron_left</span>
                </button>
                
                <!-- Slider container -->
                <div
                    id="sliderContainer"
                    class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory no-scrollbar scroll-smooth"
                >
                    @php
                        // Sử dụng config hoặc fallback về array cũ
                        $iconMap = config('specialization_icons.icons', [
                            'Tim mạch' => 'cardiology',
                            'Da liễu' => 'dermatology',
                            'Nhi khoa' => 'child_care',
                            'Tiêu hóa' => 'gastroenterology',
                            'Sản phụ khoa' => 'pregnant_woman',
                            'Cơ xương khớp' => 'orthopedics',
                            'Mắt' => 'ophthalmology',
                            'Nha Khoa' => 'dentistry',
                        ]);
                        $defaultIcon = config('specialization_icons.default_icon', 'medical_services');
                    @endphp

                    @forelse($specializations as $specialization)
                    <!-- Card Chuyên Khoa: {{ $specialization->name }} -->
                    <a href="{{ route('specializations.show', $specialization->id) }}" class="flex-none w-[calc(50%-0.75rem)] sm:w-[calc(33.333%-1rem)] lg:w-[calc(25%-1.125rem)] snap-start">
                        <div class="flex flex-col items-center justify-center gap-6 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-10 text-center hover:shadow-xl transition-all hover:border-primary/50 group cursor-pointer min-h-[340px]">
                            <div class="flex h-24 w-24 items-center justify-center rounded-full bg-primary/10 text-primary group-hover:scale-110 transition-transform group-hover:bg-primary group-hover:text-white">
                                <span class="material-symbols-outlined !text-6xl">
                                    {{ $iconMap[$specialization->name] ?? $defaultIcon }}
                                </span>
                            </div>
                            <p class="text-slate-900 dark:text-slate-50 text-xl font-bold group-hover:text-primary transition-colors">
                                {{ $specialization->name }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <!-- Không có dữ liệu -->
                    <div class="flex-none w-full text-center py-10">
                        <p class="text-slate-600 dark:text-slate-400">
                            Hiện chưa có chuyên khoa nào trong hệ thống.
                        </p>
                    </div>
                    @endforelse
                </div>
                
                <!-- Nút điều hướng phải -->
                <button
                    id="nextBtn"
                    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 -mr-3 xl:-mr-6 z-10 h-12 w-12 items-center justify-center rounded-full border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-500 shadow-lg transition-transform hover:scale-110 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary"
                >
                    <span class="material-symbols-outlined !text-3xl">chevron_right</span>
                </button>
            </div>
            
          </div>
            <div class="px-4 py-10">
              <h2
                class="text-slate-900 dark:text-slate-50 text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3"
              >
                Bệnh Nhân Nói Gì Về Chúng Tôi
              </h2>
              <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-4"
              >
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6"
                >
                  <div class="flex items-center gap-4">
                    <img
                      class="w-12 h-12 rounded-full object-cover"
                      data-alt="Portrait of a smiling man"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9jP6rBPFJAyv4eUFJhOJ88Nxc8NkvmgWZlcPdl0OEYkdV6VgJzSY_cFbWS_NBC8Pkp3N7fIZHPhnxCLYEZfLb-MrfBtbgWp0pxMEuPHeFBHMVlDJp35xDRTgx6_FM2g0rYdNJLfWuym4wD_1j6d-kk9REhCdZEmpc7u0C2ZUjPC8XffFTcQWSGrYG8l5R5Lz7B_wG9BqBXK_Rq0XyM2hNTtYK0tImaC61kIZcMXg2rObspB64jGdHL34YSYKwOg-cCQJcEpltwFE"
                    />
                    <div>
                      <p class="font-bold text-slate-900 dark:text-slate-50">
                        Anh Trần Văn An
                      </p>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        Bệnh nhân
                      </p>
                    </div>
                  </div>
                  <p class="text-slate-600 dark:text-slate-300">
                    "Dịch vụ quá tuyệt vời! Tôi đã đặt được lịch khám với bác sĩ
                    chuyên khoa chỉ trong vài phút. Không còn phải xếp hàng chờ
                    đợi mệt mỏi nữa. Rất khuyến khích mọi người dùng."
                  </p>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6"
                >
                  <div class="flex items-center gap-4">
                    <img
                      class="w-12 h-12 rounded-full object-cover"
                      data-alt="Portrait of a professional woman"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDGx7XCPF5qAMBAcD9ObofOvmy4mT6sxMBiQhOBWrZMI4k-9XerMsv1A18LnPCKqiw0r8_-3KH1Xr99MVfPKoAgRlgzbvLQVy5Jh7jrfHnK-zZJyNBmTHe7DOaKPjtY0tu9BI1oM1b0ohchwyX2g56IdS7RCQivbbDWKF_HElnFy_imfshgLFDparE7xdj7kutKdoclKSuPuJBx70LXzQm_bZF4fcBS-O1yQaQA9dqAy4LmYQ2sFv3XInjfZti1g5_Pv2kogO4mqk"
                    />
                    <div>
                      <p class="font-bold text-slate-900 dark:text-slate-50">
                        Chị Lê Thị Bích
                      </p>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        Bệnh nhân
                      </p>
                    </div>
                  </div>
                  <p class="text-slate-600 dark:text-slate-300">
                    "Giao diện thân thiện và dễ sử dụng. Tôi rất ấn tượng với
                    tính năng nhắc nhở lịch hẹn, giúp tôi không bao giờ quên
                    lịch khám của mình. Cảm ơn HealthBooker!"
                  </p>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6"
                >
                  <div class="flex items-center gap-4">
                    <img
                      class="w-12 h-12 rounded-full object-cover"
                      data-alt="Portrait of a happy middle-aged man"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI852zzHGYCool7feEvRZCttYLwzvmcIRuFkihwR-ztZiPzAAqUcdK9KExfvU5sPx3kE95EgKP-p15zgsynLpNqmzaTLw8n3HMHDQaAgW7QDv0_s4sTK9MtMnUx7oZUPfzsWGZvNAArA0jail_lwmpQHmaVETEe6EB8DFuDuJAzwyRtaY-6t-k-bx2SD9Q9PGgPPHQ46C8NmL8wGIWp9ktTUAP08WtC-RihFpsWz7DdzbD3FEQyqt5Xjx8KlrsDmvcUtiX4b9z0B0"
                    />
                    <div>
                      <p class="font-bold text-slate-900 dark:text-slate-50">
                        Chú Phạm Minh Cường
                      </p>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        Bệnh nhân
                      </p>
                    </div>
                  </div>
                  <p class="text-slate-600 dark:text-slate-300">
                    "Việc tìm kiếm bác sĩ theo chuyên khoa và xem thông tin chi
                    tiết rất tiện lợi. Tôi đã tìm được bác sĩ phù hợp và hài
                    lòng với chất lượng tư vấn."
                  </p>
                </div>
              </div>
            </div>
            <div class="py-10 px-4">
              <div class="flex flex-col items-center gap-4 text-center">
                <h2
                  class="text-slate-900 dark:text-slate-50 text-[22px] font-bold leading-tight tracking-[-0.015em] sm:text-3xl"
                >
                  Tin tức y tế
                </h2>
                <p
                  class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal max-w-2xl"
                >
                  Cập nhật những thông tin, bài viết và xu hướng mới nhất trong
                  lĩnh vực y tế và chăm sóc sức khỏe.
                </p>
              </div>
              <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8"
              >
                <a
                  href="https://soytequangninh.gov.vn/ban-tin-suc-khoe-cho-moi-nguoi/7-cach-giup-trai-tim-khoe-manh.html"
                  target="_blank"
                >
                  <div class="flex flex-col gap-3 group">
                    <div class="overflow-hidden rounded-xl">
                      <img
                        alt="Medical research image"
                        class="aspect-[16/10] w-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDQCUJw56m3H-xq82BPDJ3GMfLFGCooZ2p7-CoIHnWsc7NU1wxkQw3MZX6G_PkJiJvAM2LClpsIKJfBEwtoPsHKo7k_8iPsuKpg76jjeG98DlHN0MVWnq9zxvrMLKY0DxRM9ndLPOeTbm1Ji4SzD8BW33fCDvdUS8uwZariYuXtvMtLuswGLztLKfWctEfq6gwQO_V6rtX6uKGWIJOfLT6N2_fE2xuvSUgRoe14kCZdyTMXuKAD22Ay6vtfG-yEQB_JToe32Lj3Yc"
                      />
                    </div>
                    <div class="flex flex-col gap-1">
                      <p class="text-primary text-sm font-semibold">
                        Sức khỏe đời sống
                      </p>
                      <h3
                        class="font-bold text-slate-900 dark:text-slate-50 group-hover:text-primary transition-colors"
                      >
                        7 lời khuyên để có một trái tim khỏe mạnh
                      </h3>
                      <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Chuyên gia tim mạch chia sẻ các bí quyết đơn giản nhưng
                        hiệu quả để bảo vệ sức khỏe tim mạch của bạn.
                      </p>
                    </div>
                  </div>
                </a>
                <a
                  href="https://www.pharmacity.vn/che-do-an-uong-can-bang-bi-quyet-vang-giup-co-the-khoe-manh-va-voc-dang-ly-tuong.htm"
                  target="_blank"
                >
                  <div class="flex flex-col gap-3 group">
                    <div class="overflow-hidden rounded-xl">
                      <img
                        alt="Healthy food image"
                        class="aspect-[16/10] w-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkwU4-0_27rDFiMV2iQM3yF5aDiXJr6GQcRwPitWem1OZQCpBe3WjU9sPO9a-skxmz3BJyBH-rwAMYILK2aey4fiiUPefiMBWaN6ZrXL8-l0Dj75mGsvjpotX9XvSN0sLZNt0FrGN1qAvJKPPTNamjqT5QDD74svnUihfsgotQRCj1mGxnWUNiA17R4PQTSiTlAPnSIhu-lT69WGNxbO9zvu6xgMOgogsARHeWxm_P1lKdyXJF3rHudJI0iWAbHvgvuSKxlpIdN9g"
                      />
                    </div>
                    <div class="flex flex-col gap-1">
                      <p class="text-primary text-sm font-semibold">
                        Dinh dưỡng
                      </p>
                      <h3
                        class="font-bold text-slate-900 dark:text-slate-50 group-hover:text-primary transition-colors"
                      >
                        Chế độ ăn uống cân bằng cho người bận rộn
                      </h3>
                      <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Làm thế nào để duy trì một chế độ ăn uống lành mạnh khi
                        bạn không có nhiều thời gian? Khám phá ngay.
                      </p>
                    </div>
                  </div>
                </a>
                <a
                  href="https://suckhoedoisong.vn/5-bai-tap-tho-nen-ap-dung-moi-ngay-giup-ngu-ngon-giam-stress-169240708053214444.htm"
                  target="_blank"
                >
                  <div class="flex flex-col gap-3 group">
                    <div class="overflow-hidden rounded-xl">
                      <img
                        alt="Woman meditating outdoors"
                        class="aspect-[16/10] w-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3pDA5-4UCVlO1Cwp_-THfHvDoT1uJOfgcqPxPRNPTaPO47DOYSGup-yDlywfPBI_DlIRffUj-sdb4n5M98U-p-KnjufrbU7u21qqdDyBhxH8zPm1pIh2gsDJQfGkr_VyXMdGHSJ-eb2Ve1ytu1FcyG311O3afDRc9RzcKgrUIBb25hg3dZwZojhzMAZif7IejaOkbnqAm5EqpnA7bL_eq0a5Qw5-_oGiMEEFMejdKDthzdhafofwDqySbYfMcDyQ33b6W85DI2Yk"
                      />
                    </div>
                    <div class="flex flex-col gap-1">
                      <p class="text-primary text-sm font-semibold">
                        Sức khỏe tinh thần
                      </p>
                      <h3
                        class="font-bold text-slate-900 dark:text-slate-50 group-hover:text-primary transition-colors"
                      >
                        Giảm căng thẳng và lo âu với 5 bài tập thở
                      </h3>
                      <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Các kỹ thuật thở đơn giản có thể giúp bạn bình tĩnh và
                        cải thiện sức khỏe tinh thần một cách đáng kể.
                      </p>
                    </div>
                  </div>
                </a>
                <a
                  href="https://www.ultralytics.com/vi/blog/ai-and-radiology-a-new-era-of-precision-and-efficiency"
                  target="_blank"
                >
                  <div class="flex flex-col gap-3 group">
                    <div class="overflow-hidden rounded-xl">
                      <img
                        alt="Doctor examining a patient's x-ray"
                        class="aspect-[16/10] w-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFyr0wJZ_1_I6lvtRIRACwwvdrXBQKmSelRS7HoEcCxACNBIR_VobfJcqPcPyd-FuzGwI2P-un-msEufqFySqUr5pJt8hObDZhv8YRtrkAh7j0HshtvfTKVLOVEIf4RHPTugQ9IMolhXSZL5HR8XXh0mEa9RSX5I2_5B-TYtXYRjnOU5e5OPBON_R2ZdiOwBl14TklaJr5hHG-j3vSGnTzcLig8B-K9ZqdEces2btfv_cz5yrm0iWMPQHyXdnbcaSQLRwonvQxzLc"
                      />
                    </div>
                    <div class="flex flex-col gap-1">
                      <p class="text-primary text-sm font-semibold">
                        Công nghệ y tế
                      </p>
                      <h3
                        class="font-bold text-slate-900 dark:text-slate-50 group-hover:text-primary transition-colors"
                      >
                        AI đang thay đổi ngành chẩn đoán hình ảnh như thế nào
                      </h3>
                      <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Trí tuệ nhân tạo mang lại những bước tiến vượt bậc trong
                        việc phát hiện sớm và chẩn đoán bệnh chính xác hơn.
                      </p>
                    </div>
                  </div>
                </a>
                <a
                  href="https://hcdc.vn/tam-quan-trong-cua-giac-ngu-kham-pha-suc-manh-cua-su-nghi-ngoi-8N7Uaf.html"
                  target="_blank"
                >
                  <div class="flex flex-col gap-3 group">
                    <div class="overflow-hidden rounded-xl">
                      <img
                        alt="A person sleeping peacefully"
                        class="aspect-[16/10] w-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdatFsojk6832TSaQUsLQnJmcuCpp07aAwNUoIXMlzmdn3zMi_F4Nb81kSjAZZtDUtBA4UcSqmc-J6ZN4ZRad3JLJeLdz17eoQMEy3UHvXERtiLJYMCfceiVCw2grjWTaua5lnUcHg4CfOwJatweov2-tocj-Z2uhWNI6S6c5AXUlBBdgVklVTGoEGiOYZp-UmF0NZJULMKB0msDSFfor1L7X0D51ZDg9XxGimstUGc8X9c8VpkzmjfuzwD3O96mitxuJcFlu4UtQ"
                      />
                    </div>
                    <div class="flex flex-col gap-1">
                      <p class="text-primary text-sm font-semibold">
                        Sức khỏe đời sống
                      </p>
                      <h3
                        class="font-bold text-slate-900 dark:text-slate-50 group-hover:text-primary transition-colors"
                      >
                        Tầm quan trọng của giấc ngủ đối với sức khỏe
                      </h3>
                      <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Khám phá lý do tại sao một giấc ngủ ngon lại là nền tảng
                        cho một cơ thể và tinh thần khỏe mạnh.
                      </p>
                    </div>
                  </div>
                </a>
                <a
                  href="https://nhathuoclongchau.com.vn/bai-viet/5-thoi-quen-de-thuc-hien-giup-tang-cuong-suc-de-khang-tu-nhien-55344.html"
                  target="_blank"
                >
                  <div class="flex flex-col gap-3 group">
                    <div class="overflow-hidden rounded-xl">
                      <img
                        alt="A group of people doing yoga in a park"
                        class="aspect-[16/10] w-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBEnEdXFq_s8I6aOX7ajXMWxRLkf1NstIIthBuhgsgxoS2AQ-WDRTeEGoUK6AMuSoRmmWrXn2ro0-e6GKBXVVo9XriHMIsU7kzgZT3M48z1GFd9v1q6rEAW6zOQ1kEqGwQ87KvqVg088F5BZcDJ5vDFdwCP-R26xlex0gTVmCrA5FBbLGmWr3KNa1pGqKCvGvkuZyTEqJXe7lyDEbDgarlDVJxNs_bpm7G1b_VYs4I0XcUnAwzM6mrCTbX7k1sjf7fuk8lHs2GeFA"
                      />
                    </div>
                    <div class="flex flex-col gap-1">
                      <p class="text-primary text-sm font-semibold">
                        Phòng bệnh
                      </p>
                      <h3
                        class="font-bold text-slate-900 dark:text-slate-50 group-hover:text-primary transition-colors"
                      >
                        5 thói quen đơn giản giúp tăng cường hệ miễn dịch
                      </h3>
                      <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Xây dựng một hàng rào bảo vệ vững chắc cho cơ thể bằng
                        những thay đổi nhỏ trong lối sống hàng ngày.
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="py-10 px-4">
              <div class="flex flex-col items-center gap-4 text-center mb-8">
                <h2
                  class="text-slate-900 dark:text-slate-50 text-[22px] font-bold leading-tight tracking-[-0.015em] sm:text-3xl"
                >
                  Câu Hỏi Thường Gặp (FAQ)
                </h2>
                <p
                  class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal max-w-2xl"
                >
                  Tìm câu trả lời cho các câu hỏi phổ biến nhất về dịch vụ của
                  chúng tôi.
                </p>
              </div>
              <div class="space-y-4 w-full">
                <details
                  class="group rounded-lg bg-white dark:bg-slate-800 p-4 border border-slate-200 dark:border-slate-700 cursor-pointer"
                >
                  <summary
                    class="flex items-center justify-between font-medium text-slate-900 dark:text-slate-50"
                  >
                    Làm thế nào để đặt lịch khám bệnh?
                    <span
                      class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180"
                      >expand_more</span
                    >
                  </summary>
                  <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm">
                    Bạn chỉ cần tìm kiếm bác sĩ hoặc chuyên khoa, chọn thời gian
                    phù hợp và xác nhận lịch hẹn. Toàn bộ quá trình chỉ mất vài
                    phút.
                  </p>
                </details>
                <details
                  class="group rounded-lg bg-white dark:bg-slate-800 p-4 border border-slate-200 dark:border-slate-700 cursor-pointer"
                >
                  <summary
                    class="flex items-center justify-between font-medium text-slate-900 dark:text-slate-50"
                  >
                    Dịch vụ này có tốn phí không?
                    <span
                      class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180"
                      >expand_more</span
                    >
                  </summary>
                  <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm">
                    Việc đặt lịch hẹn qua HealthBooker là hoàn toàn miễn phí.
                    Bạn chỉ thanh toán chi phí khám bệnh trực tiếp tại cơ sở y
                    tế.
                  </p>
                </details>
                <details
                  class="group rounded-lg bg-white dark:bg-slate-800 p-4 border border-slate-200 dark:border-slate-700 cursor-pointer"
                >
                  <summary
                    class="flex items-center justify-between font-medium text-slate-900 dark:text-slate-50"
                  >
                    Tôi có thể hủy hoặc thay đổi lịch hẹn không?
                    <span
                      class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180"
                      >expand_more</span
                    >
                  </summary>
                  <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm">
                    Có, bạn có thể dễ dàng hủy hoặc thay đổi lịch hẹn của mình
                    thông qua tài khoản cá nhân trên website. Chúng tôi khuyến
                    khích bạn thay đổi lịch trước 24 giờ.
                  </p>
                </details>
                <details
                  class="group rounded-lg bg-white dark:bg-slate-800 p-4 border border-slate-200 dark:border-slate-700 cursor-pointer"
                >
                  <summary
                    class="flex items-center justify-between font-medium text-slate-900 dark:text-slate-50"
                  >
                    Thông tin của tôi có được bảo mật không?
                    <span
                      class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180"
                      >expand_more</span
                    >
                  </summary>
                  <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm">
                    Tuyệt đối. Chúng tôi sử dụng các công nghệ bảo mật tiên tiến
                    nhất để đảm bảo mọi thông tin cá nhân và y tế của bạn được
                    an toàn.
                  </p>
                </details>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<script>
  document.addEventListener('DOMContentLoaded', function () {

      /* =======================
        HERO SLIDER + DOTS
      ======================= */
      const track = document.getElementById("sliderTrack");
      const dots = document.querySelectorAll(".dot");

      if (track && dots.length) {
          let current = 0;
          const total = dots.length;

          function updateSlider(index) {
              track.style.transform = `translateX(-${index * 100}%)`;

              dots.forEach((dot, i) => {
                  dot.classList.remove("bg-white");
                  dot.classList.add("bg-white/50");

                  if (i === index) {
                      dot.classList.add("bg-white");
                      dot.classList.remove("bg-white/50");
                  }
              });

              current = index;
          }

          setInterval(() => {
              updateSlider((current + 1) % total);
          }, 3000);

          dots.forEach((dot, index) => {
              dot.addEventListener("click", () => updateSlider(index));
          });
      }

      /* =======================
        SEARCH DROPDOWN
      ======================= */
      const searchInput = document.getElementById('searchInput');
      const searchDropdown = document.getElementById('searchDropdown');
      const searchLoading = document.getElementById('searchLoading');
      const searchResultsDropdown = document.getElementById('searchResultsDropdown');
      const searchEmpty = document.getElementById('searchEmpty');
      let searchTimeout;

      if (searchInput) {

          function positionDropdown() {
              const rect = searchInput.getBoundingClientRect();
              searchDropdown.style.top = rect.bottom + 8 + 'px';
              searchDropdown.style.left = rect.left + 'px';
              searchDropdown.style.width = rect.width + 'px';
          }

          function showDropdown() {
              searchDropdown.classList.remove('hidden');
          }

          function hideDropdown() {
              searchDropdown.classList.add('hidden');
              searchResultsDropdown.classList.add('hidden');
              searchEmpty.classList.add('hidden');
          }

          function showLoading() {
              searchLoading.classList.remove('hidden');
              searchResultsDropdown.classList.add('hidden');
              searchEmpty.classList.add('hidden');
          }

          function hideLoading() {
              searchLoading.classList.add('hidden');
          }

          function performSearch(keyword) {
              positionDropdown();
              showDropdown();
              showLoading();

              fetch(`{{ route("doctors.search") }}?keyword=${encodeURIComponent(keyword)}`, {
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest',
                      'Accept': 'application/json'
                  }
              })
              .then(res => res.json())
              .then(data => {
                  hideLoading();
                  if (data.success && data.count > 0) {
                      searchResultsDropdown.innerHTML = data.html;
                      searchResultsDropdown.classList.remove('hidden');
                      searchEmpty.classList.add('hidden');
                  } else {
                      searchResultsDropdown.classList.add('hidden');
                      searchEmpty.classList.remove('hidden');
                  }
              })
              .catch(() => {
                  hideLoading();
                  searchResultsDropdown.innerHTML = `
                      <div class="p-6 text-center text-red-600">
                          <span class="material-symbols-outlined text-4xl">error</span>
                          <p class="mt-2 text-sm">Có lỗi xảy ra. Vui lòng thử lại.</p>
                      </div>
                  `;
              });
          }

          searchInput.addEventListener('input', function () {
              clearTimeout(searchTimeout);
              const keyword = this.value.trim();
              if (keyword.length < 2) return hideDropdown();
              searchTimeout = setTimeout(() => performSearch(keyword), 300);
          });

          searchInput.addEventListener('focus', function () {
              if (this.value.trim().length >= 2) {
                  positionDropdown();
                  showDropdown();
              }
          });

          searchInput.addEventListener('keydown', e => {
              if (e.key === 'Escape') {
                  hideDropdown();
                  searchInput.blur();
              }
          });

          document.addEventListener('click', e => {
              if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
                  hideDropdown();
              }
          });

          window.addEventListener('scroll', () => {
              if (!searchDropdown.classList.contains('hidden')) positionDropdown();
          });

          window.addEventListener('resize', () => {
              if (!searchDropdown.classList.contains('hidden')) positionDropdown();
          });
      }

      /* =======================
        SPECIALIZATION SLIDER (TỰ ĐỘNG + PREV/NEXT)
      ======================= */
      const sliderContainer = document.getElementById('sliderContainer');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');

      if (sliderContainer && prevBtn && nextBtn) {
          let autoSlideInterval;
          const autoSlideDelay = 3000; // 3 giây tự động chuyển

          // Hàm cuộn slider
          function scrollSlider(direction) {
              const scrollAmount = 400; // Khoảng cách cuộn mỗi lần
              sliderContainer.scrollBy({
                  left: direction === 'next' ? scrollAmount : -scrollAmount,
                  behavior: 'smooth'
              });
          }

          // Hàm cập nhật trạng thái nút
          function updateButtonStates() {
              const isAtStart = sliderContainer.scrollLeft <= 10;
              const isAtEnd = sliderContainer.scrollLeft >= 
                  (sliderContainer.scrollWidth - sliderContainer.clientWidth - 10);
              
              // Cập nhật opacity cho nút prev
              prevBtn.style.opacity = isAtStart ? '0.5' : '1';
              prevBtn.style.cursor = isAtStart ? 'not-allowed' : 'pointer';
              prevBtn.disabled = isAtStart;
              
              // Cập nhật opacity cho nút next
              nextBtn.style.opacity = isAtEnd ? '0.5' : '1';
              nextBtn.style.cursor = isAtEnd ? 'not-allowed' : 'pointer';
              nextBtn.disabled = isAtEnd;
          }

          // Hàm tự động chuyển slide
          function autoSlide() {
              const isAtEnd = sliderContainer.scrollLeft >= 
                  (sliderContainer.scrollWidth - sliderContainer.clientWidth - 10);
              
              if (isAtEnd) {
                  // Nếu đến cuối, quay về đầu
                  sliderContainer.scrollTo({
                      left: 0,
                      behavior: 'smooth'
                  });
              } else {
                  // Nếu chưa đến cuối, cuộn tiếp
                  scrollSlider('next');
              }
          }

          // Bắt đầu auto slide
          function startAutoSlide() {
              stopAutoSlide();
              autoSlideInterval = setInterval(autoSlide, autoSlideDelay);
          }

          // Dừng auto slide
          function stopAutoSlide() {
              if (autoSlideInterval) {
                  clearInterval(autoSlideInterval);
              }
          }

          // Sự kiện click nút prev
          prevBtn.addEventListener('click', (e) => {
              e.preventDefault();
              if (!prevBtn.disabled) {
                  stopAutoSlide();
                  scrollSlider('prev');
                  startAutoSlide(); // Khởi động lại auto slide sau khi click
              }
          });

          // Sự kiện click nút next
          nextBtn.addEventListener('click', (e) => {
              e.preventDefault();
              if (!nextBtn.disabled) {
                  stopAutoSlide();
                  scrollSlider('next');
                  startAutoSlide(); // Khởi động lại auto slide sau khi click
              }
          });

          // Lắng nghe sự kiện scroll để cập nhật trạng thái nút
          sliderContainer.addEventListener('scroll', updateButtonStates);

          // Dừng auto slide khi hover vào slider
          sliderContainer.addEventListener('mouseenter', stopAutoSlide);
          sliderContainer.addEventListener('mouseleave', startAutoSlide);

          // Dừng auto slide khi hover vào nút
          prevBtn.addEventListener('mouseenter', stopAutoSlide);
          nextBtn.addEventListener('mouseenter', stopAutoSlide);
          prevBtn.addEventListener('mouseleave', startAutoSlide);
          nextBtn.addEventListener('mouseleave', startAutoSlide);

          // Khởi tạo trạng thái ban đầu
          updateButtonStates();
          
          // Bắt đầu auto slide
          startAutoSlide();
      }

  });
</script>

<style>
  /* Cho phép dropdown thoát ra ngoài container */
  .layout-content-container {
      overflow: visible !important;
  }

  /* Đảm bảo dropdown không bị cắt */
  #searchDropdown {
      position: fixed !important;
      left: auto !important;
      right: auto !important;
      width: auto !important;
      min-width: 25%;
      animation: slideDown 0.2s ease-out;
  }

  #searchDropdown::-webkit-scrollbar {
      width: 6px;
  }

  #searchDropdown::-webkit-scrollbar-track {
      background: transparent;
  }

  #searchDropdown::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 3px;
  }

  #searchDropdown::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
  }

  /* Animation cho dropdown */
  @keyframes slideDown {
      from {
          opacity: 0;
          transform: translateY(-10px);
      }
      to {
          opacity: 1;
          transform: translateY(0);
      }
  }

  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>
@endsection