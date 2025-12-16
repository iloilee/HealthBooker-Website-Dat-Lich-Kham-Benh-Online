@extends('layouts.admin')
@section('title', 'Quản lý Bệnh nhân - HealthBooker')
@section('page-title', 'Quản lý Bệnh nhân')
@section('content')
<div
    class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
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
    class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-850">
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
@endsection