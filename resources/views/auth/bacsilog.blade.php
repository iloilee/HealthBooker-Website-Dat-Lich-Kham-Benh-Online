<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Bảng Điều Khiển Bác Sĩ - HealthBooker</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
              success: "#22c55e",
              warning: "#f59e0b",
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
    </style>
  </head>
  <body class="font-display bg-background-light dark:bg-background-dark">
    <div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <header
          class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-4 sm:px-6 lg:px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-50"
        >
          <div
            class="flex items-center gap-4 text-slate-900 dark:text-slate-50"
          >
            <div class="size-6 text-primary">
              <a href="{{ route('home') }}">
                <svg
                  fill="none"
                  viewBox="0 0 48 48"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_6_330)">
                    <path
                      clip-rule="evenodd"
                      d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z"
                      fill="currentColor"
                      fill-rule="evenodd"
                    ></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_6_330">
                      <rect fill="white" height="48" width="48"></rect>
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">
                HealthBooker
              </h2>
              </a>
            <div class="hidden md:flex ml-8">
              <div class="flex items-center gap-6">
                <a
                  class="text-primary text-sm font-bold leading-normal"
                  href="{{ route('bacsilog') }}"
                  >Tổng quan</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="#"
                  >Lịch hẹn</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="#"
                  >Bệnh nhân</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="#"
                  >Tin nhắn</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="{{ route('doctor_profile') }}"
                  >Hồ sơ Bác sĩ</a
                >
              </div>
            </div>
          </div>
          <div class="hidden md:flex flex-1 justify-end items-center gap-4">
            <button
              class="flex items-center justify-center size-10 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800"
            >
              <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="relative">
              <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer">
                  <img src="{{ $doctor->user->avatar ?? asset('images/default.jpg') }}" class="w-12 h-12 rounded-full">
                  <div class="text-sm">
                      <p class="font-bold text-slate-900 dark:text-slate-50">{{ $doctor->user->name }}</p>
                      <p class="text-slate-500 dark:text-slate-400">{{ $doctor->specialization->name }}</p>
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
                      href="{{ route('doctor_profile') }}"
                      class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                  >
                      Hồ sơ cá nhân
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
          <button
            class="md:hidden flex items-center justify-center size-10 rounded-lg text-slate-900 dark:text-slate-50 hover:bg-slate-100 dark:hover:bg-slate-800"
          >
            <span class="material-symbols-outlined">menu</span>
          </button>
        </header>
        <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <div
            class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8"
          >
            <div class="flex flex-col gap-1">
              <p
                class="text-slate-900 dark:text-slate-50 text-3xl font-bold leading-tight tracking-[-0.033em]"
              >
                Chào mừng trở lại, Bác sĩ {{ $doctor->user->name }}!
              </p>
              <p
                class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal"
              >
                Đây là bảng điều khiển của bạn hôm nay.
              </p>
            </div>
            <div class="flex items-center gap-2">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-200 dark:hover:bg-slate-700 gap-2"
              >
                <span class="material-symbols-outlined !text-xl"
                  >manage_history</span
                >
                <span class="truncate">Quản lý lịch</span>
              </button>
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 gap-2"
              >
                <span class="material-symbols-outlined !text-xl">add</span>
                <span class="truncate">Tạo lịch hẹn mới</span>
              </button>
            </div>
          </div>
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
              <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800"
              >
                <div class="flex items-center justify-between mb-6">
                  <h2
                    class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]"
                  >
                    Lịch hẹn sắp tới
                  </h2>
                  <a
                    class="text-primary text-sm font-bold leading-normal hover:underline"
                    href="#"
                    >Xem tất cả</a
                  >
                </div>
                <div class="space-y-4">
                  <div
                    class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-lg bg-slate-50 dark:bg-slate-800/50"
                  >
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                      <div
                        class="flex flex-col items-center justify-center size-14 rounded-lg bg-primary/10 text-primary"
                      >
                        <span class="text-sm font-medium">10:00</span>
                        <span class="text-xs">Sáng</span>
                      </div>
                      <img
                        class="size-12 rounded-full"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCkxmitPoFXpxvpuWGI_2HrlehwV-XKyJwlg73pQd1PVaQyg2r_G7zRxRCSOH1Cto51sKaQZmzRrp5y98OczTir5jkczGvLbtqF-XC1FtN5N8tJoS_tv9P6AtrXayMcfScy-5aW8R_g4AtylnmXXTrfpN7l3Ujq_USIa-pzxrwrD5c6WT1vnRBc5eqv0vyzOXB33UEATrQLpfCRVaoRF4gtErR8-Z1sGZ2AaZlk5Ng7dQQAXAYXVAVjyh0FBL16-aayJhaP4qXM3g"
                      />
                    </div>
                    <div class="flex-1">
                      <p class="font-bold text-slate-800 dark:text-slate-200">
                        Trần Văn An
                      </p>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        Khám tổng quát định kỳ
                      </p>
                    </div>
                    <div
                      class="flex items-center gap-2 self-end sm:self-center"
                    >
                      <button
                        class="flex items-center justify-center size-9 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700"
                      >
                        <span class="material-symbols-outlined !text-xl"
                          >folder_open</span
                        >
                      </button>
                      <button
                        class="flex items-center justify-center size-9 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700"
                      >
                        <span class="material-symbols-outlined !text-xl"
                          >chat</span
                        >
                      </button>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-lg bg-slate-50 dark:bg-slate-800/50"
                  >
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                      <div
                        class="flex flex-col items-center justify-center size-14 rounded-lg bg-primary/10 text-primary"
                      >
                        <span class="text-sm font-medium">10:30</span>
                        <span class="text-xs">Sáng</span>
                      </div>
                      <img
                        class="size-12 rounded-full"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxG8kDoyOsIWW_WsUvmBBhFwIYeN16GUhNmmC_bs_Xs849DyAzucnbcl71RSUzfqSxrv1SRpYwDqR7XQkUYe4CXRH7sIeS9Ne2d8nWTy8w44JKpEBWMZp93QjR5PTzJC5PowettSvcu3r9Jyn98ikpMyWs53i-h-Z3G6ZWQ7jTdmHq2YLyUXlXpD6KSB3Bs4babsDG22y_KHR_UlRQja2sZQqh5ZoI33-hU_27OrQ_6ixf3pogslgUnS6di1sdsQsZ5UVN4LpTDrM"
                      />
                    </div>
                    <div class="flex-1">
                      <p class="font-bold text-slate-800 dark:text-slate-200">
                        Nguyễn Thị Bình
                      </p>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        Tái khám sau điều trị
                      </p>
                    </div>
                    <div
                      class="flex items-center gap-2 self-end sm:self-center"
                    >
                      <button
                        class="flex items-center justify-center size-9 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700"
                      >
                        <span class="material-symbols-outlined !text-xl"
                          >folder_open</span
                        >
                      </button>
                      <button
                        class="flex items-center justify-center size-9 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700"
                      >
                        <span class="material-symbols-outlined !text-xl"
                          >chat</span
                        >
                      </button>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-lg bg-slate-50 dark:bg-slate-800/50"
                  >
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                      <div
                        class="flex flex-col items-center justify-center size-14 rounded-lg bg-primary/10 text-primary"
                      >
                        <span class="text-sm font-medium">11:00</span>
                        <span class="text-xs">Sáng</span>
                      </div>
                      <img
                        class="size-12 rounded-full"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-QEyBDZrmus74JVlFs3a-TWeDyaEbM7kKe41dpnzgSs61iNamcvmHsZtZ5FVQP0gDI3WHUPOssIcSXqfmT8Z20OOvExzBK4KDlEukBxD1oGQ_bXmFky21Uz6aGjILDc6Apc5M5iIk5uhKRR01f4ndVpIi7maNVe2ndOQrXjUmFr0LZv13dSoIiAGFTGvlXTk_Zzqr3I50rUqNnwAXpkyidGJg2i8gRSc-9ifVMSIr9TMuKb-GaR6b85dfeNC_lriNh60_GyQ8siE"
                      />
                    </div>
                    <div class="flex-1">
                      <p class="font-bold text-slate-800 dark:text-slate-200">
                        Lê Minh Châu
                      </p>
                      <p class="text-sm text-slate-500 dark:text-slate-400">
                        Tư vấn sức khỏe
                      </p>
                    </div>
                    <div
                      class="flex items-center gap-2 self-end sm:self-center"
                    >
                      <button
                        class="flex items-center justify-center size-9 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700"
                      >
                        <span class="material-symbols-outlined !text-xl"
                          >folder_open</span
                        >
                      </button>
                      <button
                        class="flex items-center justify-center size-9 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700"
                      >
                        <span class="material-symbols-outlined !text-xl"
                          >chat</span
                        >
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="lg:col-span-1 space-y-8">
              <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800"
              >
                <h3
                  class="text-slate-900 dark:text-slate-50 text-lg font-bold leading-tight tracking-[-0.015em] mb-4"
                >
                  Trạng thái làm việc
                </h3>
                <div
                  class="flex items-center justify-between p-3 bg-green-50 dark:bg-green-500/10 rounded-lg"
                >
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-success"
                      >task_alt</span
                    >
                    <span class="font-medium text-green-800 dark:text-green-300"
                      >Đang nhận lịch</span
                    >
                  </div>
                  <label
                    class="relative inline-flex items-center cursor-pointer"
                  >
                    <input
                      checked=""
                      class="sr-only peer"
                      type="checkbox"
                      value=""
                    />
                    <div
                      class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary/80 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-primary"
                    ></div>
                  </label>
                </div>
              </div>
              <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800"
              >
                <h3
                  class="text-slate-900 dark:text-slate-50 text-lg font-bold leading-tight tracking-[-0.015em] mb-4"
                >
                  Thông báo quan trọng
                </h3>
                <ul class="space-y-3">
                  <li class="flex items-start gap-3">
                    <div
                      class="flex-shrink-0 size-8 flex items-center justify-center rounded-full bg-warning/10 text-warning mt-1"
                    >
                      <span class="material-symbols-outlined !text-xl"
                        >calendar_month</span
                      >
                    </div>
                    <div>
                      <p class="text-sm text-slate-800 dark:text-slate-200">
                        Yêu cầu hủy lịch từ bệnh nhân
                        <span class="font-bold">Phạm Gia Huy</span> cho lịch hẹn
                        14:00 ngày mai.
                      </p>
                      <a
                        class="text-xs text-primary font-bold hover:underline"
                        href="#"
                        >Xem chi tiết</a
                      >
                    </div>
                  </li>
                  <li class="flex items-start gap-3">
                    <div
                      class="flex-shrink-0 size-8 flex items-center justify-center rounded-full bg-primary/10 text-primary mt-1"
                    >
                      <span class="material-symbols-outlined !text-xl"
                        >reviews</span
                      >
                    </div>
                    <div>
                      <p class="text-sm text-slate-800 dark:text-slate-200">
                        Bạn có một đánh giá mới từ bệnh nhân
                        <span class="font-bold">Vũ Ngọc Anh</span>.
                      </p>
                      <a
                        class="text-xs text-primary font-bold hover:underline"
                        href="#"
                        >Xem đánh giá</a
                      >
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div
            class="mt-8 bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800"
          >
            <div
              class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6"
            >
              <h2
                class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]"
              >
                Lịch làm việc
              </h2>
              <div
                class="flex items-center gap-1 p-1 rounded-lg bg-slate-100 dark:bg-slate-800"
              >
                <button
                  class="px-3 py-1.5 text-sm font-semibold rounded-md text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700"
                >
                  Ngày
                </button>
                <button
                  class="px-3 py-1.5 text-sm font-semibold rounded-md bg-white dark:bg-slate-700 text-primary shadow-sm"
                >
                  Tuần
                </button>
                <button
                  class="px-3 py-1.5 text-sm font-semibold rounded-md text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700"
                >
                  Tháng
                </button>
              </div>
            </div>
            <div class="flex items-center justify-between mb-4">
              <button
                class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400"
              >
                <span class="material-symbols-outlined">chevron_left</span>
              </button>
              <p
                class="text-base font-semibold text-slate-800 dark:text-slate-200"
              >
                Tuần 18 - 24 Tháng 12, 2023
              </p>
              <button
                class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400"
              >
                <span class="material-symbols-outlined">chevron_right</span>
              </button>
            </div>
            <div
              class="grid grid-cols-1 sm:grid-cols-7 border-t border-l border-slate-200 dark:border-slate-700"
            >
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T2</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">18</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T3</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">19</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-primary/10 dark:bg-primary/20"
              >
                <p class="text-xs text-primary dark:text-primary/80">HÔM NAY</p>
                <p class="font-bold text-primary">20</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T5</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">21</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T6</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">22</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T7</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">23</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">CN</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">24</p>
              </div>
              <div
                class="h-64 sm:h-96 col-span-1 sm:col-span-7 border-r border-b border-slate-200 dark:border-slate-700 p-2 flex items-center justify-center text-slate-400 dark:text-slate-500"
              >
                <p>Lịch trình chi tiết hiển thị ở đây</p>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>

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
