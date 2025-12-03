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
        @if(isset($success))
          <div
            id="toast"
            class="fixed top-5 right-5 z-50 max-w-xs rounded-lg bg-green-500 p-4 text-white shadow-lg opacity-0 transform translate-x-10 transition-all duration-500"
          >
            <div class="flex justify-between items-center">
              <span>{{ $success }}</span>
              <button onclick="closeToast()" class="ml-2 font-bold">&times;</button>
            </div>
            <div class="mt-2 h-1 w-full bg-green-300 rounded">
              <div id="toast-progress" class="h-1 bg-white rounded w-full"></div>
            </div>
          </div>
          <script>
            const toast = document.getElementById('toast');
            const progress = document.getElementById('toast-progress');
            const duration = 3000; 
            let start;
            function animateProgress(timestamp) {
              if (!start) start = timestamp;
              const elapsed = timestamp - start;
              const percent = Math.max(0, 100 - (elapsed / duration * 100));
              progress.style.width = percent + '%';
              if (elapsed < duration) {
                requestAnimationFrame(animateProgress);
              }
            }
            function closeToast() {
              toast.classList.add('opacity-0', 'translate-x-10');
              setTimeout(() => {
                toast.remove();
              }, 500);
            }
            toast.classList.remove('opacity-0', 'translate-x-10');
            toast.classList.add('opacity-100', 'translate-x-0');
            requestAnimationFrame(animateProgress);
            setTimeout(() => {
              closeToast();
              setTimeout(() => {
                window.location.href = "{{ route('login') }}";
              }, 500);
            }, duration);
          </script>
        @endif
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register.post') }}">
          @csrf
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="full-name"
              >Tên đầy đủ</label
            >
            <input
              class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
              name ="name"
              id="full-name"
              placeholder="Họ tên của bạn"
              required pattern="^[A-Za-zÀ-ỹ\s]+$" maxlength="255"
              title="Tên chỉ chứa chữ và khoảng trắng, tối đa 255 ký tự"
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
              name="email"
              id="email"
              placeholder="email@example.com"
              required
              type="email"
            />
          </div>
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="password"
              >Mật khẩu</label
            >
            <div class="flex w-full items-stretch rounded-lg">
              <input
                class="block w-full rounded-lg rounded-r-none border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
                name="password"
                id="password"
                placeholder="••••••••"
                required minlength="6"
                type="password"
              />
              <button type="button" id="toggle-password" class="flex items-center justify-center px-3 border border-slate-300 border-l-0 rounded-r-lg bg-slate-50 dark:bg-slate-700 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 transition-colors">
                <span class="material-symbols-outlined text-slate-600 dark:text-slate-400" id="toggle-password-icon" style="font-size: 20px;">visibility_off</span>
              </button>
            </div>
          </div>
          <div>
            <label
              class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300"
              for="confirm-password"
              >Xác nhận mật khẩu</label
            >
            <div class="flex w-full items-stretch rounded-lg">
              <input
                class="block w-full rounded-lg rounded-r-none border border-slate-300 bg-slate-50 p-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder:text-slate-400 dark:focus:border-primary dark:focus:ring-primary"
                name="password_confirmation"
                id="confirm-password"
                placeholder="••••••••"
                required minlength="6"
                type="password"
              />
              <button type="button" id="toggle-confirm-password" class="flex items-center justify-center px-3 border border-slate-300 border-l-0 rounded-r-lg bg-slate-50 dark:bg-slate-700 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 transition-colors">
                <span class="material-symbols-outlined text-slate-600 dark:text-slate-400" id="toggle-confirm-password-icon" style="font-size: 20px;">visibility_off</span>
              </button>
            </div>
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
          <a href="{{ route('google.login') }}"
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
          </a>
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
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,0..200" rel="stylesheet" />
<style>
  .material-symbols-outlined {
    font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
  }
</style>
<script>
document.getElementById('toggle-password')?.addEventListener('click', function(e) {
    e.preventDefault();
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('toggle-password-icon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.textContent = 'visibility';
    } else {
        passwordInput.type = 'password';
        icon.textContent = 'visibility_off';
    }
});

document.getElementById('toggle-confirm-password')?.addEventListener('click', function(e) {
    e.preventDefault();
    const confirmInput = document.getElementById('confirm-password');
    const icon = document.getElementById('toggle-confirm-password-icon');
    if (confirmInput.type === 'password') {
        confirmInput.type = 'text';
        icon.textContent = 'visibility';
    } else {
        confirmInput.type = 'password';
        icon.textContent = 'visibility_off';
    }
});
</script>