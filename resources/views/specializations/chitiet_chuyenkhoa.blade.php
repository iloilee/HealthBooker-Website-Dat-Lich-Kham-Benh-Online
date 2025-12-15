@extends('layouts.app')
@section('content')
<div class="layout-container flex h-full grow flex-col">
    <div class="flex flex-1 justify-center">
        <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
            <main class="flex-grow px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 py-10">
                <div class="space-y-8">
                    <!-- Header section -->
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-primary/10 mb-4">
                            @if($specialization->image)
                                <img src="{{ $specialization->image }}" alt="{{ $specialization->name }}" class="w-12 h-12 object-cover rounded-full">
                            @else
                                <span class="material-symbols-outlined !text-4xl text-primary">medical_services</span>
                            @endif
                        </div>
                        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white">
                            Bác sĩ Chuyên khoa {{ $specialization->name }}
                        </h1>
                        @if($specialization->description)
                        <p class="mt-4 text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                            {{ $specialization->description }}
                        </p>
                        @else
                        <p class="mt-4 text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                            Tìm kiếm và đặt lịch hẹn với các chuyên gia {{ strtolower($specialization->name) }} hàng đầu.
                        </p>
                        @endif
                    </div>
                    
                    <!-- Search form -->
                    <div class="bg-white dark:bg-slate-800 p-4 rounded-xl shadow-md sticky top-[65px] z-40">
                        <form action="{{ route('specializations.show', ['id' => $specialization->id]) }}" method="GET">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="relative md:col-span-2">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                                    <input
                                        name="keyword"
                                        value="{{ $keyword }}"
                                        class="w-full h-12 pl-10 pr-4 border border-slate-300 dark:border-slate-600 rounded-lg bg-slate-50 dark:bg-slate-700 focus:ring-2 focus:ring-primary focus:border-primary"
                                        placeholder="Tìm kiếm theo tên bác sĩ..."
                                        type="text"
                                    />
                                </div>
                                <button type="submit" class="flex w-full items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                                    <span class="truncate">Tìm kiếm</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Doctors list -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($doctors as $doctorUser)
                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden flex flex-col transition-shadow hover:shadow-xl">
                            <div class="flex-grow p-6">
                                <div class="flex items-start gap-4">
                                    <img
                                        class="w-20 h-20 rounded-full object-cover border-2 border-primary/20"
                                        src="{{ $doctorUser->photo ?: 'https://ui-avatars.com/api/?name=' . urlencode($doctorUser->user->name) . '&background=random' }}"
                                        alt="Portrait of {{ $doctorUser->user->name }}"
                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctorUser->user->name) }}&background=random'"
                                    />
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-xl font-bold text-slate-900 dark:text-white truncate">
                                            {{ $doctorUser->user->name }}
                                            @if($doctorUser->certification)
                                            <span class="text-sm font-normal text-slate-500">({{ $doctorUser->certification }})</span>
                                            @endif
                                        </h3>
                                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                                            Chuyên khoa {{ $specialization->name }}
                                            @if($doctorUser->clinic)
                                            <br>🏥 {{ $doctorUser->clinic->name }}
                                            @endif
                                        </p>
                                        <div class="flex items-center gap-1 mt-2">
                                            <span class="material-symbols-outlined !text-xl text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span>
                                            <span class="font-bold text-slate-700 dark:text-slate-200">4.8</span>
                                            <span class="text-sm text-slate-500 dark:text-slate-400">(120 đánh giá)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                                    @if($doctorUser->experience_years)
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-300">
                                        <span class="material-symbols-outlined !text-xl">work</span>
                                        <p>{{ $doctorUser->experience_years }} năm kinh nghiệm</p>
                                    </div>
                                    @endif
                                    @if($doctorUser->bio)
                                    <div class="flex items-start gap-2 text-slate-600 dark:text-slate-300 mt-2">
                                        <span class="material-symbols-outlined !text-xl mt-1">info</span>
                                        <p class="text-sm line-clamp-2">{{ $doctorUser->bio }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800/50 p-4 flex items-center justify-between gap-4">
                                <a href="#" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                                    <span class="truncate">Đặt lịch hẹn</span>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-12">
                            <span class="material-symbols-outlined !text-6xl text-slate-300">person_search</span>
                            <h3 class="mt-4 text-xl font-semibold text-slate-700 dark:text-slate-300">Không tìm thấy bác sĩ</h3>
                            <p class="mt-2 text-slate-500 dark:text-slate-400">
                                @if($keyword)
                                    Không có bác sĩ nào phù hợp với từ khóa "{{ $keyword }}"
                                @else
                                    Hiện chưa có bác sĩ nào trong chuyên khoa này
                                @endif
                            </p>
                        </div>
                        @endforelse
                    </div>
                    
                    <!-- Pagination -->
                    @if($doctors->hasPages())
                    <div class="mt-12 flex justify-center">
                        <nav class="flex items-center gap-2">
                            {{-- Previous Page Link --}}
                            @if($doctors->onFirstPage())
                            <span class="flex items-center justify-center h-10 w-10 rounded-lg border border-slate-300 dark:border-slate-600 text-slate-400 dark:text-slate-500 cursor-not-allowed">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </span>
                            @else
                            <a href="{{ $doctors->previousPageUrl() }}" class="flex items-center justify-center h-10 w-10 rounded-lg border border-slate-300 dark:border-slate-600 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach(range(1, $doctors->lastPage()) as $page)
                                @if($page == $doctors->currentPage())
                                <span class="flex items-center justify-center h-10 w-10 rounded-lg bg-primary text-white font-bold">
                                    {{ $page }}
                                </span>
                                @else
                                <a href="{{ $doctors->url($page) }}" class="flex items-center justify-center h-10 w-10 rounded-lg border border-slate-300 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                                    {{ $page }}
                                </a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if($doctors->hasMorePages())
                            <a href="{{ $doctors->nextPageUrl() }}" class="flex items-center justify-center h-10 w-10 rounded-lg border border-slate-300 dark:border-slate-600 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                            @else
                            <span class="flex items-center justify-center h-10 w-10 rounded-lg border border-slate-300 dark:border-slate-600 text-slate-400 dark:text-slate-500 cursor-not-allowed">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </span>
                            @endif
                        </nav>
                    </div>
                    @endif
                    
                    <!-- Back button -->
                    <div class="text-center mt-8">
                        <a href="{{ route('chuyenkhoa') }}" class="inline-flex items-center gap-2 text-primary hover:text-primary/80 font-semibold">
                            <span class="material-symbols-outlined">arrow_back</span>
                            Quay lại danh sách chuyên khoa
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection