@extends('layouts.admin')
@section('title', 'Quản lý Bác sĩ - HealthBooker')
@section('page-title', 'Quản lý Bác sĩ')

@section('content')
<div class="text-base mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
    <form method="GET" action="{{ route('admin.manage-doctors') }}" class="flex flex-col gap-4 sm:flex-row sm:items-center flex-1">
        <div class="relative w-full sm:w-72">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <span class="material-symbols-outlined !text-xl">search</span>
            </span>
            <input
                name="search"
                value="{{ request('search') }}"
                class="w-full rounded-lg border-slate-200 bg-white py-2 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300 placeholder:text-slate-400"
                placeholder="Tìm tên, email hoặc SĐT..."
                type="text"
            />
        </div>
        <select
            name="specialization"
            class="w-full sm:w-48 rounded-lg border-slate-200 bg-white py-2 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
        >
            <option value="">Tất cả chuyên khoa</option>
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->id }}" {{ request('specialization') == $specialization->id ? 'selected' : '' }}>
                    {{ $specialization->name }}
                </option>
            @endforeach
        </select>
        <select
            name="status"
            class="w-full sm:w-48 rounded-lg border-slate-200 bg-white py-2 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
        >
            <option value="">Tất cả trạng thái</option>
            <option value="online" {{ request('status') == 'online' ? 'selected' : '' }}>Đang hoạt động</option>
            <option value="offline" {{ request('status') == 'offline' ? 'selected' : '' }}>Ngưng hoạt động</option>
        </select>
        <button type="submit" class="hidden">Tìm kiếm</button>
    </form>
    {{-- <button
        onclick="window.location.href='#'"
        class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 shadow-sm transition-colors whitespace-nowrap">
        <span class="material-symbols-outlined !text-xl">add</span>
        Thêm bác sĩ
    </button> --}}
    <button
    onclick="openAddDoctorModal()"
    class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 shadow-sm transition-colors whitespace-nowrap">
        <span class="material-symbols-outlined !text-xl">add</span>
        Thêm bác sĩ
    </button>
</div>

<div class="rounded-xl border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-850 shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-slate-200 bg-slate-50 text-slate-600 dark:border-slate-800 dark:bg-slate-800/50 dark:text-slate-300">
                <tr>
                    <th class="px-6 py-4 font-semibold">Bác sĩ</th>
                    <th class="px-6 py-4 font-semibold">Chuyên khoa</th>
                    <th class="px-6 py-4 font-semibold">Thông tin liên hệ</th>
                    <th class="px-6 py-4 font-semibold">Trạng thái</th>
                    <th class="px-6 py-4 font-semibold text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                @forelse($doctors as $doctor)
                    <tr class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img
                                    alt="Avatar"
                                    class="h-10 w-10 rounded-full object-cover"
                                    src="{{ $doctor->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($doctor->user->name) . '&background=random' }}"
                                />
                                <div>
                                    <p class="font-medium text-slate-900 dark:text-slate-50">
                                        {{ $doctor->user->name }}
                                    </p>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">
                                        ID: DOC-{{ str_pad($doctor->id, 3, '0', STR_PAD_LEFT) }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($doctor->specialization)
                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-sm font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/20">
                                    {{ $doctor->specialization->name }}
                                </span>
                            @else
                                <span class="text-sm text-slate-400">Chưa cập nhật</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1 text-slate-600 dark:text-slate-300">
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="material-symbols-outlined !text-sm text-slate-400">call</span>
                                    {{ $doctor->phone ?? 'Chưa cập nhật' }}
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="material-symbols-outlined !text-sm text-slate-400">mail</span>
                                    {{ $doctor->user->email }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-2.5 w-2.5">
                                    @if($doctor->work_status == 'online')
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                                    @else
                                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-slate-400"></span>
                                    @endif
                                </span>
                                <span class="text-sm font-medium {{ $doctor->work_status == 'online' ? 'text-green-600 dark:text-green-400' : 'text-slate-500 dark:text-slate-400' }}">
                                    {{ $doctor->work_status == 'online' ? 'Đang hoạt động' : 'Ngưng hoạt động' }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity">
                                <button
                                    onclick="window.location.href='{{ route('manage-doctors.profile', ['id' => $doctor->doctorId]) }}'"
                                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-primary dark:hover:bg-slate-800 transition-colors"
                                    title="Xem chi tiết"
                                >
                                    <span class="material-symbols-outlined !text-xl">visibility</span>
                                </button>
                                <button
                                    onclick="window.location.href='#'"
                                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-amber-500 dark:hover:bg-slate-800 transition-colors"
                                    title="Chỉnh sửa"
                                >
                                    <span class="material-symbols-outlined !text-xl">edit</span>
                                </button>
                                <button
                                    onclick="toggleStatus({{ $doctor->id }}, '{{ $doctor->work_status }}')"
                                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-{{ $doctor->work_status == 'online' ? 'orange' : 'green' }}-500 dark:hover:bg-slate-800 transition-colors"
                                    title="{{ $doctor->work_status == 'online' ? 'Tạm ngưng' : 'Kích hoạt' }}"
                                >
                                    <span class="material-symbols-outlined !text-xl">
                                        {{ $doctor->work_status == 'online' ? 'pause' : 'play_arrow' }}
                                    </span>
                                </button>
                                <button
                                    onclick="confirmDelete({{ $doctor->id }})"
                                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-red-500 dark:hover:bg-slate-800 transition-colors"
                                    title="Xóa"
                                >
                                    <span class="material-symbols-outlined !text-xl">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-outlined !text-4xl">person_off</span>
                                <p class="text-sm">Không tìm thấy bác sĩ nào</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($doctors->hasPages())
        <div class="flex items-center justify-between border-t border-slate-200 bg-white px-6 py-4 dark:border-slate-800 dark:bg-slate-850 rounded-b-xl">
            <div class="text-sm text-slate-500 dark:text-slate-400">
                Hiển thị
                <span class="font-medium text-slate-900 dark:text-slate-50">{{ $doctors->firstItem() }}</span>
                đến
                <span class="font-medium text-slate-900 dark:text-slate-50">{{ $doctors->lastItem() }}</span>
                trong số
                <span class="font-medium text-slate-900 dark:text-slate-50">{{ $doctors->total() }}</span>
                bác sĩ
            </div>
            <div class="flex gap-2">
                @if($doctors->onFirstPage())
                    <button class="rounded-lg border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary disabled:opacity-50 dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800" disabled>
                        Trước
                    </button>
                @else
                    <a href="{{ $doctors->previousPageUrl() }}" class="rounded-lg border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800">
                        Trước
                    </a>
                @endif

                @if($doctors->hasMorePages())
                    <a href="{{ $doctors->nextPageUrl() }}" class="rounded-lg border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800">
                        Sau
                    </a>
                @else
                    <button class="rounded-lg border border-slate-200 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary disabled:opacity-50 dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800" disabled>
                        Sau
                    </button>
                @endif
            </div>
        </div>
    @endif
</div>

{{-- Modal Thêm Bác sĩ --}}
<div id="addDoctorModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="fixed inset-0 bg-black/50" onclick="closeModal()"></div>
        
        <div class="relative w-full max-w-2xl rounded-xl bg-white dark:bg-slate-850 shadow-xl">
            <!-- Modal Header -->
            <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 px-6 py-4">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-50">
                    Thêm Bác sĩ Mới
                </h3>
                <button 
                    onclick="closeModal()"
                    class="rounded-lg p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-900 dark:hover:bg-slate-800 dark:hover:text-slate-50"
                >
                    <span class="material-symbols-outlined !text-xl">close</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="addDoctorForm" method="POST" action="{{ route('manage-doctors.store') }}">
                    @csrf
                    
                    <div class="grid gap-4 md:grid-cols-2">
                        <!-- Thông tin cơ bản -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-slate-900 dark:text-slate-50">Thông tin cơ bản</h4>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Họ và tên *
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    required
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                    placeholder="Nhập họ và tên bác sĩ"
                                >
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="name"></p>
                            </div>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Email *
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    required
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                    placeholder="example@healthbooker.com"
                                >
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="email"></p>
                            </div>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Mật khẩu *
                                </label>
                                <input
                                    type="password"
                                    name="password"
                                    required
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                    placeholder="••••••"
                                >
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="password"></p>
                            </div>
                        </div>
                        
                        <!-- Thông tin chuyên môn -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-slate-900 dark:text-slate-50">Thông tin chuyên môn</h4>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Chuyên khoa *
                                </label>
                                <select
                                    name="specializationId"
                                    required
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                >
                                    <option value="">Chọn chuyên khoa</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}">
                                            {{ $specialization->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="specializationId"></p>
                            </div>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Số điện thoại
                                </label>
                                <input
                                    type="tel"
                                    name="phone"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                    placeholder="0912 345 678"
                                >
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="phone"></p>
                            </div>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Số năm kinh nghiệm
                                </label>
                                <input
                                    type="number"
                                    name="experience_years"
                                    min="0"
                                    max="50"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                    placeholder="5"
                                >
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="experience_years"></p>
                            </div>
                            
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                                    Chứng chỉ hành nghề
                                </label>
                                <input
                                    type="text"
                                    name="certification"
                                    class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                                    placeholder="Số chứng chỉ hành nghề"
                                >
                                <p class="mt-1 text-sm text-red-500 error-text" data-error="certification"></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Giới thiệu -->
                    <div class="mt-4">
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Giới thiệu
                        </label>
                        <textarea
                            name="bio"
                            rows="3"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                            placeholder="Giới thiệu về bác sĩ..."
                        ></textarea>
                        <p class="mt-1 text-sm text-red-500 error-text" data-error="bio"></p>
                    </div>
                    
                    <!-- Ngày sinh -->
                    <div class="mt-4">
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Ngày sinh
                        </label>
                        <input
                            type="date"
                            name="date_of_birth"
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-300"
                        >
                        <p class="mt-1 text-sm text-red-500 error-text" data-error="date_of_birth"></p>
                    </div>
                    
                    <!-- Trạng thái -->
                    <div class="mt-4">
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Trạng thái
                        </label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input
                                    type="radio"
                                    name="work_status"
                                    value="online"
                                    checked
                                    class="h-4 w-4 border-slate-300 text-primary focus:ring-primary dark:border-slate-700"
                                >
                                <span class="ml-2 text-sm text-slate-700 dark:text-slate-300">Đang hoạt động</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input
                                    type="radio"
                                    name="work_status"
                                    value="offline"
                                    class="h-4 w-4 border-slate-300 text-primary focus:ring-primary dark:border-slate-700"
                                >
                                <span class="ml-2 text-sm text-slate-700 dark:text-slate-300">Ngưng hoạt động</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="flex justify-end gap-3 border-t border-slate-200 dark:border-slate-800 px-6 py-4">
                <button
                    type="button"
                    onclick="closeModal()"
                    class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-800"
                >
                    Hủy
                </button>
                <button
                    type="button"
                    onclick="submitDoctorForm()"
                    class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600"
                >
                    Thêm bác sĩ
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Toast Notification --}}
<div id="toast" class="fixed top-4 right-4 z-50 hidden">
    <div class="rounded-lg bg-white p-4 shadow-lg dark:bg-slate-800">
        <div class="flex items-center gap-3">
            <span id="toastIcon" class="material-symbols-outlined !text-xl text-green-500">check_circle</span>
            <div>
                <p id="toastTitle" class="font-medium text-slate-900 dark:text-slate-50"></p>
                <p id="toastMessage" class="text-sm text-slate-600 dark:text-slate-300"></p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleStatus(doctorId, currentStatus) {
        const newStatus = currentStatus === 'online' ? 'offline' : 'online';
        const statusText = newStatus === 'online' ? 'Đang hoạt động' : 'Ngưng hoạt động';
        
        if (confirm(`Bạn có chắc muốn thay đổi trạng thái thành "${statusText}"?`)) {
            fetch(`/manage-doctors/${doctorId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(async response => {
                const data = await response.json();

                if (!response.ok && data.errors) {
                    clearErrors();
                    showErrors(data.errors);
                    showToast('Lỗi', 'Vui lòng kiểm tra lại dữ liệu', 'error');
                    return;
                }

                if (data.success) {
                    showToast('Thành công', data.message);
                    closeModal();
                    form.reset();
                    clearErrors();

                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    showToast('Lỗi', data.message || 'Có lỗi xảy ra', 'error');
                }
            })

        }
    }

    function confirmDelete(doctorId) {
        if (!confirm('Bạn có chắc chắn muốn xóa bác sĩ này không?')) {
            return;
        }

        fetch(`/manage-doctors/${doctorId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error(error);
            alert('Có lỗi xảy ra, vui lòng thử lại');
        });
    }

    // Modal functions
    function openAddDoctorModal() {
        document.getElementById('addDoctorModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        document.getElementById('addDoctorModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Show toast notification
    function showToast(title, message, type = 'success') {
        const toast = document.getElementById('toast');
        const toastIcon = document.getElementById('toastIcon');
        const toastTitle = document.getElementById('toastTitle');
        const toastMessage = document.getElementById('toastMessage');
        
        // Set icon based on type
        if (type === 'success') {
            toastIcon.textContent = 'check_circle';
            toastIcon.className = 'material-symbols-outlined !text-xl text-green-500';
        } else {
            toastIcon.textContent = 'error';
            toastIcon.className = 'material-symbols-outlined !text-xl text-red-500';
        }
        
        toastTitle.textContent = title;
        toastMessage.textContent = message;
        
        toast.classList.remove('hidden');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }

    // Submit doctor form
    function submitDoctorForm() {
        const form = document.getElementById('addDoctorForm');
        const formData = new FormData(form);
        
        // Validate form
        if (!formData.get('name') || !formData.get('email') || !formData.get('password') || !formData.get('specializationId')) {
            showToast('Lỗi', 'Vui lòng điền đầy đủ thông tin bắt buộc', 'error');
            return;
        }
        
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Thành công', data.message);
                closeModal();
                form.reset();
                
                // Reload page after 1 second to show new doctor
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showToast('Lỗi', data.message || 'Có lỗi xảy ra', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Lỗi', 'Có lỗi xảy ra khi thêm bác sĩ', 'error');
        });
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });

    // Close modal when clicking outside
    document.getElementById('addDoctorModal')?.addEventListener('click', function(event) {
        if (event.target === this) {
            closeModal();
        }
    });

    function clearErrors() {
        document.querySelectorAll('.error-text').forEach(el => {
            el.textContent = '';
        });
    }

    function showErrors(errors) {
        Object.keys(errors).forEach(field => {
            const errorEl = document.querySelector(`[data-error="${field}"]`);
            if (errorEl) {
                errorEl.textContent = errors[field][0];
            }
        });
    }
</script>
<style>
    .fixed {
        position: fixed;
    }
    .inset-0 {
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .z-50 {
        z-index: 50;
    }
    .hidden {
        display: none;
    }
    .overflow-hidden {
        overflow: hidden;
    }
</style>
@endsection