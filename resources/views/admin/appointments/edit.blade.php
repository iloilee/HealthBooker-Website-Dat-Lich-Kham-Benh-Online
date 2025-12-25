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
    
    /* Toast Notification Styles */
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }
    
    .toast {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-left: 4px solid;
        margin-bottom: 10px;
        min-width: 300px;
        max-width: 400px;
        animation: slideIn 0.3s ease-out;
        transition: transform 0.3s ease-out, opacity 0.3s ease-out;
    }
    
    .toast.success {
        border-left-color: #10b981;
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    }
    
    .toast.error {
        border-left-color: #ef4444;
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
    }
    
    .toast.warning {
        border-left-color: #f59e0b;
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
    }
    
    .toast.info {
        border-left-color: #137fec;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }
    
    .toast-icon {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .toast.success .toast-icon {
        background-color: #10b981;
        color: white;
    }
    
    .toast.error .toast-icon {
        background-color: #ef4444;
        color: white;
    }
    
    .toast.warning .toast-icon {
        background-color: #f59e0b;
        color: white;
    }
    
    .toast.info .toast-icon {
        background-color: #137fec;
        color: white;
    }
    
    .toast-content {
        flex: 1;
    }
    
    .toast-title {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
    }
    
    .toast-message {
        font-size: 13px;
        color: #4b5563;
    }
    
    .toast-close {
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 4px;
        border-radius: 4px;
        transition: background-color 0.2s;
    }
    
    .toast-close:hover {
        background-color: rgba(0, 0, 0, 0.05);
        color: #6b7280;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .toast.hiding {
        transform: translateX(100%);
        opacity: 0;
    }
</style>
@endpush

@section('content')
<!-- Toast Container -->
<div id="toastContainer" class="toast-container"></div>

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

    <form method="POST" action="{{ route('admin.appointments.update', $appointment->id) }}" id="editForm">
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
                                    value="{{ old('date_of_birth', $appointment->date_of_birth ? \Carbon\Carbon::parse($appointment->date_of_birth)->format('Y-m-d') : '') }}"
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
                                value="{{ old('dateBooking', $appointment->dateBooking ? \Carbon\Carbon::parse($appointment->dateBooking)->format('Y-m-d') : '') }}"
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
                                    @php
                                        // Format time từ database (vd: "08:00:00") thành "08:00" cho hiển thị
                                        $timeStr = $time->time;
                                        $formattedTime = $timeStr;
                                        if (strlen($timeStr) == 8) {
                                            $formattedTime = substr($timeStr, 0, 5);
                                        }
                                        
                                        // Format current appointment time để so sánh
                                        $currentTime = $appointment->timeBooking;
                                        $currentFormattedTime = $currentTime;
                                        if (strlen($currentTime) == 8) {
                                            $currentFormattedTime = substr($currentTime, 0, 5);
                                        }
                                    @endphp
                                    <option value="{{ $timeStr }}" 
                                        {{ old('timeBooking', $currentTime) == $timeStr ? 'selected' : '' }}
                                        data-max="{{ $time->maxBooking }}"
                                        data-current="{{ $time->sumBooking }}">
                                        {{ $formattedTime }} 
                                        ({{ $time->sumBooking }}/{{ $time->maxBooking }})
                                    </option>
                                @endforeach
                            </select>
                            <p id="timeHelp" class="mt-1 text-xs text-slate-500">
                                Chỉ hiển thị các khung giờ còn chỗ trống
                            </p>
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
                                id="statusSelect"
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
                                id="cancellationReason"
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
                        id="submitButton"
                        class="px-4 py-2 text-sm font-medium text-white bg-primary hover:bg-blue-600 rounded-lg transition-colors">
                    Cập nhật lịch hẹn
                </button>
            </div>
        </div>
    </form>
</div>

<script>
// Toast Notification System
function showToast(type, title, message, duration = 3000) {
    const container = document.getElementById('toastContainer');
    
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    
    // Icon based on type
    let icon = '';
    switch(type) {
        case 'success':
            icon = '<span class="material-symbols-outlined text-sm">check_circle</span>';
            break;
        case 'error':
            icon = '<span class="material-symbols-outlined text-sm">error</span>';
            break;
        case 'warning':
            icon = '<span class="material-symbols-outlined text-sm">warning</span>';
            break;
        case 'info':
            icon = '<span class="material-symbols-outlined text-sm">info</span>';
            break;
    }
    
    toast.innerHTML = `
        <div class="toast-icon">${icon}</div>
        <div class="toast-content">
            <div class="toast-title">${title}</div>
            <div class="toast-message">${message}</div>
        </div>
        <button type="button" class="toast-close">
            <span class="material-symbols-outlined text-lg">close</span>
        </button>
    `;
    
    // Add to container
    container.appendChild(toast);
    
    // Auto remove after duration
    const autoRemove = setTimeout(() => {
        removeToast(toast);
    }, duration);
    
    // Close button handler
    const closeBtn = toast.querySelector('.toast-close');
    closeBtn.addEventListener('click', () => {
        clearTimeout(autoRemove);
        removeToast(toast);
    });
    
    return toast;
}

function removeToast(toast) {
    toast.classList.add('hiding');
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 300);
}

function loadAvailableTimes() {
    const doctorId = document.getElementById('doctorSelect').value;
    const date = document.getElementById('dateBooking').value;
    const timeSelect = document.getElementById('timeSelect');
    const currentSelectedTime = "{{ $appointment->timeBooking }}";
    
    if (!doctorId || !date) {
        timeSelect.innerHTML = '<option value="">Chọn giờ hẹn</option>';
        return;
    }
    
    // Hiển thị loading
    timeSelect.innerHTML = '<option value="">Đang tải giờ khả dụng...</option>';
    timeSelect.disabled = true;
    
    // Tạo URL với tham số
    const url = `/manage-bookings/times/available?doctorId=${doctorId}&date=${date}`;
    
    fetch(url, {
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => {
        if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
        }
        return res.json();
    })
    .then(data => {
        if (data.success) {
            timeSelect.innerHTML = '<option value="">Chọn giờ hẹn</option>';
            
            if (data.times && data.times.length > 0) {
                // Format current time để so sánh
                let currentTimeValue = "{{ $appointment->timeBooking }}";
                let currentTimeForCompare = currentTimeValue;
                if (currentTimeValue.length == 8) {
                    currentTimeForCompare = currentTimeValue.substring(0, 5);
                }
                
                let hasCurrentTime = false;
                
                data.times.forEach(time => {
                    const timeStr = time.time;
                    // Format time để hiển thị và so sánh
                    let formattedTime = timeStr;
                    let timeForCompare = timeStr;
                    if (timeStr.length == 8) {
                        formattedTime = timeStr.substring(0, 5);
                        timeForCompare = timeStr.substring(0, 5);
                    }
                    
                    const option = document.createElement('option');
                    option.value = time.time; // Lưu giá trị đầy đủ (08:00:00)
                    option.textContent = `${formattedTime} (${time.sumBooking}/${time.maxBooking})`;
                    option.dataset.max = time.maxBooking;
                    option.dataset.current = time.sumBooking;
                    
                    // Check if this is the currently selected time
                    if (currentTimeValue && timeStr === currentTimeValue) {
                        option.selected = true;
                        hasCurrentTime = true;
                    } else if (currentTimeForCompare && timeForCompare === currentTimeForCompare) {
                        // So sánh không có seconds
                        option.selected = true;
                        hasCurrentTime = true;
                    }
                    
                    timeSelect.appendChild(option);
                });
                
                // Nếu current time không có trong danh sách khả dụng, thêm nó vào
                if (currentTimeValue && !hasCurrentTime) {
                    // Format time để hiển thị
                    let formattedTime = currentTimeValue;
                    if (currentTimeValue.length == 8) {
                        formattedTime = currentTimeValue.substring(0, 5);
                    }
                    
                    const option = document.createElement('option');
                    option.value = currentTimeValue;
                    option.textContent = `${formattedTime} (Đã đặt)`;
                    option.selected = true;
                    option.style.color = '#ef4444'; // Màu đỏ để báo hiệu
                    
                    timeSelect.insertBefore(option, timeSelect.firstChild.nextSibling);
                }
            } else {
                timeSelect.innerHTML = '<option value="">Không có giờ khả dụng</option>';
                // Thêm current time nếu có
                if (currentTimeValue) {
                    let formattedTime = currentTimeValue;
                    if (currentTimeValue.length == 8) {
                        formattedTime = currentTimeValue.substring(0, 5);
                    }
                    
                    const option = document.createElement('option');
                    option.value = currentTimeValue;
                    option.textContent = `${formattedTime} (Đã đặt)`;
                    option.selected = true;
                    option.style.color = '#ef4444'; // Màu đỏ để báo hiệu
                    
                    timeSelect.appendChild(option);
                }
            }
        } else {
            timeSelect.innerHTML = '<option value="">Lỗi khi tải dữ liệu</option>';
            console.error('API error:', data.message);
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
document.getElementById('statusSelect').addEventListener('change', function() {
    const cancelReasonField = document.getElementById('cancelReasonField');
    if (this.value == '4') {
        cancelReasonField.style.display = 'block';
    } else {
        cancelReasonField.style.display = 'none';
    }
});

// Xử lý form submit với AJAX
document.getElementById('editForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const submitBtn = document.getElementById('submitButton');
    const originalBtnText = submitBtn.textContent;
    
    // Disable button và show loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <div class="flex items-center justify-center gap-2">
            <div class="h-4 w-4 animate-spin rounded-full border-2 border-white border-t-transparent"></div>
            Đang xử lý...
        </div>
    `;
    
    try {
        // Lấy form data
        const formData = new FormData(form);
        
        // Send AJAX request
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Show success toast
            showToast('success', 'Thành công!', data.message || 'Đã cập nhật lịch hẹn thành công');
            
            // Điều hướng sau 3 giây
            setTimeout(() => {
                window.location.href = "{{ route('admin.manage-bookings') }}";
            }, 3000);
        } else {
            // Show error toast
            showToast('error', 'Lỗi!', data.message || 'Có lỗi xảy ra khi cập nhật');
            
            // Re-enable button
            submitBtn.disabled = false;
            submitBtn.textContent = originalBtnText;
            
            // Clear existing errors first
            const existingErrors = form.querySelectorAll('.validation-error');
            existingErrors.forEach(error => error.remove());
            
            // Show validation errors if any
            if (data.errors) {
                Object.keys(data.errors).forEach(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    if (input) {
                        const errorElement = document.createElement('p');
                        errorElement.className = 'mt-1 text-sm text-red-600 validation-error';
                        errorElement.textContent = data.errors[field][0];
                        
                        // Insert after the input
                        input.parentNode.appendChild(errorElement);
                        
                        // Highlight input
                        input.classList.add('border-red-500');
                        input.classList.remove('border-slate-200', 'dark:border-slate-700');
                    }
                });
            }
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('error', 'Lỗi!', 'Có lỗi xảy ra khi kết nối với máy chủ');
        
        // Re-enable button
        submitBtn.disabled = false;
        submitBtn.textContent = originalBtnText;
    }
});

// Auto load available times when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Chạy loadAvailableTimes sau khi page đã load xong
    setTimeout(() => {
        const doctorId = document.getElementById('doctorSelect').value;
        const date = document.getElementById('dateBooking').value;
        
        if (doctorId && date) {
            loadAvailableTimes();
        }
    }, 100);
    
    // Check for success message from session (nếu có)
    @if(session('success'))
        showToast('success', 'Thành công!', '{{ session('success') }}');
    @endif
    
    @if(session('error'))
        showToast('error', 'Lỗi!', '{{ session('error') }}');
    @endif
});
</script>
@endsection