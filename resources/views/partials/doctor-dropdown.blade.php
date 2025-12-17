@if($doctors->count() > 0)
    <div class="py-2">
        <div class="px-4 py-2 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">
            Tìm thấy {{ $doctors->total() }} bác sĩ
        </div>
        @foreach($doctors as $doctor)
        <a href="{{ route('booking.index', ['doctor' => $doctor->id]) }}"
           class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors border-b border-slate-100 dark:border-slate-700 last:border-0">
            <img
                class="w-12 h-12 rounded-full object-cover flex-shrink-0"
                src="{{ 
                    $doctor->user->avatar 
                    ? (str_starts_with($doctor->user->avatar, 'http') 
                        ? $doctor->user->avatar 
                        : asset('storage/' . $doctor->user->avatar)) 
                    : 'https://ui-avatars.com/api/?name=' . urlencode($doctor->user->name) . '&background=0D8ABC&color=fff' 
                }}"
                alt="{{ $doctor->user->name }}"
                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctor->user->name) }}&background=0D8ABC&color=fff'"
            />
            <div class="flex-1 min-w-0">
                <h4 class="font-semibold text-slate-900 dark:text-slate-50 truncate">
                    {{ $doctor->user->name }}
                </h4>
                <p class="text-sm text-primary truncate">
                    {{ $doctor->specialization->name ?? 'Chưa có chuyên khoa' }}
                </p>
                @if($doctor->clinic)
                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                    <span class="material-symbols-outlined text-xs align-middle">location_on</span>
                    {{ $doctor->clinic->name }}
                </p>
                @endif
            </div>
            <div class="flex-shrink-0">
                <span class="material-symbols-outlined text-slate-400">arrow_forward</span>
            </div>
        </a>
        @endforeach
        
        @if($doctors->hasMorePages())
        <div class="px-4 py-3 text-center border-t border-slate-200 dark:border-slate-700">
            <a href="{{ route('doctors.search') }}?keyword={{ request('keyword') }}" 
               class="text-sm text-primary hover:text-primary/80 font-medium">
                Xem tất cả {{ $doctors->total() }} kết quả →
            </a>
        </div>
        @endif
    </div>
@endif