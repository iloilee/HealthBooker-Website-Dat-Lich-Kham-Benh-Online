@extends('layouts.admin')
@section('title', 'Quản lý Lịch hẹn - HealthBooker')
@section('page-title', 'Quản lý Lịch hẹn')
@section('content')
<div
    class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
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
    class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
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
    class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm">
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
@endsection