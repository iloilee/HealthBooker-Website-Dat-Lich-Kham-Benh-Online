@extends('layouts.app')

@section('content')
<div class="layout-container flex h-full grow flex-col">
    <div class="flex flex-1 justify-center">
        <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
            <main class="flex-grow px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 py-10">
                <div class="space-y-8">
                    <!-- Header section -->
                    <div class="text-center">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white">
                            Khám Phá Các Chuyên Khoa
                        </h1>
                        <p class="mt-4 text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                            Tìm kiếm bác sĩ theo chuyên khoa phù hợp với nhu cầu sức khỏe của bạn.
                        </p>
                    </div>
                    
                    <!-- Specializations grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @forelse($specializations as $specialization)
                        <a href="{{ route('specializations.show', $specialization->id) }}" class="group">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden flex flex-col transition-all hover:shadow-xl hover:-translate-y-1 h-full">
                                <div class="p-6 flex-grow">
                                    <div class="flex flex-col items-center text-center">
                                        <div class="w-20 h-20 rounded-full bg-primary/10 flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-colors">
                                            @if($specialization->image)
                                            <img src="{{ $specialization->image }}" alt="{{ $specialization->name }}" class="w-12 h-12 object-cover rounded-lg">
                                            @else
                                            <span class="material-symbols-outlined !text-4xl text-primary">medical_services</span>
                                            @endif
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                                            {{ $specialization->name }}
                                        </h3>
                                        @if($specialization->description)
                                        <p class="mt-2 text-slate-600 dark:text-slate-400 text-sm line-clamp-2">
                                            {{ $specialization->description }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-slate-50 dark:bg-slate-800/50 p-4 text-center">
                                    <span class="text-primary text-sm font-semibold flex items-center justify-center gap-1">
                                        <span>Xem bác sĩ</span>
                                        <span class="material-symbols-outlined !text-lg transition-transform group-hover:translate-x-1">arrow_forward</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div class="col-span-4 text-center py-12">
                            <span class="material-symbols-outlined !text-6xl text-slate-300">medical_services</span>
                            <h3 class="mt-4 text-xl font-semibold text-slate-700 dark:text-slate-300">Chưa có chuyên khoa</h3>
                            <p class="mt-2 text-slate-500 dark:text-slate-400">
                                Hiện chưa có chuyên khoa nào trong hệ thống.
                            </p>
                        </div>
                        @endforelse
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