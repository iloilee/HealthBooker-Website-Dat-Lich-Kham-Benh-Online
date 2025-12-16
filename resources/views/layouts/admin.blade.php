<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Trang Quản Trị - HealthBooker')</title>
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
        class="flex w-64 flex-col bg-white dark:bg-slate-850 border-r border-slate-200 dark:border-slate-800">
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
            class="{{ request()->routeIs('admin.dashboard') 
                ? 'flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20'
                : 'flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50' }}"
            href="{{ route('admin.dashboard') }}"
          >
            <span class="material-symbols-outlined !text-xl">dashboard</span>
            <span class="text-sm font-medium">Tổng quan</span>
          </a>
          <a
            class="{{ request()->routeIs('admin.manage-doctors') 
                ? 'flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20'
                : 'flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50' }}"
            href="{{ route('admin.manage-doctors') }}"
          >
            <span class="material-symbols-outlined !text-xl">stethoscope</span>
            <span class="text-sm font-medium">Quản lý Bác sĩ</span>
          </a>
          <a
            class="{{ request()->routeIs('admin.manage-patients') 
                ? 'flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20'
                : 'flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50' }}"
            href="{{ route('admin.manage-patients') }}"
          >
            <span class="material-symbols-outlined !text-xl">groups</span>
            <span class="text-sm font-medium">Quản lý Bệnh nhân</span>
          </a>
          <a
            class="{{ request()->routeIs('admin.manage-bookings') 
                ? 'flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20'
                : 'flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50' }}"
            href="{{ route('admin.manage-bookings') }}"
          >
            <span class="material-symbols-outlined !text-xl">calendar_month</span>
            <span class="text-sm font-medium">Quản lý Lịch hẹn</span>
          </a>
          <a
            class="{{ request()->routeIs('admin.manage-specializations') 
                ? 'flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20'
                : 'flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50' }}"
            href="{{ route('admin.manage-specializations') }}"
          >
            <span class="material-symbols-outlined !text-xl">category</span>
            <span class="text-sm font-medium">Quản lý Chuyên khoa</span>
          </a>
          <a
            class="{{ request()->routeIs('admin.manage-reports') 
                ? 'flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20'
                : 'flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50' }}"
            href="{{ route('admin.manage-reports') }}"
          >
            <span class="material-symbols-outlined !text-xl">bar_chart</span>
            <span class="text-sm font-medium">Báo cáo &amp; Thống kê</span>
          </a>       
        </nav>
        <div class="mt-auto p-4">
          <a
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
            href="{{ route('admin.settings') }}"
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
          class="flex h-16 items-center justify-between border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 px-6">
          <div class="flex items-center gap-4">
            <button class="lg:hidden text-slate-600 dark:text-slate-300">
              <span class="material-symbols-outlined">menu</span>
            </button>
            <h2 class="text-xl font-semibold">
                @yield('page-title', 'Tổng quan')
            </h2>
          </div>
          <div class="flex items-center gap-4">
            <button class="text-slate-600 dark:text-slate-300">
              <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="relative">
              <div id="adminMenuBtn" class="flex items-center gap-3 cursor-pointer">
                <img
                  alt="Admin avatar"
                  class="h-9 w-9 rounded-full object-cover"
                  src="{{ Auth::user()->avatar ?? asset('images/default.jpg') }}"
                />
                <div class="text-right">
                  <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                  <p class="text-xs text-primary font-semibold">Quản trị viên</p>
                </div>
                <span class="material-symbols-outlined text-slate-600 dark:text-slate-400">
                  expand_more
                </span>
              </div>

              <div
                id="adminDropdown"
                class="absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 shadow-lg rounded-lg border border-slate-200 dark:border-slate-700 hidden"
              >
                <a
                  href="{{ route('admin.settings') }}"
                  class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                >
                  Cài đặt
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
        </header>
        <main class="flex-1 overflow-y-auto p-6">
          @yield('content')
        </main>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("adminMenuBtn");
        const dropdown = document.getElementById("adminDropdown");

        if (btn) {
          btn.addEventListener("click", function () {
            dropdown.classList.toggle("hidden");
          });
        }

        document.addEventListener("click", function (event) {
          if (btn && !btn.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
          }
        });
      });
    </script>
  </body>
</html>
