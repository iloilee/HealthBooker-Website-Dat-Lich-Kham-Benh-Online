<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trang tổng quan - HealthBooker</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,0..200"
      rel="stylesheet"
    />
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#137fec",
              "background-light": "#f6f7f8",
              "background-dark": "#101922",
              "card-light": "#ffffff",
              "card-dark": "#1a2530",
              "text-primary-light": "#0d141b",
              "text-primary-dark": "#ffffff",
              "text-secondary-light": "#4c739a",
              "text-secondary-dark": "#a0b3c6",
              "border-light": "#e5e7eb",
              "border-dark": "#374151",
              // Thêm màu cho status
              "status-yellow": "#f59e0b",
              "status-green": "#10b981",
              "status-blue": "#3b82f6",
              "status-red": "#ef4444",
            },
            fontFamily: {
              display: ["Manrope", "sans-serif"],
            },
            borderRadius: {
              DEFAULT: "0.25rem",
              lg: "0.5rem",
              xl: "0.75rem",
              full: "9999px",
            },
          },
        },
      };
    </script>
    <style>
      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
      .material-symbols-outlined.filled {
        font-variation-settings: "FILL" 1, "wght" 400, "GRAD" 0, "opsz" 24;
      }
      /* CSS cho badge status */
      .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
      }
      .status-badge-dot {
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 50%;
        margin-right: 0.25rem;
      }
    </style>
  </head>
  <body
    class="font-display bg-background-light dark:bg-background-dark text-text-primary-light dark:text-text-primary-dark"
  >
    <div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="flex flex-col grow">
        <header
          class="sticky top-0 z-10 bg-card-light dark:bg-card-dark shadow-sm"
        >
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
              <a class="flex items-center gap-2 text-primary dark:text-white" href="{{ route('home') }}">
                <div class="size-6 text-primary">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_6_330)">
                            <path clip-rule="evenodd" d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z" fill="currentColor" fill-rule="evenodd"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_6_330">
                                <rect fill="white" height="48" width="48"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-[#0d141b] dark:text-gray-100">HealthBooker</span>
                <div class="hidden lg:flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                    <a 
                        class="{{ request()->routeIs('home') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('home') }}"
                    >
                        Trang chủ
                    </a>
                    <!-- NÚT ĐẶT LỊCH KHÁM  -->
                    @php
                        $showAppointmentBtn = false;
                        if (Auth::check() && Auth::user()->roleId == 3) { // PATIENT
                            $showAppointmentBtn = true;
                        }
                    @endphp
                    
                    @if($showAppointmentBtn)
                        <a 
                            class="{{ request()->routeIs('hososuckhoe') 
                                ? 'text-primary text-sm font-bold leading-normal' 
                                : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                            href="{{ route('hososuckhoe') }}"
                        >
                            Hồ sơ sức khỏe
                        </a>
                    @endif
                </div>
              </a>
              
              <div class="flex items-center gap-4">
                <button
                  class="flex items-center justify-center size-10 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800"
                >
                  <span class="material-symbols-outlined">notifications</span>
                </button>
                <div class="relative">
                  <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer">
                      <img src="{{ $user->avatar ?? asset('images/default-avatar.jpg') }}" 
                           alt="Avatar" 
                           class="w-12 h-12 rounded-full object-cover">
                      <div class="text-sm">
                          <p class="font-bold text-slate-900 dark:text-slate-50">{{ $user->name ?? 'Người dùng' }}</p>
                          <p class="text-slate-500 dark:text-slate-400">
                            @if($user->roleId == 1)
                                Quản trị viên
                            @elseif($user->roleId == 2)
                                Bác sĩ
                            @elseif($user->roleId == 3)
                                Bệnh nhân
                            @else
                                Người dùng
                            @endif
                          </p>
                      </div>

                      <span class="material-symbols-outlined text-slate-600 dark:text-slate-400">
                          expand_more
                      </span>
                  </div>
                  <div
                      id="doctorDropdown"
                      class="absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 shadow-lg rounded-lg border border-slate-200 dark:border-slate-700 hidden"
                  >
                      <a
                          href="{{ route('hososuckhoe') }}"
                          class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                      >
                          Hồ sơ sức khỏe
                      </a>
                      <a
                          href="{{ route('password.change') }}"
                          class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                      >
                          Đổi mật khẩu
                      </a>

                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button
                              type="submit"
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30"
                          >
                              Đăng xuất
                          </button>
                      </form>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </header>
        <main class="flex-grow">
          <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
              <h1 class="text-3xl font-bold tracking-tight">
                Chào mừng trở lại, {{ $user->name ?? 'Bạn' }}!
              </h1>
              <p
                class="text-text-secondary-light dark:text-text-secondary-dark mt-1"
              >
                Đây là trang tổng quan sức khỏe của bạn.
              </p>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
              <div class="lg:col-span-2 flex flex-col gap-6">
                <!-- Cuộc hẹn sắp tới -->
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h2 class="text-xl font-semibold mb-4">Cuộc hẹn sắp tới</h2>
                  @if($upcomingAppointments->count() > 0)
                  <div
                    class="divide-y divide-border-light dark:divide-border-dark"
                  >
                    @foreach($upcomingAppointments as $appointment)
                    @php
                        // Xác định màu và text cho status
                        $statusConfig = [
                            1 => ['text' => 'Chưa xác nhận', 'color' => 'yellow', 'bg' => 'bg-status-yellow/10', 'textColor' => 'text-status-yellow', 'border' => 'border-status-yellow'],
                            2 => ['text' => 'Đã xác nhận', 'color' => 'green', 'bg' => 'bg-status-green/10', 'textColor' => 'text-status-green', 'border' => 'border-status-green'],
                            3 => ['text' => 'Đã khám', 'color' => 'blue', 'bg' => 'bg-status-blue/10', 'textColor' => 'text-status-blue', 'border' => 'border-status-blue'],
                            4 => ['text' => 'Đã hủy', 'color' => 'red', 'bg' => 'bg-status-red/10', 'textColor' => 'text-status-red', 'border' => 'border-status-red'],
                        ];
                        $status = $statusConfig[$appointment->statusId] ?? $statusConfig[1];
                        $date = \Carbon\Carbon::parse($appointment->dateBooking);
                        $monthNames = ['Thg 1', 'Thg 2', 'Thg 3', 'Thg 4', 'Thg 5', 'Thg 6', 
                                      'Thg 7', 'Thg 8', 'Thg 9', 'Thg 10', 'Thg 11', 'Thg 12'];
                    @endphp
                    <div
                      class="py-4 flex flex-col sm:flex-row sm:items-center gap-4"
                    >
                      <div class="flex items-center gap-4 flex-shrink-0">
                        <!-- Ngày tháng với màu theo status -->
                        <div
                          class="flex flex-col items-center justify-center h-16 w-16 bg-blue-100 text-blue-700 border border-blue-300 border rounded-lg"
                        >
                          <span class="text-xs uppercase font-bold">{{ $monthNames[$date->month - 1] }}</span>
                          <span class="text-2xl font-bold">{{ $date->day }}</span>
                        </div>
                        <!-- Ảnh bác sĩ -->
                        <div class="h-16 w-16 rounded-full overflow-hidden">
                          <img
                            alt="Avatar bác sĩ"
                            class="h-full w-full object-cover"
                            src="{{ $appointment->doctor->user->avatar ?? asset('images/default-avatar.jpg') }}"
                            onerror="this.src='{{ asset('images/default-avatar.jpg') }}'"
                          />
                        </div>
                      </div>
                      <div class="flex-grow">
                        <div class="flex items-center justify-between">
                          <p class="font-semibold">{{ $appointment->description ?? 'Khám bệnh' }}</p>
                          
                        </div>
                        @if($appointment->doctor && $appointment->doctor->user)
                        <p
                          class="text-sm text-text-secondary-light dark:text-text-secondary-dark mt-1"
                        >
                          Với BS. {{ $appointment->doctor->user->name ?? 'Không xác định' }}
                        </p>
                        @endif
                        <p
                          class="text-sm text-text-secondary-light dark:text-text-secondary-dark flex items-center gap-1 mt-1"
                        >
                          <span class="material-symbols-outlined text-base"
                            >schedule</span
                          >
                          {{ $appointment->timeBooking ?? 'Không xác định' }} - 
                          {{ $date->locale('vi')->isoFormat('dddd') }}
                        </p>
                        @if($appointment->cancellation_reason && $appointment->statusId == 4)
                        <p class="text-sm text-status-red mt-1 italic">
                          Lý do hủy: {{ $appointment->cancellation_reason }}
                        </p>
                        @endif
                      </div>
                      <div
                        class="flex-shrink-0 flex sm:flex-col items-center gap-2">
                        <!-- Badge status -->
                          <span class="status-badge {{ $status['bg'] }} {{ $status['textColor'] }}">
                            <span class="status-badge-dot bg-{{ $status['color'] }}-500"></span>
                            {{ $status['text'] }}
                          </span>
                      </div>
                      <div
                        class="flex-shrink-0 flex sm:flex-col items-center gap-2">
                        @if($appointment->statusId == 1 || $appointment->statusId == 2)
                        <button
                          type="button"
                          class="w-full sm:w-auto text-sm font-semibold text-red-500 hover:underline"
                          onclick="cancelAppointment({{ $appointment->id }})"
                          {{ $appointment->statusId == 4 ? 'disabled' : '' }}
                        >
                          Hủy lịch
                        </button>
                        @elseif($appointment->statusId == 3)
                        <a
                          href="#"
                          class="w-full sm:w-auto text-sm font-semibold text-primary hover:underline"
                        >
                          Xem kết quả
                        </a>
                        <button
                          class="w-full sm:w-auto text-sm font-semibold text-gray-400 cursor-not-allowed"
                          disabled
                        >
                          Đã khám
                        </button>
                        @elseif($appointment->statusId == 4)
                        <button
                          class="w-full sm:w-auto text-sm font-semibold text-status-red cursor-not-allowed"
                          disabled
                        >
                          Đã hủy
                        </button>
                        <a
                          href="{{ route('booking.index') }}"
                          class="w-full sm:w-auto text-sm font-semibold text-primary hover:underline"
                        >
                          Đặt lại
                        </a>
                        @endif
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @else
                  <div class="text-center py-8">
                    <span class="material-symbols-outlined text-4xl text-gray-400 dark:text-gray-500">
                      event_busy
                    </span>
                    <p class="mt-2 text-text-secondary-light dark:text-text-secondary-dark">
                      Bạn không có cuộc hẹn nào sắp tới
                    </p>
                    <a href="{{ route('booking.index') }}" class="mt-4 inline-block text-primary font-semibold hover:underline">
                      Đặt lịch ngay
                    </a>
                  </div>
                  @endif
                  {{-- <a
                    class="mt-4 block text-center text-primary font-semibold hover:underline"
                    href="#"
                    >Xem tất cả cuộc hẹn</a
                  > --}}
                </div>
                
                <!-- Lịch sử khám bệnh -->
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h2 class="text-xl font-semibold mb-4">Lịch sử khám bệnh</h2>
                  @if($medicalHistory->count() > 0)
                  <div class="flow-root">
                    <ul class="-mb-8" role="list">
                      @foreach($medicalHistory as $index => $history)
                      @php
                        // Xác định icon và màu cho lịch sử
                        $historyConfig = [
                            3 => ['icon' => 'check', 'color' => 'bg-status-blue', 'textColor' => 'text-white'],
                            4 => ['icon' => 'close', 'color' => 'bg-status-red', 'textColor' => 'text-white'],
                        ];
                        $config = $historyConfig[$history->statusId] ?? $historyConfig[3];
                      @endphp
                      <li>
                        <div class="relative pb-8">
                          @if($index < $medicalHistory->count() - 1)
                          <span
                            aria-hidden="true"
                            class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-border-light dark:bg-border-dark"
                          ></span>
                          @endif
                          <div class="relative flex space-x-3">
                            <div>
                              <span
                                class="h-8 w-8 rounded-full {{ $config['color'] }} flex items-center justify-center ring-8 ring-card-light dark:ring-card-dark"
                              >
                                <span
                                  class="material-symbols-outlined {{ $config['textColor'] }} text-base"
                                >
                                  {{ $config['icon'] }}
                                </span>
                              </span>
                            </div>
                            <div
                              class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5"
                            >
                              <div>
                                <p
                                  class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                                >
                                  {{ $history->description ?? 'Khám bệnh' }} 
                                  @if($history->doctor && $history->doctor->user)
                                  với
                                  <span class="font-medium text-text-primary-light dark:text-text-primary-dark">
                                    BS. {{ $history->doctor->user->name }}
                                  </span>
                                  @endif
                                </p>
                                @if($history->statusId == 4 && $history->cancellation_reason)
                                <p class="text-xs text-status-red mt-1">
                                  Lý do hủy: {{ $history->cancellation_reason }}
                                </p>
                                @endif
                              </div>
                              <div class="flex flex-col items-end">
                                <div
                                  class="text-right text-sm whitespace-nowrap text-text-secondary-light dark:text-text-secondary-dark"
                                >
                                  <time datetime="{{ $history->dateBooking }}">
                                    {{ \Carbon\Carbon::parse($history->dateBooking)->format('d/m/Y') }}
                                  </time>
                                </div>
                                <!-- Status cho lịch sử -->
                                @php
                                  $statusText = [
                                      3 => 'Đã khám',
                                      4 => 'Đã hủy',
                                  ];
                                @endphp
                                <span class="status-badge mt-1 {{ 
                                  $history->statusId == 3 ? 'bg-status-blue/10 text-status-blue' : 
                                  'bg-status-red/10 text-status-red'
                                }}">
                                  <span class="status-badge-dot {{ 
                                    $history->statusId == 3 ? 'bg-status-blue' : 'bg-status-red'
                                  }}"></span>
                                  {{ $statusText[$history->statusId] ?? 'Không xác định' }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  @else
                  <div class="text-center py-8">
                    <span class="material-symbols-outlined text-4xl text-gray-400 dark:text-gray-500">
                      history
                    </span>
                    <p class="mt-2 text-text-secondary-light dark:text-text-secondary-dark">
                      Chưa có lịch sử khám bệnh
                    </p>
                  </div>
                  @endif
                  {{-- <a
                    class="mt-4 block text-center text-primary font-semibold hover:underline"
                    href="#"
                    >Xem toàn bộ lịch sử</a
                  > --}}
                </div>
              </div>
              <div class="flex flex-col gap-6">
                {{-- <!-- Hồ sơ cá nhân -->
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h3 class="text-lg font-semibold">Hồ sơ của bạn</h3>
                  <div class="mt-4 flex items-center gap-4">
                    <img
                      alt="Avatar"
                      class="h-16 w-16 rounded-full object-cover"
                      src="{{ $user->avatar ?? asset('images/default-avatar.jpg') }}"
                      onerror="this.src='{{ asset('images/default-avatar.jpg') }}'"
                    />

                    <div>
                      <p class="font-bold">{{ $user->name }}</p>
                      <p
                        class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                      >
                        ID: {{ $user->id }}
                      </p>
                      <p
                        class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                      >
                        SĐT: {{ $user->phone }}
                      </p>
                      <p
                        class="text-sm text-text-secondary-light dark:text-text-secondary-dark"
                      >
                        Email: {{ $user->email }}
                      </p>
                    </div>
                  </div>
                  <a
                    href="#"
                    class="mt-4 w-full flex items-center justify-center gap-2 rounded-lg border border-border-light dark:border-border-dark py-2.5 px-4 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                  >
                    <span class="material-symbols-outlined text-base"
                      >edit</span
                    >
                    Chỉnh sửa hồ sơ
                  </a>
                </div> --}}
                
                <!-- Truy cập nhanh -->
                <div
                  class="bg-card-light dark:bg-card-dark p-6 rounded-xl shadow-sm"
                >
                  <h3 class="text-lg font-semibold">Truy cập nhanh</h3>
                  <div class="mt-4 space-y-3">
                    <a
                      class="flex items-center gap-3 p-3 rounded-lg hover:bg-background-light dark:hover:bg-background-dark transition-colors"
                      href="{{ route('booking.index') }}"
                    >
                      <span class="material-symbols-outlined text-primary"
                        >add_circle</span
                      >
                      <span class="font-semibold">Đặt lịch khám</span>
                    </a>
                    <a
                      class="flex items-center gap-3 p-3 rounded-lg hover:bg-background-light dark:hover:bg-background-dark transition-colors"
                      href="{{ route('doctors.search') }}"
                    >
                      <span class="material-symbols-outlined text-primary"
                        >search</span
                      >
                      <span class="font-semibold">Tìm kiếm bác sĩ</span>
                    </a>
                    {{-- <a
                      class="flex items-center gap-3 p-3 rounded-lg hover:bg-background-light dark:hover:bg-background-dark transition-colors"
                      href="#"
                    >
                      <span class="material-symbols-outlined text-primary"
                        >description</span
                      >
                      <span class="font-semibold">Xem kết quả xét nghiệm</span>
                    </a> --}}
                  </div>
                </div>
                
                <!-- Thông báo -->
                <div
                  class="bg-blue-50 dark:bg-blue-900/50 p-6 rounded-xl border border-blue-200 dark:border-blue-800"
                >
                  <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                      <span
                        class="material-symbols-outlined text-blue-600 dark:text-blue-400"
                        >campaign</span
                      >
                    </div>
                    <div>
                      <h3
                        class="font-semibold text-blue-800 dark:text-blue-300"
                      >
                        Thông báo quan trọng
                      </h3>
                      <p
                        class="mt-1 text-sm text-blue-700 dark:text-blue-300/80"
                      >
                        Đừng quên lịch tiêm phòng cúm mùa này. Hãy đặt lịch ngay
                        để bảo vệ sức khỏe!
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("doctorMenuBtn");
            const dropdown = document.getElementById("doctorDropdown");

            if (btn && dropdown) {
                btn.addEventListener("click", function (e) {
                    e.stopPropagation();
                    dropdown.classList.toggle("hidden");
                });

                document.addEventListener("click", function (event) {
                    if (!btn.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add("hidden");
                    }
                });
            }
            
        });

        function cancelAppointment(appointmentId) {
          console.log('Hủy lịch ID:', appointmentId);
          
          // Trước tiên kiểm tra xem có thể hủy không
          fetch(`/patient/appointments/${appointmentId}/check-cancel`, {
              method: 'GET',
              headers: {
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              }
          })
          .then(response => response.json())
          .then(data => {
              if (!data.canCancel) {
                  alert(data.message || 'Không thể hủy lịch hẹn này');
                  return;
              }
              
              // Nếu có thể hủy, hỏi lý do
              const reason = prompt('Vui lòng nhập lý do hủy lịch hẹn:');
              
              if (reason !== null && reason.trim() !== '') {
                  // Hiển thị loading
                  const button = document.querySelector(`button[onclick="cancelAppointment(${appointmentId})"]`);
                  if (button) {
                      button.disabled = true;
                      button.textContent = 'Đang hủy...';
                  }
                  
                  fetch(`/patient/appointments/${appointmentId}/cancel`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                          'Accept': 'application/json'
                      },
                      body: JSON.stringify({ 
                          reason: reason.trim()
                      })
                  })
                  .then(response => response.json())
                  .then(result => {
                      if (button) {
                          button.disabled = false;
                          button.textContent = 'Hủy lịch';
                      }
                      
                      if (result.success) {
                          alert('Đã hủy lịch hẹn thành công!');
                          // Reload trang sau 1 giây
                          setTimeout(() => {
                              location.reload();
                          }, 1000);
                      } else {
                          alert('Có lỗi xảy ra: ' + (result.message || 'Không xác định'));
                      }
                  })
                  .catch(error => {
                      if (button) {
                          button.disabled = false;
                          button.textContent = 'Hủy lịch';
                      }
                      console.error('Error:', error);
                      alert('Có lỗi xảy ra khi hủy lịch hẹn');
                  });
              } else if (reason !== null) {
                  alert('Vui lòng nhập lý do hủy lịch.');
              }
          })
          .catch(error => {
              console.error('Error checking cancel eligibility:', error);
              alert('Có lỗi xảy ra khi kiểm tra điều kiện hủy lịch');
          });
      }
      </script>
  </body>
</html>