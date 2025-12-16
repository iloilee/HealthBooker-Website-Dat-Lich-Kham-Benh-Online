@extends('layouts.admin')
@section('title', 'Quản lý Bác sĩ - HealthBooker')
@section('page-title', 'Quản lý Bác sĩ')
@section('content')
<div
    class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
    <div
        class="flex flex-col gap-4 sm:flex-row sm:items-center flex-1"
    >
        <div class="relative w-full sm:w-72">
            <span
                class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"
            >
                <span
                    class="material-symbols-outlined !text-xl"
                    >search</span
                >
            </span>
            <input
                class="w-full rounded-lg border-slate-200 bg-white py-2 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300 placeholder:text-slate-400"
                placeholder="Tìm tên, email hoặc SĐT..."
                type="text"
            />
        </div>
        <select
            class="w-full sm:w-48 rounded-lg border-slate-200 bg-white py-2 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
        >
            <option value="">Chuyên khoa</option>
            <option value="tim-mach">Tim mạch</option>
            <option value="nhi-khoa">Nhi khoa</option>
            <option value="da-lieu">Da liễu</option>
            <option value="san-phu-khoa">
                Sản phụ khoa
            </option>
        </select>
        <select
            class="w-full sm:w-48 rounded-lg border-slate-200 bg-white py-2 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
        >
            <option value="">Trạng thái</option>
            <option value="active">Đang hoạt động</option>
            <option value="inactive">
                Ngưng hoạt động
            </option>
        </select>
    </div>
    <button
        class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 shadow-sm transition-colors whitespace-nowrap"
    >
        <span class="material-symbols-outlined !text-xl"
            >add</span
        >
        Thêm bác sĩ
    </button>
</div>
<div
    class="rounded-xl border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-850 shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead
                class="border-b border-slate-200 bg-slate-50 text-slate-600 dark:border-slate-800 dark:bg-slate-800/50 dark:text-slate-300"
            >
                <tr>
                    <th class="px-6 py-4 font-semibold">
                        Bác sĩ
                    </th>
                    <th class="px-6 py-4 font-semibold">
                        Chuyên khoa
                    </th>
                    <th class="px-6 py-4 font-semibold">
                        Thông tin liên hệ
                    </th>
                    <th class="px-6 py-4 font-semibold">
                        Trạng thái
                    </th>
                    <th
                        class="px-6 py-4 font-semibold text-right"
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
                                class="h-10 w-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmvvNV01ivrUPCjMe6ndubKSvVGqoEaoT9CKY5tQOkO-uddFKE-aIkSMFpDxIryXW4iYCnsw1pULPnF8ISm_B9t1yiO-sGn-OnKZ4-fD2ZZifRwy_MF-i4HK9oWeuz-PLWlSHFzAexxXURkogG9VVIEpy0iDj_QFAhaZC6rVC8shjAsApW_Dw-UrRp8ryWrPWIx5WVhzG77_w7N3SQ83V1IDgHmeLlWrktdW7YYCLirulYjGwtbQukBqweD2EmPtg4CU7uH7mIW2s"
                            />
                            <div>
                                <p
                                    class="font-medium text-slate-900 dark:text-slate-50"
                                >
                                    BS. Nguyễn Thị Mai
                                </p>
                                <p
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                >
                                    ID: DOC-001
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/20"
                            >Tim mạch</span
                        >
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex flex-col gap-1 text-slate-600 dark:text-slate-300"
                        >
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >call</span
                                >
                                0912 345 678
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >mail</span
                                >
                                mai.nguyen@healthbooker.com
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-2"
                        >
                            <span
                                class="relative flex h-2.5 w-2.5"
                            >
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"
                                ></span>
                                <span
                                    class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"
                                ></span>
                            </span>
                            <span
                                class="text-xs font-medium text-green-600 dark:text-green-400"
                                >Đang hoạt động</span
                            >
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-primary dark:hover:bg-slate-800 transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-amber-500 dark:hover:bg-slate-800 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-red-500 dark:hover:bg-slate-800 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
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
                                class="h-10 w-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuATZHjlGFN8GeszJx0nZhWdnr8VCPosJg89jAiel_f1muIBEIMCES18_i_ST78XZSomq30ZV6Pd6QwXeaTfkKPGY_eZg1OE2vSCBAsl7dt5OuO5U9cLkrO-Phm4nWUgI_0w20P4ZepZFH_ETKoWctrVRPPx-e8IPXH8KEACSAADkVfxmBLgaWMN8n97-mPJvMknP3Ru7ccqqB3C4oWU8tS6uf2yu52Nc3SoesMjIzA7naTjD3XMTVBjqLyjXrRrRF5-yJbu1QIw8nc"
                            />
                            <div>
                                <p
                                    class="font-medium text-slate-900 dark:text-slate-50"
                                >
                                    BS. Lê Văn Hùng
                                </p>
                                <p
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                >
                                    ID: DOC-002
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-md bg-amber-50 px-2 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-700/10 dark:bg-amber-400/10 dark:text-amber-400 dark:ring-amber-400/20"
                            >Da liễu</span
                        >
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex flex-col gap-1 text-slate-600 dark:text-slate-300"
                        >
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >call</span
                                >
                                0988 111 222
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >mail</span
                                >
                                hung.le@healthbooker.com
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-2"
                        >
                            <span
                                class="relative flex h-2.5 w-2.5"
                            >
                                <span
                                    class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"
                                ></span>
                            </span>
                            <span
                                class="text-xs font-medium text-green-600 dark:text-green-400"
                                >Đang hoạt động</span
                            >
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-primary dark:hover:bg-slate-800 transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-amber-500 dark:hover:bg-slate-800 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-red-500 dark:hover:bg-slate-800 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
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
                                class="h-10 w-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEou11ncSSSPo4NvHvvamCBL28QGu4tlxZuLjdkSfm2Db6W4HToaAENUNBeB_eGXgz-qkQDkOyleNcFNnInF3fNTuBNOrZeKBJl4PRYXqqgWsg0SV7w_EOI5H2Uwqc9rwChXOhuffMPDiNg9_7MBaJcqyAcVaCGWUQgGN1_9A5CMEqri-vr0_0xXJyq-x0h0QxyPS8-iFMJiUQo1E8PSug9kpFgtIWwTXcTA36uNkwm3Psk0XxHDtw9XLA7ZjOqj4Euu56645q6k4"
                            />
                            <div>
                                <p
                                    class="font-medium text-slate-900 dark:text-slate-50"
                                >
                                    BS. Trần Anh Dũng
                                </p>
                                <p
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                >
                                    ID: DOC-003
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 dark:bg-pink-400/10 dark:text-pink-400 dark:ring-pink-400/20"
                            >Nhi khoa</span
                        >
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex flex-col gap-1 text-slate-600 dark:text-slate-300"
                        >
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >call</span
                                >
                                0905 777 888
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >mail</span
                                >
                                dung.tran@healthbooker.com
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-2"
                        >
                            <span
                                class="relative flex h-2.5 w-2.5"
                            >
                                <span
                                    class="relative inline-flex rounded-full h-2.5 w-2.5 bg-slate-400"
                                ></span>
                            </span>
                            <span
                                class="text-xs font-medium text-slate-500 dark:text-slate-400"
                                >Ngưng hoạt động</span
                            >
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-primary dark:hover:bg-slate-800 transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-amber-500 dark:hover:bg-slate-800 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-red-500 dark:hover:bg-slate-800 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
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
                                class="h-10 w-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBFDQcHsSjNw-gZory0QwoUvxTq2KPiFI34Ulkb0NaVHkDB0gadFTiqMRNIM1jyYhVeh6TZbY87zZmb-6sjmtuYNo4idHO6WGsBOSHTK4Fk97MZAkk1as3wxQsuHPQOzuqeLAnJKie2scdyC6PTMXvwFPZ6Q1zczm5zZ96NniEknsasUXpYTqf5ZwkzhZ5IYk1elDCE1z8dN4f9P_1egXcBUb0cBsFGjWCNMG6wzbbgaBGSCiKeV173onjJJBXdrl8r3ZhUWha7_xE"
                            />
                            <div>
                                <p
                                    class="font-medium text-slate-900 dark:text-slate-50"
                                >
                                    BS. Hoàng Thu Trang
                                </p>
                                <p
                                    class="text-xs text-slate-500 dark:text-slate-400"
                                >
                                    ID: DOC-004
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10 dark:bg-purple-400/10 dark:text-purple-400 dark:ring-purple-400/20"
                            >Sản phụ khoa</span
                        >
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex flex-col gap-1 text-slate-600 dark:text-slate-300"
                        >
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >call</span
                                >
                                0933 666 999
                            </div>
                            <div
                                class="flex items-center gap-2 text-xs"
                            >
                                <span
                                    class="material-symbols-outlined !text-sm text-slate-400"
                                    >mail</span
                                >
                                trang.hoang@healthbooker.com
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div
                            class="flex items-center gap-2"
                        >
                            <span
                                class="relative flex h-2.5 w-2.5"
                            >
                                <span
                                    class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"
                                ></span>
                            </span>
                            <span
                                class="text-xs font-medium text-green-600 dark:text-green-400"
                                >Đang hoạt động</span
                            >
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div
                            class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity"
                        >
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-primary dark:hover:bg-slate-800 transition-colors"
                                title="Xem chi tiết"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >visibility</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-amber-500 dark:hover:bg-slate-800 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
                                    >edit</span
                                >
                            </button>
                            <button
                                class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-red-500 dark:hover:bg-slate-800 transition-colors"
                                title="Xóa"
                            >
                                <span
                                    class="material-symbols-outlined !text-xl"
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
        class="flex items-center justify-between border-t border-slate-200 bg-white px-6 py-4 dark:border-slate-800 dark:bg-slate-850 rounded-b-xl"
    >
        <div
            class="text-sm text-slate-500 dark:text-slate-400"
        >
            Hiển thị
            <span
                class="font-medium text-slate-900 dark:text-slate-50"
                >1</span
            >
            đến
            <span
                class="font-medium text-slate-900 dark:text-slate-50"
                >4</span
            >
            trong số
            <span
                class="font-medium text-slate-900 dark:text-slate-50"
                >125</span
            >
            bác sĩ
        </div>
        <div class="flex gap-2">
            <button
                class="rounded-lg border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary disabled:opacity-50 dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800"
                disabled=""
            >
                Trước
            </button>
            <button
                class="rounded-lg border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800"
            >
                Sau
            </button>
        </div>
    </div>
</div>
@endsection