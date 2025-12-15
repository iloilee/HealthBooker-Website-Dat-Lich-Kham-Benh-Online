@extends('layouts.app')
@section('content')
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
  <div class="layout-container flex h-full grow flex-col">
    <div class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
      <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        <main class="w-full py-10 px-4 md:px-0">
          <div class="flex flex-col gap-4 text-center mb-10">
            <h1 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
              Khám Phá Các Chuyên Khoa
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400">
              Tìm kiếm bác sĩ theo chuyên khoa phù hợp với nhu cầu sức khỏe của bạn.
            </p>
          </div>
          
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($specializations as $specialization)
            <div class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300">
              <div 
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="{{ $specialization->name }}"
                style="background-image: url('{{ $specialization->image }}');"
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2">
                  {{ $specialization->name }}
                </h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow">
                  {{ $specialization->description }}
                </p>
                <a 
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="{{ route('specializations.show', $specialization->id) }}"
                >
                  Xem bác sĩ
                </a>
              </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
              <p class="text-slate-600 dark:text-slate-400">
                Hiện chưa có chuyên khoa nào được thêm vào hệ thống.
              </p>
            </div>
            @endforelse
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection