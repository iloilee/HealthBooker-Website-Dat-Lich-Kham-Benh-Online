@extends('layouts.app')
@section('content')
<div class="layout-container flex h-full grow flex-col">
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 mb-6">
            <a class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal hover:text-primary" href="{{ route('home') }}">Trang chủ</a>
            <span class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal">/</span>
            <span class="text-slate-900 dark:text-slate-50 text-sm font-medium leading-normal">Đặt lịch khám</span>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/20 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/20 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-400 rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <!-- Page Heading -->
        <div class="flex flex-wrap justify-between gap-3 mb-8">
            <div class="flex min-w-72 flex-col gap-2">
                <p class="text-slate-900 dark:text-slate-50 text-4xl font-black leading-tight tracking-[-0.033em]">
                    Đặt Lịch Khám Bệnh Nhanh Chóng
                </p>
                <p class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal">
                    Tìm kiếm và đặt lịch với các bác sĩ chuyên khoa hàng đầu một cách dễ dàng.
                </p>
            </div>
        </div>

        <!-- Main Content: Filters + Results -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column: Filters -->
            <div class="lg:col-span-4 xl:col-span-3">
                <form method="GET" action="{{ route('booking.index') }}" id="filterForm">
                    <div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 space-y-6">
                        <h2 class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]">
                            Bộ lọc nâng cao
                        </h2>

                        <!-- Filter: Specialty -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2" for="specialty">Chuyên khoa</label>
                            <select name="specialty" class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:ring-primary focus:border-primary" id="specialty">
                                <option value="">Tất cả chuyên khoa</option>
                                @foreach($specializations as $spec)
                                <option value="{{ $spec->id }}" {{ request('specialty') == $spec->id ? 'selected' : '' }}>
                                    {{ $spec->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter: Gender -->
                        <div>
                            <p class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Giới tính bác sĩ</p>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="gender" value="all" {{ !request('gender') || request('gender') == 'all' ? 'checked' : '' }} class="form-radio text-primary focus:ring-primary/50">
                                    <span class="text-slate-700 dark:text-slate-300">Tất cả</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="gender" value="Nam" {{ request('gender') == 'Nam' ? 'checked' : '' }} class="form-radio text-primary focus:ring-primary/50">
                                    <span class="text-slate-700 dark:text-slate-300">Nam</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="gender" value="Nữ" {{ request('gender') == 'Nữ' ? 'checked' : '' }} class="form-radio text-primary focus:ring-primary/50">
                                    <span class="text-slate-700 dark:text-slate-300">Nữ</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90">
                            <span class="truncate">Áp dụng</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Column: Search Results -->
            <div class="lg:col-span-8 xl:col-span-9 space-y-6">
                <!-- SearchBar -->
                <div class="relative">
                    <div class="text-slate-500 dark:text-slate-400 absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                    <input type="text" id="searchInput" name="search" value="{{ request('search') }}" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-slate-50 focus:outline-0 focus:ring-2 focus:ring-primary border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 h-14 placeholder:text-slate-500 dark:placeholder:text-slate-400 pl-12 text-base font-normal leading-normal" placeholder="Tìm bác sĩ, chuyên khoa, bệnh viện...">
                </div>

                <!-- Doctor List -->
                <div class="space-y-4">
                    <p class="text-slate-600 dark:text-slate-400">
                        Tìm thấy {{ $doctors->total() }} bác sĩ phù hợp.
                    </p>

                    @forelse($doctors as $doctor)
                    <div class="doctor-card bg-white dark:bg-background-dark p-4 sm:p-6 rounded-xl border border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary transition-colors duration-200" data-doctor-id="{{ $doctor->id }}">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <img class="size-24 rounded-full mx-auto sm:mx-0 object-cover" src="{{ $doctor->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($doctor->user->name) . '&size=150&background=0ea5e9&color=fff' }}" alt="{{ $doctor->user->name }}">
                            
                            <div class="flex-1 text-center sm:text-left">
                                <div class="flex items-center justify-center sm:justify-start gap-2 mb-1">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-slate-50">
                                        {{ $doctor->certification }} <br> {{ $doctor->user->name }}
                                    </h3>
                                    
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-1 text-amber-500">
                                        <span class="material-symbols-outlined !text-base" style="font-variation-settings: 'FILL' 1">star</span>
                                        <span class="text-sm font-bold text-slate-700 dark:text-slate-300">4.9</span>
                                    </div>
                                    <p class="text-sm text-primary font-semibold mb-0">
                                        Chuyên khoa {{ $doctor->specialization->name }}
                                    </p>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">
                                    {{ $doctor->experience_years }} năm kinh nghiệm. {{ Str::limit($doctor->bio, 100) }}
                                </p>
                                <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 justify-center sm:justify-start">
                                    <span class="material-symbols-outlined !text-base">location_on</span>
                                    <span>{{ $doctor->clinic->name ?? 'Phòng khám tư nhân' }}</span>
                                </div>
                            </div>

                            <button type="button" class="view-schedule-btn flex-shrink-0 self-center sm:self-start mt-2 sm:mt-0 flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-6 bg-primary/20 dark:bg-primary/20 text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/30">
                                <span class="truncate">Xem lịch</span>
                            </button>
                        </div>

                        <!-- Schedule Picker (Hidden by default) -->
                        <div class="schedule-picker hidden mt-6 pt-6 border-t border-slate-200 dark:border-slate-800">
                            <p class="text-base font-bold text-slate-900 dark:text-slate-50 mb-4">
                                Chọn ngày giờ khám
                            </p>

                            <!-- Date Picker Navigation -->
                            <div class="flex items-center justify-between mb-4">
                                <button type="button" class="prev-month p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                                    <span class="material-symbols-outlined">chevron_left</span>
                                </button>
                                <p class="month-year text-base font-semibold text-slate-800 dark:text-slate-200"></p>
                                <button type="button" class="next-month p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                                    <span class="material-symbols-outlined">chevron_right</span>
                                </button>
                            </div>

                            <!-- Calendar -->
                            <div class="calendar-container mb-4"></div>

                            <!-- Time Slots -->
                            <div class="time-slots-container grid grid-cols-3 sm:grid-cols-4 gap-3"></div>

                            <!-- Booking Form -->
                            <div class="booking-form hidden mt-6">
                                <form method="POST" action="{{ route('booking.confirm') }}" class="space-y-4">
                                    @csrf
                                    <input type="hidden" name="doctorId" value="{{ $doctor->id }}">
                                    <input type="hidden" name="scheduleId" class="schedule-id-input">

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Họ tên *</label>
                                            <input type="text" name="name" required class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 px-4">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Số điện thoại *</label>
                                            <input type="tel" name="phone" required class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 px-4">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email *</label>
                                        <input type="email" name="email" required value="{{ Auth::user()->email }}" class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 px-4">
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Giới tính</label>
                                            <select name="gender" class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50">
                                                <option value="">Chọn giới tính</option>
                                                <option value="male">Nam</option>
                                                <option value="female">Nữ</option>
                                                <option value="other">Khác</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Năm sinh</label>
                                            <input type="text" name="year" placeholder="VD: 1990" class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 px-4">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Địa chỉ</label>
                                        <input type="text" name="address" class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 px-4">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Triệu chứng / Lý do khám</label>
                                        <textarea name="description" rows="3" class="w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 px-4 py-3"></textarea>
                                    </div>

                                    <button type="submit" class="w-full flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90">
                                        <span class="truncate">Xác nhận đặt lịch</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-12">
                        <p class="text-slate-600 dark:text-slate-400">Không tìm thấy bác sĩ phù hợp.</p>
                    </div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const doctorCards = document.querySelectorAll('.doctor-card');
    
    doctorCards.forEach(card => {
        const doctorId = card.dataset.doctorId;
        const viewScheduleBtn = card.querySelector('.view-schedule-btn');
        const schedulePicker = card.querySelector('.schedule-picker');
        const calendarContainer = card.querySelector('.calendar-container');
        const timeSlotsContainer = card.querySelector('.time-slots-container');
        const monthYearDisplay = card.querySelector('.month-year');
        const prevMonthBtn = card.querySelector('.prev-month');
        const nextMonthBtn = card.querySelector('.next-month');
        const bookingForm = card.querySelector('.booking-form');
        const scheduleIdInput = card.querySelector('.schedule-id-input');
        
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        let selectedDate = null;
        let schedulesData = {};
        
        // Toggle schedule picker
        viewScheduleBtn.addEventListener('click', function() {
            const isHidden = schedulePicker.classList.contains('hidden');
            
            // Hide all other schedule pickers
            document.querySelectorAll('.schedule-picker').forEach(sp => {
                sp.classList.add('hidden');
            });
            
            // Toggle current schedule picker
            if (isHidden) {
                schedulePicker.classList.remove('hidden');
                card.classList.add('border-2', 'border-primary');
                card.classList.remove('border');
                loadSchedules(doctorId, currentMonth + 1, currentYear);
            } else {
                schedulePicker.classList.add('hidden');
                card.classList.remove('border-2', 'border-primary');
                card.classList.add('border');
            }
        });
        
        // Month navigation
        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            loadSchedules(doctorId, currentMonth + 1, currentYear);
        });
        
        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            loadSchedules(doctorId, currentMonth + 1, currentYear);
        });
        
        function loadSchedules(doctorId, month, year) {
            fetch(`/booking/doctor/${doctorId}/schedules?month=${month}&year=${year}`)
                .then(response => response.json())
                .then(data => {
                    schedulesData = data.schedules;
                    renderCalendar(month, year);
                })
                .catch(error => {
                    console.error('Error loading schedules:', error);
                });
        }
        
        function renderCalendar(month, year) {
            const monthNames = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                              'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
            
            monthYearDisplay.textContent = `${monthNames[month - 1]}, ${year}`;
            
            const firstDay = new Date(year, month - 1, 1);
            const lastDay = new Date(year, month, 0);
            const daysInMonth = lastDay.getDate();
            const startingDayOfWeek = firstDay.getDay() === 0 ? 7 : firstDay.getDay();
            
            let calendarHTML = `
                <div class="grid grid-cols-7 gap-2 text-center mb-4">
                    <div class="text-xs text-slate-500 dark:text-slate-400">T2</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">T3</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">T4</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">T5</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">T6</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">T7</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">CN</div>
            `;
            
            // Empty cells before first day
            for (let i = 1; i < startingDayOfWeek; i++) {
                calendarHTML += '<div class="p-2 text-slate-400 dark:text-slate-600"></div>';
            }
            
            // Days of month
            const today = new Date();
            for (let day = 1; day <= daysInMonth; day++) {
                const dateStr = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const hasSchedule = schedulesData[dateStr] && schedulesData[dateStr].length > 0;
                const isPast = new Date(dateStr) < today.setHours(0, 0, 0, 0);
                
                let classes = 'p-2 rounded-full ';
                if (isPast || !hasSchedule) {
                    classes += 'text-slate-400 dark:text-slate-600 cursor-not-allowed';
                } else {
                    classes += 'hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200 cursor-pointer date-btn';
                }
                
                calendarHTML += `<button type="button" class="${classes}" data-date="${dateStr}" ${isPast || !hasSchedule ? 'disabled' : ''}>${day}</button>`;
            }
            
            calendarHTML += '</div>';
            calendarContainer.innerHTML = calendarHTML;
            
            // Add click handlers to date buttons
            card.querySelectorAll('.date-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    card.querySelectorAll('.date-btn').forEach(b => {
                        b.classList.remove('bg-primary', 'text-white', 'font-bold');
                    });
                    this.classList.add('bg-primary', 'text-white', 'font-bold');
                    
                    selectedDate = this.dataset.date;
                    loadTimeSlotsForDate(doctorId, selectedDate);
                });
            });
        }
        
        function loadTimeSlotsForDate(doctorId, date) {
            fetch(`/api/doctors/${doctorId}/available-times?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    renderTimeSlots(data.times);
                })
                .catch(error => {
                    console.error('Error loading time slots:', error);
                });
        }
        
        function renderTimeSlots(times) {
            if (!times || times.length === 0) {
                timeSlotsContainer.innerHTML = '<p class="col-span-full text-center text-slate-600 dark:text-slate-400">Không có lịch khám cho ngày này.</p>';
                bookingForm.classList.add('hidden');
                return;
            }
            
            let slotsHTML = '';
            times.forEach(time => {
                const timeStr = time.time.substring(0, 5); // HH:MM
                let classes = 'text-center py-2 px-3 rounded-lg border ';
                
                if (time.is_full) {
                    classes += 'border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-400 dark:text-slate-500 cursor-not-allowed';
                } else {
                    classes += 'border-slate-300 dark:border-slate-700 hover:border-primary text-slate-800 dark:text-slate-200 dark:hover:border-primary dark:hover:text-primary cursor-pointer time-slot-btn';
                }
                
                slotsHTML += `<button type="button" class="${classes}" data-schedule-id="${time.id}" ${time.is_full ? 'disabled' : ''}>${timeStr}</button>`;
            });
            
            timeSlotsContainer.innerHTML = slotsHTML;
            
            // Add click handlers to time slot buttons
            card.querySelectorAll('.time-slot-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    card.querySelectorAll('.time-slot-btn').forEach(b => {
                        b.classList.remove('border-2', 'border-primary', 'bg-primary/10', 'dark:bg-primary/20', 'text-primary', 'font-bold');
                        b.classList.add('border', 'border-slate-300', 'dark:border-slate-700');
                    });
                    
                    this.classList.remove('border', 'border-slate-300', 'dark:border-slate-700');
                    this.classList.add('border-2', 'border-primary', 'bg-primary/10', 'dark:bg-primary/20', 'text-primary', 'font-bold');
                    
                    const scheduleId = this.dataset.scheduleId;
                    scheduleIdInput.value = scheduleId;
                    bookingForm.classList.remove('hidden');
                    
                    // Smooth scroll to form
                    bookingForm.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                });
            });
        }
    });
    
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const form = document.getElementById('filterForm');
            const formData = new FormData(form);
            formData.set('search', this.value);
            
            const params = new URLSearchParams(formData);
            window.location.href = `{{ route('booking.index') }}?${params.toString()}`;
        }, 500);
    });
});
</script>
@endsection