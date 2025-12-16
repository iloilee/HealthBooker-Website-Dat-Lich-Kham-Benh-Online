@extends('layouts.admin')
@section('title', 'Quản lý Chuyên Khoa - HealthBooker')
@section('page-title', 'Quản lý Chuyên Khoa')
@section('content')
<div
    class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
    <div class="flex items-center gap-4">
        <div class="relative w-full sm:w-80">
            <span
                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"
                >search</span
            >
            <input
                class="w-full rounded-lg border-slate-200 bg-white py-2 pl-10 pr-4 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-50 dark:placeholder-slate-500"
                placeholder="Tìm kiếm chuyên khoa..."
                type="text"
            />
        </div>
        <div class="relative">
            <select
                class="appearance-none rounded-lg border-slate-200 bg-white py-2 pl-4 pr-10 text-sm text-slate-900 focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-50"
            >
                <option>Tất cả trạng thái</option>
                <option>Đang hoạt động</option>
                <option>Tạm ẩn</option>
            </select>
            <span
                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400 text-lg"
                >expand_more</span
            >
        </div>
    </div>
    <button
        class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 transition-colors"
    >
        <span class="material-symbols-outlined text-lg"
            >add</span
        >
        Thêm Chuyên Khoa
    </button>
</div>
<div
    class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead
                class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300"
            >
                <tr>
                    <th class="px-6 py-4 font-medium">
                        Tên Chuyên Khoa
                    </th>
                    <th class="px-6 py-4 font-medium">
                        Mô Tả
                    </th>
                    <th
                        class="px-6 py-4 font-medium text-center"
                    >
                        Số lượng Bác sĩ
                    </th>
                    <th class="px-6 py-4 font-medium">
                        Trạng Thái
                    </th>
                    <th
                        class="px-6 py-4 font-medium text-right"
                    >
                        Thao Tác
                    </th>
                </tr>
            </thead>
            <tbody
                class="divide-y divide-slate-200 dark:divide-slate-800"
            >
                <tr
                    class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                >
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-3"
                        >
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400"
                            >
                                <span
                                    class="material-symbols-outlined"
                                    >cardiology</span
                                >
                            </div>
                            <span
                                class="font-semibold text-slate-900 dark:text-slate-50"
                                >Tim mạch</span
                            >
                        </div>
                    </td>
                    <td
                        class="px-6 py-4 max-w-xs truncate text-slate-500 dark:text-slate-400"
                    >
                        Chẩn đoán và điều trị các bệnh lý
                        liên quan đến tim và mạch máu.
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-800 dark:bg-slate-700 dark:text-slate-300"
                        >
                            12
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400"
                        >
                            Hoạt động
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-blue-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-blue-400 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-red-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-red-400 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >delete</span
                                >
                            </button>
                        </div>
                    </td>
                </tr>
                <tr
                    class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                >
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-3"
                        >
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-pink-50 text-pink-600 dark:bg-pink-900/20 dark:text-pink-400"
                            >
                                <span
                                    class="material-symbols-outlined"
                                    >dermatology</span
                                >
                            </div>
                            <span
                                class="font-semibold text-slate-900 dark:text-slate-50"
                                >Da liễu</span
                            >
                        </div>
                    </td>
                    <td
                        class="px-6 py-4 max-w-xs truncate text-slate-500 dark:text-slate-400"
                    >
                        Điều trị các bệnh về da, tóc, móng
                        và các bệnh lây truyền qua đường
                        tình dục.
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-800 dark:bg-slate-700 dark:text-slate-300"
                        >
                            8
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400"
                        >
                            Hoạt động
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-blue-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-blue-400 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-red-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-red-400 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >delete</span
                                >
                            </button>
                        </div>
                    </td>
                </tr>
                <tr
                    class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                >
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-3"
                        >
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-50 text-yellow-600 dark:bg-yellow-900/20 dark:text-yellow-400"
                            >
                                <span
                                    class="material-symbols-outlined"
                                    >child_care</span
                                >
                            </div>
                            <span
                                class="font-semibold text-slate-900 dark:text-slate-50"
                                >Nhi khoa</span
                            >
                        </div>
                    </td>
                    <td
                        class="px-6 py-4 max-w-xs truncate text-slate-500 dark:text-slate-400"
                    >
                        Chăm sóc sức khỏe cho trẻ sơ sinh,
                        trẻ em và thanh thiếu niên.
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-800 dark:bg-slate-700 dark:text-slate-300"
                        >
                            15
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400"
                        >
                            Hoạt động
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-blue-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-blue-400 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-red-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-red-400 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >delete</span
                                >
                            </button>
                        </div>
                    </td>
                </tr>
                <tr
                    class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                >
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-3"
                        >
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/20 dark:text-purple-400"
                            >
                                <span
                                    class="material-symbols-outlined"
                                    >neurology</span
                                >
                            </div>
                            <span
                                class="font-semibold text-slate-900 dark:text-slate-50"
                                >Thần kinh</span
                            >
                        </div>
                    </td>
                    <td
                        class="px-6 py-4 max-w-xs truncate text-slate-500 dark:text-slate-400"
                    >
                        Chẩn đoán và điều trị các rối loạn
                        của hệ thần kinh.
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-800 dark:bg-slate-700 dark:text-slate-300"
                        >
                            6
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-600 dark:bg-slate-800 dark:text-slate-400"
                        >
                            Tạm ẩn
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-blue-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-blue-400 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-red-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-red-400 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >delete</span
                                >
                            </button>
                        </div>
                    </td>
                </tr>
                <tr
                    class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                >
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-3"
                        >
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-teal-50 text-teal-600 dark:bg-teal-900/20 dark:text-teal-400"
                            >
                                <span
                                    class="material-symbols-outlined"
                                    >dentistry</span
                                >
                            </div>
                            <span
                                class="font-semibold text-slate-900 dark:text-slate-50"
                                >Răng hàm mặt</span
                            >
                        </div>
                    </td>
                    <td
                        class="px-6 py-4 max-w-xs truncate text-slate-500 dark:text-slate-400"
                    >
                        Điều trị các bệnh lý về răng, miệng
                        và hàm mặt.
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-800 dark:bg-slate-700 dark:text-slate-300"
                        >
                            10
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400"
                        >
                            Hoạt động
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-blue-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-blue-400 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-red-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-red-400 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined text-xl"
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
        class="flex items-center justify-between border-t border-slate-200 dark:border-slate-800 px-6 py-4"
    >
        <p
            class="text-sm text-slate-500 dark:text-slate-400"
        >
            Hiển thị
            <span
                class="font-medium text-slate-900 dark:text-slate-50"
                >1-5</span
            >
            trong số
            <span
                class="font-medium text-slate-900 dark:text-slate-50"
                >12</span
            >
            chuyên khoa
        </p>
        <div class="flex gap-2">
            <button
                class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700"
                disabled=""
            >
                <span
                    class="material-symbols-outlined text-sm"
                    >chevron_left</span
                >
            </button>
            <button
                class="flex h-8 w-8 items-center justify-center rounded-lg border border-primary bg-primary text-white"
            >
                1
            </button>
            <button
                class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700"
            >
                2
            </button>
            <button
                class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700"
            >
                3
            </button>
            <button
                class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700"
            >
                <span
                    class="material-symbols-outlined text-sm"
                    >chevron_right</span
                >
            </button>
        </div>
    </div>
</div>
@endsection