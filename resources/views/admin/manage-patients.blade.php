@extends('layouts.admin')
@section('title', 'Quản lý Bệnh nhân - HealthBooker')
@section('page-title', 'Quản lý Bệnh nhân')
@section('content')

<!-- Modal Thêm/Sửa bệnh nhân -->
<div id="patientModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="fixed inset-0 bg-black/50 transition-opacity"></div>
        <div class="relative w-full max-w-md rounded-xl bg-white p-6 shadow-xl dark:bg-slate-850">
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100" id="modalTitle">Thêm bệnh nhân</h3>
                <button type="button" onclick="closeModal()" class="rounded-lg p-1 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>
            
            <form id="patientForm" method="POST">
                @csrf
                <input type="hidden" id="patientId" name="id">
                
                <div class="space-y-4">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Họ và tên *</label>
                        <input type="text" name="name" id="name" required
                            class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Email *</label>
                        <input type="email" name="email" id="email" required
                            class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Số điện thoại *</label>
                        <input type="tel" name="phone" id="phone" required
                            class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Giới tính *</label>
                            <select name="gender" id="gender" required
                                class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Ngày sinh *</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" required
                                class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                        </div>
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Địa chỉ *</label>
                        <textarea name="address" id="address" rows="2" required
                            class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100"></textarea>
                    </div>
                    
                    <div id="passwordField">
                        <label class="mb-1.5 block text-sm font-medium text-slate-700 dark:text-slate-300">Mật khẩu *</label>
                        <input type="password" name="password" id="password"
                            class="w-full rounded-lg border-slate-200 bg-white px-3 py-2 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="isActive" value="0">
                        <input type="checkbox" name="isActive" id="isActive" value="1" class="rounded border-slate-300 text-primary focus:ring-primary">
                        <label for="isActive" class="text-sm text-slate-700 dark:text-slate-300">Kích hoạt tài khoản</label>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800">Hủy</button>
                    <button type="submit" id="submitBtn" class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Xác nhận -->
<div id="confirmModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="fixed inset-0 bg-black/50 transition-opacity"></div>
        <div class="relative w-full max-w-md rounded-xl bg-white p-6 shadow-xl dark:bg-slate-850">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100" id="confirmTitle">Xác nhận</h3>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400" id="confirmMessage"></p>
            </div>
            
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeConfirmModal()" class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800">Hủy</button>
                <button type="button" onclick="confirmAction()" id="confirmActionBtn" class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<!-- Nội dung chính -->
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div class="flex flex-1 gap-4">
        <form method="GET" action="{{ route('admin.manage-patients') }}" class="relative w-full max-w-md">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <span class="material-symbols-outlined text-[20px]">search</span>
            </span>
            <input
                name="search"
                value="{{ request('search') }}"
                class="w-full rounded-lg border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-850 dark:placeholder-slate-400"
                placeholder="Tìm kiếm theo tên, ID, SĐT..."
                type="text"
            />
        </form>
        <form method="GET" action="{{ route('admin.manage-patients') }}" class="relative hidden sm:block">
            {{-- Giữ lại search nếu đang tìm --}}
            <input type="hidden" name="search" value="{{ request('search') }}">

            <select name="status" onchange="this.form.submit()"
                class="h-full rounded-lg border-slate-200 bg-white py-2.5 pl-3 pr-8 text-sm focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-850">
                <option value="">Tất cả trạng thái</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                    Đang hoạt động
                </option>
                <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>
                    Đã khóa
                </option>
            </select>
        </form>
    </div>
    <button
        onclick="openModal()"
        class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2.5 text-sm font-medium text-white hover:bg-primary/90 transition-colors shadow-sm shadow-primary/30">
        <span class="material-symbols-outlined text-[20px]">add</span>
        <span>Thêm bệnh nhân</span>
    </button>
</div>

<div class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-850">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-600 dark:bg-slate-800/50 dark:text-slate-400">
                <tr>
                    <th class="px-6 py-4 font-medium">Bệnh nhân</th>
                    <th class="px-6 py-4 font-medium">Giới tính</th>
                    <th class="px-6 py-4 font-medium">Liên hệ</th>
                    <th class="px-6 py-4 font-medium">Địa chỉ</th>
                    <th class="px-6 py-4 font-medium">Ngày sinh</th>
                    <th class="px-6 py-4 font-medium">Lần khám cuối</th>
                    <th class="px-6 py-4 font-medium">Trạng thái</th>
                    <th class="px-6 py-4 font-medium text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                @forelse ($patients as $patient)
                    @php
                        $lastAppointment = $patient->patients->first();
                        $formattedId = 'BN' . str_pad($patient->id, 5, '0', STR_PAD_LEFT);
                    @endphp
                    <tr class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($patient->avatar)
                                    <img
                                        alt="Avatar"
                                        class="h-10 w-10 rounded-full object-cover ring-1 ring-slate-200 dark:ring-slate-700"
                                        src="{{ $patient->avatar }}"
                                    />
                                @else
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-primary/20 font-bold text-sm">
                                        {{ strtoupper(substr($patient->name, 0, 2)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-medium text-slate-900 dark:text-slate-100">
                                        {{ $patient->name }}
                                    </p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">ID: {{ $formattedId }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($patient->gender == 'Nam')
                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-900/30 dark:text-blue-400">Nam</span>
                            @elseif($patient->gender == 'Nữ')
                                <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 dark:bg-pink-900/30 dark:text-pink-400">Nữ</span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-700/10 dark:bg-gray-900/30 dark:text-gray-400">Khác</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-[16px]">phone</span>
                                    <span class="text-xs">{{ $patient->phone ?? 'Chưa cập nhật' }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-[16px]">mail</span>
                                    <span class="text-xs">{{ $patient->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                <span class="material-symbols-outlined text-[16px]">home</span>
                                <span class="text-xs max-w-[200px] truncate" title="{{ $patient->address }}">
                                    {{ $patient->address ? Str::limit($patient->address, 30) : 'Chưa cập nhật' }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-300">
                            @if($lastAppointment && $lastAppointment->date_of_birth)
                                {{ \Carbon\Carbon::parse($lastAppointment->date_of_birth)->format('d/m/Y') }}
                            @else
                                <span class="text-slate-400">Chưa cập nhật</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($lastAppointment)
                                <p class="text-slate-900 dark:text-slate-100">
                                    {{ \Carbon\Carbon::parse($lastAppointment->dateBooking)->format('d/m/Y') }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    {{ $lastAppointment->doctor->user->name ?? 'Không xác định' }}
                                </p>
                            @else
                                <span class="text-sm text-slate-400">Chưa có lịch khám</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
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
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.patients.show', $patient->id) }}"
                                   class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                   title="Xem chi tiết">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </a>
                                <button onclick="editPatient({{ $patient->id }})"
                                        class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"
                                        title="Chỉnh sửa">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button onclick="showLockModal({{ $patient->id }}, {{ $patient->isActive ? 'true' : 'false' }})"
                                        class="rounded-lg p-2 text-slate-500 hover:bg-yellow-50 hover:text-yellow-600 dark:text-slate-400 dark:hover:bg-yellow-900/20 dark:hover:text-yellow-500"
                                        title="{{ $patient->isActive ? 'Khóa tài khoản' : 'Mở khóa tài khoản' }}">
                                    <span class="material-symbols-outlined text-[20px]">
                                        {{ $patient->isActive ? 'lock' : 'lock_open' }}
                                    </span>
                                </button>
                                <button onclick="showDeleteModal({{ $patient->id }}, '{{ $patient->name }}')"
                                        class="rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/20 dark:hover:text-red-500"
                                        title="Xóa">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">
                            <div class="flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-4xl">person_off</span>
                                <p>Không tìm thấy bệnh nhân nào.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($patients->hasPages())
        <div class="flex items-center justify-between border-t border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-850">
            <div class="hidden text-sm text-slate-500 dark:text-slate-400 sm:block">
                Hiển thị
                <span class="font-medium text-slate-900 dark:text-slate-100">{{ $patients->firstItem() }}</span>
                đến
                <span class="font-medium text-slate-900 dark:text-slate-100">{{ $patients->lastItem() }}</span>
                trong số
                <span class="font-medium text-slate-900 dark:text-slate-100">{{ $patients->total() }}</span>
                bệnh nhân
            </div>
            <div class="flex flex-1 justify-between gap-2 sm:justify-end">
                @if($patients->onFirstPage())
                    <button class="relative inline-flex items-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-400 dark:border-slate-700 dark:bg-slate-850 dark:text-slate-500" disabled>
                        Trước
                    </button>
                @else
                    <a href="{{ $patients->previousPageUrl() }}" class="relative inline-flex items-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-850 dark:text-slate-400 dark:hover:bg-slate-800">
                        Trước
                    </a>
                @endif

                @if($patients->hasMorePages())
                    <a href="{{ $patients->nextPageUrl() }}" class="relative inline-flex items-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-850 dark:text-slate-400 dark:hover:bg-slate-800">
                        Sau
                    </a>
                @else
                    <button class="relative inline-flex items-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-400 dark:border-slate-700 dark:bg-slate-850 dark:text-slate-500" disabled>
                        Sau
                    </button>
                @endif
            </div>
        </div>
    @endif
</div>

<script>
    // Biến lưu trữ tạm thời
    let currentAction = null;
    let currentPatientId = null;
    let currentPatientName = null;
    let currentIsActive = null;

    const modal = document.getElementById('patientModal');
    const confirmModal = document.getElementById('confirmModal');
    const modalTitle = document.getElementById('modalTitle');
    const confirmTitle = document.getElementById('confirmTitle');
    const confirmMessage = document.getElementById('confirmMessage');
    const confirmActionBtn = document.getElementById('confirmActionBtn');
    const patientForm = document.getElementById('patientForm');
    const submitBtn = document.getElementById('submitBtn');
    const passwordField = document.getElementById('passwordField');

    // Modal bệnh nhân
    function openModal(patientId = null) {
        if (patientId) {
            modalTitle.textContent = 'Chỉnh sửa bệnh nhân';
            submitBtn.textContent = 'Cập nhật';
            passwordField.style.display = 'none';
            
            // Gọi API lấy thông tin bệnh nhân
            fetch(`{{ url('/manage-patients') }}/${patientId}/edit`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const patient = data.patient;
                        document.getElementById('patientId').value = patient.id;
                        document.getElementById('name').value = patient.name;
                        document.getElementById('email').value = patient.email;
                        document.getElementById('phone').value = patient.phone;
                        document.getElementById('gender').value = patient.gender;
                        document.getElementById('date_of_birth').value = patient.date_of_birth;
                        document.getElementById('address').value = patient.address;
                        document.getElementById('isActive').checked = patient.isActive;
                        
                        // Cập nhật action form
                        patientForm.action = `{{ url('quantrivien/manage-patients') }}/${patientId}`;
                        patientForm.method = 'POST';
                        patientForm.innerHTML += '<input type="hidden" name="_method" value="PUT">';
                    }
                });
        } else {
            modalTitle.textContent = 'Thêm bệnh nhân';
            submitBtn.textContent = 'Thêm mới';
            passwordField.style.display = 'block';
            patientForm.reset();
            document.getElementById('patientId').value = '';
            document.getElementById('isActive').checked = true;
            
            // Cập nhật action form
            patientForm.action = '{{ route("admin.patients.store") }}';
            patientForm.method = 'POST';
            // Xóa hidden method nếu có
            const methodInput = patientForm.querySelector('input[name="_method"]');
            if (methodInput) methodInput.remove();
        }
        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    // Modal xác nhận
    function showDeleteModal(patientId, patientName) {
        currentAction = 'delete';
        currentPatientId = patientId;
        currentPatientName = patientName;
        
        confirmTitle.textContent = 'Xác nhận xóa';
        confirmMessage.textContent = `Bạn có chắc chắn muốn xóa bệnh nhân "${patientName}"? Hành động này không thể hoàn tác.`;
        confirmActionBtn.textContent = 'Xóa';
        confirmActionBtn.className = 'rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700';
        
        confirmModal.classList.remove('hidden');
    }

    function showLockModal(patientId, isActive) {
        currentAction = 'lock';
        currentPatientId = patientId;
        currentIsActive = isActive;
        
        const actionText = isActive ? 'khóa' : 'mở khóa';
        confirmTitle.textContent = 'Xác nhận thay đổi trạng thái';
        confirmMessage.textContent = `Bạn có chắc chắn muốn ${actionText} tài khoản bệnh nhân này?`;
        confirmActionBtn.textContent = isActive ? 'Khóa tài khoản' : 'Mở khóa tài khoản';
        confirmActionBtn.className = 'rounded-lg bg-yellow-600 px-4 py-2 text-sm font-medium text-white hover:bg-yellow-700';
        
        confirmModal.classList.remove('hidden');
    }

    function closeConfirmModal() {
        confirmModal.classList.add('hidden');
        currentAction = null;
        currentPatientId = null;
        currentPatientName = null;
        currentIsActive = null;
    }

    function confirmAction() {
        if (currentAction === 'delete') {
            deletePatient(currentPatientId);
        } else if (currentAction === 'lock') {
            toggleStatus(currentPatientId, currentIsActive);
        }
        closeConfirmModal();
    }

    // Chỉnh sửa bệnh nhân
    function editPatient(id) {
        openModal(id);
    }

    // Khóa/mở khóa tài khoản
    function toggleStatus(id, isActive) {
        const action = isActive ? 'lock' : 'unlock';
        
        fetch(`{{ url('/manage-patients') }}/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: action })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('success', data.message);
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showToast('error', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        });
    }

    // Xóa bệnh nhân
    function deletePatient(id) {
        fetch(`{{ url('/manage-patients') }}/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('success', data.message);
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showToast('error', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        });
    }

    // Xử lý submit form bệnh nhân
    patientForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const url = this.action;
        const method = this.method;
        
        fetch(url, {
            method: method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('success', data.message);
                closeModal();
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                // Hiển thị lỗi validation
                if (data.errors) {
                    let errorMessage = 'Vui lòng kiểm tra lại:\n';
                    for (const [field, errors] of Object.entries(data.errors)) {
                        errorMessage += `- ${errors.join(', ')}\n`;
                    }
                    showToast('error', errorMessage);
                } else {
                    showToast('error', data.message);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        });
    });

    // Đóng modal khi click bên ngoài
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    confirmModal.addEventListener('click', function(e) {
        if (e.target === confirmModal) {
            closeConfirmModal();
        }
    });

    // Hàm hiển thị thông báo
    function showToast(type, message) {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 z-50 flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium shadow-lg transition-all transform translate-x-full animate-slide-in ${
            type === 'success' ? 'bg-green-50 text-green-800 dark:bg-green-900/30 dark:text-green-400' :
            type === 'error' ? 'bg-red-50 text-red-800 dark:bg-red-900/30 dark:text-red-400' :
            'bg-blue-50 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400'
        }`;
        
        const icon = type === 'success' ? 'check_circle' : 'error';
        toast.innerHTML = `
            <span class="material-symbols-outlined">${icon}</span>
            <span>${message}</span>
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('animate-slide-in');
            toast.classList.add('animate-slide-out');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }

    // Thêm CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slide-in {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        @keyframes slide-out {
            from { transform: translateX(0); }
            to { transform: translateX(100%); }
        }
        .animate-slide-in {
            animation: slide-in 0.3s ease-out forwards;
        }
        .animate-slide-out {
            animation: slide-out 0.3s ease-in forwards;
        }
    `;
    document.head.appendChild(style);

    //auto fill 
    function openModal(patientId = null) {
        if (patientId) {
            modalTitle.textContent = 'Chỉnh sửa bệnh nhân';
            submitBtn.textContent = 'Cập nhật';
            passwordField.style.display = 'none'; // ẩn mật khẩu khi chỉnh sửa

            // Gọi API lấy thông tin bệnh nhân
            fetch(`{{ url('manage-patients') }}/${patientId}/edit`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const patient = data.patient;

                        // Gán dữ liệu vào form
                        document.getElementById('patientId').value = patient.id;
                        document.getElementById('name').value = patient.name;
                        document.getElementById('email').value = patient.email;
                        document.getElementById('phone').value = patient.phone;
                        document.getElementById('gender').value = patient.gender;
                        document.getElementById('date_of_birth').value = patient.date_of_birth;


                        document.getElementById('address').value = patient.address;
                        document.getElementById('isActive').checked = patient.isActive;

                        // Cập nhật action form cho PUT
                        patientForm.action = `{{ url('/manage-patients') }}/${patientId}`;
                        patientForm.method = 'POST';

                        // Nếu chưa có hidden _method thì thêm vào
                        if (!patientForm.querySelector('input[name="_method"]')) {
                            const methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'PUT';
                            patientForm.appendChild(methodInput);
                        }
                    }
                })
                .catch(err => console.error(err));
        } else {
            // Trường hợp thêm mới
            modalTitle.textContent = 'Thêm bệnh nhân';
            submitBtn.textContent = 'Thêm mới';
            passwordField.style.display = 'block';
            patientForm.reset();
            document.getElementById('patientId').value = '';
            document.getElementById('isActive').checked = true;

            // Reset action form
            patientForm.action = '{{ route("admin.patients.store") }}';
            patientForm.method = 'POST';

            // Xóa hidden _method nếu có
            const methodInput = patientForm.querySelector('input[name="_method"]');
            if (methodInput) methodInput.remove();
        }

        modal.classList.remove('hidden');
    }

</script>

@endsection