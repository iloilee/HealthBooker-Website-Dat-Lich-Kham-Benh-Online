<!DOCTYPE html>
<html class="light" lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Trang Đổi Mật Khẩu HealthBooker</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-800 dark:text-slate-200">
<div class="flex min-h-screen w-full items-center justify-center bg-slate-50 p-4 dark:bg-slate-900">
<div class="w-full max-w-md rounded-xl bg-white p-6 shadow-lg dark:bg-slate-800 sm:p-8">
<div class="mb-6 flex flex-col items-center text-center">
<div class="mb-4 flex items-center gap-3">
<div class="size-8 text-primary">
<a href="{{ route('home') }}" class="flex items-center gap-2">
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
    <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50">HealthBooker</h2>
    </div>
</a>
<h1 class="text-2xl font-bold text-slate-900 dark:text-slate-50">Đổi Mật Khẩu</h1>
<p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Cập nhật mật khẩu của bạn để bảo vệ tài khoản.</p>
</div>
<form class="space-y-6" action="{{ route('password.update.auth') }}" method="POST">
    @csrf
<div>
<label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300" for="current-password">
                        Mật khẩu hiện tại
                    </label>
<div class="relative">
<span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
<span class="material-symbols-outlined text-slate-400">lock</span>
</span>
<input class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 pl-10 text-slate-900 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary dark:focus:ring-primary sm:text-sm" id="current_password" name="current_password" placeholder="••••••••" required="" type="password"/>
</div>
</div>
<div>
<label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300" for="new-password">
                        Mật khẩu mới
                    </label>
<div class="relative">
<span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
<span class="material-symbols-outlined text-slate-400">key</span>
</span>
<input class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 pl-10 text-slate-900 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary dark:focus:ring-primary sm:text-sm" id="new_password" name="new_password" placeholder="••••••••" required="" type="password"/>
</div>
</div>
<div>
<label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300" for="confirm-password">
                        Xác nhận mật khẩu mới
                    </label>
<div class="relative">
<span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
<span class="material-symbols-outlined text-slate-400">key</span>
</span>
<input class="block w-full rounded-lg border border-slate-300 bg-slate-50 p-2.5 pl-10 text-slate-900 focus:border-primary focus:ring-primary dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-primary dark:focus:ring-primary sm:text-sm" id="new_password_confirmation" name="new_password_confirmation" placeholder="••••••••" required="" type="password"/>
</div>
</div>
<div class="flex flex-col gap-4 pt-2">
<button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary px-4 py-2.5 text-sm font-bold text-slate-50 transition-colors hover:bg-primary/90" type="submit">
<span class="truncate">Lưu thay đổi</span>
</button>
<a class="w-full rounded-lg px-4 py-2.5 text-center text-sm font-medium text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700" href="{{ url()->previous() }}">Quay lại</a>
</div>
</form>
</div>
</div>
<!-- Toast thông báo -->
{{-- @if(session('success'))
<div id="toast" class="fixed bottom-4 right-4 z-50 rounded-lg bg-green-600 px-4 py-3 text-white shadow-lg">
    {{ session('success') }}
</div>
<script>
    setTimeout(() => {
        document.getElementById('toast').remove();
        window.location.href = "{{ url()->previous() }}";
    }, 3000);
</script>
@endif --}}

@if(session('success'))
    <div
        id="toast"
        class="fixed top-5 right-5 z-[999] max-w-xs rounded-lg bg-green-500 p-4 text-white shadow-lg opacity-0 transform translate-x-10 transition-all duration-500"
    >
        <div class="flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="closeToast()" class="ml-2 font-bold text-white">&times;</button>
        </div>
        <div class="mt-2 h-1 w-full bg-green-300 rounded">
            <div id="toast-progress" class="h-1 bg-white rounded w-full"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toast = document.getElementById('toast');
            const progress = document.getElementById('toast-progress');
            const duration = 3000;
            let start = null;
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-10');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 100);
            function animateProgress(timestamp) {
                if (!start) start = timestamp;
                const elapsed = timestamp - start;
                const percent = Math.max(0, 100 - (elapsed / duration * 100));
                progress.style.width = percent + '%';

                if (elapsed < duration) {
                    requestAnimationFrame(animateProgress);
                }
            }
            requestAnimationFrame(animateProgress);
            setTimeout(() => {
                closeToast();
                setTimeout(() => {
                    window.location.href = "{{ route('home') }}";
                }, 500);
            }, duration);
            window.closeToast = function () {
                toast.classList.add('opacity-0', 'translate-x-10');
                setTimeout(() => toast.remove(), 500);
            }
        });
    </script>
@endif

@if($errors->any())
    <div
        id="toast-error"
        class="fixed top-5 right-5 z-[999] max-w-xs rounded-lg bg-red-500 p-4 text-white shadow-lg opacity-0 transform translate-x-10 transition-all duration-500"
    >
        <div class="flex justify-between items-center">
            <span>{{ $errors->first() }}</span>
            <button onclick="closeToastError()" class="ml-2 font-bold text-white">&times;</button>
        </div>
        <div class="mt-2 h-1 w-full bg-red-300 rounded">
            <div id="toast-error-progress" class="h-1 bg-white rounded w-full"></div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toast = document.getElementById('toast-error');
            const progress = document.getElementById('toast-error-progress');
            const duration = 3000;
            let start = null;

            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-10');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 100);

            function animateProgress(timestamp) {
                if (!start) start = timestamp;
                const elapsed = timestamp - start;
                const percent = Math.max(0, 100 - (elapsed / duration * 100));
                progress.style.width = percent + '%';
                if (elapsed < duration) {
                    requestAnimationFrame(animateProgress);
                }
            }
            requestAnimationFrame(animateProgress);

            setTimeout(() => {
                closeToastError();
            }, duration);

            window.closeToastError = function () {
                toast.classList.add('opacity-0', 'translate-x-10');
                setTimeout(() => toast.remove(), 500);
            }
        });
    </script>
@endif

</body></html>