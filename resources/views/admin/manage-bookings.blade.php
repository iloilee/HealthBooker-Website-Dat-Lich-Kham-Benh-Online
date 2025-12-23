@extends('layouts.admin')
@section('title', 'Quản lý Lịch hẹn - HealthBooker')
@section('page-title', 'Quản lý Lịch hẹn')

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
<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
    <div class="flex flex-1 gap-4">
        <form method="GET" action="{{ route('admin.manage-bookings') }}" class="relative w-full max-w-sm">
            @csrf
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <span class="material-symbols-outlined text-lg">search</span>
            </span>
            <input
                name="search"
                value="{{ $search ?? '' }}"
                class="w-full rounded-lg border-slate-200 bg-white py-2 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                placeholder="Tìm kiếm theo tên, bác sĩ..."
                type="text"
            />
        </form>
        <button
            onclick="openFilterModal()"
            class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700"
        >
            <span class="material-symbols-outlined text-lg">filter_list</span>
            Lọc
        </button>
    </div>
    <div class="flex gap-2">
        <form method="GET" action="{{ route('admin.manage-bookings') }}">
            <select
                name="status"
                onchange="this.form.submit()"
                class="rounded-lg border-slate-200 bg-white py-2 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
            >
                <option value="all" {{ ($status ?? 'all') == 'all' ? 'selected' : '' }}>Tất cả trạng thái</option>
                <option value="Chờ xác nhận" {{ ($status ?? '') == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="Đã xác nhận" {{ ($status ?? '') == 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="Đã hủy" {{ ($status ?? '') == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                <option value="Đã hoàn thành" {{ ($status ?? '') == 'Đã hoàn thành' ? 'selected' : '' }}>Đã hoàn thành</option>
            </select>
        </form>
        <button
            onclick="openCreateModal()"
            class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600"
        >
            <span class="material-symbols-outlined text-lg">add</span>
            Tạo lịch hẹn
        </button>
    </div>
</div>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
    <!-- Tổng lịch hẹn -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Tổng lịch hẹn</p>
                <p class="text-xl font-bold mt-1">{{ number_format($totalAppointments) }}</p>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                <span class="material-symbols-outlined text-xl">calendar_today</span>
            </div>
        </div>
    </div>
    
    <!-- Chờ xác nhận -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Chờ xác nhận</p>
                <p class="text-xl font-bold mt-1">{{ $pendingAppointments }}</p>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-900/20 dark:text-amber-400">
                <span class="material-symbols-outlined text-xl">pending</span>
            </div>
        </div>
    </div>
    
    <!-- Hôm nay -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Hôm nay</p>
                <p class="text-xl font-bold mt-1">{{ $appointmentsToday }}</p>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-50 text-green-600 dark:bg-green-900/20 dark:text-green-400">
                <span class="material-symbols-outlined text-xl">today</span>
            </div>
        </div>
    </div>
    
    <!-- Đã hủy (Tháng) -->
    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Đã hủy (Tháng)</p>
                <p class="text-xl font-bold mt-1">{{ $cancelledThisMonth }}</p>
            </div>
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400">
                <span class="material-symbols-outlined text-xl">cancel</span>
            </div>
        </div>
    </div>
</div>

<!-- Bảng danh sách lịch hẹn -->
<div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300">
                <tr>
                    <th class="px-4 py-3 font-semibold">ID</th>
                    <th class="px-4 py-3 font-semibold">Bệnh nhân</th>
                    <th class="px-4 py-3 font-semibold">Bác sĩ & Chuyên khoa</th>
                    <th class="px-4 py-3 font-semibold">Thời gian</th>
                    <th class="px-4 py-3 font-semibold">Trạng thái</th>
                    <th class="px-4 py-3 font-semibold text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                @forelse ($appointments as $appointment)
                @php
                    $statusInfo = $appointment->statusInfo;
                    $statusColors = [
                        'amber' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'dark_bg' => 'dark:bg-amber-900/30', 'dark_text' => 'dark:text-amber-400', 'border' => 'border-amber-200', 'dark_border' => 'dark:border-amber-800', 'dot' => 'bg-amber-600'],
                        'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dark_bg' => 'dark:bg-green-900/30', 'dark_text' => 'dark:text-green-400', 'border' => 'border-green-200', 'dark_border' => 'dark:border-green-800', 'dot' => 'bg-green-600'],
                        'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'dark_bg' => 'dark:bg-red-900/30', 'dark_text' => 'dark:text-red-400', 'border' => 'border-red-200', 'dark_border' => 'dark:border-red-800', 'dot' => 'bg-red-600'],
                        'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'dark_bg' => 'dark:bg-blue-700', 'dark_text' => 'dark:text-blue-300', 'border' => 'border-blue-200', 'dark_border' => 'dark:border-blue-600', 'dot' => 'bg-blue-500'],
                    ];
                    $colors = $statusColors[$statusInfo['class']] ?? $statusColors['blue'];
                    
                    // Tạo chữ cái đầu cho avatar
                    $nameParts = explode(' ', $appointment->name);
                    $initials = '';
                    foreach ($nameParts as $part) {
                        $initials .= strtoupper(substr($part, 0, 1));
                        if (strlen($initials) >= 2) break;
                    }
                    
                    // Màu avatar dựa trên tên
                    $avatarColors = ['blue', 'purple', 'indigo', 'rose', 'cyan'];
                    $colorIndex = crc32($appointment->name) % count($avatarColors);
                    $avatarColor = $avatarColors[$colorIndex];
                @endphp
                
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                    <td class="px-4 py-3 text-slate-500">#{{ $appointment->id }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if(!empty($appointment->user?->avatar))
                                {{-- Avatar image --}}
                                <img
                                    src="{{ asset($appointment->user->avatar) }}"
                                    alt="{{ $appointment->name }}"
                                    class="h-8 w-8 rounded-full object-cover border border-slate-200 dark:border-slate-700"
                                >
                            @else
                                {{-- Fallback avatar chữ --}}
                                <div class="h-8 w-8 rounded-full bg-{{ $avatarColor }}-100 
                                            flex items-center justify-center 
                                            text-{{ $avatarColor }}-700 
                                            font-bold text-xs">
                                    {{ $initials }}
                                </div>
                            @endif

                            <div>
                                <div class="font-medium text-slate-900 dark:text-slate-100">
                                    {{ $appointment->name }}
                                </div>
                                <div class="text-xs text-slate-500">
                                    {{ $appointment->phone }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        @if($appointment->doctor && $appointment->doctor->user)
                        <div class="font-medium text-slate-900 dark:text-slate-100">
                            {{ $appointment->doctor->user->name ?? 'N/A' }}
                        </div>
                        <div class="text-xs text-slate-500">
                            {{ $appointment->doctor->specialization->name ?? 'N/A' }}
                        </div>
                        @else
                        <div class="text-slate-400">Không có thông tin</div>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="font-medium">
                            {{ \Carbon\Carbon::parse($appointment->dateBooking)->format('d/m/Y') }}
                        </div>
                        <div class="text-xs text-slate-500">
                            {{ \Carbon\Carbon::parse($appointment->timeBooking)->format('H:i') }}
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center rounded-full {{ $colors['bg'] }} px-2 py-1 text-xs font-medium {{ $colors['text'] }} {{ $colors['dark_bg'] }} {{ $colors['dark_text'] }} border {{ $colors['border'] }} {{ $colors['dark_border'] }}">
                            <span class="mr-1.5 h-1.5 w-1.5 rounded-full {{ $colors['dot'] }}"></span>
                            {{ $statusInfo['text'] }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <!-- Nút xác nhận cho lịch chờ xác nhận -->
                            @if($appointment->statusId == 1)
                            <button
                                onclick="confirmAppointment({{ $appointment->id }})"
                                class="p-1 text-green-600 hover:bg-green-50 rounded transition-colors"
                                title="Xác nhận ngay"
                            >
                                <span class="material-symbols-outlined text-lg">check_circle</span>
                            </button>
                            @endif
                            
                            <!-- Nút hủy cho lịch chưa hoàn thành và chưa hủy -->
                            @if($appointment->statusId != 3 && $appointment->statusId != 4)
                            <button
                                onclick="cancelAppointment({{ $appointment->id }})"
                                class="p-1 text-slate-400 hover:text-red-600 transition-colors"
                                title="Hủy lịch"
                            >
                                <span class="material-symbols-outlined text-lg">close</span>
                            </button>
                            @endif
                            
                            <button
                                onclick="viewAppointment({{ $appointment->id }})"
                                class="p-1 text-slate-400 hover:text-primary transition-colors"
                                title="Xem chi tiết"
                            >
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                            
                            <button
                                onclick="editAppointment({{ $appointment->id }})"
                                class="p-1 text-slate-400 hover:text-blue-600 transition-colors"
                                title="Chỉnh sửa"
                            >
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-slate-500">
                        Không có lịch hẹn nào.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Phân trang -->
    @if($appointments->hasPages())
    <div class="flex items-center justify-between border-t border-slate-200 dark:border-slate-800 px-4 py-3 sm:px-6">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-slate-700 dark:text-slate-300">
                    Hiển thị
                    <span class="font-medium">{{ $appointments->firstItem() }}</span> đến
                    <span class="font-medium">{{ $appointments->lastItem() }}</span> của
                    <span class="font-medium">{{ $appointments->total() }}</span>
                    kết quả
                </p>
            </div>
            <div>
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Modal hủy lịch -->
<div id="cancelModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div>
        <div class="relative w-full max-w-md rounded-lg bg-white dark:bg-slate-800 p-6 shadow-xl">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-4">
                Hủy lịch hẹn
            </h3>
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                    Lý do hủy
                </label>
                <textarea
                    id="cancelReason"
                    rows="3"
                    class="w-full rounded-lg border-slate-200 bg-white py-2 px-3 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                    placeholder="Nhập lý do hủy lịch hẹn..."
                ></textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    onclick="closeModal('cancelModal')"
                    class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 dark:text-slate-300"
                >
                    Hủy
                </button>
                <button
                    type="button"
                    onclick="submitCancel()"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg"
                >
                    Hủy lịch
                </button>
            </div>
        </div>
    </div>
</div>
<script>
let currentAppointmentId = null;

// Lấy base URL
function getBaseUrl() {
    return window.location.origin;
}

// Lấy route URL đúng
function getRouteUrl(path) {
    return `${getBaseUrl()}/${path.replace(/^\//, '')}`;
}

function openFilterModal() {
    alert('Chức năng lọc đang được phát triển');
}

function openCreateModal() {
    window.location.href = "{{ route('admin.appointments.create') }}";
}

function viewAppointment(id) {
    window.location.href = `{{ url('manage-bookings') }}/${id}`;
}

function editAppointment(id) {
    window.location.href = `{{ url('manage-bookings') }}/${id}/edit`;
}

function confirmAppointment(id) {
    if (!confirm('Bạn có chắc chắn muốn xác nhận lịch hẹn này?')) return;

    fetch(`/manage-bookings/${id}/confirm`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload(); // OK
        } else {
            alert(data.message);
        }
    })
    .catch(() => alert('Có lỗi xảy ra'));
}


function cancelAppointment(id) {
    currentAppointmentId = id;
    document.getElementById('cancelReason').value = '';
    openModal('cancelModal');
}

function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
    currentAppointmentId = null;
}

function submitCancel() {
    if (!currentAppointmentId) return;

    const reason = document.getElementById('cancelReason').value.trim();
    if (!reason) {
        alert('Vui lòng nhập lý do hủy');
        return;
    }

    fetch(`/manage-bookings/${currentAppointmentId}/cancel`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ reason })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            closeModal('cancelModal');
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(() => alert('Có lỗi xảy ra'));
}


// Đóng modal khi click bên ngoài
document.addEventListener('click', function(event) {
    if (event.target.id === 'cancelModal') {
        closeModal('cancelModal');
    }
});

// Đóng modal khi nhấn ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal('cancelModal');
    }
});
</script>
@endsection