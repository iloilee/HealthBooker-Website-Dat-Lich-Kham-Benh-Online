@extends('layouts.admin')
@section('content')
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-5">
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-primary/20">
                <span class="material-symbols-outlined">stethoscope</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Tổng số Bác sĩ</p>
                <p class="text-2xl font-bold">{{ $totalDoctors }}</p>
            </div>
        </div>
    </div>
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-500/10 text-green-500 dark:bg-green-500/20">
                <span class="material-symbols-outlined">groups</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Tổng số Bệnh nhân</p>
                <p class="text-2xl font-bold">{{ $totalPatients }}</p>
            </div>
        </div>
    </div>
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-500/10 text-indigo-500 dark:bg-indigo-500/20">
                <span class="material-symbols-outlined">calendar_month</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Tổng số Lịch hẹn</p>
                <p class="text-2xl font-bold">{{ $totalAppointments }}</p>
            </div>
        </div>
    </div>
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-500/10 text-amber-500 dark:bg-amber-500/20">
                <span class="material-symbols-outlined">event</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Lịch hẹn hôm nay</p>
                <p class="text-2xl font-bold">{{ $todayAppointments }}</p>
            </div>
        </div>
    </div>
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-500/10 text-red-500 dark:bg-red-500/20">
                <span class="material-symbols-outlined">pending_actions</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Lịch hẹn chờ xác nhận</p>
                <p class="text-2xl font-bold">{{ $pendingAppointments }}</p>
            </div>
        </div>
    </div>
</div>
<div class="mt-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850">
    <div class="border-b border-slate-200 dark:border-slate-800 p-4">
        <h3 class="text-lg font-semibold">Lịch hẹn gần đây</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300">
                <tr>
                    <th class="px-4 py-3 font-medium">Bệnh nhân</th>
                    <th class="px-4 py-3 font-medium">Bác sĩ</th>
                    <th class="px-4 py-3 font-medium">Chuyên khoa</th>
                    <th class="px-4 py-3 font-medium">Ngày khám</th>
                    <th class="px-4 py-3 font-medium">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentAppointments as $appointment)
                <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">{{ $appointment->name ?? 'N/A' }}</td>
                    <td class="px-4 py-3">
                        @if($appointment->doctor && $appointment->doctor->user)
                            {{ $appointment->doctor->user->name ?? 'N/A' }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($appointment->doctor && $appointment->doctor->specialization)
                            {{ $appointment->doctor->specialization->name ?? 'N/A' }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($appointment->dateBooking && $appointment->timeBooking)
                            {{ \Carbon\Carbon::parse($appointment->dateBooking)->format('d/m/Y') }} - 
                            {{ \Carbon\Carbon::parse($appointment->timeBooking)->format('H:i') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @php
                          $statusColor = 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300';
                          if($appointment->status) {
                            switch ($appointment->status->id) {
                                case 1: // Chờ xác nhận
                                    $statusColor = 'bg-amber-100 text-amber-700 dark:bg-amber-900/50 dark:text-amber-300';
                                    break;
                                case 2: // Đã xác nhận
                                    $statusColor = 'bg-green-100 text-green-700 dark:bg-green-900/50 dark:text-green-300';
                                    break;
                                case 3: // Đã khám
                                    $statusColor = 'bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300';
                                    break;
                                case 4: // Hủy
                                    $statusColor = 'bg-red-100 text-red-700 dark:bg-red-900/50 dark:text-red-300';
                                    break;
                            }
                          }
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium {{ $statusColor }}">
                            {{ $appointment->status->name ?? 'Chưa xác định' }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-8 text-center text-slate-500">Không có lịch hẹn nào</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection