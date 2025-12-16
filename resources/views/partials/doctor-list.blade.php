@if($doctors->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($doctors as $doctor)
    <div class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 hover:shadow-lg transition-shadow">
        <div class="flex items-center gap-4">
            <img
                class="w-16 h-16 rounded-full object-cover"
                src="{{ $doctor->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($doctor->user->name) . '&background=0D8ABC&color=fff' }}"
                alt="{{ $doctor->user->name }}"
                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctor->user->name) }}&background=0D8ABC&color=fff'"
            />
            <div class="flex-1">
                <h3 class="font-bold text-slate-900 dark:text-slate-50">
                    {{ $doctor->user->name }}
                </h3>
                <p class="text-sm text-primary">
                    {{ $doctor->specialization->name ?? 'Chưa có chuyên khoa' }}
                </p>
                @if($doctor->clinic)
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    {{ $doctor->clinic->name }}
                </p>
                @endif
            </div>
        </div>
        
        @if($doctor->bio)
        <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-2">
            {{ $doctor->bio }}
        </p>
        @endif
        
        <div class="flex items-center gap-2 text-sm text-slate-500">
            @if($doctor->experience_years)
            <span class="flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">workspace_premium</span>
                {{ $doctor->experience_years }} năm kinh nghiệm
            </span>
            @endif
        </div>
        
        <button
            onclick="window.location.href='{{ route('booking.index', ['doctor' => $doctor->id]) }}';"
            class="w-full py-2 px-4 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors"
        >
            Đặt lịch khám
        </button>
    </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $doctors->links() }}
</div>
@else
<div class="text-center py-12">
    <span class="material-symbols-outlined text-6xl text-slate-300">search_off</span>
    <p class="mt-4 text-slate-600 dark:text-slate-400">
        Không tìm thấy bác sĩ phù hợp. Vui lòng thử lại với từ khóa khác.
    </p>
</div>
@endif