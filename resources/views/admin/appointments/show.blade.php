@extends('layouts.admin')

@section('title', 'Chi tiết Lịch hẹn #' . $appointment->id . ' - HealthBooker')

@section('page-title')
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.manage-bookings') }}" class="text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-200">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <span>Chi tiết Lịch hẹn #{{ $appointment->id }}</span>
    </div>
@endsection

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    {{-- Trạng thái và hành động --}}
    <div class="bg-white dark:bg-slate-850 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-4">
                <span class="text-lg font-semibold text-slate-900 dark:text-slate-100">Trạng thái:</span>
                @php
                    $statusColors = [
                        'amber' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'dark_bg' => 'dark:bg-amber-900/30', 'dark_text' => 'dark:text-amber-400', 'border' => 'border-amber-200', 'dark_border' => 'dark:border-amber-800', 'dot' => 'bg-amber-600'],
                        'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dark_bg' => 'dark:bg-green-900/30', 'dark_text' => 'dark:text-green-400', 'border' => 'border-green-200', 'dark_border' => 'dark:border-green-800', 'dot' => 'bg-green-600'],
                        'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'dark_bg' => 'dark:bg-red-900/30', 'dark_text' => 'dark:text-red-400', 'border' => 'border-red-200', 'dark_border' => 'dark:border-red-800', 'dot' => 'bg-red-600'],
                        'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'dark_bg' => 'dark:bg-blue-900/30', 'dark_text' => 'dark:text-blue-400', 'border' => 'border-blue-200', 'dark_border' => 'dark:border-blue-800', 'dot' => 'bg-blue-600'],
                    ];
                    $colors = $statusColors[$appointment->statusInfo['class']] ?? $statusColors['blue'];
                @endphp
                
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border {{ $colors['bg'] }} {{ $colors['text'] }} {{ $colors['dark_bg'] }} {{ $colors['dark_text'] }} {{ $colors['border'] }} {{ $colors['dark_border'] }}">
                    <span class="w-2 h-2 rounded-full {{ $colors['dot'] }}"></span>
                    <span class="font-medium">{{ $appointment->statusInfo['text'] }}</span>
                </span>
            </div>
            
            <div class="flex items-center gap-3 flex-wrap">
                @if($appointment->statusId == 1)
                    <button onclick="confirmAppointment({{ $appointment->id }})" class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                        <span class="material-symbols-outlined !text-xl">check_circle</span>
                        <span>Xác nhận</span>
                    </button>
                @endif
                
                @if($appointment->statusId != 3 && $appointment->statusId != 4)
                    <button onclick="showCancelModal({{ $appointment->id }})" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                        <span class="material-symbols-outlined !text-xl">close</span>
                        <span>Hủy lịch</span>
                    </button>
                @endif
                
                <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-primary hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                    <span class="material-symbols-outlined !text-xl">edit</span>
                    <span>Chỉnh sửa</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Thông tin bệnh nhân --}}
    <div class="bg-white dark:bg-slate-850 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
        <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">person</span>
            Thông tin Bệnh nhân
        </h3>
        
        <div class="space-y-0">
            <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-40 flex-shrink-0">Họ và tên:</span>
                <span class="text-base text-slate-900 dark:text-slate-100 flex-1 font-semibold">{{ $appointment->name }}</span>
            </div>
            
            <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-40 flex-shrink-0">Email:</span>
                <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ $appointment->email }}</span>
            </div>
            
            <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-40 flex-shrink-0">Số điện thoại:</span>
                <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ $appointment->phone }}</span>
            </div>
            
            <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-40 flex-shrink-0">Giới tính:</span>
                <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ $appointment->gender }}</span>
            </div>
            
            @if($appointment->date_of_birth)
            <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-40 flex-shrink-0">Ngày sinh:</span>
                <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ \Carbon\Carbon::parse($appointment->date_of_birth)->format('d/m/Y') }}</span>
            </div>
            @endif
            
            @if($appointment->address)
            <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-40 flex-shrink-0">Địa chỉ:</span>
                <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ $appointment->address }}</span>
            </div>
            @endif
        </div>
    </div>

    {{-- Thông tin bác sĩ và lịch hẹn --}}
    <div class="grid md:grid-cols-2 gap-6">
        {{-- Thông tin bác sĩ --}}
        <div class="bg-white dark:bg-slate-850 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
            <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-green-600">medical_services</span>
                Thông tin Bác sĩ
            </h3>
            
            <div class="space-y-0">
                @if($appointment->doctor && $appointment->doctor->user)
                    <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-32 flex-shrink-0">Bác sĩ:</span>
                        <span class="text-base text-slate-900 dark:text-slate-100 flex-1 font-semibold">{{ $appointment->doctor->user->name }}</span>
                    </div>
                    
                    <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-32 flex-shrink-0">Chuyên khoa:</span>
                        <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ $appointment->doctor->specialization->name ?? 'N/A' }}</span>
                    </div>
                @else
                    <div class="flex items-start gap-4 py-4">
                        <span class="text-base text-slate-500 dark:text-slate-400 flex-1">Không có thông tin bác sĩ</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- Thông tin lịch hẹn --}}
        <div class="bg-white dark:bg-slate-850 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
            <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-purple-600">event</span>
                Thông tin Lịch hẹn
            </h3>
            
            <div class="space-y-0">
                <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-32 flex-shrink-0">Ngày hẹn:</span>
                    <span class="text-base text-slate-900 dark:text-slate-100 flex-1 font-semibold">{{ \Carbon\Carbon::parse($appointment->dateBooking)->format('d/m/Y') }}</span>
                </div>
                
                <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-32 flex-shrink-0">Giờ hẹn:</span>
                    <span class="text-base text-slate-900 dark:text-slate-100 flex-1 font-semibold">{{ \Carbon\Carbon::parse($appointment->timeBooking)->format('H:i') }}</span>
                </div>
                
                <div class="flex items-start gap-4 py-4 border-b border-slate-100 dark:border-slate-700 last:border-0">
                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400 w-32 flex-shrink-0">Ngày tạo:</span>
                    <span class="text-base text-slate-900 dark:text-slate-100 flex-1">{{ $appointment->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Mô tả triệu chứng --}}
    @if($appointment->description)
    <div class="bg-white dark:bg-slate-850 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
        <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-orange-600">description</span>
            Mô tả Triệu chứng
        </h3>
        <p class="text-slate-700 dark:text-slate-300 leading-relaxed whitespace-pre-wrap">{{ $appointment->description }}</p>
    </div>
    @endif

    {{-- Lý do hủy (nếu có) --}}
    @if($appointment->statusId == 4 && $appointment->cancellation_reason)
    <div class="bg-white dark:bg-slate-850 rounded-xl shadow-sm border-l-4 border-red-500 border-t border-r border-b border-slate-200 dark:border-slate-700 p-6">
        <h3 class="text-xl font-bold text-red-700 dark:text-red-400 mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined">cancel</span>
            Lý do Hủy lịch
        </h3>
        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">{{ $appointment->cancellation_reason }}</p>
    </div>
    @endif

</div>

{{-- Modal hủy lịch --}}
<div id="cancelModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-850 rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                <span class="material-symbols-outlined text-red-600 dark:text-red-400">warning</span>
            </div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Hủy lịch hẹn</h3>
        </div>
        
        <form id="cancelForm">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                        Lý do hủy <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="reason" 
                        id="cancelReason"
                        rows="4" 
                        required
                        class="w-full px-4 py-3 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-slate-800 dark:text-slate-100 resize-none"
                        placeholder="Nhập lý do hủy lịch hẹn..."
                    ></textarea>
                </div>
                
                <div class="flex gap-3 pt-4">
                    <button 
                        type="button" 
                        onclick="hideCancelModal()"
                        class="flex-1 px-6 py-3 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 font-medium transition-colors"
                    >
                        Hủy
                    </button>
                    <button 
                        type="submit"
                        class="flex-1 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors"
                    >
                        Xác nhận hủy
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let currentAppointmentId = null;

function showCancelModal(id) {
    currentAppointmentId = id;
    document.getElementById('cancelModal').classList.remove('hidden');
    document.getElementById('cancelModal').classList.add('flex');
}

function hideCancelModal() {
    document.getElementById('cancelModal').classList.add('hidden');
    document.getElementById('cancelModal').classList.remove('flex');
    document.getElementById('cancelForm').reset();
    currentAppointmentId = null;
}

// Xác nhận lịch hẹn
function confirmAppointment(id) {
    if (!confirm('Bạn có chắc chắn muốn xác nhận lịch hẹn này?')) return;
    
    fetch(`/manage-bookings/${id}/confirm`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            window.location.reload();
        } else {
            alert(data.message || 'Có lỗi xảy ra');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi xác nhận lịch hẹn');
    });
}

// Xử lý form hủy lịch
document.getElementById('cancelForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const reason = document.getElementById('cancelReason').value.trim();
    if (!reason || reason.length < 3) {
        alert('Vui lòng nhập lý do hủy (tối thiểu 3 ký tự)');
        return;
    }
    
    fetch(`/manage-bookings/${currentAppointmentId}/cancel`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ reason: reason })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            window.location.reload();
        } else {
            alert(data.message || 'Có lỗi xảy ra');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi hủy lịch hẹn');
    });
});

// Đóng modal khi click bên ngoài
document.getElementById('cancelModal').addEventListener('click', function(e) {
    if (e.target === this) {
        hideCancelModal();
    }
});
</script>

@endsection