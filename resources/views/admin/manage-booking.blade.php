<!DOCTYPE html>
<html class="light" lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>HealthBooker - Quản Lý Lịch Hẹn</title>
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
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20"
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
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-50"
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
                        <h2 class="text-xl font-semibold">Quản lý Lịch hẹn</h2>
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
                        class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6"
                    >
                        <div class="flex flex-1 gap-4">
                            <div class="relative w-full max-w-sm">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"
                                >
                                    <span
                                        class="material-symbols-outlined text-lg"
                                        >search</span
                                    >
                                </span>
                                <input
                                    class="w-full rounded-lg border-slate-200 bg-white py-2 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                    placeholder="Tìm kiếm theo tên, bác sĩ..."
                                    type="text"
                                />
                            </div>
                            <button
                                class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700"
                            >
                                <span class="material-symbols-outlined text-lg"
                                    >filter_list</span
                                >
                                Lọc
                            </button>
                        </div>
                        <div class="flex gap-2">
                            <select
                                class="rounded-lg border-slate-200 bg-white py-2 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                            >
                                <option>Tất cả trạng thái</option>
                                <option>Chờ xác nhận</option>
                                <option>Đã xác nhận</option>
                                <option>Đã hủy</option>
                                <option>Đã hoàn thành</option>
                            </select>
                            <button
                                class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600"
                            >
                                <span class="material-symbols-outlined text-lg"
                                    >add</span
                                >
                                Tạo lịch hẹn
                            </button>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6"
                    >
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4"
                        >
                            <div class="flex items-center justify-between">
                                <div>
                                    <p
                                        class="text-xs text-slate-500 dark:text-slate-400 font-medium"
                                    >
                                        Tổng lịch hẹn
                                    </p>
                                    <p class="text-xl font-bold mt-1">1,240</p>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400"
                                >
                                    <span
                                        class="material-symbols-outlined text-xl"
                                        >calendar_today</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4"
                        >
                            <div class="flex items-center justify-between">
                                <div>
                                    <p
                                        class="text-xs text-slate-500 dark:text-slate-400 font-medium"
                                    >
                                        Chờ xác nhận
                                    </p>
                                    <p class="text-xl font-bold mt-1">24</p>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-900/20 dark:text-amber-400"
                                >
                                    <span
                                        class="material-symbols-outlined text-xl"
                                        >pending</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4"
                        >
                            <div class="flex items-center justify-between">
                                <div>
                                    <p
                                        class="text-xs text-slate-500 dark:text-slate-400 font-medium"
                                    >
                                        Hôm nay
                                    </p>
                                    <p class="text-xl font-bold mt-1">42</p>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-50 text-green-600 dark:bg-green-900/20 dark:text-green-400"
                                >
                                    <span
                                        class="material-symbols-outlined text-xl"
                                        >today</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4"
                        >
                            <div class="flex items-center justify-between">
                                <div>
                                    <p
                                        class="text-xs text-slate-500 dark:text-slate-400 font-medium"
                                    >
                                        Đã hủy (Tháng)
                                    </p>
                                    <p class="text-xl font-bold mt-1">12</p>
                                </div>
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400"
                                >
                                    <span
                                        class="material-symbols-outlined text-xl"
                                        >cancel</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm"
                    >
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead
                                    class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300"
                                >
                                    <tr>
                                        <th class="px-4 py-3 font-semibold">
                                            ID
                                        </th>
                                        <th class="px-4 py-3 font-semibold">
                                            Bệnh nhân
                                        </th>
                                        <th class="px-4 py-3 font-semibold">
                                            Bác sĩ &amp; Chuyên khoa
                                        </th>
                                        <th class="px-4 py-3 font-semibold">
                                            Thời gian
                                        </th>
                                        <th class="px-4 py-3 font-semibold">
                                            Trạng thái
                                        </th>
                                        <th
                                            class="px-4 py-3 font-semibold text-right"
                                        >
                                            Thao tác
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y divide-slate-200 dark:divide-slate-800"
                                >
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-4 py-3 text-slate-500">
                                            #APT-2024
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs"
                                                >
                                                    TA
                                                </div>
                                                <div>
                                                    <div
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Trần Văn An
                                                    </div>
                                                    <div
                                                        class="text-xs text-slate-500"
                                                    >
                                                        0987 654 321
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="font-medium text-slate-900 dark:text-slate-100"
                                            >
                                                BS. Nguyễn Thị Mai
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                Tim mạch
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="font-medium">
                                                25/07/2024
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                09:30 - 10:00
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800"
                                            >
                                                <span
                                                    class="mr-1.5 h-1.5 w-1.5 rounded-full bg-green-600"
                                                ></span>
                                                Đã xác nhận
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <button
                                                    class="p-1 text-slate-400 hover:text-primary transition-colors"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-blue-600 transition-colors"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-red-600 transition-colors"
                                                    title="Hủy lịch"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >close</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-4 py-3 text-slate-500">
                                            #APT-2023
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold text-xs"
                                                >
                                                    LB
                                                </div>
                                                <div>
                                                    <div
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Lê Thị Bích
                                                    </div>
                                                    <div
                                                        class="text-xs text-slate-500"
                                                    >
                                                        0912 345 678
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="font-medium text-slate-900 dark:text-slate-100"
                                            >
                                                BS. Lê Văn Hùng
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                Da liễu
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="font-medium">
                                                25/07/2024
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                10:00 - 10:30
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-amber-100 px-2 py-1 text-xs font-medium text-amber-700 dark:bg-amber-900/30 dark:text-amber-400 border border-amber-200 dark:border-amber-800"
                                            >
                                                <span
                                                    class="mr-1.5 h-1.5 w-1.5 rounded-full bg-amber-600"
                                                ></span>
                                                Chờ xác nhận
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <button
                                                    class="p-1 text-green-600 hover:bg-green-50 rounded transition-colors"
                                                    title="Xác nhận ngay"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >check_circle</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-primary transition-colors"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-red-600 transition-colors"
                                                    title="Hủy lịch"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >close</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-4 py-3 text-slate-500">
                                            #APT-2022
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xs"
                                                >
                                                    PC
                                                </div>
                                                <div>
                                                    <div
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Phạm Minh Cường
                                                    </div>
                                                    <div
                                                        class="text-xs text-slate-500"
                                                    >
                                                        0933 888 999
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="font-medium text-slate-900 dark:text-slate-100"
                                            >
                                                BS. Trần Anh Dũng
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                Nhi khoa
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="font-medium">
                                                24/07/2024
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                14:00 - 14:30
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-700 dark:bg-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-600"
                                            >
                                                <span
                                                    class="mr-1.5 h-1.5 w-1.5 rounded-full bg-slate-500"
                                                ></span>
                                                Đã hoàn thành
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <button
                                                    class="p-1 text-slate-400 hover:text-primary transition-colors"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-blue-600 transition-colors"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >edit</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-4 py-3 text-slate-500">
                                            #APT-2021
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-rose-100 flex items-center justify-center text-rose-700 font-bold text-xs"
                                                >
                                                    VL
                                                </div>
                                                <div>
                                                    <div
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Vũ Thị Lan
                                                    </div>
                                                    <div
                                                        class="text-xs text-slate-500"
                                                    >
                                                        0905 112 233
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="font-medium text-slate-900 dark:text-slate-100"
                                            >
                                                BS. Hoàng Thu Trang
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                Sản phụ khoa
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="font-medium">
                                                24/07/2024
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                11:00 - 11:30
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800"
                                            >
                                                <span
                                                    class="mr-1.5 h-1.5 w-1.5 rounded-full bg-red-600"
                                                ></span>
                                                Đã hủy
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <button
                                                    class="p-1 text-slate-400 hover:text-primary transition-colors"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-blue-600 transition-colors"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >edit</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-4 py-3 text-slate-500">
                                            #APT-2020
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="h-8 w-8 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-700 font-bold text-xs"
                                                >
                                                    ĐL
                                                </div>
                                                <div>
                                                    <div
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Đặng Văn Long
                                                    </div>
                                                    <div
                                                        class="text-xs text-slate-500"
                                                    >
                                                        0977 456 789
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="font-medium text-slate-900 dark:text-slate-100"
                                            >
                                                BS. Nguyễn Thị Mai
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                Tim mạch
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="font-medium">
                                                26/07/2024
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                08:00 - 08:30
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800"
                                            >
                                                <span
                                                    class="mr-1.5 h-1.5 w-1.5 rounded-full bg-green-600"
                                                ></span>
                                                Đã xác nhận
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <button
                                                    class="p-1 text-slate-400 hover:text-primary transition-colors"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-blue-600 transition-colors"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="p-1 text-slate-400 hover:text-red-600 transition-colors"
                                                    title="Hủy lịch"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        >close</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="flex items-center justify-between border-t border-slate-200 dark:border-slate-800 px-4 py-3 sm:px-6"
                        >
                            <div class="flex flex-1 justify-between sm:hidden">
                                <a
                                    class="relative inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                    href="#"
                                    >Trước</a
                                >
                                <a
                                    class="relative ml-3 inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                    href="#"
                                    >Sau</a
                                >
                            </div>
                            <div
                                class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
                            >
                                <div>
                                    <p
                                        class="text-sm text-slate-700 dark:text-slate-300"
                                    >
                                        Hiển thị
                                        <span class="font-medium">1</span> đến
                                        <span class="font-medium">5</span> của
                                        <span class="font-medium">1,240</span>
                                        kết quả
                                    </p>
                                </div>
                                <div>
                                    <nav
                                        aria-label="Pagination"
                                        class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                                    >
                                        <a
                                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-slate-400 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:hover:bg-slate-800"
                                            href="#"
                                        >
                                            <span class="sr-only"
                                                >Previous</span
                                            >
                                            <span
                                                class="material-symbols-outlined text-lg"
                                                >chevron_left</span
                                            >
                                        </a>
                                        <a
                                            aria-current="page"
                                            class="relative z-10 inline-flex items-center bg-primary px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                            href="#"
                                            >1</a
                                        >
                                        <a
                                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:text-slate-300 dark:hover:bg-slate-800"
                                            href="#"
                                            >2</a
                                        >
                                        <a
                                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:text-slate-300 dark:hover:bg-slate-800"
                                            href="#"
                                            >3</a
                                        >
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-700 ring-1 ring-inset ring-slate-300 focus:outline-offset-0 dark:ring-slate-700 dark:text-slate-400"
                                            >...</span
                                        >
                                        <a
                                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:text-slate-300 dark:hover:bg-slate-800"
                                            href="#"
                                            >124</a
                                        >
                                        <a
                                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-slate-400 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:hover:bg-slate-800"
                                            href="#"
                                        >
                                            <span class="sr-only">Next</span>
                                            <span
                                                class="material-symbols-outlined text-lg"
                                                >chevron_right</span
                                            >
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
