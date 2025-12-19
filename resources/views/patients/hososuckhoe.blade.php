<!DOCTYPE html>
<html lang="en" lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>HealthBooker - Đặt Lịch Khám Bệnh Online</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
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
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
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
              success: "#22c55e",
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
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
    <header
        class="sticky top-0 z-10 bg-card-light dark:bg-card-dark shadow-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <a class="flex items-center gap-2 text-primary dark:text-white" href="{{ route('home') }}">
            <div class="size-6 text-primary">
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
            <span class="text-2xl font-bold text-[#0d141b] dark:text-gray-100">HealthBooker</span>
            <div class="hidden lg:flex flex-1 justify-end gap-8">
                <div class="flex items-center gap-9">
                <a 
                    class="{{ request()->routeIs('home') 
                        ? 'text-primary text-sm font-bold leading-normal' 
                        : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                    href="{{ route('home') }}"
                >
                    Trang chủ
                </a>
                <a 
                    class="{{ request()->routeIs('benhnhanlog') 
                        ? 'text-primary text-sm font-bold leading-normal' 
                        : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                    href="{{ route('benhnhanlog') }}"
                >
                    Tổng quan
                </a>
                <!-- NÚT ĐẶT LỊCH KHÁM  -->
                @php
                    $showAppointmentBtn = false;
                    if (Auth::check() && Auth::user()->roleId == 3) { // PATIENT
                        $showAppointmentBtn = true;
                    }
                @endphp
                
                @if($showAppointmentBtn)
                    <a 
                        class="{{ request()->routeIs('hososuckhoe') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('hososuckhoe') }}"
                    >
                        Hồ sơ sức khỏe
                    </a>
                @endif
            </div>
            </a>
            
            <div class="flex items-center gap-4">
            <button
                class="flex items-center justify-center size-10 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800"
            >
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="relative">
                <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer">
                    <img src="{{ $user->avatar ?? asset('images/default-avatar.jpg') }}" 
                        alt="Avatar" 
                        class="w-12 h-12 rounded-full object-cover">
                    <div class="text-sm">
                        <p class="font-bold text-slate-900 dark:text-slate-50">{{ $user->name ?? 'Người dùng' }}</p>
                        <p class="text-slate-500 dark:text-slate-400">
                        @if($user->roleId == 1)
                            Quản trị viên
                        @elseif($user->roleId == 2)
                            Bác sĩ
                        @elseif($user->roleId == 3)
                            Bệnh nhân
                        @else
                            Người dùng
                        @endif
                        </p>
                    </div>

                    <span class="material-symbols-outlined text-slate-600 dark:text-slate-400">
                        expand_more
                    </span>
                </div>
                <div
                    id="doctorDropdown"
                    class="absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 shadow-lg rounded-lg border border-slate-200 dark:border-slate-700 hidden"
                >
                    <a
                        href="{{ route('hososuckhoe') }}"
                        class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                    >
                        Hồ sơ sức khỏe
                    </a>
                    <a
                        href="{{ route('password.change') }}"
                        class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                    >
                        Đổi mật khẩu
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30"
                        >
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </header>

    <div class="layout-container flex h-full grow flex-col">
    <div class="flex flex-1 justify-center">
        <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
            <main class="flex flex-col gap-8 px-4 md:px-10 py-8">
                <!-- Thông tin bệnh nhân -->
                <div class="flex flex-col md:flex-row gap-6 items-start md:items-center justify-between bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-100 dark:border-slate-700">
                    <div class="flex items-center gap-6">
                        <div class="w-24 h-24 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden border-2 border-primary/20">
                            @if($user->avatar)
                                <img alt="Patient" class="w-full h-full object-cover" src="{{ $user->avatar }}">
                            @else
                                <span class="material-symbols-outlined text-4xl text-slate-400">
                                    person
                                </span>
                            @endif
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                                {{ $patient->name ?? 'Chưa có tên' }}
                            </h1>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">
                                Mã bệnh nhân:
                                <span class="font-mono text-slate-700 dark:text-slate-300">
                                    {{ $patientCode }}
                                </span>
                            </p>
                            <div class="flex flex-wrap gap-4 mt-3">
                                <span class="inline-flex items-center gap-1 text-sm text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-3 py-1 rounded-full">
                                    <span class="material-symbols-outlined text-base">calendar_month</span>

                                    @if ($patient->date_of_birth)
                                        {{ \Carbon\Carbon::parse($patient->date_of_birth)->format('d/m/Y') }}
                                        ({{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} tuổi)
                                    @else
                                        Chưa cập nhật
                                    @endif
                                </span>

                                @if($patient->phone)
                                <span class="inline-flex items-center gap-1 text-sm text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-3 py-1 rounded-full">
                                    <span class="material-symbols-outlined text-base">call</span>
                                    {{ $patient->phone }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3 w-full md:w-auto">
                        <a href="{{ route('booking.index') }}">
                            <button class="flex-1 md:flex-none items-center justify-center gap-2 bg-primary text-white px-5 py-2.5 rounded-lg font-medium hover:bg-primary/90 transition-colors flex">
                                <span class="material-symbols-outlined text-lg">edit_calendar</span>
                                Đặt lịch khám mới
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Thông tin sức khỏe -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Nhóm máu -->
                    <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2">
                            <span class="material-symbols-outlined text-red-500">favorite</span>
                            <span class="text-sm font-medium">Nhóm máu</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">
                            {{ $patient->extraInfo?->blood_type ?? 'Chưa cập nhật' }}
                        </p>
                    </div>

                    <!-- Chiều cao -->
                    <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2">
                            <span class="material-symbols-outlined text-blue-500">height</span>
                            <span class="text-sm font-medium">Chiều cao</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">
                            {{ $patient->extraInfo?->height ?? '--' }}
                            <span class="text-base font-normal text-slate-500">cm</span>
                        </p>
                    </div>

                    <!-- Cân nặng -->
                    <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2">
                            <span class="material-symbols-outlined text-green-500">monitor_weight</span>
                            <span class="text-sm font-medium">Cân nặng</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">
                            {{ $patient->extraInfo?->weight ?? '--' }}
                            <span class="text-base font-normal text-slate-500">kg</span>
                        </p>
                    </div>

                    <!-- BMI -->
                    <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2">
                            <span class="material-symbols-outlined text-orange-500">accessibility_new</span>
                            <span class="text-sm font-medium">BMI</span>
                        </div>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">
                            {{ $patient->extraInfo?->bmi ?? '--' }}
                            @if($patient->extraInfo?->bmi)
                            <span class="text-base font-normal text-slate-500">
                                ({{ $patient->extraInfo?->bmi_status }})
                            </span>
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Lịch sử khám bệnh -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-8">
                        <section class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">history</span>
                                    Lịch sử đặt lịch
                                </h3>
                                {{-- <a class="text-primary text-sm font-medium hover:underline" href="#">
                                    Xem tất cả
                                </a> --}}
                            </div>
                            <div class="divide-y divide-slate-100 dark:divide-slate-700">
                                @if($patient->dateBooking)
                                <div class="p-6 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h4 class="font-bold text-slate-900 dark:text-white">
                                                Đặt lịch khám
                                            </h4>
                                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                                {{ $patient->description ?? 'Không có mô tả' }}
                                            </p>
                                        </div>
                                        <span class="text-sm font-medium text-slate-500 bg-slate-100 dark:bg-slate-700 dark:text-slate-300 px-2 py-1 rounded">
                                            {{ $patient->dateBooking->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span class="text-sm text-slate-600 dark:text-slate-300">
                                            <span class="material-symbols-outlined align-middle text-base">schedule</span>
                                            {{ $patient->timeBooking ?? '--:--' }}
                                        </span>
                                        @if($patient->doctor)
                                        <span class="text-sm text-slate-600 dark:text-slate-300">
                                            <span class="material-symbols-outlined align-middle text-base">person</span>
                                            {{ $patient->doctor->user->name ?? 'Bác sĩ' }}
                                        </span>
                                        @endif
                                    </div>
                                    @if($patient->status)
                                    <div class="mt-3">
                                        <span class="inline-flex items-center gap-1 text-xs px-2 py-1 rounded 
                                            @if($patient->status->name == 'Chờ xác nhận') bg-yellow-100 text-yellow-800 border border-yellow-200
                                            @elseif($patient->status->name == 'Đã xác nhận') bg-green-100 text-green-800 border border-green-200
                                            @elseif($patient->status->name == 'Đã khám') bg-blue-100 text-blue-800 border border-blue-200
                                            @else bg-red-100 text-red-800 border border-red-200 @endif">
                                            {{ $patient->status->name }}
                                        </span>
                                    </div>
                                    @endif
                                </div>
                                @else
                                <div class="p-6 text-center text-slate-500">
                                    Chưa có lịch sử đặt lịch
                                </div>
                                @endif
                            </div>
                        </section>
                    </div>

                    <!-- Phần sidebar -->
                    <div class="lg:col-span-1 space-y-8">
                        <!-- Thông tin bổ sung -->
                        @if($patient->extraInfo?->moreInfo || $patient->extraInfo?->historyBreath)
                        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                                <span class="material-symbols-outlined text-blue-500">info</span>
                                Thông tin bổ sung
                            </h3>
                            @if($patient->extraInfo?->moreInfo)
                            <div class="mb-4">
                                <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">
                                    Thông tin thêm
                                </h4>
                                <p class="text-sm text-slate-600 dark:text-slate-400">
                                    {{ $patient->extraInfo->moreInfo }}
                                </p>
                            </div>
                            @endif
                            @if($patient->extraInfo?->historyBreath)
                            <div>
                                <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">
                                    Tiền sử hô hấp
                                </h4>
                                <p class="text-sm text-slate-600 dark:text-slate-400">
                                    {{ $patient->extraInfo->historyBreath }}
                                </p>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

</div>
</body>
</html>