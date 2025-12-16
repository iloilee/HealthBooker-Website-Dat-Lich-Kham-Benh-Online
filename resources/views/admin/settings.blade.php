@extends('layouts.admin')
@section('title', 'Cài đặt Hệ thống - HealthBooker')
@section('page-title', 'Cài đặt Hệ thống')
@section('content')
<div class="mx-auto max-w-5xl space-y-8 pb-10">
    <section
        class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
    >
        <div
            class="border-b border-slate-200 dark:border-slate-800 px-6 py-4 flex justify-between items-center"
        >
            <h3
                class="text-lg font-semibold flex items-center gap-2"
            >
                <span
                    class="material-symbols-outlined text-slate-500"
                    >info</span
                >
                Thông tin chung
            </h3>
            <button
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors"
            >
                Lưu thay đổi
            </button>
        </div>
        <div class="p-6 grid gap-6 md:grid-cols-2">
            <div class="col-span-2 md:col-span-1">
                <label
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1"
                    >Tên hệ thống</label
                >
                <input
                    class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm focus:border-primary focus:ring-primary dark:text-white"
                    placeholder="Nhập tên website"
                    type="text"
                    value="HealthBooker"
                />
            </div>
            <div class="col-span-2 md:col-span-1">
                <label
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1"
                    >Email liên hệ</label
                >
                <input
                    class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm focus:border-primary focus:ring-primary dark:text-white"
                    placeholder="admin@example.com"
                    type="email"
                    value="contact@healthbooker.com"
                />
            </div>
            <div class="col-span-2">
                <label
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                    >Logo hệ thống</label
                >
                <div class="flex items-center gap-4">
                    <div
                        class="h-16 w-16 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center border border-dashed border-slate-300 dark:border-slate-700 text-primary"
                    >
                        <svg
                            class="h-8 w-8"
                            fill="none"
                            viewBox="0 0 48 48"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                clip-rule="evenodd"
                                d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z"
                                fill="currentColor"
                                fill-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <button
                            class="px-3 py-1.5 border border-slate-300 dark:border-slate-700 rounded-md text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800"
                        >
                            Tải lên logo mới
                        </button>
                        <p
                            class="mt-1 text-xs text-slate-500"
                        >
                            Định dạng PNG, JPG. Kích thước
                            tối đa 2MB.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
    >
        <div
            class="border-b border-slate-200 dark:border-slate-800 px-6 py-4 flex justify-between items-center"
        >
            <h3
                class="text-lg font-semibold flex items-center gap-2"
            >
                <span
                    class="material-symbols-outlined text-slate-500"
                    >notifications</span
                >
                Cài đặt thông báo
            </h3>
            <button
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors"
            >
                Lưu thay đổi
            </button>
        </div>
        <div class="p-6 space-y-6">
            <div
                class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800"
            >
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Thông báo qua Email
                    </h4>
                    <p class="text-xs text-slate-500">
                        Gửi email xác nhận đặt lịch, nhắc
                        nhở.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        checked=""
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label
                        class="block text-xs font-medium text-slate-700 dark:text-slate-300 mb-1"
                        >SMTP Host</label
                    >
                    <input
                        class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm py-1.5"
                        placeholder="smtp.gmail.com"
                        type="text"
                    />
                </div>
                <div>
                    <label
                        class="block text-xs font-medium text-slate-700 dark:text-slate-300 mb-1"
                        >SMTP Port</label
                    >
                    <input
                        class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm py-1.5"
                        placeholder="587"
                        type="text"
                    />
                </div>
                <div>
                    <label
                        class="block text-xs font-medium text-slate-700 dark:text-slate-300 mb-1"
                        >Email gửi đi</label
                    >
                    <input
                        class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm py-1.5"
                        placeholder="noreply@healthbooker.com"
                        type="email"
                    />
                </div>
            </div>
            <div
                class="flex items-center justify-between pt-4 pb-4 border-b border-slate-100 dark:border-slate-800"
            >
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Thông báo qua SMS
                    </h4>
                    <p class="text-xs text-slate-500">
                        Gửi tin nhắn SMS mã OTP, thông báo
                        khẩn cấp.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
        </div>
    </section>
    <section
        class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
    >
        <div
            class="border-b border-slate-200 dark:border-slate-800 px-6 py-4 flex justify-between items-center"
        >
            <h3
                class="text-lg font-semibold flex items-center gap-2"
            >
                <span
                    class="material-symbols-outlined text-slate-500"
                    >manage_accounts</span
                >
                Người dùng &amp; Quyền hạn
            </h3>
            <button
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors"
            >
                Lưu thay đổi
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Cho phép Bệnh nhân đăng ký
                    </h4>
                    <p class="text-xs text-slate-500">
                        Người dùng có thể tự tạo tài khoản
                        bệnh nhân.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        checked=""
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Yêu cầu xác thực Email
                    </h4>
                    <p class="text-xs text-slate-500">
                        Tài khoản mới phải xác thực email
                        trước khi đăng nhập.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        checked=""
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Phê duyệt Bác sĩ thủ công
                    </h4>
                    <p class="text-xs text-slate-500">
                        Tài khoản bác sĩ cần Admin phê duyệt
                        trước khi hoạt động.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        checked=""
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
        </div>
    </section>
    <section
        class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
    >
        <div
            class="border-b border-slate-200 dark:border-slate-800 px-6 py-4 flex justify-between items-center"
        >
            <h3
                class="text-lg font-semibold flex items-center gap-2"
            >
                <span
                    class="material-symbols-outlined text-slate-500"
                    >payments</span
                >
                Cài đặt thanh toán
            </h3>
            <button
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors"
            >
                Lưu thay đổi
            </button>
        </div>
        <div class="p-6 grid gap-6 md:grid-cols-2">
            <div
                class="col-span-2 flex items-center justify-between mb-2"
            >
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Bật chức năng thanh toán Online
                    </h4>
                    <p class="text-xs text-slate-500">
                        Cho phép bệnh nhân thanh toán phí
                        khám qua cổng thanh toán.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
            <div
                class="col-span-2 md:col-span-1 opacity-50 pointer-events-none"
            >
                <label
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1"
                    >Đơn vị tiền tệ</label
                >
                <select
                    class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm focus:border-primary focus:ring-primary"
                >
                    <option>VND (Việt Nam Đồng)</option>
                    <option>USD (US Dollar)</option>
                </select>
            </div>
            <div
                class="col-span-2 md:col-span-1 opacity-50 pointer-events-none"
            >
                <label
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1"
                    >Cổng thanh toán</label
                >
                <select
                    class="w-full rounded-lg border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm focus:border-primary focus:ring-primary"
                >
                    <option>Momo</option>
                    <option>VNPAY</option>
                    <option>ZaloPay</option>
                </select>
            </div>
        </div>
    </section>
    <section
        class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850"
    >
        <div
            class="border-b border-slate-200 dark:border-slate-800 px-6 py-4 flex justify-between items-center"
        >
            <h3
                class="text-lg font-semibold flex items-center gap-2"
            >
                <span
                    class="material-symbols-outlined text-slate-500"
                    >security</span
                >
                Bảo mật
            </h3>
            <button
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors"
            >
                Lưu thay đổi
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Xác thực 2 lớp (2FA) cho Admin
                    </h4>
                    <p class="text-xs text-slate-500">
                        Yêu cầu mã OTP khi quản trị viên
                        đăng nhập.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        checked=""
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h4
                        class="text-sm font-medium text-slate-900 dark:text-slate-100"
                    >
                        Bắt buộc đổi mật khẩu định kỳ
                    </h4>
                    <p class="text-xs text-slate-500">
                        Yêu cầu người dùng đổi mật khẩu mỗi
                        90 ngày.
                    </p>
                </div>
                <label
                    class="relative inline-flex items-center cursor-pointer"
                >
                    <input
                        class="sr-only peer"
                        type="checkbox"
                        value=""
                    />
                    <div
                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"
                    ></div>
                </label>
            </div>
        </div>
    </section>
</div>
@endsection