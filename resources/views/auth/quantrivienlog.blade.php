<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>HealthBooker - Trang Quản Trị</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
      rel="stylesheet"
    />
    <style>
      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
    </style>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#137fec",
              "background-light": "#f6f7f8",
              "background-dark": "#101922",
              "slate-850": "#162231",
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
  </head>
  <body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-50"
  >
    <div class="flex h-screen w-full">
      <aside
        class="flex w-64 flex-col bg-white dark:bg-slate-850 border-r border-slate-200 dark:border-slate-800"
      >
        <div
          class="flex flex-col gap-4 h-24 border-b border-slate-200 dark:border-slate-800 px-6 justify-center"
        >
          <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" class="flex items gap-2">
              <div class="size-7 text-primary">
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
              <h1 class="text-lg font-bold">HealthBooker</h1>
            </a>
          </div>
        </div>
        <nav class="flex-1 space-y-2 p-4">
          <a
            class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl">dashboard</span>
            <span class="text-sm font-medium">Tổng quan</span>
          </a>
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl">stethoscope</span>
            <span class="text-sm font-medium">Quản lý Bác sĩ</span>
          </a>
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl">groups</span>
            <span class="text-sm font-medium">Quản lý Bệnh nhân</span>
          </a>
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl"
              >calendar_month</span
            >
            <span class="text-sm font-medium">Quản lý Lịch hẹn</span>
          </a>
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl">category</span>
            <span class="text-sm font-medium">Quản lý Chuyên khoa</span>
          </a>
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl">bar_chart</span>
            <span class="text-sm font-medium">Báo cáo &amp; Thống kê</span>
          </a>
        </nav>
        <div class="mt-auto p-4">
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="#"
          >
            <span class="material-symbols-outlined !text-xl">settings</span>
            <span class="text-sm font-medium">Cài đặt</span>
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button 
              type="submit"
              class="w-full flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 
                    dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 
                    hover:text-slate-900 dark:hover:text-slate-50 text-left"
              style="background: none; border: none;"
            >
              <span class="material-symbols-outlined !text-xl">logout</span>
              <span class="text-sm font-medium">Đăng xuất</span>
            </button>
          </form>
        </div>
      </aside>
      <div class="flex flex-1 flex-col">
        <header
          class="flex h-16 items-center justify-between border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 px-6"
        >
          <div class="flex items-center gap-4">
            <button class="lg:hidden text-slate-600 dark:text-slate-300">
              <span class="material-symbols-outlined">menu</span>
            </button>
            <h2 class="text-xl font-semibold">Tổng quan</h2>
          </div>
          <div class="flex items-center gap-4">
            <button class="text-slate-600 dark:text-slate-300">
              <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="flex items-center gap-3">
              <img
                alt="Admin avatar"
                class="h-9 w-9 rounded-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI852zzHGYCool7feEvRZCttYLwzvmcIRuFkihwR-ztZiPzAAqUcdK9KExfvU5sPx3kE95EgKP-p15zgsynLpNqmzaTLw8n3HMHDQaAgW7QDv0_s4sTK9MtMnUx7oZUPfzsWGZvNAArA0jail_lwmpQHmaVETEe6EB8DFuDuJAzwyRtaY-6t-k-bx2SD9Q9PGgPPHQ46C8NmL8wGIWp9ktTUAP08WtC-RihFpsWz7DdzbD3FEQyqt5Xjx8KlrsDmvcUtiX4b9z0B0"
              />
              <div class="text-right">
                <p class="text-sm font-medium">Admin</p>
                <p class="text-xs text-primary font-semibold">Quản trị viên</p>
              </div>
            </div>
          </div>
        </header>
        <main class="flex-1 overflow-y-auto p-6">
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-primary/20"
                >
                  <span class="material-symbols-outlined">stethoscope</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Tổng số Bác sĩ
                  </p>
                  <p class="text-2xl font-bold">125</p>
                </div>
              </div>
            </div>
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-green-500/10 text-green-500 dark:bg-green-500/20"
                >
                  <span class="material-symbols-outlined">groups</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Tổng số Bệnh nhân
                  </p>
                  <p class="text-2xl font-bold">1,830</p>
                </div>
              </div>
            </div>
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-500/10 text-amber-500 dark:bg-amber-500/20"
                >
                  <span class="material-symbols-outlined">calendar_month</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Lịch hẹn hôm nay
                  </p>
                  <p class="text-2xl font-bold">42</p>
                </div>
              </div>
            </div>
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-red-500/10 text-red-500 dark:bg-red-500/20"
                >
                  <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Lịch hẹn chờ duyệt
                  </p>
                  <p class="text-2xl font-bold">8</p>
                </div>
              </div>
            </div>
          </div>
          <div
            class="mt-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
          >
            <div class="border-b border-slate-200 dark:border-slate-800 p-4">
              <h3 class="text-lg font-semibold">Lịch hẹn gần đây</h3>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-sm">
                <thead
                  class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300"
                >
                  <tr>
                    <th class="px-4 py-3 font-medium">Bệnh nhân</th>
                    <th class="px-4 py-3 font-medium">Bác sĩ</th>
                    <th class="px-4 py-3 font-medium">Chuyên khoa</th>
                    <th class="px-4 py-3 font-medium">Ngày khám</th>
                    <th class="px-4 py-3 font-medium">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Trần Văn An</td>
                    <td class="px-4 py-3">BS. Nguyễn Thị Mai</td>
                    <td class="px-4 py-3">Tim mạch</td>
                    <td class="px-4 py-3">25/07/2024 - 09:30</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300"
                        >Đã xác nhận</span
                      >
                    </td>
                  </tr>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Lê Thị Bích</td>
                    <td class="px-4 py-3">BS. Lê Văn Hùng</td>
                    <td class="px-4 py-3">Da liễu</td>
                    <td class="px-4 py-3">25/07/2024 - 10:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-amber-100 px-2 py-1 text-xs font-medium text-amber-700 dark:bg-amber-900/50 dark:text-amber-300"
                        >Chờ xác nhận</span
                      >
                    </td>
                  </tr>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Phạm Minh Cường</td>
                    <td class="px-4 py-3">BS. Trần Anh Dũng</td>
                    <td class="px-4 py-3">Nhi khoa</td>
                    <td class="px-4 py-3">24/07/2024 - 14:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-700 dark:bg-slate-700 dark:text-slate-300"
                        >Đã hoàn thành</span
                      >
                    </td>
                  </tr>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Vũ Thị Lan</td>
                    <td class="px-4 py-3">BS. Hoàng Thu Trang</td>
                    <td class="px-4 py-3">Sản phụ khoa</td>
                    <td class="px-4 py-3">24/07/2024 - 11:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 dark:bg-red-900/50 dark:text-red-300"
                        >Đã hủy</span
                      >
                    </td>
                  </tr>
                  <tr>
                    <td class="px-4 py-3">Đặng Văn Long</td>
                    <td class="px-4 py-3">BS. Nguyễn Thị Mai</td>
                    <td class="px-4 py-3">Tim mạch</td>
                    <td class="px-4 py-3">26/07/2024 - 08:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300"
                        >Đã xác nhận</span
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
