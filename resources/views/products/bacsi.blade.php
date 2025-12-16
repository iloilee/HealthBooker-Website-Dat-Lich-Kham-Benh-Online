@extends('layouts.app')
@section('content')
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
  <div class="layout-container flex h-full grow flex-col">
    <div class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
      <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
        <main class="w-full py-10 px-4 md:px-0">
          <form id="filterForm" method="GET" action="{{ route('doctors.index') }}">
            <div class="flex flex-col gap-8 md:flex-row">
              <aside class="w-full md:w-1/4 lg:w-1/5">
                <div class="sticky top-10">
                  <h2 class="text-lg font-bold text-slate-900 dark:text-slate-50 mb-4">
                    Bộ lọc tìm kiếm
                  </h2>
                  <div class="space-y-6">
                    <div>
                      <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2" for="specialty">
                        Chuyên khoa
                      </label>
                      <select class="w-full rounded-md border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary" 
                              id="specialty" name="specialty">
                        <option value="">Tất cả</option>
                        @foreach($specializations as $specialty)
                          <option value="{{ $specialty->name }}" {{ request('specialty') == $specialty->name ? 'selected' : '' }}>
                            {{ $specialty->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2" for="experience">
                        Kinh nghiệm
                      </label>
                      <select class="w-full rounded-md border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary" 
                              id="experience" name="experience">
                        <option value="">Tất cả</option>
                        <option value="Dưới 5 năm" {{ request('experience') == 'Dưới 5 năm' ? 'selected' : '' }}>Dưới 5 năm</option>
                        <option value="5 - 10 năm" {{ request('experience') == '5 - 10 năm' ? 'selected' : '' }}>5 - 10 năm</option>
                        <option value="10 - 15 năm" {{ request('experience') == '10 - 15 năm' ? 'selected' : '' }}>10 - 15 năm</option>
                        <option value="Trên 15 năm" {{ request('experience') == 'Trên 15 năm' ? 'selected' : '' }}>Trên 15 năm</option>
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2" for="gender">
                        Giới tính
                      </label>
                      <select class="w-full rounded-md border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary" 
                              id="gender" name="gender">
                        <option value="">Tất cả</option>
                        <option value="Nam" {{ request('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ request('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        <option value="Khác" {{ request('gender') == 'Khác' ? 'selected' : '' }}>Khác</option>
                      </select>
                    </div>
                    <button type="submit" class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                      <span class="truncate">Áp dụng</span>
                    </button>
                    @if(request()->has('specialty') || request()->has('experience') || request()->has('gender'))
                      <a href="{{ route('doctors.index') }}" class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                        <span class="truncate">Xóa bộ lọc</span>
                      </a>
                    @endif
                  </div>
                </div>
              </aside>
              <div class="w-full md:w-3/4 lg:w-4/5">
                <div class="flex justify-between items-center mb-6">
                  <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-50">
                    Danh sách Bác sĩ
                  </h1>
                  <p class="text-sm text-slate-600 dark:text-slate-400">
                    Tìm thấy {{ $doctors->total() }} kết quả
                  </p>
                </div>
                @if($doctors->count() > 0)
                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($doctors as $doctor)
                      <div class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg">
                        <div class="flex items-start gap-4">
                          <img alt="Portrait of Dr. {{ $doctor->name }}" 
                               class="w-24 h-24 rounded-full object-cover" 
                               src="{{ $doctor->user->avatar ?? $doctor->avatar ?? 'https://via.placeholder.com/150' }}">
                          <div class="flex-1">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-slate-50">
                              BS. {{ $doctor->name }}
                            </h3>
                            <p class="text-sm text-primary font-medium">
                              {{ $doctor->doctorInfo->specialization->name ?? 'Chưa cập nhật' }}
                            </p>
                            <!-- Rating (tạm thời giữ nguyên) -->
                            <div class="flex items-center gap-1 mt-1 text-yellow-500">
                              <span class="material-symbols-outlined !text-base">star</span>
                              <span class="material-symbols-outlined !text-base">star</span>
                              <span class="material-symbols-outlined !text-base">star</span>
                              <span class="material-symbols-outlined !text-base">star</span>
                              <span class="material-symbols-outlined !text-base text-slate-300 dark:text-slate-600">star</span>
                              <span class="text-sm text-slate-500 dark:text-slate-400 ml-1">(120 đánh giá)</span>
                            </div>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mt-2">
                              Kinh nghiệm: {{ $doctor->doctorInfo->experience_years ?? 'Chưa cập nhật' }} năm
                            </p>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                              Giới tính: {{ $doctor->gender }}
                            </p>
                          </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700">
                          <a href="{{ route('doctors.show', $doctor->id) }}" 
                             class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                            Xem chi tiết
                          </a>
                          <!-- Cập nhật: Thay thế button bằng link -->
                          <a href="{{ route('booking.index', ['doctor' => $doctor->doctorInfo->id]) }}" 
                             class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors">
                            Đặt lịch khám
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  
                  <!-- Pagination -->
                  <nav aria-label="Pagination" class="flex items-center justify-center mt-10">
                    {{ $doctors->withQueryString()->links('pagination::tailwind') }}
                  </nav>
                @else
                  <div class="text-center py-10">
                    <p class="text-slate-600 dark:text-slate-400">Không tìm thấy bác sĩ nào phù hợp với tiêu chí tìm kiếm.</p>
                  </div>
                @endif
              </div>
            </div>
          </form>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection