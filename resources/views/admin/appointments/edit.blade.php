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
<!-- Toast Container -->
<div
  id="toast"
  class="fixed top-5 right-5 z-50 max-w-xs rounded-lg bg-green-500 p-4 text-white shadow-lg opacity-0 transform translate-x-10 transition-all duration-500 hidden"
>
  <div class="flex justify-between items-center">
    <span id="toast-message">Đang cập nhật lịch hẹn...</span>
    <button onclick="closeToast()" class="ml-2 font-bold hover:text-green-200">&times;</button>
  </div>

  <div class="mt-2 h-1 w-full bg-green-300 rounded">
    <div id="toast-progress" class="h-1 bg-white rounded w-full"></div>
  </div>
</div>
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

@push('toast-scripts')
<script>

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

// Xử lý form submit với toast notification mới
document.getElementById('editForm').addEventListener('submit', function(e) {
    // Cho phép validation của HTML5 hoạt động
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }
    
    e.preventDefault();
    
    const form = this;
    const submitBtn = document.getElementById('submitButton');
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');
    const progress = document.getElementById('toast-progress');
    const duration = 3000;
    let start;
    
    // Cập nhật nội dung toast
    toastMessage.textContent = 'Cập nhật lịch hẹn thành công!';
    toast.classList.remove('bg-red-500', 'bg-yellow-500');
    toast.classList.add('bg-green-500');
    
    // Disable button và hiển thị loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <div class="flex items-center justify-center gap-2">
            <div class="h-4 w-4 animate-spin rounded-full border-2 border-white border-t-transparent"></div>
            Đang xử lý...
        </div>
    `;
    
    // Hiển thị toast
    toast.classList.remove('hidden', 'opacity-0', 'translate-x-10');
    toast.classList.add('opacity-100', 'translate-x-0');
    
    // Reset progress bar
    progress.style.width = '100%';
    
    // Animation progress bar
    function animateProgress(timestamp) {
        if (!start) start = timestamp;
        const elapsed = timestamp - start;
        const percent = Math.max(0, 100 - (elapsed / duration * 100));
        progress.style.width = percent + '%';

        if (elapsed < duration) {
            requestAnimationFrame(animateProgress);
        }
    }
    
    // Bắt đầu progress bar animation
    requestAnimationFrame(animateProgress);
    
    // Gửi form sau 3 giây
    setTimeout(() => {
        closeToast();
        
        // Enable button lại
        submitBtn.disabled = false;
        submitBtn.textContent = 'Cập nhật lịch hẹn';
        
        // Submit form
        form.submit();
    }, duration);
});

// Hàm closeToast global
window.closeToast = function() {
    const toast = document.getElementById('toast');
    const progress = document.getElementById('toast-progress');
    
    toast.classList.add('opacity-0', 'translate-x-10');
    progress.style.width = '0%';
    
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 500);
};

// Auto load available times khi page loads
document.addEventListener('DOMContentLoaded', function() {
    // Chạy loadAvailableTimes sau khi page đã load xong
    setTimeout(() => {
        const doctorId = document.getElementById('doctorSelect').value;
        const date = document.getElementById('dateBooking').value;
        
        if (doctorId && date) {
            loadAvailableTimes();
        }
    }, 100);
    const doctorSelect = document.getElementById('doctorSelect');
    const dateInput   = document.getElementById('dateBooking');

    if (doctorSelect) {
        doctorSelect.addEventListener('change', loadAvailableTimes);
    }

    if (dateInput) {
        dateInput.addEventListener('change', loadAvailableTimes);
    }
});
</script>
@endpush
@endsection