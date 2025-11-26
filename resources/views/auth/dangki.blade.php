<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Đăng ký - HealthBooker</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Manrope", sans-serif;
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
  <body
    class="bg-background-light dark:bg-background-dark font-display text-slate-800 dark:text-slate-200"
  >
    <div
      class="flex min-h-screen w-full items-center justify-center bg-slate-50 p-4 dark:bg-slate-900"
    >
      <div
        class="w-full max-w-md rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800 sm:p-8"
      >
        <div class="flex flex-col items-center">
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
              <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-50">
                HealthBooker
              </h1>
            </a>
          </div>
          <p class="mt-2 text-center text-slate-600 dark:text-slate-400">
            Tạo tài khoản để bắt đầu hành trình chăm sóc sức khỏe của bạn.
          </p>
        </div>
        <form class="mt-8 space-y-6">
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="full-name"
              >Tên đầy đủ</label
            >
            <input
              class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
              id="full-name"
              placeholder="Nguyễn Văn An"
              required=""
              type="text"
            />
          </div>
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="email"
              >Email</label
            >
            <input
              class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
              id="email"
              placeholder="email@example.com"
              required=""
              type="email"
            />
          </div>
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="password"
              >Mật khẩu</label
            >
            <input
              class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
              id="password"
              placeholder="••••••••"
              required=""
              type="password"
            />
          </div>
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="confirm-password"
              >Xác nhận mật khẩu</label
            >
            <input
              class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
              id="confirm-password"
              placeholder="••••••••"
              required=""
              type="password"
            />
          </div>
          <button
            class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary h-10 px-4 text-sm font-bold leading-normal tracking-[0.015em] text-slate-50 transition-colors hover:bg-primary/90"
            type="submit"
          >
            <span class="truncate">Đăng ký</span>
          </button>
        </form>
        <div class="relative my-6 flex items-center">
          <div
            class="flex-grow border-t border-slate-300 dark:border-slate-600"
          ></div>
          <span
            class="mx-4 flex-shrink text-sm text-slate-500 dark:text-slate-400"
            >Hoặc đăng nhập với</span
          >
          <div
            class="flex-grow border-t border-slate-300 dark:border-slate-600"
          ></div>
        </div>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
          <button
            class="flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white text-sm font-medium text-slate-800 transition-colors hover:bg-slate-100 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600"
          >
            <svg
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M22.578 12.245c0-.82-.072-1.616-.21-2.383h-9.804v4.505h5.62a4.803 4.803 0 0 1-2.084 3.15v2.923h3.758c2.199-2.025 3.465-5.044 3.465-8.195Z"
                fill="#4285F4"
              ></path>
              <path
                d="M12.564 23c3.245 0 5.952-1.078 7.936-2.915l-3.758-2.923c-1.08.72-2.457 1.15-4.178 1.15-3.208 0-5.915-2.17-6.885-5.065H1.87v3.018A11.498 11.498 0 0 0 12.564 23Z"
                fill="#34A853"
              ></path>
              <path
                d="M5.68 14.168a6.943 6.943 0 0 1 0-4.336V6.814H1.87a11.498 11.498 0 0 0 0 10.372l3.81-3.018Z"
                fill="#FBBC05"
              ></path>
              <path
                d="M12.564 5.582c1.75 0 3.355.603 4.607 1.796l3.336-3.336C18.513 2.18 15.806 1 12.564 1A11.498 11.498 0 0 0 1.87 6.814l3.81 3.018c.97-2.895 3.677-5.065 6.884-5.065Z"
                fill="#EA4335"
              ></path>
            </svg>
            <span>Google</span>
          </button>
          <button
            class="flex h-10 w-full items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white text-sm font-medium text-slate-800 transition-colors hover:bg-slate-100 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600"
          >
            <svg
              class="h-5 w-5 text-[#1877F2]"
              fill="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12Z"
              ></path>
            </svg>
            <span>Facebook</span>
          </button>
        </div>
        <p class="mt-8 text-center text-sm text-slate-600 dark:text-slate-400">
          Đã có tài khoản?
          <a
            class="font-medium text-primary hover:underline"
            href="{{ route('login') }}"
            >Đăng nhập</a
          >
        </p>
      </div>
    </div>
  </body>
</html>
