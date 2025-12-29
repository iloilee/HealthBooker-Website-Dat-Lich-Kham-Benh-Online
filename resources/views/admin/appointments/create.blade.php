@extends('layouts.admin')
@section('title', 'Tạo Lịch hẹn - HealthBooker')
@section('page-title', 'Tạo Lịch hẹn')

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
    <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-6">
        Tạo lịch hẹn mới
    </h2>

    <form method="POST" action="{{ route('admin.appointments.store') }}" id="createForm">
        @csrf
        
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
                                value="{{ old('name') }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                                placeholder="Nhập họ tên bệnh nhân"
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
                                    <option value="">Chọn giới tính</option>
                                    <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    <option value="Khác" {{ old('gender') == 'Khác' ? 'selected' : '' }}>Khác</option>
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
                                    value="{{ old('date_of_birth') }}"
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
                                value="{{ old('phone') }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                                placeholder="Nhập số điện thoại"
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
                                value="{{ old('email') }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                                placeholder="Nhập địa chỉ email"
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
                                value="{{ old('address') }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                placeholder="Nhập địa chỉ"
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
                                        {{ old('doctorId') == $doctor->id ? 'selected' : '' }}
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
                                value="{{ old('dateBooking') }}"
                                min="{{ date('Y-m-d') }}"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                required
                            />
                            <p class="mt-1 text-xs text-slate-500">
                                Ngày hẹn không được là ngày trong quá khứ
                            </p>
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
                                disabled
                            >
                                <option value="">Chọn giờ hẹn</option>
                            </select>
                            <p id="timeHelp" class="mt-1 text-xs text-slate-500">
                                Vui lòng chọn bác sĩ và ngày trước
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
                                <option value="1" {{ old('statusId') == 1 ? 'selected' : '' }}>Chờ xác nhận</option>
                                <option value="2" {{ old('statusId') == 2 ? 'selected' : '' }}>Đã xác nhận</option>
                                <option value="3" {{ old('statusId') == 3 ? 'selected' : '' }}>Đã hoàn thành</option>
                                <option value="4" {{ old('statusId') == 4 ? 'selected' : '' }}>Đã hủy</option>
                            </select>
                            @error('statusId')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="cancelReasonField" style="{{ old('statusId') == 4 ? '' : 'display: none;' }}">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Lý do hủy
                            </label>
                            <textarea
                                name="cancellation_reason"
                                id="cancellationReason"
                                rows="2"
                                class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                placeholder="Nhập lý do hủy nếu có"
                            >{{ old('cancellation_reason') }}</textarea>
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
                        >{{ old('description') }}</textarea>
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
                <button type="button" onclick="clearForm()" 
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-100">
                    <span class="material-symbols-outlined">refresh</span>
                    Xóa form
                </button>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.manage-bookings') }}" 
                   class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-100">
                    Hủy
                </a>
                <button type="submit" 
                        id="submitButton"
                        class="px-4 py-2 text-sm font-medium text-white bg-primary hover:bg-blue-600 rounded-lg transition-colors">
                    Tạo lịch hẹn
                </button>
            </div>
        </div>
    </form>
</div>

@push('toast-scripts')
<script>
// Toast container
const toastContainer = document.createElement('div');
toastContainer.id = 'toast-container';
toastContainer.className = 'fixed top-5 right-5 z-50 space-y-2';
document.body.appendChild(toastContainer);

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `max-w-xs rounded-lg p-4 text-white shadow-lg transform transition-all duration-300 ${
        type === 'success' ? 'bg-green-500' : 
        type === 'error' ? 'bg-red-500' : 
        type === 'warning' ? 'bg-yellow-500' : 'bg-blue-500'
    }`;
    
    const toastId = 'toast-' + Date.now();
    toast.id = toastId;
    
    toast.innerHTML = `
        <div class="flex justify-between items-center">
            <span>${message}</span>
            <button onclick="removeToast('${toastId}')" class="ml-2 font-bold hover:opacity-80">&times;</button>
        </div>
        <div class="mt-2 h-1 w-full bg-white bg-opacity-30 rounded">
            <div class="h-1 bg-white rounded progress-bar"></div>
        </div>
    `;
    
    toastContainer.appendChild(toast);
    
    // Progress bar animation
    const progressBar = toast.querySelector('.progress-bar');
    progressBar.style.width = '100%';
    
    let start = null;
    const duration = 3000;
    
    function animateProgress(timestamp) {
        if (!start) start = timestamp;
        const elapsed = timestamp - start;
        const percent = Math.max(0, 100 - (elapsed / duration * 100));
        progressBar.style.width = percent + '%';

        if (elapsed < duration) {
            requestAnimationFrame(animateProgress);
        } else {
            removeToast(toastId);
        }
    }
    
    requestAnimationFrame(animateProgress);
    
    return toastId;
}

function removeToast(id) {
    const toast = document.getElementById(id);
    if (toast) {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(10px)';
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }
}

// Load available times function
function loadAvailableTimes() {
    const doctorId = document.getElementById('doctorSelect').value;
    const date = document.getElementById('dateBooking').value;
    const timeSelect = document.getElementById('timeSelect');
    const timeHelp = document.getElementById('timeHelp');
    
    if (!doctorId || !date) {
        timeSelect.innerHTML = '<option value="">Chọn giờ hẹn</option>';
        timeSelect.disabled = true;
        timeHelp.textContent = 'Vui lòng chọn bác sĩ và ngày trước';
        return;
    }
    
    // Hiển thị loading
    timeSelect.innerHTML = '<option value="">Đang tải giờ khả dụng...</option>';
    timeSelect.disabled = true;
    timeHelp.textContent = 'Đang tải dữ liệu...';
    
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
                data.times.forEach(time => {
                    const timeStr = time.time;
                    // Format time để hiển thị
                    let formattedTime = timeStr;
                    if (timeStr.length == 8) {
                        formattedTime = timeStr.substring(0, 5);
                    }
                    
                    const option = document.createElement('option');
                    option.value = time.time; // Lưu giá trị đầy đủ (08:00:00)
                    option.textContent = `${formattedTime} (${time.sumBooking}/${time.maxBooking})`;
                    option.dataset.max = time.maxBooking;
                    option.dataset.current = time.sumBooking;
                    
                    timeSelect.appendChild(option);
                });
                
                timeSelect.disabled = false;
                timeHelp.textContent = `Có ${data.times.length} khung giờ khả dụng`;
            } else {
                timeSelect.innerHTML = '<option value="">Không có giờ khả dụng</option>';
                timeSelect.disabled = false;
                timeHelp.textContent = 'Không có khung giờ khả dụng cho bác sĩ vào ngày này';
            }
        } else {
            timeSelect.innerHTML = '<option value="">Lỗi khi tải dữ liệu</option>';
            timeSelect.disabled = false;
            timeHelp.textContent = 'Lỗi khi tải dữ liệu';
            console.error('API error:', data.message);
        }
    })
    .catch(error => {
        console.error('Error loading times:', error);
        timeSelect.innerHTML = '<option value="">Lỗi khi tải dữ liệu</option>';
        timeSelect.disabled = false;
        timeHelp.textContent = 'Lỗi kết nối máy chủ';
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

// Xử lý form submit
document.getElementById('createForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitBtn = document.getElementById('submitButton');
    
    // Validate required fields
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    // Disable button và hiển thị loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <div class="flex items-center justify-center gap-2">
            <div class="h-4 w-4 animate-spin rounded-full border-2 border-white border-t-transparent"></div>
            Đang xử lý...
        </div>
    `;
    
    // Hiển thị toast xử lý
    showToast('Đang tạo lịch hẹn...', 'info');
    
    // Submit form sau 1 giây
    setTimeout(() => {
        form.submit();
    }, 1000);
});

// Hàm xóa form
function clearForm() {
    if (confirm('Bạn có chắc chắn muốn xóa tất cả thông tin đã nhập?')) {
        document.getElementById('createForm').reset();
        document.getElementById('timeSelect').innerHTML = '<option value="">Chọn giờ hẹn</option>';
        document.getElementById('timeSelect').disabled = true;
        document.getElementById('timeHelp').textContent = 'Vui lòng chọn bác sĩ và ngày trước';
        document.getElementById('cancelReasonField').style.display = 'none';
        showToast('Đã xóa tất cả thông tin', 'warning');
    }
}

// Auto load available times khi page loads
document.addEventListener('DOMContentLoaded', function() {
    const doctorSelect = document.getElementById('doctorSelect');
    const dateInput = document.getElementById('dateBooking');
    const statusSelect = document.getElementById('statusSelect');
    
    if (doctorSelect) {
        doctorSelect.addEventListener('change', loadAvailableTimes);
    }
    
    if (dateInput) {
        dateInput.addEventListener('change', loadAvailableTimes);
    }
    
    if (statusSelect) {
        // Set min date to today
        dateInput.min = new Date().toISOString().split('T')[0];
    }
    
    // Check if there are old values and load times if needed
    const oldDoctorId = "{{ old('doctorId') }}";
    const oldDate = "{{ old('dateBooking') }}";
    
    if (oldDoctorId && oldDate) {
        setTimeout(() => {
            loadAvailableTimes();
        }, 500);
    }
});

// Hiển thị các lỗi từ server nếu có
@if($errors->any())
document.addEventListener('DOMContentLoaded', function() {
    @foreach($errors->all() as $error)
    showToast("{{ $error }}", 'error');
    @endforeach
});
@endif
</script>
@endpush
@endsection