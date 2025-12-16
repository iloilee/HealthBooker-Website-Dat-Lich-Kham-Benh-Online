<!DOCTYPE html>
<html class="light" lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>HealthBooker - Quản Lý Bệnh Nhân</title>
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
                class="flex w-64 flex-col bg-white dark:bg-slate-850 border-r border-slate-200 dark:border-slate-800 hidden lg:flex"
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
                        class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20"
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
            <div class="flex flex-1 flex-col h-screen overflow-hidden">
                <header
                    class="flex h-16 items-center justify-between border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 px-6 shrink-0"
                >
                    <div class="flex items-center gap-4">
                        <button
                            class="lg:hidden text-slate-600 dark:text-slate-300"
                        >
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                        <h2 class="text-xl font-semibold">Quản lý Bệnh nhân</h2>
                    </div>
                    <div class="flex items-center gap-4">
                        <button
                            class="text-slate-600 dark:text-slate-300 relative"
                        >
                            <span class="material-symbols-outlined"
                                >notifications</span
                            >
                            <span
                                class="absolute top-0 right-0 h-2.5 w-2.5 rounded-full bg-red-500 border-2 border-white dark:border-slate-850"
                            ></span>
                        </button>
                        <div
                            class="flex items-center gap-3 pl-4 border-l border-slate-200 dark:border-slate-700"
                        >
                            <img
                                alt="Admin avatar"
                                class="h-9 w-9 rounded-full object-cover ring-2 ring-primary/20"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI852zzHGYCool7feEvRZCttYLwzvmcIRuFkihwR-ztZiPzAAqUcdK9KExfvU5sPx3kE95EgKP-p15zgsynLpNqmzaTLw8n3HMHDQaAgW7QDv0_s4sTK9MtMnUx7oZUPfzsWGZvNAArA0jail_lwmpQHmaVETEe6EB8DFuDuJAzwyRtaY-6t-k-bx2SD9Q9PGgPPHQ46C8NmL8wGIWp9ktTUAP08WtC-RihFpsWz7DdzbD3FEQyqt5Xjx8KlrsDmvcUtiX4b9z0B0"
                            />
                            <div class="text-right hidden sm:block">
                                <p
                                    class="text-sm font-medium text-slate-900 dark:text-slate-100"
                                >
                                    Admin
                                </p>
                                <p class="text-xs text-primary font-semibold">
                                    Quản trị viên
                                </p>
                            </div>
                        </div>
                    </div>
                </header>
                <main
                    class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-4 md:p-6"
                >
                    <div
                        class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
                    >
                        <div class="flex flex-1 gap-4">
                            <div class="relative w-full max-w-md">
                                <span
                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"
                                >
                                    <span
                                        class="material-symbols-outlined text-[20px]"
                                        >search</span
                                    >
                                </span>
                                <input
                                    class="w-full rounded-lg border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-850 dark:placeholder-slate-400"
                                    placeholder="Tìm kiếm theo tên, ID, SĐT..."
                                    type="text"
                                />
                            </div>
                            <div class="relative hidden sm:block">
                                <select
                                    class="h-full rounded-lg border-slate-200 bg-white py-2.5 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-850"
                                >
                                    <option value="">Tất cả trạng thái</option>
                                    <option value="active">
                                        Đang hoạt động
                                    </option>
                                    <option value="blocked">Đã khóa</option>
                                </select>
                            </div>
                        </div>
                        <button
                            class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2.5 text-sm font-medium text-white hover:bg-primary/90 transition-colors shadow-sm shadow-primary/30"
                        >
                            <span class="material-symbols-outlined text-[20px]"
                                >add</span
                            >
                            <span>Thêm bệnh nhân</span>
                        </button>
                    </div>
                    <div
                        class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-850"
                    >
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead
                                    class="bg-slate-50 text-slate-600 dark:bg-slate-800/50 dark:text-slate-400"
                                >
                                    <tr>
                                        <th class="px-6 py-4 font-medium">
                                            Bệnh nhân
                                        </th>
                                        <th class="px-6 py-4 font-medium">
                                            Giới tính
                                        </th>
                                        <th class="px-6 py-4 font-medium">
                                            Liên hệ
                                        </th>
                                        <th class="px-6 py-4 font-medium">
                                            Ngày sinh
                                        </th>
                                        <th class="px-6 py-4 font-medium">
                                            Lần khám cuối
                                        </th>
                                        <th
                                            class="px-6 py-4 font-medium text-right"
                                        >
                                            Thao tác
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y divide-slate-200 dark:divide-slate-800"
                                >
                                    <tr
                                        class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <img
                                                    alt="Avatar"
                                                    class="h-10 w-10 rounded-full object-cover ring-1 ring-slate-200 dark:ring-slate-700"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnKaG3Q5XaUkt85o4clNmg-ci6Y5ec3mFWyIS6y7kgIq12VefnZugcCch82Y3n__XVVin7ctmH41HdVi3LyKzAcz74SRXtG_-CekmE2st94F3-YW-N7ds9HdSddeNyIJDUYMFu8kZljONSUzE1E03-k36WADvtlV5y78e4CtiHdeMpCjk25GW0LzS_RlpEVOhKR5FqYHpCyU5jVn-H5S2OFIu2qhrYx8tYkQhZ2MJVoEg3QBrG3laGGpcIDBVpmjyj14YHNXy893A"
                                                />
                                                <div>
                                                    <p
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Nguyễn Văn An
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-500 dark:text-slate-400"
                                                    >
                                                        ID: #BN00125
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-900/30 dark:text-blue-400"
                                                >Nam</span
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1">
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >phone</span
                                                    >
                                                    <span class="text-xs"
                                                        >0912 345 678</span
                                                    >
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >mail</span
                                                    >
                                                    <span class="text-xs"
                                                        >an.nguyen@gmail.com</span
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-slate-600 dark:text-slate-300"
                                        >
                                            15/05/1985
                                        </td>
                                        <td class="px-6 py-4">
                                            <p
                                                class="text-slate-900 dark:text-slate-100"
                                            >
                                                20/07/2024
                                            </p>
                                            <p class="text-xs text-slate-500">
                                                BS. Trần Anh Dũng
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity"
                                            >
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/20 dark:hover:text-red-500"
                                                    title="Xóa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >delete</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400 font-bold text-sm"
                                                >
                                                    TB
                                                </div>
                                                <div>
                                                    <p
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Trần Thị Bích
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-500 dark:text-slate-400"
                                                    >
                                                        ID: #BN00126
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 dark:bg-pink-900/30 dark:text-pink-400"
                                                >Nữ</span
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1">
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >phone</span
                                                    >
                                                    <span class="text-xs"
                                                        >0987 654 321</span
                                                    >
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >mail</span
                                                    >
                                                    <span class="text-xs"
                                                        >bich.tran@example.com</span
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-slate-600 dark:text-slate-300"
                                        >
                                            22/09/1992
                                        </td>
                                        <td class="px-6 py-4">
                                            <p
                                                class="text-slate-900 dark:text-slate-100"
                                            >
                                                18/07/2024
                                            </p>
                                            <p class="text-xs text-slate-500">
                                                BS. Nguyễn Thị Mai
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity"
                                            >
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/20 dark:hover:text-red-500"
                                                    title="Xóa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >delete</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <img
                                                    alt="Avatar"
                                                    class="h-10 w-10 rounded-full object-cover ring-1 ring-slate-200 dark:ring-slate-700"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5KInHHhslwOGAlZhCxzwJzXj3genvYx9zI9xTt9zFzSRzs7Nn4AKJf_IAkOdC20i0xtjUef3ZvfywmuHPeYNfOcdptnOGUur4EO4v51vu6uEYCLWaO45Zb1BfFvvVdU6LFObq2NI61pn7D8LqyLjmXZr958r8_dgfv-nX23ay_0BrourjkamjwiImxHtOfKw8sgEdorO73WJo00rPsUzV0Bv3tRlkiP9xbYJ2okz-TMtUqOReBeemMzAa6OtHtgj1ujnRLXDGMV4"
                                                />
                                                <div>
                                                    <p
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Lê Hoàng Cường
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-500 dark:text-slate-400"
                                                    >
                                                        ID: #BN00127
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-900/30 dark:text-blue-400"
                                                >Nam</span
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1">
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >phone</span
                                                    >
                                                    <span class="text-xs"
                                                        >0909 123 456</span
                                                    >
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >mail</span
                                                    >
                                                    <span class="text-xs"
                                                        >cuong.le@outlook.com</span
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-slate-600 dark:text-slate-300"
                                        >
                                            10/11/1978
                                        </td>
                                        <td class="px-6 py-4">
                                            <p
                                                class="text-slate-900 dark:text-slate-100"
                                            >
                                                15/07/2024
                                            </p>
                                            <p class="text-xs text-slate-500">
                                                BS. Lê Văn Hùng
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity"
                                            >
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/20 dark:hover:text-red-500"
                                                    title="Xóa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >delete</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-100 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400 font-bold text-sm"
                                                >
                                                    PD
                                                </div>
                                                <div>
                                                    <p
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Phạm Thùy Dung
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-500 dark:text-slate-400"
                                                    >
                                                        ID: #BN00128
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 dark:bg-pink-900/30 dark:text-pink-400"
                                                >Nữ</span
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1">
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >phone</span
                                                    >
                                                    <span class="text-xs"
                                                        >0933 888 999</span
                                                    >
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >mail</span
                                                    >
                                                    <span class="text-xs"
                                                        >dung.pham@yahoo.com</span
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-slate-600 dark:text-slate-300"
                                        >
                                            05/03/1995
                                        </td>
                                        <td class="px-6 py-4">
                                            <p
                                                class="text-slate-900 dark:text-slate-100"
                                            >
                                                01/07/2024
                                            </p>
                                            <p class="text-xs text-slate-500">
                                                BS. Hoàng Thu Trang
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity"
                                            >
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/20 dark:hover:text-red-500"
                                                    title="Xóa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >delete</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <img
                                                    alt="Avatar"
                                                    class="h-10 w-10 rounded-full object-cover ring-1 ring-slate-200 dark:ring-slate-700"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnBv2G83V4xAltYkolM2yx4JtfAwmlWbljaytPDzjRZeKE9VnTkEuKyyeWBpGu3QlPedQ4bswBEj3DMg3TtW9gEhx95OB_fqAsM2lk5ZHRW6Rc_IBXpHZgp-Gui2rw-Ys8zmw-YbapQmScvRDVUrMu4k7Elh7OpoXDBlDoH-8ajojsimoVLkk7szu9Gr37hVBICiI3HWGkyqNCrX7E4KW8fl3-1HEot5-uDUaPtvuM35n1Pa3HdTXs6mCrJAr-q_OuXeruaPPttHI"
                                                />
                                                <div>
                                                    <p
                                                        class="font-medium text-slate-900 dark:text-slate-100"
                                                    >
                                                        Vũ Minh Hiếu
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-500 dark:text-slate-400"
                                                    >
                                                        ID: #BN00129
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-900/30 dark:text-blue-400"
                                                >Nam</span
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1">
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >phone</span
                                                    >
                                                    <span class="text-xs"
                                                        >0977 111 222</span
                                                    >
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-slate-600 dark:text-slate-400"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[16px]"
                                                        >mail</span
                                                    >
                                                    <span class="text-xs"
                                                        >hieu.vu@company.com</span
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-slate-600 dark:text-slate-300"
                                        >
                                            12/12/1988
                                        </td>
                                        <td class="px-6 py-4">
                                            <p
                                                class="text-slate-900 dark:text-slate-100"
                                            >
                                                26/06/2024
                                            </p>
                                            <p class="text-xs text-slate-500">
                                                BS. Trần Anh Dũng
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity"
                                            >
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Xem chi tiết"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >visibility</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                                    title="Chỉnh sửa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >edit</span
                                                    >
                                                </button>
                                                <button
                                                    class="rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/20 dark:hover:text-red-500"
                                                    title="Xóa"
                                                >
                                                    <span
                                                        class="material-symbols-outlined text-[20px]"
                                                        >delete</span
                                                    >
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="flex items-center justify-between border-t border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-850"
                        >
                            <div
                                class="hidden text-sm text-slate-500 dark:text-slate-400 sm:block"
                            >
                                Hiển thị
                                <span
                                    class="font-medium text-slate-900 dark:text-slate-100"
                                    >1</span
                                >
                                đến
                                <span
                                    class="font-medium text-slate-900 dark:text-slate-100"
                                    >5</span
                                >
                                trong số
                                <span
                                    class="font-medium text-slate-900 dark:text-slate-100"
                                    >1,830</span
                                >
                                bệnh nhân
                            </div>
                            <div
                                class="flex flex-1 justify-between gap-2 sm:justify-end"
                            >
                                <button
                                    class="relative inline-flex items-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-850 dark:text-slate-400 dark:hover:bg-slate-800"
                                >
                                    Trước
                                </button>
                                <button
                                    class="relative inline-flex items-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-850 dark:text-slate-400 dark:hover:bg-slate-800"
                                >
                                    Sau
                                </button>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>