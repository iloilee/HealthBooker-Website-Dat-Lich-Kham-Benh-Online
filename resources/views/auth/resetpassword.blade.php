<!DOCTYPE html>
<html class="light" lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Trang Đặt Lại Mật Khẩu HealthBooker</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com" rel="preconnect" />
        <link
            crossorigin=""
            href="https://fonts.gstatic.com"
            rel="preconnect"
        />
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
                font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0,
                    "opsz" 24;
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
            class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
        >
            <div class="layout-container flex h-full grow flex-col">
                <div
                    class="flex flex-1 items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
                >
                    <div class="w-full max-w-md space-y-8">
                        <div>
                            <a href="{{ route('home') }}">
                                <div
                                    class="flex justify-center items-center gap-4 mb-6"
                                >
                                    <div class="size-8 text-primary">
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
                                                    <rect
                                                        fill="white"
                                                        height="48"
                                                        width="48"
                                                    ></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <h2
                                        class="text-slate-900 dark:text-slate-50 text-2xl font-bold tracking-tight"
                                    >
                                        HealthBooker
                                    </h2>
                                </div>
                            </a>
                            <h2
                                class="text-center text-3xl font-extrabold text-slate-900 dark:text-white"
                            >
                                Đặt Lại Mật Khẩu
                            </h2>
                            <p
                                class="mt-2 text-center text-sm text-slate-600 dark:text-slate-400"
                            >
                                Vui lòng nhập thông tin để tạo mật khẩu mới.
                            </p>
                        </div>
                        <form
                            method="POST"
                            action="{{ route('password.update') }}"
                            class="space-y-4"
                        >
                            @csrf
                            <input
                                type="hidden"
                                name="token"
                                value="{{ $token }}"
                            />
                            <div
                                class="rounded-md shadow-sm -space-y-px flex flex-col gap-4"
                            >
                                <div>
                                    <label
                                        class="font-medium text-sm text-slate-700 dark:text-slate-300"
                                        for="email-address"
                                        >Email</label
                                    >
                                    <div class="relative mt-1">
                                        <span
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                        >
                                            <span
                                                class="material-symbols-outlined text-slate-400"
                                                >mail</span
                                            >
                                        </span>
                                        <input
                                            autocomplete="email"
                                            class="relative block w-full appearance-none rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 pl-10 text-slate-900 dark:text-slate-50 placeholder-slate-500 dark:placeholder-slate-400 focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm"
                                            id="email-address"
                                            name="email"
                                            placeholder="email@example.com"
                                            required
                                            type="email"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="font-medium text-sm text-slate-700 dark:text-slate-300"
                                        for="new-password"
                                        >Mật khẩu mới</label
                                    >
                                    <div class="relative mt-1">
                                        <span
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                        >
                                            <span
                                                class="material-symbols-outlined text-slate-400"
                                                >lock</span
                                            >
                                        </span>
                                        <input
                                            class="relative block w-full appearance-none rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 pl-10 text-slate-900 dark:text-slate-50 placeholder-slate-500 dark:placeholder-slate-400 focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm"
                                            placeholder="Nhập mật khẩu mới"
                                            required=""
                                            id="password"
                                            type="password"
                                            name="password"
                                            required
                                            minlength="6"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="font-medium text-sm text-slate-700 dark:text-slate-300"
                                        for="confirm-password"
                                        >Xác nhận mật khẩu mới</label
                                    >
                                    <div class="relative mt-1">
                                        <span
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                        >
                                            <span
                                                class="material-symbols-outlined text-slate-400"
                                                >lock_reset</span
                                            >
                                        </span>
                                        <input
                                            class="relative block w-full appearance-none rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 pl-10 text-slate-900 dark:text-slate-50 placeholder-slate-500 dark:placeholder-slate-400 focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm"
                                            id="password_confirmation"
                                            placeholder="Nhập lại mật khẩu mới"
                                            type="password"
                                            name="password_confirmation"
                                            required
                                            minlength="6"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <button
                                    class="group relative flex w-full justify-center rounded-lg border border-transparent bg-primary py-2.5 px-4 text-sm font-bold text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:ring-offset-background-dark transition-colors"
                                    type="submit"
                                >
                                    Đặt lại mật khẩu
                                </button>
                            </div>
                            <div class="text-center">
                                <div class="text-sm">
                                    <a
                                        class="font-medium text-primary hover:text-primary/80"
                                        href="{{ route('login') }}"
                                        >Quay lại trang Đăng nhập</a
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
