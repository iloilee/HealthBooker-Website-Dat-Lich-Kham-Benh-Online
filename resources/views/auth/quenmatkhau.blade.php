<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>HealthBooker - Quên Mật Khẩu</title>
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
  <body class="bg-background-light dark:bg-background-dark font-display">
    <div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <div
          class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center items-center py-5"
        >
          <div
            class="layout-content-container flex flex-col max-w-[400px] flex-1"
          >
            <div
              class="flex flex-col items-center justify-center gap-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 p-6 md:p-8"
            >
              <div class="flex flex-col items-center gap-4 text-center">
                <div class="flex items-center gap-3">
                  <div class="size-8 text-primary">
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
                    <h1
                      class="text-slate-900 dark:text-slate-50 text-2xl font-bold"
                    >
                      HealthBooker
                    </h1>
                  </a>
                </div>
                <div class="flex flex-col gap-2">
                  <h2
                    class="text-slate-800 dark:text-slate-200 text-lg font-semibold tracking-[-0.015em]"
                  >
                    Quên mật khẩu?
                  </h2>
                  <p
                    class="text-slate-600 dark:text-slate-400 text-sm font-normal leading-normal"
                  >
                    Đừng lo lắng! Nhập email của bạn dưới đây và chúng tôi sẽ
                    gửi cho bạn một liên kết để đặt lại mật khẩu.
                  </p>
                </div>
              </div>
              <form method="POST" action="{{ route('password.email') }}" class="flex w-full flex-col gap-4">
                @csrf
                <div class="flex w-full flex-col gap-4">
                  <div class="flex flex-col gap-1.5">
                    <label
                      class="text-slate-700 dark:text-slate-300 text-sm font-medium leading-normal"
                      for="email"
                      >Email</label
                    >
                    <input
                      class="flex w-full min-w-[120px] rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2 text-sm text-slate-900 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                      id="email"
                      placeholder="Nhập email của bạn"
                      type="email"
                      name="email"
                      required
                    />
                  </div>
                  <button
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 w-full bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors"
                  >
                    <span class="truncate">Gửi</span>
                  </button>
                </div>
              </form>
              <a
                class="flex items-center gap-2 text-slate-600 dark:text-slate-400 hover:text-primary dark:hover:text-primary text-sm font-medium"
                href="{{ route('login') }}"
              >
                <span class="material-symbols-outlined !text-base"
                  >arrow_back</span
                >
                <span>Quay lại trang đăng nhập</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  @if (session('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow">
        {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
      <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow">
          {{ $errors->first() }}
      </div>
  @endif

</html>
