@extends('layouts.admin')
@section('title', 'Chi tiết Bệnh nhân - HealthBooker')
@section('page-title', 'Chi tiết Bệnh nhân')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.manage-patients') }}" class="inline-flex items-center gap-2 text-primary hover:text-primary/80">
        <span class="material-symbols-outlined">arrow_back</span>
        <span>Quay lại danh sách</span>
    </a>
</div>

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <!-- Thông tin cá nhân -->
    <div class="lg:col-span-1">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-850">
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Thông tin cá nhân</h3>
            </div>
            
            <div class="flex flex-col items-center gap-4">
                @if($patient->avatar)
                    <img src="{{ $patient->avatar }}" alt="Avatar" class="h-24 w-24 rounded-full object-cover">
                @else
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-primary/10 text-2xl font-bold text-primary">
                        {{ strtoupper(substr($patient->name, 0, 2)) }}
                    </div>
                @endif
                
                <div class="text-center">
                    <h4 class="text-xl font-semibold text-slate-900 dark:text-slate-100">{{ $patient->name }}</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $patient->formatted_id }}</p>
                    <div class="mt-2">
                        @if($patient->isActive)
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Đang hoạt động
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                Đã khóa
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mt-6 space-y-4">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-slate-400">person</span>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Giới tính</p>
                        <p class="font-medium text-slate-900 dark:text-slate-100">{{ $patient->gender }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-slate-400">cake</span>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Ngày sinh</p>
                        <p class="font-medium text-slate-900 dark:text-slate-100">
                            {{ optional($lastAppointment)->date_of_birth
                                ? \Carbon\Carbon::parse($lastAppointment->date_of_birth)->format('d/m/Y')
                                : 'Chưa cập nhật'
                            }}
                        </p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-slate-400">phone</span>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Điện thoại</p>
                        <p class="font-medium text-slate-900 dark:text-slate-100">{{ $patient->phone ?? 'Chưa cập nhật' }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-slate-400">mail</span>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Email</p>
                        <p class="font-medium text-slate-900 dark:text-slate-100">{{ $patient->email }}</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-slate-400">home</span>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Địa chỉ</p>
                        <p class="font-medium text-slate-900 dark:text-slate-100">{{ $patient->address ?? 'Chưa cập nhật' }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-slate-400">calendar_month</span>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Ngày tạo tài khoản</p>
                        <p class="font-medium text-slate-900 dark:text-slate-100">
                            {{ $patient->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Lịch sử khám bệnh -->
    <div class="lg:col-span-2">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-850">
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Lịch sử khám bệnh</h3>
                <div class="rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-medium dark:bg-slate-800">
                    Tổng: {{ $totalAppointments }} lần khám
                </div>
            </div>
            
            @if($patient->patients->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b border-slate-200 dark:border-slate-800">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-slate-600 dark:text-slate-400">Ngày khám</th>
                                <th class="px-4 py-3 text-left font-medium text-slate-600 dark:text-slate-400">Bác sĩ</th>
                                <th class="px-4 py-3 text-left font-medium text-slate-600 dark:text-slate-400">Chuyên khoa</th>
                                <th class="px-4 py-3 text-left font-medium text-slate-600 dark:text-slate-400">Trạng thái</th>
                                {{-- <th class="px-4 py-3 text-left font-medium text-slate-600 dark:text-slate-400">Thao tác</th> --}}
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                            @foreach($patient->patients as $appointment)
                                <tr>
                                    <td class="px-4 py-3">
                                        <p class="font-medium text-slate-900 dark:text-slate-100">
                                            {{ \Carbon\Carbon::parse($appointment->dateBooking)->format('d/m/Y') }}
                                        </p>
                                        <p class="text-xs text-slate-500">{{ $appointment->timeBooking ?? '--:--' }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                        <p class="font-medium text-slate-900 dark:text-slate-100">
                                            {{ $appointment->doctor->user->name ?? 'Không xác định' }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $appointment->doctor->specialization->name ?? 'Không xác định' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($appointment->status)
                                            <span class="inline-flex items-center gap-1 rounded-full px-3 py-1 text-xs font-medium {{ 
                                                $appointment->status->name == 'Đã xác nhận' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 
                                                ($appointment->status->name == 'Đang chờ' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 
                                                'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400')
                                            }}">
                                                {{ $appointment->status->name }}
                                            </span>
                                        @endif
                                    </td>
                                    {{-- <td class="px-4 py-3">
                                        <a href="#" class="text-primary hover:text-primary/80">Xem chi tiết</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="py-12 text-center">
                    <span class="material-symbols-outlined mx-auto mb-4 text-4xl text-slate-300">clinical_notes</span>
                    <p class="text-slate-500 dark:text-slate-400">Bệnh nhân chưa có lịch sử khám bệnh</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function editPatient(id) {
        window.location.href = `/quantrivien/manage-patients?edit=${id}`;
    }
</script>
@endsection