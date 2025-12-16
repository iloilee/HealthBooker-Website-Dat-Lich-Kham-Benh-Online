@extends('layouts.app')

@section('content')
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
    <div class="layout-container flex h-full grow flex-col">
        <div class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
            <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
                <!-- Breadcrumb -->
                <nav class="mb-6" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ route('home') }}" class="text-sm text-slate-600 dark:text-slate-400 hover:text-primary dark:hover:text-primary">
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <span class="material-symbols-outlined text-slate-400 !text-sm">chevron_right</span>
                        </li>
                        <li>
                            <a href="{{ route('doctors.index') }}" class="text-sm text-slate-600 dark:text-slate-400 hover:text-primary dark:hover:text-primary">
                                Danh sách bác sĩ
                            </a>
                        </li>
                        <li>
                            <span class="material-symbols-outlined text-slate-400 !text-sm">chevron_right</span>
                        </li>
                        <li>
                            <span class="text-sm text-slate-900 dark:text-slate-50 font-medium">BS. {{ $doctorInfo->user->name }}</span>
                        </li>
                    </ol>
                </nav>

                <main class="w-full py-10">
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">
                        <!-- Header Section -->
                        <div class="p-6 md:p-8 border-b border-slate-200 dark:border-slate-700">
                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                                <!-- Avatar -->
                                <div class="flex-shrink-0">
                                    <img 
                                        src="{{ $doctorInfo->avatar ?? $doctorInfo->user->avatar ?? 'https://via.placeholder.com/300x300?text=Doctor' }}" 
                                        alt="BS. {{ $doctorInfo->user->name }}"
                                        class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white dark:border-slate-700 shadow-lg"
                                    >
                                </div>
                                
                                <!-- Basic Info -->
                                <div class="flex-1">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                        <div>
                                            <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-slate-50">
                                                Bác Sĩ {{ $doctorInfo->user->name }}
                                            </h1>
                                            <div class="flex items-center gap-2 mt-2">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary/10 text-primary">
                                                    {{ $doctorInfo->specialization->name ?? 'Chưa cập nhật' }}
                                                </span>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-slate-100 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
                                                    {{ $doctorInfo->experience_years ?? '0' }} năm kinh nghiệm
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Rating -->
                                        <div class="flex flex-col items-end">
                                            <div class="flex items-center gap-1">
                                                <div class="flex text-yellow-500">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= 4) 
                                                            <span class="material-symbols-outlined !text-xl">star</span>
                                                        @else
                                                            <span class="material-symbols-outlined !text-xl">star_half</span>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span class="ml-2 text-lg font-bold text-slate-900 dark:text-slate-50">4.8</span>
                                            </div>
                                            <span class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                                                (215 đánh giá)
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Quick Stats -->
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                                        <div class="text-center p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                            <div class="text-2xl font-bold text-primary">{{ $doctorInfo->experience_years ?? '0' }}</div>
                                            <div class="text-sm text-slate-600 dark:text-slate-400">Năm kinh nghiệm</div>
                                        </div>
                                        <div class="text-center p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                            <div class="text-2xl font-bold text-primary">200+</div>
                                            <div class="text-sm text-slate-600 dark:text-slate-400">Bệnh nhân</div>
                                        </div>
                                        <div class="text-center p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                            <div class="text-2xl font-bold text-primary">98%</div>
                                            <div class="text-sm text-slate-600 dark:text-slate-400">Hài lòng</div>
                                        </div>
                                        <div class="text-center p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                            <div class="text-2xl font-bold text-primary">24/7</div>
                                            <div class="text-sm text-slate-600 dark:text-slate-400">Hỗ trợ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Main Content -->
                        <div class="p-6 md:p-8">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <!-- Left Column - Doctor Info -->
                                <div class="lg:col-span-2 space-y-8">
                                    <!-- About Doctor -->
                                    <section>
                                        <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary">person</span>
                                            Giới thiệu bác sĩ
                                        </h2>
                                        <div class="prose prose-slate dark:prose-invert max-w-none">
                                            @if($doctorInfo->bio)
                                                <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                                                    {{ $doctorInfo->bio }}
                                                </p>
                                            @else
                                                <p class="text-slate-500 dark:text-slate-400 italic">
                                                    Chưa có thông tin giới thiệu.
                                                </p>
                                            @endif
                                        </div>
                                    </section>
                                    
                                    <!-- Education & Experience -->
                                    <section>
                                        <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary">school</span>
                                            Học vấn & Kinh nghiệm
                                        </h2>
                                        <div class="space-y-6">
                                            <div class="border-l-4 border-primary pl-4">
                                                <h3 class="font-semibold text-slate-900 dark:text-slate-50">Học vấn</h3>
                                                <ul class="mt-2 space-y-2">
                                                    @if($doctorInfo->certification)
                                                        @foreach(explode(',', $doctorInfo->certification) as $cert)
                                                            <li class="flex items-start gap-2 text-slate-700 dark:text-slate-300">
                                                                <span class="material-symbols-outlined text-green-500 !text-sm mt-0.5">check_circle</span>
                                                                <span>{{ trim($cert) }}</span>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="text-slate-500 dark:text-slate-400 italic">
                                                            Chưa cập nhật thông tin học vấn.
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            
                                            <div class="border-l-4 border-primary pl-4">
                                                <h3 class="font-semibold text-slate-900 dark:text-slate-50">Kinh nghiệm làm việc</h3>
                                                <ul class="mt-2 space-y-3">
                                                    <li class="flex items-start gap-2 text-slate-700 dark:text-slate-300">
                                                        <span class="material-symbols-outlined text-blue-500 !text-sm mt-0.5">work</span>
                                                        <div>
                                                            <span class="font-medium">Bác sĩ chuyên khoa {{ $doctorInfo->specialization->name ?? '' }}</span>
                                                            <p class="text-sm text-slate-600 dark:text-slate-400">
                                                                {{ $doctorInfo->clinic->name ?? 'Bệnh viện Đa khoa' }} • {{ $doctorInfo->experience_years ?? '0' }} năm
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <!-- Thêm các kinh nghiệm khác nếu có -->
                                                </ul>
                                            </div>
                                        </div>
                                    </section>
                                    
                                    <!-- Specializations -->
                                    <section>
                                        <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary">medical_services</span>
                                            Chuyên môn
                                        </h2>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="inline-flex items-center px-4 py-2 rounded-full bg-primary/10 text-primary font-medium">
                                                {{ $doctorInfo->specialization->name ?? 'Chuyên khoa' }}
                                            </span>
                                            <!-- Thêm các chuyên môn phụ nếu có -->
                                            <span class="inline-flex items-center px-4 py-2 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-800 dark:text-slate-200 font-medium">
                                                Tư vấn sức khỏe
                                            </span>
                                            <span class="inline-flex items-center px-4 py-2 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-800 dark:text-slate-200 font-medium">
                                                Khám bệnh tại nhà
                                            </span>
                                        </div>
                                    </section>
                                    
                                    <!-- Contact Info -->
                                    <section>
                                        <h2 class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-4 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary">contact_page</span>
                                            Thông tin liên hệ
                                        </h2>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-primary">mail</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-slate-600 dark:text-slate-400">Email</p>
                                                    <p class="font-medium text-slate-900 dark:text-slate-50">{{ $doctorInfo->user->email }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-primary">phone</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-slate-600 dark:text-slate-400">Điện thoại</p>
                                                    <p class="font-medium text-slate-900 dark:text-slate-50">{{ $doctorInfo->phone ?? $doctorInfo->user->phone ?? 'Chưa cập nhật' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-primary">home_pin</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-slate-600 dark:text-slate-400">Phòng khám</p>
                                                    <p class="font-medium text-slate-900 dark:text-slate-50">{{ $doctorInfo->clinic->name ?? 'Chưa cập nhật' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-primary">transgender</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-slate-600 dark:text-slate-400">Giới tính</p>
                                                    <p class="font-medium text-slate-900 dark:text-slate-50">{{ $doctorInfo->user->gender }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                
                                <!-- Right Column - Booking & Schedule -->
                                <div class="space-y-6">
                                    <!-- Booking Card -->
                                    <div class="bg-gradient-to-br from-primary to-primary/80 rounded-xl p-6 text-white">
                                        <h3 class="text-xl font-bold mb-4">Đặt lịch khám</h3>
                                        <div class="space-y-4">
                                            <div>
                                                <p class="text-sm opacity-90">Phí tư vấn</p>
                                                <p class="text-2xl font-bold">500.000 VND</p>
                                                <p class="text-sm opacity-90">/ 1 lần khám</p>
                                            </div>
                                            
                                            <div class="space-y-3">
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                                    <span class="text-sm">Thời gian: 30 phút</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-sm">video_call</span>
                                                    <span class="text-sm">Hình thức: Trực tiếp/Online</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-sm">calendar_clock</span>
                                                    <span class="text-sm">Lịch có sẵn: Hôm nay</span>
                                                </div>
                                            </div>
                                            
                                            <button class="w-full bg-white text-primary font-bold py-3 rounded-lg hover:bg-slate-100 transition-colors mt-4">
                                                Đặt lịch ngay
                                            </button>
                                        </div>
                                    </div>
                                    
                                    {{-- <!-- Available Time Slots -->
                                    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-6">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-slate-50 mb-4">Lịch khám có sẵn</h3>
                                        <div class="space-y-3">
                                            @php
                                                $timeSlots = [
                                                    ['time' => '08:00 - 09:00', 'available' => true],
                                                    ['time' => '09:00 - 10:00', 'available' => true],
                                                    ['time' => '10:00 - 11:00', 'available' => false],
                                                    ['time' => '14:00 - 15:00', 'available' => true],
                                                    ['time' => '15:00 - 16:00', 'available' => true],
                                                    ['time' => '16:00 - 17:00', 'available' => true],
                                                ];
                                            @endphp
                                            
                                            @foreach($timeSlots as $slot)
                                                <button 
                                                    class="w-full text-left p-3 rounded-lg border {{ $slot['available'] ? 'border-primary/30 hover:border-primary hover:bg-primary/5' : 'border-slate-200 dark:border-slate-700 opacity-50 cursor-not-allowed' }} transition-colors"
                                                    {{ !$slot['available'] ? 'disabled' : '' }}
                                                >
                                                    <div class="flex items-center justify-between">
                                                        <span class="font-medium {{ $slot['available'] ? 'text-slate-900 dark:text-slate-50' : 'text-slate-500 dark:text-slate-400' }}">
                                                            {{ $slot['time'] }}
                                                        </span>
                                                        @if($slot['available'])
                                                            <span class="text-primary font-medium">Có sẵn</span>
                                                        @else
                                                            <span class="text-slate-500 dark:text-slate-400">Đã kín</span>
                                                        @endif
                                                    </div>
                                                </button>
                                            @endforeach
                                        </div>
                                        
                                        <div class="mt-6 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                            <div class="flex items-start gap-2">
                                                <span class="material-symbols-outlined text-blue-500 !text-sm mt-0.5">info</span>
                                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                                    Vui lòng đặt lịch trước ít nhất 2 giờ. Hủy lịch trước 24 giờ để được hoàn tiền.
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    <!-- Quick Actions -->
                                    <div class="space-y-3">
                                        {{-- <button class="w-full flex items-center justify-center gap-2 p-3 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                            <span class="material-symbols-outlined">share</span>
                                            Chia sẻ hồ sơ bác sĩ
                                        </button>
                                        <button class="w-full flex items-center justify-center gap-2 p-3 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                            <span class="material-symbols-outlined">download</span>
                                            Tải CV bác sĩ
                                        </button> --}}
                                        <a href="{{ route('doctors.index') }}" class="w-full flex items-center justify-center gap-2 p-3 border border-slate-300 dark:border-slate-600 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                            <span class="material-symbols-outlined">arrow_back</span>
                                            Quay lại danh sách
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Reviews Section -->
                            <section class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
                                <div class="flex items-center justify-between mb-6">
                                    <div>
                                        <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-50">Đánh giá từ bệnh nhân</h2>
                                        <div class="flex items-center gap-3 mt-2">
                                            <!-- Hiển thị rating trung bình -->
                                            <div class="flex items-center">
                                                <div class="flex text-yellow-500 mr-2">
                                                    <span class="material-symbols-outlined !text-xl text-slate-300 dark:text-slate-600">star</span>
                                                </div>
                                                <span class="ml-2 text-lg font-bold text-slate-900 dark:text-slate-50">
                                                    4.8
                                                </span>
                                            </div>
                                            <span class="text-sm text-slate-600 dark:text-slate-400">
                                                ({{ $totalReviews }} đánh giá)
                                            </span>
                                        </div>
                                    </div>
                                    
                                    {{-- @auth
                                    <button 
                                        onclick="openReviewModal()" 
                                        class="flex items-center gap-2 text-primary font-medium hover:text-primary/80"
                                    >
                                        <span class="material-symbols-outlined">add</span>
                                        Viết đánh giá
                                    </button>
                                    @endauth --}}
                                </div>
                                
                                @if($feedbacks->count() > 0)
                                    <div class="space-y-6">
                                        @foreach($feedbacks as $feedback)
                                            <div class="bg-slate-50 dark:bg-slate-900 rounded-xl p-6">
                                                <div class="flex items-start justify-between mb-4">
                                                    <div class="flex items-center gap-3">
                                                        {{-- @if($feedback->patient && $feedback->patient->user->avatar)
                                                            <img 
                                                                src="{{ $feedback->patient->user->avatar }}" 
                                                                alt="{{ $feedback->patient->user->name }}"
                                                                class="w-12 h-12 rounded-full object-cover"
                                                            >
                                                        @else
                                                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                                                                <span class="material-symbols-outlined text-primary">person</span>
                                                            </div>
                                                        @endif --}}
                                                        <div>
                                                            <h4 class="font-bold text-slate-900 dark:text-slate-50">
                                                                {{ $feedback->patient->name ?? 'Khách hàng ẩn danh' }}
                                                            </h4>
                                                            @if($feedback->dateBooking)
                                                                <p class="text-sm text-slate-600 dark:text-slate-400">
                                                                    Khám ngày {{ date('d/m/Y', strtotime($feedback->dateBooking)) }}
                                                                    @if($feedback->timeBooking)
                                                                        lúc {{ date('H:i', strtotime($feedback->timeBooking)) }}
                                                                    @endif
                                                                </p>
                                                            @else
                                                                <p class="text-sm text-slate-600 dark:text-slate-400">
                                                                    Đánh giá ngày {{ $feedback->created_at->format('d/m/Y') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="flex text-yellow-500">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $feedback->rating)
                                                                <span class="material-symbols-outlined">star</span>
                                                            @else
                                                                <span class="material-symbols-outlined text-slate-300 dark:text-slate-600">star</span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                
                                                @if($feedback->content)
                                                    <p class="text-slate-700 dark:text-slate-300 mt-3">
                                                        "{{ $feedback->content }}"
                                                    </p>
                                                @endif
                                                
                                                <div class="flex items-center gap-4 mt-4 text-sm text-slate-500 dark:text-slate-400">
                                                    <span class="flex items-center gap-1">
                                                        <span class="material-symbols-outlined !text-sm">schedule</span>
                                                        {{ $feedback->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                    <!-- Phân trang -->
                                    @if($feedbacks->hasPages())
                                        <div class="mt-8">
                                            {{ $feedbacks->links() }}
                                        </div>
                                    @endif
                                @else
                                    <div class="text-center py-12">
                                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-slate-400 !text-3xl">reviews</span>
                                        </div>
                                        <h3 class="text-lg font-medium text-slate-900 dark:text-slate-50 mb-2">
                                            Chưa có đánh giá nào
                                        </h3>
                                        <p class="text-slate-600 dark:text-slate-400 max-w-md mx-auto">
                                            Hãy là người đầu tiên chia sẻ trải nghiệm của bạn với bác sĩ {{ $doctorInfo->user->name }}
                                        </p>
                                    </div>
                                @endif
                            </section>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>

<!-- Modal đặt lịch (tùy chọn) -->
<div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-slate-900 dark:text-slate-50">Đặt lịch khám</h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <form id="bookingForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Chọn ngày</label>
                    <input type="date" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-50" min="{{ date('Y-m-d') }}">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Chọn giờ</label>
                    <select class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-50">
                        <option>08:00 - 09:00</option>
                        <option>09:00 - 10:00</option>
                        <option>14:00 - 15:00</option>
                        <option>15:00 - 16:00</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Hình thức khám</label>
                    <select class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-50">
                        <option>Khám trực tiếp tại phòng khám</option>
                        <option>Tư vấn online (video call)</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Triệu chứng / Lý do khám</label>
                    <textarea rows="3" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-50" placeholder="Mô tả ngắn gọn triệu chứng..."></textarea>
                </div>
                
                <div class="pt-4 border-t border-slate-200 dark:border-slate-700">
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-primary/90 transition-colors">
                        Xác nhận đặt lịch
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openBookingModal() {
        document.getElementById('bookingModal').classList.remove('hidden');
        document.getElementById('bookingModal').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('bookingModal').classList.add('hidden');
        document.getElementById('bookingModal').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    // Đóng modal khi click bên ngoài
    document.getElementById('bookingModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Xử lý form booking
    document.getElementById('bookingForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        // Xử lý đặt lịch ở đây
        alert('Đã gửi yêu cầu đặt lịch thành công!');
        closeModal();
    });
    
    // Thêm event cho nút "Đặt lịch ngay"
    document.querySelector('.bg-white.text-primary')?.addEventListener('click', openBookingModal);
</script>
@endpush

<style>
    .prose {
        color: inherit;
    }
    .prose p {
        margin-top: 0.5em;
        margin-bottom: 0.5em;
    }
</style>
@endsection