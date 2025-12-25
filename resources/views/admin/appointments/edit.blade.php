@extends('layouts.admin')
@section('title', 'Chỉnh sửa Lịch hẹn - HealthBooker')
@section('page-title', 'Chỉnh sửa Lịch hẹn')

@push('styles')
<style>
    .avatar-initials {
        height: 32px;
        width: 32px;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 12px;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 9999px;
        padding: 2px 8px;
        font-size: 12px;
        font-weight: 500;
        border-width: 1px;
    }
    
    .status-dot {
        height: 6px;
        width: 6px;
        border-radius: 9999px;
        margin-right: 4px;
    }
</style>
@endpush

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.manage-bookings') }}" class="inline-flex items-center gap-2 text-primary hover:text-blue-600">
        <span class="material-symbols-outlined">arrow_back</span>
        Quay lại danh sách
    </a>
</div>

<div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
            Chỉnh sửa lịch hẹn #{{ $appointment->id }}
        </h2>
        @php
            $statusColors = [
                'amber' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'dark_bg' => 'dark:bg-amber-900/30', 'dark_text' => 'dark:text-amber-400', 'border' => 'border-amber-200', 'dark_border' => 'dark:border-amber-800', 'dot' => 'bg-amber-600'],
                'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dark_bg' => 'dark:bg-green-900/30', 'dark_text' => 'dark:text-green-400', 'border' => 'border-green-200', 'dark_border' => 'dark:border-green-800', 'dot' => 'bg-green-600'],
                'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'dark_bg' => 'dark:bg-red-900/30', 'dark_text' => 'dark:text-red-400', 'border' => 'border-red-200', 'dark_border' => 'dark:border-red-800', 'dot' => 'bg-red-600'],
                'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'dark_bg' => 'dark:bg-blue-900/30', 'dark_text' => 'dark:text-blue-400', 'border' => 'border-blue-200', 'dark_border' => 'dark:border-blue-800', 'dot' => 'bg-blue-600'],
            ];
            $colors = $statusColors[$appointment->statusInfo['class']] ?? $statusColors['blue'];
        @endphp
        <span class="inline-flex items-center rounded-full {{ $colors['bg'] }} px-3 py-1 text-sm font-medium {{ $colors['text'] }} {{ $colors['dark_bg'] }} {{ $colors['dark_text'] }} border {{ $colors['border'] }} {{ $colors['dark_border'] }}">
            <span class="mr-1.5 h-2 w-2 rounded-full {{ $colors['dot'] }}"></span>
            {{ $appointment->statusInfo['text'] }}
        </span>
    </div>

    <form method="POST" action="{{ route('admin.appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Thông tin bệnh nhân -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4 pb-2 border-b border-slate-200 dark:border-slate-700">
                        Thông tin bệnh nhân
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Họ tên <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $appointment->name) }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Giới tính <span class="text-red-500">*</span>
                                </label>
                                <select
                                    name="gender"
                                    class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                    required
                                >
                                    <option value="Nam" {{ old('gender', $appointment->gender) == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ old('gender', $appointment->gender) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    <option value="Khác" {{ old('gender', $appointment->gender) == 'Khác' ? 'selected' : '' }}>Khác</option>
                                </select>
                                @error('gender')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Ngày sinh
                                </label>
                                <input
                                    type="date"
                                    name="date_of_birth"
                                    value="{{ old('date_of_birth', $appointment->date_of_birth) }}"
                                    max="{{ date('Y-m-d') }}"
                                    class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                />
                                @error('date_of_birth')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Số điện thoại <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="tel"
                                name="phone"
                                value="{{ old('phone', $appointment->phone) }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            />
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $appointment->email) }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Địa chỉ
                            </label>
                            <input
                                type="text"
                                name="address"
                                value="{{ old('address', $appointment->address) }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                            />
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thông tin lịch hẹn -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4 pb-2 border-b border-slate-200 dark:border-slate-700">
                        Thông tin lịch hẹn
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Bác sĩ <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="doctorId"
                                id="doctorSelect"
                                onchange="loadAvailableTimes()"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            >
                                <option value="">Chọn bác sĩ</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" 
                                        {{ old('doctorId', $appointment->doctorId) == $doctor->id ? 'selected' : '' }}
                                        data-specialization="{{ $doctor->specialization->id ?? '' }}">
                                        {{ $doctor->user->name }} - {{ $doctor->specialization->name ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('doctorId')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Ngày hẹn <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="date"
                                name="dateBooking"
                                id="dateBooking"
                                value="{{ old('dateBooking', $appointment->dateBooking) }}"
                                onchange="loadAvailableTimes()"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            />
                            @error('dateBooking')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Giờ hẹn <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="timeBooking"
                                id="timeSelect"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            >
                                <option value="">Chọn giờ hẹn</option>
                                @foreach($availableTimes as $time)
                                    <option value="{{ $time->time }}" 
                                        {{ old('timeBooking', $appointment->timeBooking) == $time->time ? 'selected' : '' }}
                                        data-max="{{ $time->maxBooking }}"
                                        data-current="{{ $time->sumBooking }}">
                                        {{ \Carbon\Carbon::parse($time->time)->format('H:i') }} 
                                        ({{ $time->sumBooking }}/{{ $time->maxBooking }})
                                    </option>
                                @endforeach
                            </select>
                            @error('timeBooking')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Trạng thái <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="statusId"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            >
                                <option value="1" {{ old('statusId', $appointment->statusId) == 1 ? 'selected' : '' }}>Chờ xác nhận</option>
                                <option value="2" {{ old('statusId', $appointment->statusId) == 2 ? 'selected' : '' }}>Đã xác nhận</option>
                                <option value="3" {{ old('statusId', $appointment->statusId) == 3 ? 'selected' : '' }}>Đã hoàn thành</option>
                                <option value="4" {{ old('statusId', $appointment->statusId) == 4 ? 'selected' : '' }}>Đã hủy</option>
                            </select>
                            @error('statusId')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="cancelReasonField" style="{{ old('statusId', $appointment->statusId) == 4 ? '' : 'display: none;' }}">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Lý do hủy
                            </label>
                            <textarea
                                name="cancellation_reason"
                                rows="2"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                placeholder="Nhập lý do hủy nếu có"
                            >{{ old('cancellation_reason', $appointment->cancellation_reason) }}</textarea>
                            @error('cancellation_reason')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4 pb-2 border-b border-slate-200 dark:border-slate-700">
                        Mô tả / Ghi chú
                    </h3>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                            Mô tả triệu chứng / Ghi chú
                        </label>
                        <textarea
                            name="description"
                            rows="4"
                            class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                            placeholder="Nhập mô tả triệu chứng hoặc ghi chú..."
                        >{{ old('description', $appointment->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Action buttons -->
        <div class="flex items-center justify-between pt-6 mt-6 border-t border-slate-200 dark:border-slate-700">
            <div>
                <a href="{{ route('admin.appointments.show', $appointment->id) }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-100">
                    <span class="material-symbols-outlined">visibility</span>
                    Xem chi tiết
                </a>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.manage-bookings') }}" 
                   class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-100">
                    Hủy
                </a>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-primary hover:bg-blue-600 rounded-lg transition-colors">
                    Cập nhật lịch hẹn
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function loadAvailableTimes() {
    const doctorId = document.getElementById('doctorSelect').value;
    const date = document.getElementById('dateBooking').value;
    const timeSelect = document.getElementById('timeSelect');
    
    if (!doctorId || !date) {
        timeSelect.innerHTML = '<option value="">Chọn giờ hẹn</option>';
        return;
    }
    
    // Hiển thị loading
    timeSelect.innerHTML = '<option value="">Đang tải giờ khả dụng...</option>';
    timeSelect.disabled = true;
    
    fetch(`/manage-bookings/times/available?doctorId=${doctorId}&date=${date}`, {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            timeSelect.innerHTML = '<option value="">Chọn giờ hẹn</option>';
            
            if (data.times.length > 0) {
                data.times.forEach(time => {
                    const timeStr = time.time;
                    const formattedTime = timeStr.includes(':') ? timeStr : 
                        timeStr.substring(0, 2) + ':' + timeStr.substring(2, 4);
                    const option = document.createElement('option');
                    option.value = time.time;
                    option.textContent = `${formattedTime} (${time.sumBooking}/${time.maxBooking})`;
                    option.dataset.max = time.maxBooking;
                    option.dataset.current = time.sumBooking;
                    timeSelect.appendChild(option);
                });
            } else {
                timeSelect.innerHTML = '<option value="">Không có giờ khả dụng</option>';
            }
        } else {
            timeSelect.innerHTML = '<option value="">Lỗi khi tải dữ liệu</option>';
        }
        timeSelect.disabled = false;
    })
    .catch(error => {
        console.error('Error loading times:', error);
        timeSelect.innerHTML = '<option value="">Lỗi khi tải dữ liệu</option>';
        timeSelect.disabled = false;
    });
}

// Hiển thị/ẩn lý do hủy khi chọn trạng thái
document.querySelector('[name="statusId"]').addEventListener('change', function() {
    const cancelReasonField = document.getElementById('cancelReasonField');
    if (this.value == '4') {
        cancelReasonField.style.display = 'block';
    } else {
        cancelReasonField.style.display = 'none';
    }
});

// Auto load available times when page loads if doctor and date are selected
document.addEventListener('DOMContentLoaded', function() {
    const doctorId = document.getElementById('doctorSelect').value;
    const date = document.getElementById('dateBooking').value;
    
    if (doctorId && date) {
        loadAvailableTimes();
    }
});
</script>
@endsection