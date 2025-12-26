@extends('layouts.admin')
@section('title', 'Quản lý Chuyên Khoa - HealthBooker')
@section('page-title', 'Quản lý Chuyên Khoa')
@section('content')

<!-- Toast Notification Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 flex flex-col gap-2"></div>

<!-- Modal -->
<div id="specializationModal" class="fixed inset-0 bg-black/50 z-40 hidden items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 id="modalTitle" class="text-lg font-semibold text-slate-900 dark:text-slate-50"></h3>
                <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <form id="specializationForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="specializationId" name="id">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Tên Chuyên Khoa *</label>
                        <input type="text" id="name" name="name" class="w-full rounded-lg border-slate-200 bg-white dark:bg-slate-850 dark:border-slate-700 px-4 py-2 text-sm focus:border-primary focus:ring-primary" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Mô Tả</label>
                        <textarea id="description" name="description" rows="3" class="w-full rounded-lg border-slate-200 bg-white dark:bg-slate-850 dark:border-slate-700 px-4 py-2 text-sm focus:border-primary focus:ring-primary"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Hình ảnh</label>
                        <input type="file" id="image" name="image" accept="image/*" class="w-full rounded-lg border-slate-200 bg-white dark:bg-slate-850 dark:border-slate-700 px-4 py-2 text-sm">
                        
                        <div id="imagePreview" class="mt-2 hidden">
                            <img id="previewImage" class="h-32 w-32 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                        </div>
                        
                        <div id="currentImage" class="mt-2 hidden">
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Ảnh hiện tại:</p>
                            <img id="currentImageUrl" class="h-32 w-32 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-3 mt-8">
                    <button type="button" onclick="closeModal()" class="flex-1 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                        Hủy
                    </button>
                    <button type="submit" class="flex-1 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 transition-colors">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 z-40 hidden items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-xl w-full max-w-md">
        <div class="p-6">
            <div class="mb-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30 mx-auto mb-4">
                    <span class="material-symbols-outlined text-red-600 dark:text-red-400">warning</span>
                </div>
                <h3 class="text-lg font-semibold text-center text-slate-900 dark:text-slate-50 mb-2">Xác nhận xóa</h3>
                <p id="deleteMessage" class="text-sm text-center text-slate-500 dark:text-slate-400">Bạn có chắc chắn muốn xóa chuyên khoa này?</p>
            </div>
            
            <div class="flex gap-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                    Hủy
                </button>
                <button type="button" onclick="confirmDelete()" class="flex-1 rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 transition-colors">
                    Xóa
                </button>
            </div>
        </div>
    </div>
</div>

<div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
    <div class="flex items-center gap-4">
        <div class="relative w-full sm:w-80">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input id="searchInput" class="w-full rounded-lg border-slate-200 bg-white py-2 pl-10 pr-4 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-50 dark:placeholder-slate-500" placeholder="Tìm kiếm chuyên khoa..." type="text">
        </div>
        <div class="relative">
            <select id="statusFilter" class="appearance-none rounded-lg border-slate-200 bg-white py-2 pl-4 pr-10 text-sm text-slate-900 focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-850 dark:text-slate-50">
                <option value="">Tất cả trạng thái</option>
                <option value="active">Đang hoạt động</option>
                <option value="inactive">Tạm ẩn</option>
            </select>
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400 text-lg">expand_more</span>
        </div>
    </div>
    <button onclick="openAddModal()" class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 transition-colors">
        <span class="material-symbols-outlined text-lg">add</span>
        Thêm Chuyên Khoa
    </button>
</div>

<div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300">
                <tr>
                    <th class="px-6 py-4 font-medium">Tên Chuyên Khoa</th>
                    <th class="px-6 py-4 font-medium">Mô Tả</th>
                    <th class="px-6 py-4 font-medium text-center">Số lượng Bác sĩ</th>
                    <th class="px-6 py-4 font-medium">Trạng Thái</th>
                    <th class="px-6 py-4 font-medium text-right">Thao Tác</th>
                </tr>
            </thead>
            <tbody id="specializationsTableBody">
                <!-- Data will be loaded via JavaScript -->
            </tbody>
        </table>
    </div>
    
    <div id="paginationContainer" class="flex items-center justify-between border-t border-slate-200 dark:border-slate-800 px-6 py-4">
        <!-- Pagination will be loaded via JavaScript -->
    </div>
</div>

<script>
let currentSpecializationId = null;

// Toast notification function
function showToast(message, type = 'success') {
    const toastContainer = document.getElementById('toast-container');
    const toastId = 'toast-' + Date.now();
    
    const colors = {
        success: 'bg-green-500',
        error: 'bg-red-500',
        warning: 'bg-yellow-500',
        info: 'bg-blue-500'
    };
    
    const icons = {
        success: 'check_circle',
        error: 'error',
        warning: 'warning',
        info: 'info'
    };
    
    const toast = document.createElement('div');
    toast.id = toastId;
    toast.className = `flex items-center gap-3 rounded-lg ${colors[type]} p-4 text-white shadow-lg transform transition-all duration-300 translate-x-full`;
    toast.innerHTML = `
        <span class="material-symbols-outlined">${icons[type]}</span>
        <p class="text-sm font-medium">${message}</p>
        <button onclick="document.getElementById('${toastId}').remove()" class="ml-auto text-white/80 hover:text-white">
            <span class="material-symbols-outlined text-sm">close</span>
        </button>
    `;
    
    toastContainer.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
    }, 10);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 300);
    }, 5000);
}

// Modal functions
function openAddModal() {
    document.getElementById('modalTitle').textContent = 'Thêm Chuyên Khoa';
    document.getElementById('specializationId').value = '';
    document.getElementById('name').value = '';
    document.getElementById('description').value = '';
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('currentImage').classList.add('hidden');
    document.getElementById('specializationModal').classList.remove('hidden');
}

function openEditModal(id) {
    fetch(`/manage-specializations/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modalTitle').textContent = 'Chỉnh sửa Chuyên Khoa';
            document.getElementById('specializationId').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description || '';
            
            if (data.image) {
                document.getElementById('currentImage').classList.remove('hidden');
                document.getElementById('currentImageUrl').src = data.image;
            } else {
                document.getElementById('currentImage').classList.add('hidden');
            }
            
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('specializationModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Có lỗi xảy ra khi tải dữ liệu', 'error');
        });
}

function closeModal() {
    document.getElementById('specializationModal').classList.add('hidden');
    document.getElementById('specializationForm').reset();
}

function openDeleteModal(id, name) {
    currentSpecializationId = id;
    document.getElementById('deleteMessage').textContent = `Bạn có chắc chắn muốn xóa chuyên khoa "${name}"?`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    currentSpecializationId = null;
}

function confirmDelete() {
    if (!currentSpecializationId) return;
    
    fetch(`/manage-specializations/${currentSpecializationId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            loadSpecializations();
            closeDeleteModal();
        } else {
            showToast(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Có lỗi xảy ra khi xóa chuyên khoa', 'error');
    });
}

// Form submission
document.getElementById('specializationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const id = formData.get('id');
    const method = id ? 'PUT' : 'POST';
    const url = id ? `/manage-specializations/${id}` : '/manage-specializations/store';
    
    fetch(url, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            closeModal();
            loadSpecializations();
        } else {
            showToast(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Có lỗi xảy ra khi lưu dữ liệu', 'error');
    });
});

// Image preview
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('currentImage').classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
});

// Load specializations
function loadSpecializations() {
    fetch('/manage-specializations/data')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('specializationsTableBody');
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            
            let filteredData = data.filter(spec => {
                const matchesSearch = spec.name.toLowerCase().includes(searchTerm) || 
                                    (spec.description && spec.description.toLowerCase().includes(searchTerm));
                const matchesStatus = !statusFilter || spec.status === statusFilter;
                return matchesSearch && matchesStatus;
            });
            
            if (filteredData.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-4xl">search_off</span>
                                <p>Không tìm thấy chuyên khoa nào</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }
            
            tableBody.innerHTML = filteredData.map(spec => `
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                                <span class="material-symbols-outlined">cardiology</span>
                            </div>
                            <span class="font-semibold text-slate-900 dark:text-slate-50">${spec.name}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 max-w-xs truncate text-slate-500 dark:text-slate-400">
                        ${spec.description || 'Chưa có mô tả'}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center justify-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-800 dark:bg-slate-700 dark:text-slate-300">
                            ${spec.doctors_count || 0}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400">
                            Hoạt động
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="openEditModal(${spec.id})" class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-blue-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-blue-400 transition-colors" title="Chỉnh sửa">
                                <span class="material-symbols-outlined text-xl">edit</span>
                            </button>
                            <button onclick="openDeleteModal(${spec.id}, '${spec.name}')" class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-red-600 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-red-400 transition-colors" title="Xóa">
                                <span class="material-symbols-outlined text-xl">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
            
            // Update pagination info
            document.getElementById('paginationContainer').innerHTML = `
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Hiển thị
                    <span class="font-medium text-slate-900 dark:text-slate-50">1-${filteredData.length}</span>
                    trong số
                    <span class="font-medium text-slate-900 dark:text-slate-50">${filteredData.length}</span>
                    chuyên khoa
                </p>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Có lỗi xảy ra khi tải dữ liệu', 'error');
        });
}

// Search and filter events
document.getElementById('searchInput').addEventListener('input', loadSpecializations);
document.getElementById('statusFilter').addEventListener('change', loadSpecializations);

// Load data on page load
document.addEventListener('DOMContentLoaded', loadSpecializations);
</script>
@endsection