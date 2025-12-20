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
    <button
        onclick="window.location.href='#'"
        class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 shadow-sm transition-colors whitespace-nowrap"
    >
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
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra!');
            });
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
</script>
@endsection