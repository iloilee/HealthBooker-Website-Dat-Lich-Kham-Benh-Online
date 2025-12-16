<!DOCTYPE html>
<html class="light" lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>HealthBooker - Báo cáo &amp; Thống kê</title>
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
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
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
                                        <rect
                                            fill="white"
                                            height="48"
                                            width="48"
                                        ></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h1 class="text-lg font-bold">HealthBooker</h1>
                    </div>
                </div>
                <nav class="flex-1 space-y-2 p-4">
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >dashboard</span
                        >
                        <span class="text-sm font-medium">Tổng quan</span>
                    </a>
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >stethoscope</span
                        >
                        <span class="text-sm font-medium">Quản lý Bác sĩ</span>
                    </a>
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >groups</span
                        >
                        <span class="text-sm font-medium"
                            >Quản lý Bệnh nhân</span
                        >
                    </a>
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >calendar_month</span
                        >
                        <span class="text-sm font-medium"
                            >Quản lý Lịch hẹn</span
                        >
                    </a>
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >category</span
                        >
                        <span class="text-sm font-medium"
                            >Quản lý Chuyên khoa</span
                        >
                    </a>
                    <a
                        class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >bar_chart</span
                        >
                        <span class="text-sm font-medium"
                            >Báo cáo &amp; Thống kê</span
                        >
                    </a>
                </nav>
                <div class="mt-auto p-4">
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >settings</span
                        >
                        <span class="text-sm font-medium">Cài đặt</span>
                    </a>
                    <a
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
                        href="#"
                    >
                        <span class="material-symbols-outlined !text-xl"
                            >logout</span
                        >
                        <span class="text-sm font-medium">Đăng xuất</span>
                    </a>
                </div>
            </aside>
            <div class="flex flex-1 flex-col">
                <header
                    class="flex h-16 items-center justify-between border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 px-6"
                >
                    <div class="flex items-center gap-4">
                        <button
                            class="lg:hidden text-slate-600 dark:text-slate-300"
                        >
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                        <h2 class="text-xl font-semibold">
                            Báo cáo &amp; Thống kê
                        </h2>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="text-slate-600 dark:text-slate-300">
                            <span class="material-symbols-outlined"
                                >notifications</span
                            >
                        </button>
                        <div class="flex items-center gap-3">
                            <img
                                alt="Admin avatar"
                                class="h-9 w-9 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI852zzHGYCool7feEvRZCttYLwzvmcIRuFkihwR-ztZiPzAAqUcdK9KExfvU5sPx3kE95EgKP-p15zgsynLpNqmzaTLw8n3HMHDQaAgW7QDv0_s4sTK9MtMnUx7oZUPfzsWGZvNAArA0jail_lwmpQHmaVETEe6EB8DFuDuJAzwyRtaY-6t-k-bx2SD9Q9PGgPPHQ46C8NmL8wGIWp9ktTUAP08WtC-RihFpsWz7DdzbD3FEQyqt5Xjx8KlrsDmvcUtiX4b9z0B0"
                            />
                            <div class="text-right">
                                <p class="text-sm font-medium">Admin</p>
                                <p class="text-xs text-primary font-semibold">
                                    Quản trị viên
                                </p>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="flex-1 overflow-y-auto p-6">
                    <div
                        class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
                    >
                        <div class="flex items-center gap-3">
                            <span
                                class="text-sm font-medium text-slate-600 dark:text-slate-400"
                                >Thời gian:</span
                            >
                            <div class="relative">
                                <select
                                    class="rounded-lg border-slate-200 py-2 pl-3 pr-10 text-sm font-medium focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200"
                                >
                                    <option>Hôm nay</option>
                                    <option>Tuần này</option>
                                    <option selected="">Tháng này</option>
                                    <option>Năm nay</option>
                                    <option>Tùy chỉnh</option>
                                </select>
                            </div>
                        </div>
                        <button
                            class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary/90 transition-colors"
                        >
                            <span class="material-symbols-outlined !text-xl"
                                >download</span
                            >
                            Xuất báo cáo
                        </button>
                    </div>
                    <div
                        class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4"
                    >
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm"
                        >
                            <div class="flex justify-between items-start">
                                <div>
                                    <p
                                        class="text-sm font-medium text-slate-500 dark:text-slate-400"
                                    >
                                        Tổng cuộc hẹn
                                    </p>
                                    <h3
                                        class="mt-1 text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        1,245
                                    </h3>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400"
                                >
                                    <span class="material-symbols-outlined"
                                        >event_note</span
                                    >
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-green-600 dark:text-green-400"
                                >
                                    <span
                                        class="material-symbols-outlined !text-sm"
                                        >trending_up</span
                                    >
                                    12.5%
                                </span>
                                <span
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                    >so với tháng trước</span
                                >
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm"
                        >
                            <div class="flex justify-between items-start">
                                <div>
                                    <p
                                        class="text-sm font-medium text-slate-500 dark:text-slate-400"
                                    >
                                        Bệnh nhân mới
                                    </p>
                                    <h3
                                        class="mt-1 text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        350
                                    </h3>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400"
                                >
                                    <span class="material-symbols-outlined"
                                        >person_add</span
                                    >
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-green-600 dark:text-green-400"
                                >
                                    <span
                                        class="material-symbols-outlined !text-sm"
                                        >trending_up</span
                                    >
                                    8.2%
                                </span>
                                <span
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                    >so với tháng trước</span
                                >
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm"
                        >
                            <div class="flex justify-between items-start">
                                <div>
                                    <p
                                        class="text-sm font-medium text-slate-500 dark:text-slate-400"
                                    >
                                        Doanh thu
                                    </p>
                                    <h3
                                        class="mt-1 text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        158M
                                        <span
                                            class="text-sm font-normal text-slate-500"
                                            >vnđ</span
                                        >
                                    </h3>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400"
                                >
                                    <span class="material-symbols-outlined"
                                        >payments</span
                                    >
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-red-600 dark:text-red-400"
                                >
                                    <span
                                        class="material-symbols-outlined !text-sm"
                                        >trending_down</span
                                    >
                                    2.1%
                                </span>
                                <span
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                    >so với tháng trước</span
                                >
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm"
                        >
                            <div class="flex justify-between items-start">
                                <div>
                                    <p
                                        class="text-sm font-medium text-slate-500 dark:text-slate-400"
                                    >
                                        Đánh giá TB
                                    </p>
                                    <h3
                                        class="mt-1 text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        4.8<span class="text-sm text-slate-400"
                                            >/5</span
                                        >
                                    </h3>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400"
                                >
                                    <span class="material-symbols-outlined"
                                        >star</span
                                    >
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-2">
                                <span
                                    class="flex items-center text-xs font-medium text-slate-600 dark:text-slate-400"
                                >
                                    <span
                                        class="material-symbols-outlined !text-sm filled"
                                        style="
                                            font-variation-settings: 'FILL' 1;
                                        "
                                        >star</span
                                    >
                                    <span
                                        class="material-symbols-outlined !text-sm filled"
                                        style="
                                            font-variation-settings: 'FILL' 1;
                                        "
                                        >star</span
                                    >
                                    <span
                                        class="material-symbols-outlined !text-sm filled"
                                        style="
                                            font-variation-settings: 'FILL' 1;
                                        "
                                        >star</span
                                    >
                                    <span
                                        class="material-symbols-outlined !text-sm filled"
                                        style="
                                            font-variation-settings: 'FILL' 1;
                                        "
                                        >star</span
                                    >
                                    <span
                                        class="material-symbols-outlined !text-sm filled"
                                        style="
                                            font-variation-settings: 'FILL' 1;
                                        "
                                        >star_half</span
                                    >
                                </span>
                                <span
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                    >từ 1,120 lượt</span
                                >
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <div
                            class="lg:col-span-2 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-6"
                        >
                            <div class="mb-6 flex items-center justify-between">
                                <h3
                                    class="text-lg font-semibold text-slate-900 dark:text-white"
                                >
                                    Thống kê cuộc hẹn (Tuần này)
                                </h3>
                                <button
                                    class="text-slate-400 hover:text-primary"
                                >
                                    <span class="material-symbols-outlined"
                                        >more_horiz</span
                                    >
                                </button>
                            </div>
                            <div class="relative h-64 w-full">
                                <div
                                    class="absolute inset-0 flex flex-col justify-between text-xs text-slate-400"
                                >
                                    <div
                                        class="border-b border-dashed border-slate-200 dark:border-slate-700 pb-2"
                                    >
                                        <span>100</span>
                                    </div>
                                    <div
                                        class="border-b border-dashed border-slate-200 dark:border-slate-700 pb-2"
                                    >
                                        <span>75</span>
                                    </div>
                                    <div
                                        class="border-b border-dashed border-slate-200 dark:border-slate-700 pb-2"
                                    >
                                        <span>50</span>
                                    </div>
                                    <div
                                        class="border-b border-dashed border-slate-200 dark:border-slate-700 pb-2"
                                    >
                                        <span>25</span>
                                    </div>
                                    <div
                                        class="border-b border-slate-200 dark:border-slate-700 pb-2"
                                    >
                                        <span>0</span>
                                    </div>
                                </div>
                                <div
                                    class="absolute inset-0 flex items-end justify-around px-4 pt-6"
                                >
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 40%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                40
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >T2</span
                                        >
                                    </div>
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 65%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                65
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >T3</span
                                        >
                                    </div>
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 55%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                55
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >T4</span
                                        >
                                    </div>
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 85%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                85
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >T5</span
                                        >
                                    </div>
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 70%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                70
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >T6</span
                                        >
                                    </div>
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 45%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                45
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >T7</span
                                        >
                                    </div>
                                    <div
                                        class="group relative flex w-8 flex-col items-center justify-end gap-2"
                                    >
                                        <div
                                            class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                                            style="height: 30%"
                                        >
                                            <div
                                                class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10"
                                            >
                                                30
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-medium text-slate-500"
                                            >CN</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-6"
                        >
                            <h3
                                class="mb-6 text-lg font-semibold text-slate-900 dark:text-white"
                            >
                                Chuyên khoa phổ biến
                            </h3>
                            <div class="flex flex-col gap-5">
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span
                                            class="font-medium text-slate-700 dark:text-slate-300"
                                            >Tim mạch</span
                                        >
                                        <span
                                            class="text-slate-500 dark:text-slate-400"
                                            >32%</span
                                        >
                                    </div>
                                    <div
                                        class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700"
                                    >
                                        <div
                                            class="h-2 rounded-full bg-blue-500"
                                            style="width: 32%"
                                        ></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span
                                            class="font-medium text-slate-700 dark:text-slate-300"
                                            >Da liễu</span
                                        >
                                        <span
                                            class="text-slate-500 dark:text-slate-400"
                                            >24%</span
                                        >
                                    </div>
                                    <div
                                        class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700"
                                    >
                                        <div
                                            class="h-2 rounded-full bg-teal-500"
                                            style="width: 24%"
                                        ></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span
                                            class="font-medium text-slate-700 dark:text-slate-300"
                                            >Nhi khoa</span
                                        >
                                        <span
                                            class="text-slate-500 dark:text-slate-400"
                                            >18%</span
                                        >
                                    </div>
                                    <div
                                        class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700"
                                    >
                                        <div
                                            class="h-2 rounded-full bg-amber-500"
                                            style="width: 18%"
                                        ></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span
                                            class="font-medium text-slate-700 dark:text-slate-300"
                                            >Sản phụ khoa</span
                                        >
                                        <span
                                            class="text-slate-500 dark:text-slate-400"
                                            >15%</span
                                        >
                                    </div>
                                    <div
                                        class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700"
                                    >
                                        <div
                                            class="h-2 rounded-full bg-pink-500"
                                            style="width: 15%"
                                        ></div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span
                                            class="font-medium text-slate-700 dark:text-slate-300"
                                            >Thần kinh</span
                                        >
                                        <span
                                            class="text-slate-500 dark:text-slate-400"
                                            >11%</span
                                        >
                                    </div>
                                    <div
                                        class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700"
                                    >
                                        <div
                                            class="h-2 rounded-full bg-purple-500"
                                            style="width: 11%"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
                    >
                        <div
                            class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 p-4"
                        >
                            <h3
                                class="text-lg font-semibold text-slate-900 dark:text-white"
                            >
                                Bác sĩ tiêu biểu (Tháng 7)
                            </h3>
                            <a
                                class="text-sm font-medium text-primary hover:text-primary/80"
                                href="#"
                                >Xem tất cả</a
                            >
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead
                                    class="bg-slate-50 text-slate-600 dark:bg-slate-800/50 dark:text-slate-300"
                                >
                                    <tr>
                                        <th class="px-4 py-3 font-medium">
                                            Bác sĩ
                                        </th>
                                        <th class="px-4 py-3 font-medium">
                                            Chuyên khoa
                                        </th>
                                        <th
                                            class="px-4 py-3 font-medium text-center"
                                        >
                                            Cuộc hẹn hoàn thành
                                        </th>
                                        <th
                                            class="px-4 py-3 font-medium text-center"
                                        >
                                            Đánh giá
                                        </th>
                                        <th
                                            class="px-4 py-3 font-medium text-right"
                                        >
                                            Doanh thu
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y divide-slate-200 dark:divide-slate-800"
                                >
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50"
                                    >
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs"
                                                >
                                                    NM
                                                </div>
                                                <span
                                                    class="font-medium text-slate-900 dark:text-white"
                                                    >BS. Nguyễn Thị Mai</span
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-slate-600 dark:text-slate-400"
                                        >
                                            Tim mạch
                                        </td>
                                        <td
                                            class="px-4 py-3 text-center text-slate-900 dark:text-white font-medium"
                                        >
                                            124
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div
                                                class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2 py-0.5 text-xs font-medium text-amber-700 dark:bg-amber-900/30 dark:text-amber-400"
                                            >
                                                <span>4.9</span>
                                                <span
                                                    class="material-symbols-outlined !text-xs filled"
                                                    style="
                                                        font-variation-settings: 'FILL'
                                                            1;
                                                    "
                                                    >star</span
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-right text-slate-900 dark:text-white"
                                        >
                                            45.000.000đ
                                        </td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50"
                                    >
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-bold text-xs"
                                                >
                                                    LH
                                                </div>
                                                <span
                                                    class="font-medium text-slate-900 dark:text-white"
                                                    >BS. Lê Văn Hùng</span
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-slate-600 dark:text-slate-400"
                                        >
                                            Da liễu
                                        </td>
                                        <td
                                            class="px-4 py-3 text-center text-slate-900 dark:text-white font-medium"
                                        >
                                            98
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div
                                                class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2 py-0.5 text-xs font-medium text-amber-700 dark:bg-amber-900/30 dark:text-amber-400"
                                            >
                                                <span>4.8</span>
                                                <span
                                                    class="material-symbols-outlined !text-xs filled"
                                                    style="
                                                        font-variation-settings: 'FILL'
                                                            1;
                                                    "
                                                    >star</span
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-right text-slate-900 dark:text-white"
                                        >
                                            32.500.000đ
                                        </td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50"
                                    >
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold text-xs"
                                                >
                                                    TD
                                                </div>
                                                <span
                                                    class="font-medium text-slate-900 dark:text-white"
                                                    >BS. Trần Anh Dũng</span
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-slate-600 dark:text-slate-400"
                                        >
                                            Nhi khoa
                                        </td>
                                        <td
                                            class="px-4 py-3 text-center text-slate-900 dark:text-white font-medium"
                                        >
                                            85
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div
                                                class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2 py-0.5 text-xs font-medium text-amber-700 dark:bg-amber-900/30 dark:text-amber-400"
                                            >
                                                <span>4.7</span>
                                                <span
                                                    class="material-symbols-outlined !text-xs filled"
                                                    style="
                                                        font-variation-settings: 'FILL'
                                                            1;
                                                    "
                                                    >star</span
                                                >
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-3 text-right text-slate-900 dark:text-white"
                                        >
                                            28.000.000đ
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
