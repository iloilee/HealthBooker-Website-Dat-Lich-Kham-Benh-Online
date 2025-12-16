@extends('layouts.app')

@section('content')
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
                                    {{ $patient->year ? $patient->year . ' (' . (date('Y') - $patient->year) . ' tuổi)' : 'Chưa cập nhật' }}
                                </span>
                                @if($patient->gender)
                                <span class="inline-flex items-center gap-1 text-sm text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-3 py-1 rounded-full">
                                    <span class="material-symbols-outlined text-base">person</span>
                                    {{ $patient->gender }}
                                </span>
                                @endif
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
@endsection