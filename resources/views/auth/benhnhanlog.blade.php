<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Trang tổng quan - HealthBooker</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,0..200"
      rel="stylesheet"
    />
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#137fec",
              "background-light": "#f6f7f8",
              "background-dark": "#101922",
              "card-light": "#ffffff",
              "card-dark": "#1a2530",
              "text-primary-light": "#0d141b",
              "text-primary-dark": "#ffffff",
              "text-secondary-light": "#4c739a",
              "text-secondary-dark": "#a0b3c6",
              "border-light": "#e5e7eb",
              "border-dark": "#374151",
            },
            fontFamily: {
              display: ["Manrope", "sans-serif"],
            },
            borderRadius: {
              DEFAULT: "0.25rem",
              lg: "0.5rem",
              xl: "0.75rem",
              full: "9999px",
            },
          },
        },
      };
    </script>
    <style>
      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
      .material-symbols-outlined.filled {
        font-variation-settings: "FILL" 1, "wght" 400, "GRAD" 0, "opsz" 24;
      }
    </style>
  </head>
  <body
    class="font-display bg-background-light dark:bg-background-dark text-text-primary-light dark:text-text-primary-dark"
  >
    <div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="flex flex-col grow">
        <header
          class="sticky top-0 z-10 bg-card-light dark:bg-card-dark shadow-sm"
        >
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
              <a class="flex items-center gap-2 text-primary dark:text-white" href="{{ route('home') }}">
                <div class="size-6 text-primary">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_6_330)">
                            <path clip-rule="evenodd" d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z" fill="currentColor" fill-rule="evenodd"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_6_330">
                                <rect fill="white" height="48" width="48"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-[#0d141b] dark:text-gray-100">HealthBooker</span>
                <div class="hidden lg:flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                    <a 
                        class="{{ request()->routeIs('home') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('home') }}"
                    >
                        Trang chủ
                    </a>
                    <!-- NÚT ĐẶT LỊCH KHÁM  -->
                    @php
                        $showAppointmentBtn = false;
                        if (Auth::check() && Auth::user()->roleId == 3) { // PATIENT
                            $showAppointmentBtn = true;
                        }
                    @endphp
                    
                    @if($showAppointmentBtn)
                        <a 
                            class="{{ request()->routeIs('booking.index') 
                                ? 'text-primary text-sm font-bold leading-normal' 
                                : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                            href="{{ route('booking.index') }}"
                        >
                            Đặt lịch khám
                        </a>
                        <a 
                            class="{{ request()->routeIs('hososuckhoe') 
                                ? 'text-primary text-sm font-bold leading-normal' 
                                : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                            href="{{ route('hososuckhoe') }}"
                        >
                            Hồ sơ sức khỏe
                        </a>
                    @endif
                </div>
              </a>
              
              <div class="flex items-center gap-4">
                <button
                  class="flex items-center justify-center size-10 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800"
                >
                  <span class="material-symbols-outlined">notifications</span>
                </button>
                <div class="relative">
                  <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer">
                      <img src="{{ $doctor->user->avatar ?? asset('images/default.jpg') }}" class="w-12 h-12 rounded-full">
                      <div class="text-sm">
                          <p class="font-bold text-slate-900 dark:text-slate-50">Tên bệnh nhân</p>
                          <p class="text-slate-500 dark:text-slate-400">Role</p>
                      </div>

                      <span class="material-symbols-outlined text-slate-600 dark:text-slate-400">
                          expand_more
                      </span>
                  </div>
                  <div
                      id="doctorDropdown"
                      class="absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 shadow-lg rounded-lg border border-slate-200 dark:border-slate-700 hidden"
                  >
                      <a
                          href="{{ route('hososuckhoe') }}"
                          class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                      >
                          Hồ sơ sức khỏe
                      </a>
                      <a
                          href="{{ route('password.change') }}"
                          class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                      >
                          Đổi mật khẩu
                      </a>

                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button
                              type="submit"
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30"
                          >
                              Đăng xuất
                          </button>
                      </form>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </header>
        <main class="flex-grow">
          <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
              <h1 class="text-3xl font-bold tracking-tight">
                Chào mừng trở lại, An!
              </h1>
              <p
                class="text-text-secondary-light dark:text-text-secondary-dark mt-1"
              >
                Đây là trang tổng quan sức khỏe của bạn.
              </p>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
              <div class="lg:col-span-2 flex flex-col gap-6">
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h2 class="text-xl font-semibold mb-4">Cuộc hẹn sắp tới</h2>
                  <div
                    class="divide-y divide-border-light dark:divide-border-dark"
                  >
                    <div
                      class="py-4 flex flex-col sm:flex-row sm:items-center gap-4"
                    >
                      <div class="flex items-center gap-4 flex-shrink-0">
                        <div
                          class="flex flex-col items-center justify-center h-16 w-16 bg-primary/10 dark:bg-primary/20 text-primary rounded-lg"
                        >
                          <span class="text-xs uppercase font-bold">Thg 7</span>
                          <span class="text-2xl font-bold">25</span>
                        </div>
                        <img
                          alt="Bác sĩ Nguyễn Văn Bình"
                          class="h-16 w-16 rounded-full object-cover"
                          src="https://lh3.googleusercontent.com/aida-public/AB6AXuBo2HxiimlMKVFo_HX9MKqA5PvEpvk88TrKePuVgP-XFI9fz3snRKr6kXupGvQj48H0gw2ZnHohTAAkIixI7vHdmvJZ3veDpm_crSLIkMQ2cx4ywozT7A9Sc-pwRjKOWdTj7RO92neOM80-7bvCZRrMDgMj6BeYc4gNPMU8vP6igzolhM7dYZ9UsaPKeWJBB44Fvs2lAcYnhDpy3PGEqlMhNwudJ5AVzIZQpcbrYIUy-Vx4iSoX1548PZtyHkqPDkB1kKRHsPkxdqA"
                        />
                      </div>
                      <div class="flex-grow">
                        <p class="font-semibold">Khám tổng quát</p>
                        <p
                          class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                        >
                          Với BS. Nguyễn Văn Bình
                        </p>
                        <p
                          class="text-sm text-text-secondary-light dark:text-text-secondary-dark flex items-center gap-1 mt-1"
                        >
                          <span class="material-symbols-outlined text-base"
                            >schedule</span
                          >
                          09:30 - Thứ Năm
                        </p>
                      </div>
                      <div
                        class="flex-shrink-0 flex sm:flex-col items-center gap-2"
                      >
                        <button
                          class="w-full sm:w-auto text-sm font-semibold text-primary hover:underline"
                        >
                          Chi tiết
                        </button>
                        <button
                          class="w-full sm:w-auto text-sm font-semibold text-red-500 hover:underline"
                        >
                          Hủy lịch
                        </button>
                      </div>
                    </div>
                    <div
                      class="py-4 flex flex-col sm:flex-row sm:items-center gap-4"
                    >
                      <div class="flex items-center gap-4 flex-shrink-0">
                        <div
                          class="flex flex-col items-center justify-center h-16 w-16 bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark rounded-lg"
                        >
                          <span class="text-xs uppercase font-bold">Thg 8</span>
                          <span class="text-2xl font-bold">12</span>
                        </div>
                        <img
                          alt="Bác sĩ Lê Thị Hoa"
                          class="h-16 w-16 rounded-full object-cover"
                          src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5QCaz5iqyaBtZ6P0ZfXK8VG0f-NG3NtModVrEBkc8aUYitnjvtvpcHxzHewyhk6_S3TH5HcZ5zkVCg_ulMGgjWDke5W7-VvzZ-3T6KwhQ7d4YJogoKRP3P2mniePfhv4jn9Rtv7TUzuIvS8swUZLBJtsP3En2TUA4P9XzbwqmCw2Yr2T4W6wHOzt_vtjDE4wkpv6PtJ9PLLPDuxYzRkPUglaGKGe8k027iv6WnLjclhkEjf0sINGUIIu5DO0Gl7GpUJjsTqBm3fU"
                        />
                      </div>
                      <div class="flex-grow">
                        <p class="font-semibold">Tái khám nha khoa</p>
                        <p
                          class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                        >
                          Với BS. Lê Thị Hoa
                        </p>
                        <p
                          class="text-sm text-text-secondary-light dark:text-text-secondary-dark flex items-center gap-1 mt-1"
                        >
                          <span class="material-symbols-outlined text-base"
                            >schedule</span
                          >
                          14:00 - Thứ Hai
                        </p>
                      </div>
                      <div
                        class="flex-shrink-0 flex sm:flex-col items-center gap-2"
                      >
                        <button
                          class="w-full sm:w-auto text-sm font-semibold text-primary hover:underline"
                        >
                          Chi tiết
                        </button>
                        <button
                          class="w-full sm:w-auto text-sm font-semibold text-red-500 hover:underline"
                        >
                          Hủy lịch
                        </button>
                      </div>
                    </div>
                  </div>
                  <a
                    class="mt-4 block text-center text-primary font-semibold hover:underline"
                    href="#"
                    >Xem tất cả cuộc hẹn</a
                  >
                </div>
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h2 class="text-xl font-semibold mb-4">Lịch sử khám bệnh</h2>
                  <div class="flow-root">
                    <ul class="-mb-8" role="list">
                      <li>
                        <div class="relative pb-8">
                          <span
                            aria-hidden="true"
                            class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-border-light dark:bg-border-dark"
                          ></span>
                          <div class="relative flex space-x-3">
                            <div>
                              <span
                                class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-card-light dark:ring-card-dark"
                              >
                                <span
                                  class="material-symbols-outlined text-white text-base"
                                  >check</span
                                >
                              </span>
                            </div>
                            <div
                              class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5"
                            >
                              <div>
                                <p
                                  class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                                >
                                  Khám da liễu với
                                  <a
                                    class="font-medium text-text-primary-light dark:text-text-primary-dark"
                                    href="#"
                                    >BS. Phạm Thị Mai</a
                                  >
                                </p>
                              </div>
                              <div
                                class="text-right text-sm whitespace-nowrap text-text-secondary-light dark:text-text-secondary-dark"
                              >
                                <time datetime="2023-06-15">15/06/2023</time>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="relative pb-8">
                          <div class="relative flex space-x-3">
                            <div>
                              <span
                                class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-card-light dark:ring-card-dark"
                              >
                                <span
                                  class="material-symbols-outlined text-white text-base"
                                  >check</span
                                >
                              </span>
                            </div>
                            <div
                              class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5"
                            >
                              <div>
                                <p
                                  class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                                >
                                  Khám nội tổng quát với
                                  <a
                                    class="font-medium text-text-primary-light dark:text-text-primary-dark"
                                    href="#"
                                    >BS. Nguyễn Văn Bình</a
                                  >
                                </p>
                              </div>
                              <div
                                class="text-right text-sm whitespace-nowrap text-text-secondary-light dark:text-text-secondary-dark"
                              >
                                <time datetime="2023-04-20">20/04/2023</time>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <a
                    class="mt-4 block text-center text-primary font-semibold hover:underline"
                    href="#"
                    >Xem toàn bộ lịch sử</a
                  >
                </div>
              </div>
              <div class="flex flex-col gap-6">
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h3 class="text-lg font-semibold">Hồ sơ của bạn</h3>
                  <div class="mt-4 flex items-center gap-4">
                    <img
                      alt="Avatar"
                      class="h-16 w-16 rounded-full"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuQy6CLo273eW0EMWP1HV4C1Tyi472oBoiRNLJ8Bn1M0Q4u0pIjPSmRlSxTERnV4kEQ4DSwee-1byE4OKT-tSmMcfzn8jnYijj4wIOsoLQilsQU4lTGNXUZLoBUP6JItdryo3FI4kvRF8AaP0_CNZzT06DNbFRRIF2BLjucbUTqtJpwRew61tsS7Rhn96SJc1nRBt3NkXEeH5d-ZfhQ2TqC4_h6sWsWg8GAr8JfaTSYaAV6xdpm_KIKneDubNpAkmGhF0ySnhJxfE"
                    />
                    <div>
                      <p class="font-bold">Trần Văn An</p>
                      <p
                        class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                      >
                        ID: BN123456
                      </p>
                    </div>
                  </div>
                  <button
                    class="mt-4 w-full flex items-center justify-center gap-2 rounded-lg border border-border-light dark:border-border-dark py-2.5 px-4 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                  >
                    <span class="material-symbols-outlined text-base"
                      >edit</span
                    >
                    Chỉnh sửa hồ sơ
                  </button>
                </div>
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h3 class="text-lg font-semibold">Truy cập nhanh</h3>
                  <div class="mt-4 space-y-3">
                    <a
                      class="flex items-center gap-3 p-3 rounded-lg hover:bg-background-light dark:hover:bg-background-dark transition-colors"
                      href="#"
                    >
                      <span class="material-symbols-outlined text-primary"
                        >add_circle</span
                      >
                      <span class="font-semibold">Đặt lịch hẹn mới</span>
                    </a>
                    <a
                      class="flex items-center gap-3 p-3 rounded-lg hover:bg-background-light dark:hover:bg-background-dark transition-colors"
                      href="#"
                    >
                      <span class="material-symbols-outlined text-primary"
                        >search</span
                      >
                      <span class="font-semibold">Tìm kiếm bác sĩ</span>
                    </a>
                    <a
                      class="flex items-center gap-3 p-3 rounded-lg hover:bg-background-light dark:hover:bg-background-dark transition-colors"
                      href="#"
                    >
                      <span class="material-symbols-outlined text-primary"
                        >description</span
                      >
                      <span class="font-semibold">Xem kết quả xét nghiệm</span>
                    </a>
                  </div>
                </div>
                <div
                  class="bg-blue-50 dark:bg-blue-900/50 p-6 rounded-xl border border-blue-200 dark:border-blue-800"
                >
                  <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                      <span
                        class="material-symbols-outlined text-blue-600 dark:text-blue-400"
                        >campaign</span
                      >
                    </div>
                    <div>
                      <h3
                        class="font-semibold text-blue-800 dark:text-blue-300"
                      >
                        Thông báo quan trọng
                      </h3>
                      <p
                        class="mt-1 text-sm text-blue-700 dark:text-blue-300/80"
                      >
                        Đừng quên lịch tiêm phòng cúm mùa này. Hãy đặt lịch ngay
                        để bảo vệ sức khỏe!
                      </p>
                      <a
                        class="mt-2 inline-block text-sm font-bold text-blue-600 dark:text-blue-400 hover:underline"
                        href="#"
                        >Tìm hiểu thêm</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("doctorMenuBtn");
            const dropdown = document.getElementById("doctorDropdown");

            btn.addEventListener("click", function () {
                dropdown.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                if (!btn.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        });
      </script>
  </body>
</html>
