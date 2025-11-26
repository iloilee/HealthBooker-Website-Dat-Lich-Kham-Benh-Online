<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Đặt Lịch Thành Công - HealthBooker</title>
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
          </div>
          <div class="hidden md:flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="#"
                >Trang chủ</a
              >
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="#"
                >Đặt lịch khám</a
              >
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="#"
                >Bác sĩ</a
              >
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="#"
                >Hồ sơ sức khỏe</a
              >
            </div>
            <div class="flex gap-2">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90"
              >
                <span class="truncate">Đăng nhập</span>
              </button>
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-300 dark:hover:bg-slate-600"
              >
                <span class="truncate">Đăng ký</span>
              </button>
            </div>
          </div>
          <button
            class="md:hidden flex items-center justify-center size-10 rounded-lg text-slate-900 dark:text-slate-50 hover:bg-slate-100 dark:hover:bg-slate-800"
          >
            <span class="material-symbols-outlined">menu</span>
          </button>
        </header>
        <main
          class="flex-1 w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16"
        >
          <div
            class="bg-white dark:bg-background-dark p-6 sm:p-8 rounded-xl border border-slate-200 dark:border-slate-800 flex flex-col items-center text-center"
          >
            <div
              class="mb-4 flex size-16 items-center justify-center rounded-full bg-success/10 text-success"
            >
              <span
                class="material-symbols-outlined !text-4xl"
                style="font-variation-settings: 'FILL' 1"
                >check_circle</span
              >
            </div>
            <h1
              class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-slate-50 mb-2"
            >
              Đặt lịch khám thành công!
            </h1>
            <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-md">
              Cảm ơn bạn đã tin tưởng HealthBooker. Thông tin chi tiết về cuộc
              hẹn đã được gửi đến email của bạn.
            </p>
            <div
              class="w-full max-w-md bg-slate-50 dark:bg-slate-800/50 p-6 rounded-lg border border-slate-200 dark:border-slate-800 text-left space-y-4 mb-8"
            >
              <h2
                class="text-lg font-bold text-slate-900 dark:text-slate-50 text-center mb-4"
              >
                Tóm tắt lịch hẹn
              </h2>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >person</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Bác sĩ
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    ThS.BS Trần Minh Khôi
                  </p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >medical_services</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Chuyên khoa
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    Da liễu
                  </p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >calendar_month</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Thời gian
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    09:00 - Chủ Nhật, 03/12/2023
                  </p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >location_on</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Địa điểm
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    Phòng khám Da liễu, Quận 1, TP.HCM
                  </p>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 sm:gap-4 w-full">
              <button
                class="flex-1 sm:flex-none flex min-w-[160px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90"
              >
                <span class="material-symbols-outlined !text-xl mr-2"
                  >event</span
                >
                <span class="truncate">Thêm vào lịch</span>
              </button>
              <button
                class="flex-1 sm:flex-none flex min-w-[160px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-200 dark:hover:bg-slate-700"
              >
                <span class="material-symbols-outlined !text-xl mr-2"
                  >home</span
                >
                <span class="truncate">Về trang chủ</span>
              </button>
            </div>
            <a
              class="mt-6 text-primary text-sm font-semibold hover:underline"
              href="#"
              >Quản lý tất cả lịch hẹn</a
            >
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
