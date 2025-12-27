{{-- resources/views/admin/manage-reports.blade.php --}}
@extends('layouts.admin')
@section('title', 'Báo cáo & Thống kê - HealthBooker')
@section('page-title', 'Báo cáo & Thống kê')

@section('content')
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div class="flex items-center gap-3">
        <span class="text-sm font-medium text-slate-600 dark:text-slate-400">Thời gian:</span>
        <div class="relative">
            <form method="GET" action="{{ route('admin.manage-reports') }}" id="filterForm">
                <select name="filter" id="filter" 
                    class="rounded-lg border-slate-200 py-2 pl-3 pr-10 text-sm font-medium focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200"
                    onchange="this.form.submit()">
                    <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Hôm nay</option>
                    <option value="week" {{ $filter == 'week' ? 'selected' : '' }}>Tuần này</option>
                    <option value="month" {{ $filter == 'month' ? 'selected' : '' }}>Tháng này</option>
                    <option value="year" {{ $filter == 'year' ? 'selected' : '' }}>Năm nay</option>
                    <option value="custom" {{ $filter == 'custom' ? 'selected' : '' }}>Tùy chỉnh</option>
                </select>
                
                @if($filter == 'custom')
                <div class="mt-2 flex gap-2">
                    <input type="date" name="start_date" value="{{ $startDate->format('Y-m-d') }}" 
                        class="rounded-lg border-slate-200 py-1 px-2 text-sm">
                    <span class="self-center">đến</span>
                    <input type="date" name="end_date" value="{{ $endDate->format('Y-m-d') }}" 
                        class="rounded-lg border-slate-200 py-1 px-2 text-sm">
                    <button type="submit" class="rounded-lg bg-primary px-3 py-1 text-sm text-white">Áp dụng</button>
                </div>
                @endif
            </form>
        </div>
    </div>
    <a href="{{ route('admin.reports.export', ['filter' => $filter, 'start_date' => $startDate, 'end_date' => $endDate]) }}" 
       class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary/90 transition-colors">
        <span class="material-symbols-outlined !text-xl">download</span>
        Xuất báo cáo
    </a>
</div>

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <!-- Tổng cuộc hẹn -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Tổng cuộc hẹn</p>
                <h3 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                    {{ number_format($stats['totalAppointments']) }}
                </h3>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                <span class="material-symbols-outlined">event_note</span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2">
            @php
                $growthClass = $stats['appointmentGrowth'] >= 0 
                    ? 'text-green-600 dark:text-green-400' 
                    : 'text-red-600 dark:text-red-400';
                $icon = $stats['appointmentGrowth'] >= 0 ? 'trending_up' : 'trending_down';
            @endphp
            <span class="flex items-center text-xs font-medium {{ $growthClass }}">
                <span class="material-symbols-outlined !text-sm">{{ $icon }}</span>
                {{ number_format(abs($stats['appointmentGrowth']), 1) }}%
            </span>
            <span class="text-xs text-slate-500 dark:text-slate-400">so với tháng trước</span>
        </div>
    </div>

    <!-- Bệnh nhân mới -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Bệnh nhân mới</p>
                <h3 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                    {{ number_format($stats['newPatients']) }}
                </h3>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                <span class="material-symbols-outlined">person_add</span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2">
            @php
                $growthClass = $stats['patientGrowth'] >= 0 
                    ? 'text-green-600 dark:text-green-400' 
                    : 'text-red-600 dark:text-red-400';
                $icon = $stats['patientGrowth'] >= 0 ? 'trending_up' : 'trending_down';
            @endphp
            <span class="flex items-center text-xs font-medium {{ $growthClass }}">
                <span class="material-symbols-outlined !text-sm">{{ $icon }}</span>
                {{ number_format(abs($stats['patientGrowth']), 1) }}%
            </span>
            <span class="text-xs text-slate-500 dark:text-slate-400">so với tháng trước</span>
        </div>
    </div>

    <!-- Doanh thu -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Doanh thu</p>
                <h3 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                    {{ number_format($stats['revenue'] / 1000000, 1) }}M
                    <span class="text-sm font-normal text-slate-500">vnđ</span>
                </h3>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400">
                <span class="material-symbols-outlined">payments</span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2">
            @php
                $growthClass = $stats['revenueGrowth'] >= 0 
                    ? 'text-green-600 dark:text-green-400' 
                    : 'text-red-600 dark:text-red-400';
                $icon = $stats['revenueGrowth'] >= 0 ? 'trending_up' : 'trending_down';
            @endphp
            <span class="flex items-center text-xs font-medium {{ $growthClass }}">
                <span class="material-symbols-outlined !text-sm">{{ $icon }}</span>
                {{ number_format(abs($stats['revenueGrowth']), 1) }}%
            </span>
            <span class="text-xs text-slate-500 dark:text-slate-400">so với tháng trước</span>
        </div>
    </div>

    <!-- Đánh giá TB -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Đánh giá TB</p>
                <h3 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                    {{ number_format($stats['averageRating'], 1) }}<span class="text-sm text-slate-400">/5</span>
                </h3>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400">
                <span class="material-symbols-outlined">star</span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2">
            <span class="flex items-center text-xs font-medium text-slate-600 dark:text-slate-400">
                @php
                    $fullStars = floor($stats['averageRating']);
                    $hasHalfStar = $stats['averageRating'] - $fullStars >= 0.5;
                @endphp
                @for($i = 0; $i < $fullStars; $i++)
                    <span class="material-symbols-outlined !text-sm filled" style="font-variation-settings: 'FILL' 1">star</span>
                @endfor
                @if($hasHalfStar)
                    <span class="material-symbols-outlined !text-sm filled" style="font-variation-settings: 'FILL' 1">star_half</span>
                @endif
            </span>
            <span class="text-xs text-slate-500 dark:text-slate-400">từ {{ number_format($stats['totalReviews']) }} lượt</span>
        </div>
    </div>
</div>

<!-- Biểu đồ thống kê tuần -->
<div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-6">
        <div class="mb-6 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Thống kê cuộc hẹn (Tuần này)</h3>
        </div>
        <div class="relative h-64 w-full">
            <div class="absolute inset-0 flex flex-col justify-between text-xs text-slate-400">
                @for($i = 100; $i >= 0; $i -= 25)
                    <div class="border-b border-dashed border-slate-200 dark:border-slate-700 pb-2">
                        <span>{{ $i }}</span>
                    </div>
                @endfor
            </div>
            <div class="absolute inset-0 flex items-end justify-around px-4 pt-6">
                @foreach($weeklyAppointments as $day)
                <div class="group relative flex w-8 flex-col items-center justify-end gap-2">
                    <div class="relative w-full rounded-t bg-primary/20 dark:bg-primary/30 transition-all duration-300 group-hover:bg-primary"
                         style="height: {{ $day['percentage'] }}%">
                        <div class="absolute -top-8 left-1/2 hidden -translate-x-1/2 rounded bg-slate-800 px-2 py-1 text-xs text-white opacity-0 transition-opacity group-hover:opacity-100 group-hover:block whitespace-nowrap z-10">
                            {{ $day['count'] }}
                        </div>
                    </div>
                    <span class="text-xs font-medium text-slate-500">{{ $day['dayName'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Chuyên khoa phổ biến -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-6">
        <h3 class="mb-6 text-lg font-semibold text-slate-900 dark:text-white">Chuyên khoa phổ biến</h3>
        <div class="flex flex-col gap-5">
            @php
                $colors = ['bg-blue-500', 'bg-teal-500', 'bg-amber-500', 'bg-pink-500', 'bg-purple-500'];
                $colorIndex = 0;
            @endphp
            
            @foreach($specializationStats as $stat)
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="font-medium text-slate-700 dark:text-slate-300">{{ $stat['name'] }}</span>
                    <span class="text-slate-500 dark:text-slate-400">{{ number_format($stat['percentage'], 0) }}%</span>
                </div>
                <div class="h-2 w-full rounded-full bg-slate-100 dark:bg-slate-700">
                    <div class="h-2 rounded-full {{ $colors[$colorIndex] }}" style="width: {{ $stat['percentage'] }}%"></div>
                </div>
            </div>
            @php $colorIndex++; @endphp
            @endforeach
        </div>
    </div>
</div>

<!-- Bảng bác sĩ tiêu biểu -->
<div class="mt-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850">
    <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 p-4">
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Bác sĩ tiêu biểu ({{ now()->format('F Y') }})</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-600 dark:bg-slate-800/50 dark:text-slate-300">
                <tr>
                    <th class="px-4 py-3 font-medium">Bác sĩ</th>
                    <th class="px-4 py-3 font-medium">Chuyên khoa</th>
                    <th class="px-4 py-3 font-medium text-center">Cuộc hẹn hoàn thành</th>
                    <th class="px-4 py-3 font-medium text-center">Đánh giá</th>
                    <th class="px-4 py-3 font-medium text-right">Doanh thu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                @foreach($topDoctors as $doctor)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                {{ $doctor['initials'] }}
                            </div>
                            <span class="font-medium text-slate-900 dark:text-white">BS. {{ $doctor['name'] }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ $doctor['specialization'] }}</td>
                    <td class="px-4 py-3 text-center text-slate-900 dark:text-white font-medium">
                        {{ number_format($doctor['appointments_count']) }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2 py-0.5 text-xs font-medium text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">
                            <span>{{ number_format($doctor['rating'], 1) }}</span>
                            <span class="material-symbols-outlined !text-xs filled" style="font-variation-settings: 'FILL' 1">star</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-right text-slate-900 dark:text-white">
                        {{ number_format($doctor['revenue']) }}đ
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Có thể thêm JavaScript cho filter date range nếu cần
document.getElementById('filter').addEventListener('change', function() {
    if (this.value === 'custom') {
        // Hiển thị input date range
    }
});
</script>
@endpush