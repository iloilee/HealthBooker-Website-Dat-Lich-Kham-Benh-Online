<!DOCTYPE html>
<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Bảng Điều Khiển Bác Sĩ - HealthBooker</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
              success: "#22c55e",
              warning: "#f59e0b",
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
    </style>
  </head>
  <body class="font-display bg-background-light dark:bg-background-dark">
    <div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <header
          class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-4 sm:px-6 lg:px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-50"
        >
          <div
            class="flex items-center gap-4 text-slate-900 dark:text-slate-50"
          >
            <div class="size-6 text-primary">
              <a href="{{ route('home') }}">
                <svg
                  fill="none"
                  viewBox="0 0 48 48"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_6_330)">
                    <path
                      clip-rule="evenodd"
                      d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z"
                      fill="currentColor"
                      fill-rule="evenodd"
                    ></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_6_330">
                      <rect fill="white" height="48" width="48"></rect>
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">
                HealthBooker
              </h2>
              </a>
            <div class="hidden md:flex ml-8">
              <div class="flex items-center gap-6">
                <a
                  class="text-primary text-sm font-bold leading-normal"
                  href="{{ route('bacsilog') }}"
                  >Tổng quan</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="{{ route('doctor_profile') }}"
                  >Hồ sơ Bác sĩ</a
                >
              </div>
            </div>
          </div>
          <div class="hidden md:flex flex-1 justify-end items-center gap-4">
            <button
              class="flex items-center justify-center size-10 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800"
            >
              <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="relative">
              <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer">
                  <img src="{{ $doctor->user->avatar ?? asset('images/default.jpg') }}" class="w-12 h-12 rounded-full">
                  <div class="text-sm">
                      <p class="font-bold text-slate-900 dark:text-slate-50">{{ $doctor->user->name }}</p>
                      <p class="text-slate-500 dark:text-slate-400">{{ $doctor->specialization->name }}</p>
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
                      href="{{ route('doctor_profile') }}"
                      class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700"
                  >
                      Hồ sơ cá nhân
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
          <button
            class="md:hidden flex items-center justify-center size-10 rounded-lg text-slate-900 dark:text-slate-50 hover:bg-slate-100 dark:hover:bg-slate-800"
          >
            <span class="material-symbols-outlined">menu</span>
          </button>
        </header>
        <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <div
            class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8"
          >
            <div class="flex flex-col gap-1">
              <p
                class="text-slate-900 dark:text-slate-50 text-3xl font-bold leading-tight tracking-[-0.033em]"
              >
                Chào mừng trở lại, Bác sĩ {{ $doctor->user->name }}!
              </p>
              <p
                class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal"
              >
                Đây là bảng điều khiển của bạn hôm nay.
              </p>
            </div>
            <div class="flex items-center gap-2">
              <button
                id="manageScheduleBtn"
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-200 dark:hover:bg-slate-700 gap-2"
              >
                <span class="material-symbols-outlined !text-xl"
                  >manage_history</span
                >
                <span class="truncate">Quản lý lịch</span>
              </button>
              <button
                id="createAppointmentBtn"
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 gap-2"
              >
                <span class="material-symbols-outlined !text-xl">add</span>
                <span class="truncate">Tạo lịch hẹn mới</span>
              </button>
            </div>
          </div>
          

          

          <div class="lg:col-span-2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div
                            class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 h-full flex flex-col"
                        >
                            <div class="flex items-center justify-between mb-6">
                                <h3
                                    class="text-slate-900 dark:text-slate-50 text-lg font-bold leading-tight tracking-[-0.015em]"
                                >
                                    Tình hình làm việc hôm nay
                                </h3>
                                @if($workStatus['is_online'])
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-50 dark:bg-green-500/10 border border-green-100 dark:border-green-500/20"
                                >
                                    <span class="relative flex h-2.5 w-2.5">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"
                                        ></span>
                                        <span
                                            class="relative inline-flex rounded-full h-2.5 w-2.5 bg-success"
                                        ></span>
                                    </span>
                                    <span
                                        class="text-xs font-bold text-green-700 dark:text-green-400"
                                    >
                                        Đang trực tuyến
                                    </span>
                                </div>
                                @else
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 dark:bg-red-500/10 border border-red-100 dark:border-red-500/20"
                                >
                                    <span class="relative flex h-2.5 w-2.5">
                                        <span
                                            class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500"
                                        ></span>
                                    </span>
                                    <span class="text-xs font-bold text-red-700 dark:text-red-400">
                                        Ngoại tuyến
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="space-y-4">
                                <!-- Tiến độ công việc -->
                                <div
                                    class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800/50 rounded-lg border border-slate-100 dark:border-slate-700"
                                >
                                    <div>
                                        <p
                                            class="font-bold text-slate-900 dark:text-slate-50 text-sm"
                                        >
                                            Tiến độ công việc
                                        </p>
                                        <p
                                            class="text-xs text-slate-500 dark:text-slate-400 mt-0.5"
                                        >
                                            Số lượng lịch hẹn đã hoàn thành hôm nay
                                        </p>

                                        <!-- Thanh progress bar -->
                                        @php $progressPercentage = $workStatus['total_appointments']
                                        > 0 ? ($workStatus['completed_appointments'] /
                                        $workStatus['total_appointments']) * 100 : 0; @endphp
                                        <div
                                            class="mt-2 w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5"
                                        >
                                            <div
                                                class="bg-primary h-1.5 rounded-full"
                                                style="width: {{ min($progressPercentage, 100) }}%"
                                            ></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-lg font-bold text-slate-900 dark:text-slate-50"
                                        >
                                            {{ $workStatus['completed_appointments'] }} / {{
                                            $workStatus['total_appointments'] }}
                                        </span>
                                        <span class="text-sm text-slate-500 dark:text-slate-400">
                                            cuộc hẹn
                                        </span>
                                    </div>
                                </div>

                                <!-- Thời gian còn lại -->
                                <div
                                    class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800/50 rounded-lg border border-slate-100 dark:border-slate-700">
                                    <div>
                                        <p
                                            class="font-bold text-slate-900 dark:text-slate-50 text-sm"
                                        >
                                            Thời gian còn lại
                                        </p>
                                        <p
                                            class="text-xs text-slate-500 dark:text-slate-400 mt-0.5"
                                        >
                                            Thời gian làm việc dự kiến
                                        </p>

                                        <!-- Chi tiết thời gian -->
                                        @if($workStatus['remaining_work_time'] > 0)
                                        <div class="mt-2">
                                            <div class="flex items-center gap-2">
                                                <span
                                                    class="text-xs text-slate-500 dark:text-slate-400"
                                                >
                                                    Buổi sáng: 7:00 - 11:00
                                                </span>
                                                @php $now = \Carbon\Carbon::now(); $morningEnd =
                                                \Carbon\Carbon::createFromTime(11, 0, 0);
                                                $isMorningActive = $now->format('H:i') < '11:00';
                                                @endphp @if($isMorningActive)
                                                <span
                                                    class="text-xs px-1.5 py-0.5 rounded bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-400"
                                                >
                                                    Đang làm
                                                </span>
                                                @else
                                                <span
                                                    class="text-xs px-1.5 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400"
                                                >
                                                    Đã xong
                                                </span>
                                                @endif
                                            </div>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span
                                                    class="text-xs text-slate-500 dark:text-slate-400"
                                                >
                                                    Buổi chiều: 13:00 - 17:00
                                                </span>
                                                @php $afternoonStart =
                                                \Carbon\Carbon::createFromTime(13, 0, 0);
                                                $afternoonEnd = \Carbon\Carbon::createFromTime(17,
                                                0, 0); $isAfternoonActive = $now->format('H:i') >=
                                                '13:00' && $now->format('H:i') < '17:00'; @endphp
                                                @if($isAfternoonActive)
                                                <span
                                                    class="text-xs px-1.5 py-0.5 rounded bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-400"
                                                >
                                                    Đang làm
                                                </span>
                                                @elseif($now->format('H:i') < '13:00')
                                                <span
                                                    class="text-xs px-1.5 py-0.5 rounded bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-400"
                                                >
                                                    Sắp đến
                                                </span>
                                                @else
                                                <span
                                                    class="text-xs px-1.5 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400"
                                                >
                                                    Đã xong
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-2 text-primary font-bold">
                                        <span class="material-symbols-outlined text-base">
                                            timer
                                        </span>
                                        <span>{{ $workStatus['remaining_work_time_text'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div
                            class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 h-full">
                            <h3
                                class="text-slate-900 dark:text-slate-50 text-lg font-bold leading-tight tracking-[-0.015em] mb-4"
                            >
                                Thông báo quan trọng
                            </h3>
                            <ul class="space-y-4">
                                <li
                                    class="flex items-start gap-4 p-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                >
                                    <div
                                        class="flex-shrink-0 size-10 flex items-center justify-center rounded-full bg-warning/10 text-warning mt-1"
                                    >
                                        <span
                                            class="material-symbols-outlined !text-xl"
                                            >calendar_month</span
                                        >
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm text-slate-800 dark:text-slate-200 leading-snug"
                                        >
                                            Yêu cầu hủy lịch từ bệnh nhân
                                            <span class="font-bold"
                                                >Phạm Gia Huy</span
                                            >
                                            cho lịch hẹn 14:00 ngày mai.
                                        </p>
                                        <a
                                            class="text-xs text-primary font-bold hover:underline mt-1 inline-block"
                                            href="#"
                                            >Xem chi tiết</a
                                        >
                                    </div>
                                </li>
                                <li
                                    class="flex items-start gap-4 p-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                                >
                                    <div
                                        class="flex-shrink-0 size-10 flex items-center justify-center rounded-full bg-primary/10 text-primary mt-1"
                                    >
                                        <span
                                            class="material-symbols-outlined !text-xl"
                                            >reviews</span
                                        >
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm text-slate-800 dark:text-slate-200 leading-snug"
                                        >
                                            Bạn có một đánh giá mới từ bệnh nhân
                                            <span class="font-bold"
                                                >Vũ Ngọc Anh</span
                                            >.
                                        </p>
                                        <a
                                            class="text-xs text-primary font-bold hover:underline mt-1 inline-block"
                                            href="#"
                                            >Xem đánh giá</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </div> --}}

                        <!-- Thông báo quan trọng -->
                        <div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 h-full">
                            <h3 class="text-slate-900 dark:text-slate-50 text-lg font-bold leading-tight tracking-[-0.015em] mb-4">
                                Thông báo quan trọng
                            </h3>
                            <ul class="space-y-4">
                                <!-- Yêu cầu hủy lịch -->
                                @if($pendingCancellations && $pendingCancellations->count() > 0)
                                    @foreach($pendingCancellations as $cancellation)
                                        @php
                                            $cancellationDate = \Carbon\Carbon::parse($cancellation->dateBooking);
                                            $isTomorrow = $cancellationDate->isTomorrow();
                                            $time = \Carbon\Carbon::parse($cancellation->timeBooking)->format('H:i');
                                        @endphp
                                        
                                        <li class="flex items-start gap-4 p-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <div class="flex-shrink-0 size-10 flex items-center justify-center rounded-full bg-warning/10 text-warning mt-1">
                                                <span class="material-symbols-outlined !text-xl">calendar_month</span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm text-slate-800 dark:text-slate-200 leading-snug">
                                                    Yêu cầu hủy lịch từ bệnh nhân
                                                    <span class="font-bold">{{ $cancellation->name }}</span>
                                                    cho lịch hẹn {{ $time }} 
                                                    @if($isTomorrow)
                                                        ngày mai.
                                                    @else
                                                        ngày {{ $cancellationDate->format('d/m') }}.
                                                    @endif
                                                </p>
                                                @if($cancellation->cancellation_reason)
                                                    <p class="text-xs text-slate-600 dark:text-slate-400 mt-1 italic">
                                                        Lý do: "{{ Str::limit($cancellation->cancellation_reason, 60) }}"
                                                    </p>
                                                @endif
                                                <div class="flex items-center gap-3 mt-2">
                                                    <button onclick="confirmAppointment({{ $cancellation->id }})"
                                                            class="text-xs px-3 py-1 rounded bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 hover:bg-green-200 dark:hover:bg-green-900/50">
                                                        Xác nhận hủy
                                                    </button>
                                                    <button onclick="rejectCancellation({{ $cancellation->id }})"
                                                            class="text-xs px-3 py-1 rounded bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50">
                                                        Từ chối
                                                    </button>
                                                    <a href="tel:{{ $cancellation->phone }}"
                                                    class="text-xs px-3 py-1 rounded bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-900/50 flex items-center gap-1">
                                                        <span class="material-symbols-outlined text-xs">call</span>
                                                        Gọi
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @elseif($cancellationRequests && $cancellationRequests->count() > 0)
                                    @foreach($cancellationRequests->take(2) as $cancellation)
                                        @php
                                            $cancellationDate = \Carbon\Carbon::parse($cancellation->dateBooking);
                                            $time = \Carbon\Carbon::parse($cancellation->timeBooking)->format('H:i');
                                        @endphp
                                        
                                        <li class="flex items-start gap-4 p-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <div class="flex-shrink-0 size-10 flex items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 mt-1">
                                                <span class="material-symbols-outlined !text-xl">cancel</span>
                                            </div>
                                            <div>
                                                <p class="text-sm text-slate-800 dark:text-slate-200 leading-snug">
                                                    Lịch hẹn với bệnh nhân
                                                    <span class="font-bold">{{ $cancellation->name }}</span>
                                                    vào {{ $time }} ngày {{ $cancellationDate->format('d/m') }} đã bị hủy.
                                                </p>
                                                @if($cancellation->cancellation_reason)
                                                    <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">
                                                        Lý do: {{ Str::limit($cancellation->cancellation_reason, 80) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                
                                <!-- Đánh giá mới -->
                                @if($recentFeedbacks && $recentFeedbacks->count() > 0)
                                    @foreach($recentFeedbacks as $feedback)
                                        @php
                                            $ratingStars = str_repeat('★', $feedback->rating) . str_repeat('☆', 5 - $feedback->rating);
                                            $feedbackDate = \Carbon\Carbon::parse($feedback->created_at);
                                            $isRecent = $feedbackDate->diffInDays(now()) <= 3; // Trong 3 ngày gần đây
                                        @endphp
                                        
                                        <li class="flex items-start gap-4 p-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                            <div class="flex-shrink-0 size-10 flex items-center justify-center rounded-full 
                                                {{ $isRecent ? 'bg-primary/10 text-primary' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400' }} mt-1">
                                                <span class="material-symbols-outlined !text-xl">reviews</span>
                                            </div>
                                            <div>
                                                <p class="text-sm text-slate-800 dark:text-slate-200 leading-snug">
                                                    Bạn có {{ $isRecent ? 'một đánh giá mới' : 'một đánh giá' }} từ bệnh nhân
                                                    <span class="font-bold">{{ $feedback->patient_name ?? 'Không xác định' }}</span>
                                                    @if($feedback->dateBooking)
                                                        cho lịch hẹn ngày {{ \Carbon\Carbon::parse($feedback->dateBooking)->format('d/m') }}.
                                                    @else
                                                        .
                                                    @endif
                                                </p>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <span class="text-yellow-500 text-sm">{{ $ratingStars }}</span>
                                                    <span class="text-xs text-slate-500">{{ $feedbackDate->diffForHumans() }}</span>
                                                </div>
                                                @if($feedback->content)
                                                    <p class="text-xs text-slate-600 dark:text-slate-400 mt-1 italic">
                                                        "{{ Str::limit($feedback->content, 100) }}"
                                                    </p>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                
                                <!-- Hiển thị khi không có thông báo -->
                                @if((!$pendingCancellations || $pendingCancellations->count() == 0) && 
                                    (!$recentFeedbacks || $recentFeedbacks->count() == 0))
                                    <li class="text-center py-4">
                                        <div class="flex-shrink-0 size-10 flex items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto mb-2">
                                            <span class="material-symbols-outlined !text-xl">notifications</span>
                                        </div>
                                        <p class="text-sm text-slate-500 dark:text-slate-400">
                                            Không có thông báo mới
                                        </p>
                                    </li>
                                @endif
                            </ul>
                        </div>
            </div>

            <div
                class="bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                <div
                    class="flex items-center justify-between p-6 pb-4 border-b border-slate-100 dark:border-slate-800"
                >
                    <h2
                        class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]"
                    >
                        Lịch hẹn sắp tới
                    </h2>
                    <span class="text-primary text-sm font-bold leading-normal">
                        {{ $appointments->count() }} cuộc hẹn
                    </span>
                </div>
                
                @if($appointments->count() > 0)
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-slate-600 dark:text-slate-400"
                        >
                            <thead
                                class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-800/80 dark:text-slate-400"
                            >
                                <tr>
                                    <th class="px-6 py-4" scope="col">STT</th>
                                    <th class="px-6 py-4" scope="col">Bệnh nhân</th>
                                    <th class="px-6 py-4" scope="col">Giới tính</th>
                                    <th class="px-6 py-4" scope="col">Ngày hẹn</th>
                                    <th class="px-6 py-4" scope="col">Giờ hẹn</th>
                                    <th class="px-6 py-4" scope="col">SĐT</th>
                                    <th class="px-6 py-4" scope="col">Lý do khám</th>
                                    <th class="px-6 py-4" scope="col">Trạng thái</th>
                                    <th class="px-6 py-4 text-center" scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                @foreach($appointments as $index => $appointment)
                                    @php
                                        $appointmentDate = \Carbon\Carbon::parse($appointment->dateBooking);
                                        $today = \Carbon\Carbon::today();
                                        $tomorrow = \Carbon\Carbon::tomorrow();
                                        
                                        $dateText = $appointmentDate->format('d/m/Y');
                                        $dateClass = 'text-slate-900 dark:text-slate-200';
                                        $dateLabel = $dateText;
                                        
                                        if ($appointmentDate->isToday()) {
                                            $dateClass = 'text-green-600 dark:text-green-400';
                                            $dateLabel = 'Hôm nay';
                                        } elseif ($appointmentDate->isTomorrow()) {
                                            $dateClass = 'text-blue-600 dark:text-blue-400';
                                            $dateLabel = 'Ngày mai';
                                        }
                                        
                                        // Format giờ
                                        $time = \Carbon\Carbon::parse($appointment->timeBooking)->format('H:i');
                                        
                                        // Trạng thái
                                        $statusConfig = [
                                            1 => ['class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-400', 'text' => 'Chờ xác nhận'],
                                            2 => ['class' => 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-400', 'text' => 'Đã xác nhận'],
                                            3 => ['class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-400', 'text' => 'Đã khám'],
                                            4 => ['class' => 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-400', 'text' => 'Đã hủy'],
                                        ];
                                        
                                        $status = $statusConfig[$appointment->statusId] ?? ['class' => 'bg-slate-100 text-slate-800 dark:bg-slate-900/40 dark:text-slate-400', 'text' => 'Không xác định'];
                                        
                                        // Avatar placeholder dựa trên giới tính
                                        $avatarGender = $appointment->gender == 'female' ? 'women' : 'men';
                                        $avatarNumber = ($appointment->id % 99) + 1; // Random number 1-99
                                        $avatarUrl = "https://randomuser.me/api/portraits/{$avatarGender}/{$avatarNumber}.jpg";
                                        
                                        // Icon giới tính
                                        $genderIcon = $appointment->gender == 'female' ? 'female' : 'male';
                                        $genderColor = $appointment->gender == 'female' ? 'text-pink-500' : 'text-blue-500';
                                        
                                        // ID bệnh nhân
                                        $patientId = 'BN-' . str_pad($appointment->id, 4, '0', STR_PAD_LEFT);
                                    @endphp
                                    
                                    <tr
                                        class="bg-white hover:bg-slate-50 dark:bg-background-dark dark:hover:bg-slate-800/50 transition-colors"
                                    >
                                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <img
                                                    alt="{{ $appointment->name }}"
                                                    class="size-9 rounded-full object-cover border border-slate-200 dark:border-slate-700"
                                                    src="{{ optional($appointment->user)->avatar }}"
                                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($appointment->name) }}&background=random&color=fff&size=128'"
                                                />
                                                <div class="flex flex-col">
                                                    <span class="font-bold text-slate-900 dark:text-slate-200">
                                                        {{ $appointment->name }}
                                                    </span>
                                                    <span class="text-xs text-slate-500">
                                                        ID: {{ $patientId }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-1">
                                                <span
                                                    class="material-symbols-outlined {{ $genderColor }} text-xl"
                                                    title="{{ $appointment->gender == 'female' ? 'Nữ' : 'Nam' }}"
                                                >
                                                    {{ $genderIcon }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-bold {{ $dateClass }}">
                                                {{ $dateLabel }}
                                            </span>
                                            <div class="text-xs text-slate-500">
                                                {{ $dateText }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-2.5 py-1 rounded bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs"
                                            >
                                                {{ $time }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a
                                                class="flex items-center gap-1 hover:text-primary transition-colors font-medium"
                                                href="tel:{{ $appointment->phone }}"
                                            >
                                                <span class="material-symbols-outlined text-base">
                                                    call
                                                </span>
                                                {{ substr($appointment->phone, 0, 4) }} {{ substr($appointment->phone, 4, 3) }} {{ substr($appointment->phone, 7) }}
                                            </a>
                                        </td>
                                        <td
                                            class="px-6 py-4 max-w-[200px] truncate"
                                            title="{{ $appointment->description }}"
                                        >
                                            {{ $appointment->description ?? 'Không có mô tả' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $status['class'] }}"
                                            >
                                                {{ $status['text'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button
                                                    class="text-slate-500 hover:text-primary transition-colors p-1 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800"
                                                    title="Xem chi tiết"
                                                    onclick="viewAppointmentDetail({{ $appointment->id }})"
                                                >
                                                    <span class="material-symbols-outlined text-[20px]">
                                                        visibility
                                                    </span>
                                                </button>
                                                
                                                @if($appointment->statusId == 1)
                                                    <button
                                                        class="text-slate-500 hover:text-green-600 transition-colors p-1 rounded-full hover:bg-green-50 dark:hover:bg-green-900/20"
                                                        title="Xác nhận"
                                                        onclick="confirmAppointment({{ $appointment->id }})"
                                                    >
                                                        <span class="material-symbols-outlined text-[20px]">
                                                            check_circle
                                                        </span>
                                                    </button>
                                                @endif
                                                
                                                @if($appointment->statusId !== 4 && $appointment->statusId !== 3)
                                                  <button
                                                      class="text-slate-500 hover:text-red-500 transition-colors p-1 rounded-full hover:bg-red-50 dark:hover:bg-red-900/20"
                                                      title="Hủy lịch"
                                                      onclick="cancelAppointment({{ $appointment->id }})"
                                                  >
                                                      <span class="material-symbols-outlined text-[20px]">
                                                          cancel
                                                      </span>
                                                  </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="inline-flex items-center justify-center size-16 rounded-full bg-slate-100 dark:bg-slate-800 mb-4">
                            <span class="material-symbols-outlined text-slate-400 text-3xl">
                                calendar_today
                            </span>
                        </div>
                        <h5 class="text-slate-700 dark:text-slate-300 font-medium mb-2">
                            Không có lịch hẹn nào sắp tới
                        </h5>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            Hãy kiểm tra lại sau hoặc cập nhật lịch làm việc của bạn
                        </p>
                    </div>
                @endif
                
                @if($appointments->count() > 0 && $appointments->count() < 10)
                    <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                        <p class="text-sm text-slate-500 dark:text-slate-400 text-center">
                            Hiển thị {{ $appointments->count() }} trong số 20 cuộc hẹn gần nhất
                        </p>
                    </div>
                @endif
            </div>
          </div>
        <!-- JavaScript functions cho các thao tác -->
        <script>
          function viewAppointmentDetail(appointmentId) {
              // Logic xem chi tiết lịch hẹn
              window.location.href = `/appointments/${appointmentId}`;
          }

          function confirmAppointment(appointmentId) {
              if (confirm('Bạn có chắc chắn muốn xác nhận lịch hẹn này?')) {
                  fetch(`/appointments/${appointmentId}/confirm`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                      }
                  })
                  .then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          alert('Đã xác nhận lịch hẹn thành công!');
                          location.reload();
                      } else {
                          alert('Có lỗi xảy ra: ' + data.message);
                      }
                  })
                  .catch(error => {
                      console.error('Error:', error);
                      alert('Có lỗi xảy ra khi xác nhận lịch hẹn');
                  });
              }
          }

          function cancelAppointment(appointmentId) {
              const reason = prompt('Vui lòng nhập lý do hủy lịch hẹn:');
              
              if (reason !== null && reason.trim() !== '') {
                  fetch(`/appointments/${appointmentId}/cancel`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                      },
                      body: JSON.stringify({ reason: reason.trim() })
                  })
                  .then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          alert('Đã hủy lịch hẹn thành công!');
                          location.reload();
                      } else {
                          alert('Có lỗi xảy ra: ' + data.message);
                      }
                  })
                  .catch(error => {
                      console.error('Error:', error);
                      alert('Có lỗi xảy ra khi hủy lịch hẹn');
                  });
              }
          }
        </script>



        <!-- Phần Lịch làm việc -->
        <div class="mt-8 bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <h2 class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]">
                    Lịch làm việc
                </h2>
                <div class="flex items-center gap-1 p-1 rounded-lg bg-slate-100 dark:bg-slate-800">
                    <button onclick="changeScheduleView('day')"
                            class="px-3 py-1.5 text-sm font-semibold rounded-md text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700">
                        Ngày
                    </button>
                    <button onclick="changeScheduleView('week')"
                            class="px-3 py-1.5 text-sm font-semibold rounded-md bg-white dark:bg-slate-700 text-primary shadow-sm">
                        Tuần
                    </button>
                    <button onclick="changeScheduleView('month')"
                            class="px-3 py-1.5 text-sm font-semibold rounded-md text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700">
                        Tháng
                    </button>
                </div>
            </div>
            
            <div class="flex items-center justify-between mb-4">
                <button onclick="navigateSchedule('prev')"
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                
                <p class="text-base font-semibold text-slate-800 dark:text-slate-200" id="weekTitle">
                    Đang tải...
                </p>
                
                <button onclick="navigateSchedule('next')"
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
            
            <div id="scheduleContainer">
                <!-- Nội dung lịch làm việc sẽ được load bằng JavaScript -->
                <div class="text-center py-12 text-slate-400 dark:text-slate-500">
                    <span class="material-symbols-outlined text-4xl mb-4 animate-spin">refresh</span>
                    <p>Đang tải lịch làm việc...</p>
                </div>
            </div>
        </div>

        <!-- Modal thêm/sửa lịch làm việc -->
        <div id="scheduleModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-xl w-full max-w-md">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-4" id="modalTitle">
                        Thêm lịch làm việc
                    </h3>
                    
                    <form id="scheduleForm">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="id" id="scheduleId">
                        <input type="hidden" name="date" id="modalDate">
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                    Ngày
                                </label>
                                <input type="text" id="displayDate" readonly
                                    class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 px-3 py-2 text-slate-900 dark:text-slate-100">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                    Giờ làm việc
                                </label>
                                <input type="time" name="time" id="scheduleTime" required
                                    class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-3 py-2 text-slate-900 dark:text-slate-100">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                                    Số lượng bệnh nhân tối đa
                                </label>
                                <input type="number" name="maxBooking" id="maxBooking" min="1" value="10"
                                    class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-3 py-2 text-slate-900 dark:text-slate-100"
                                    placeholder="Số lượng tối đa">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                    Số lượng bệnh nhân tối đa có thể đăng ký trong khung giờ này
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button" onclick="closeScheduleModal()"
                                    class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                                Hủy
                            </button>
                            <button type="submit" id="submitButton"
                                    class="px-4 py-2 text-sm font-medium text-white bg-primary hover:bg-primary/90 rounded-lg">
                                Lưu lịch
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript cho Lịch làm việc -->
        <script>
            let currentWeekDate = new Date().toISOString().split('T')[0]; // YYYY-MM-DD
            let scheduleView = 'week';

            // Load lịch làm việc khi trang được tải
            document.addEventListener('DOMContentLoaded', function() {
                loadWorkSchedule();
            });

            // Load lịch làm việc
            function loadWorkSchedule() {
                const scheduleContainer = document.getElementById('scheduleContainer');
                const weekTitle = document.getElementById('weekTitle');
                
                // Hiển thị loading
                scheduleContainer.innerHTML = `
                    <div class="text-center py-12 text-slate-400 dark:text-slate-500">
                        <span class="material-symbols-outlined text-4xl mb-4 animate-spin">refresh</span>
                        <p>Đang tải lịch làm việc...</p>
                    </div>
                `;
                
                // Gọi API lấy dữ liệu - SỬA: dùng currentWeekDate thay vì currentDate
                fetch(`/doctor/work-schedule?date=${currentWeekDate}&view=${scheduleView}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        renderSchedule(data.data);
                    } else {
                        scheduleContainer.innerHTML = `
                            <div class="text-center py-12 text-red-500">
                                <span class="material-symbols-outlined text-4xl mb-4">error</span>
                                <p>${data.message || 'Không thể tải lịch làm việc'}</p>
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    scheduleContainer.innerHTML = `
                        <div class="text-center py-12 text-red-500">
                            <span class="material-symbols-outlined text-4xl mb-4">error</span>
                            <p>Có lỗi xảy ra khi tải lịch làm việc</p>
                            <button onclick="loadWorkSchedule()" class="mt-2 px-4 py-2 bg-primary text-white rounded hover:bg-primary/90">
                                Thử lại
                            </button>
                        </div>
                    `;
                });
            }

            // Render lịch làm việc - CẬP NHẬT ĐỂ XỬ LÝ CẢ 3 CHẾ ĐỘ XEM
            function renderSchedule(data) {
                const scheduleContainer = document.getElementById('scheduleContainer');
                const weekTitle = document.getElementById('weekTitle');
                
                // Cập nhật tiêu đề dựa trên chế độ xem
                if (data.view === 'day') {
                    // Format cho ngày: "Thứ 2, 09 Tháng 12, 2024"
                    weekTitle.textContent = data.title || 'Lịch làm việc';
                } else if (data.view === 'week') {
                    // Format cho tuần: "Tuần 50 - Thứ 2, 14 Tháng 12, 2025"
                    weekTitle.textContent = formatWeekTitleForDisplay(data.week_data);
                } else if (data.view === 'month') {
                    // Format cho tháng: "Tháng 12, 2025"
                    weekTitle.textContent = data.title || 'Lịch làm việc';
                } else {
                    weekTitle.textContent = 'Lịch làm việc';
                }
                
                let html = '';
                
                // Xử lý theo chế độ xem
                if (data.view === 'day') {
                    html = renderDayView(data);
                } else if (data.view === 'week') {
                    html = renderWeekView(data);
                } else if (data.view === 'month') {
                    html = renderMonthView(data);
                } else {
                    // Mặc định là week view
                    html = renderWeekView(data);
                }
                
                scheduleContainer.innerHTML = html;
            }

            // Render chế độ xem theo ngày
            function renderDayView(data) {
                const dayData = data.day_data;
                const dateString = dayData.date_string;
                
                // Schedules và appointments đã là arrays (không cần groupBy)
                const daySchedules = Array.isArray(data.schedules) ? data.schedules : [];
                const dayAppointments = Array.isArray(data.appointments) ? data.appointments : [];
                
                return `
                    <div class="border border-slate-200 dark:border-slate-700 rounded-lg p-4">
                        <div class="text-center mb-4">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">
                                ${dayData.day_name}, ${dayData.day_number} ${dayData.month_name} ${dayData.year}
                            </h3>
                            ${dayData.is_today ? '<p class="text-sm text-primary mt-1">(Hôm nay)</p>' : ''}
                        </div>
                        
                        <div class="space-y-6">
                            <!-- Lịch làm việc -->
                            <div>
                                <h4 class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">schedule</span>
                                    Lịch làm việc
                                </h4>
                                ${daySchedules.length > 0 ? 
                                    `<div class="space-y-3">
                                        ${daySchedules.map(schedule => `
                                            <div class="schedule-item p-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-700 cursor-pointer hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors"
                                                onclick="editSchedule(${schedule.id}, '${schedule.time}', ${schedule.maxBooking}, '${dateString}', '${dayData.day_name} ${dayData.day_number}')">
                                                <div class="flex justify-between items-center">
                                                    <div class="flex-1">
                                                        <div class="flex items-center gap-3 mb-2">
                                                            <span class="text-lg font-bold text-green-700 dark:text-green-300">
                                                                ${schedule.time.substring(0, 5)}
                                                            </span>
                                                            ${schedule.sumBooking > 0 ? 
                                                                `<span class="text-xs px-2 py-1 rounded-full bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-300">
                                                                    ${schedule.sumBooking} đã đăng ký
                                                                </span>` : ''
                                                            }
                                                        </div>
                                                        <p class="text-sm text-green-600 dark:text-green-400">
                                                            Tối đa: <span class="font-bold">${schedule.maxBooking}</span> bệnh nhân
                                                        </p>
                                                    </div>
                                                    <button onclick="event.stopPropagation(); deleteSchedule(${schedule.id})"
                                                            class="ml-4 p-2 text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-full transition-colors">
                                                        <span class="material-symbols-outlined">delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        `).join('')}
                                    </div>` : 
                                    `<div class="text-center py-10 text-slate-400 dark:text-slate-500">
                                        <span class="material-symbols-outlined text-4xl mb-3">event_available</span>
                                        <p class="text-slate-600 dark:text-slate-400 mb-4">Chưa có lịch làm việc cho ngày này</p>
                                        <button onclick="openAddScheduleModal('${dateString}', '${dayData.day_name} ${dayData.day_number}')"
                                                class="px-5 py-2.5 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors shadow-sm">
                                            <span class="material-symbols-outlined text-base align-text-bottom mr-1">add</span>
                                            Thêm lịch làm việc
                                        </button>
                                    </div>`
                                }
                            </div>
                            
                            <!-- Lịch hẹn -->
                            ${dayAppointments.length > 0 ? `
                                <div>
                                    <h4 class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-3 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-base">calendar_today</span>
                                        Lịch hẹn (${dayAppointments.length})
                                    </h4>
                                    <div class="space-y-3">
                                        ${dayAppointments.map(appointment => `
                                            <div class="p-4 rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-700">
                                                <div class="flex justify-between items-start">
                                                    <div class="flex-1">
                                                        <div class="flex items-center gap-3 mb-2">
                                                            <span class="text-lg font-bold text-blue-700 dark:text-blue-300">
                                                                ${appointment.timeBooking ? appointment.timeBooking.substring(0, 5) : '--:--'}
                                                            </span>
                                                            <span class="text-xs px-2 py-1 rounded-full ${getStatusClass(appointment.statusId)}">
                                                                ${getStatusText(appointment.statusId)}
                                                            </span>
                                                        </div>
                                                        <p class="text-sm font-medium text-slate-800 dark:text-slate-200 mb-1">
                                                            ${appointment.name}
                                                        </p>
                                                        ${appointment.description ? `
                                                            <p class="text-sm text-slate-600 dark:text-slate-400 truncate" title="${appointment.description}">
                                                                ${appointment.description.substring(0, 60)}${appointment.description.length > 60 ? '...' : ''}
                                                            </p>
                                                        ` : ''}
                                                    </div>
                                                </div>
                                            </div>
                                        `).join('')}
                                    </div>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            }

            // Render chế độ xem theo tuần
            function renderWeekView(data) {
                const weekData = data.week_data;
                
                // Tạo HTML cho lịch
                let html = `
                    <div class="border border-slate-200 dark:border-slate-700 rounded-lg overflow-hidden">
                        <div class="grid grid-cols-7 border-b border-slate-200 dark:border-slate-700">
                `;
                
                // Phần header các ngày
                weekData.days.forEach(day => {
                    html += `
                        <div class="text-center py-3 border-r border-slate-200 dark:border-slate-700 
                                ${day.is_today ? 'bg-primary/10 dark:bg-primary/20' : 'bg-slate-50 dark:bg-slate-800'}">
                            <p class="text-xs ${day.is_today ? 'text-primary dark:text-primary/80 font-semibold' : 'text-slate-500 dark:text-slate-400'}">
                                ${day.short_name}
                            </p>
                            <p class="font-bold ${day.is_today ? 'text-primary' : 'text-slate-800 dark:text-slate-200'}">
                                ${day.day_number}
                            </p>
                        </div>
                    `;
                });
                
                html += `
                        </div>
                        <div class="h-80 sm:h-96 overflow-y-auto">
                            <div class="grid grid-cols-7 min-h-full">
                `;
                
                // Nội dung từng ngày
                weekData.days.forEach((day, index) => {
                    const dayKey = day.date_string;
                    const daySchedules = (data.schedules && data.schedules[dayKey]) || [];
                    const dayAppointments = (data.appointments && data.appointments[dayKey]) || [];
                    
                    html += `
                        <div class="border-r border-b border-slate-200 dark:border-slate-700 p-2 min-h-64
                                ${day.is_today ? 'bg-primary/5' : ''}"
                            ondblclick="openAddScheduleModal('${day.date_string}', '${day.day_name} ${day.day_number}')">
                            
                            <!-- Lịch làm việc -->
                            <div class="mb-3">
                                <p class="text-xs font-medium text-slate-600 dark:text-slate-400 mb-2">
                                    <span class="material-symbols-outlined text-xs align-text-bottom">schedule</span>
                                    Lịch làm việc:
                                </p>
                                ${daySchedules.length > 0 ? 
                                    daySchedules.map(schedule => `
                                        <div class="schedule-item mb-2 p-2 rounded bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-700 cursor-pointer hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors"
                                            onclick="editSchedule(${schedule.id}, '${schedule.time}', ${schedule.maxBooking}, '${day.date_string}', '${day.day_name} ${day.day_number}')">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-xs font-medium text-green-700 dark:text-green-300">
                                                        ${schedule.time.substring(0, 5)}
                                                    </span>
                                                    <p class="text-xs text-green-600 dark:text-green-400 mt-1">
                                                        Tối đa: ${schedule.maxBooking}
                                                        ${schedule.sumBooking > 0 ? ` • Đã đăng ký: ${schedule.sumBooking}` : ''}
                                                    </p>
                                                </div>
                                                <button onclick="event.stopPropagation(); deleteSchedule(${schedule.id})"
                                                        class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 p-1">
                                                    <span class="material-symbols-outlined text-xs">delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    `).join('') : 
                                    `<div class="text-center py-4 text-slate-400 dark:text-slate-500">
                                        <span class="material-symbols-outlined text-xl mb-1">event_available</span>
                                        <p class="text-xs">Chưa có lịch</p>
                                        <p class="text-xs text-slate-500">Double click để thêm</p>
                                    </div>`
                                }
                            </div>
                            
                            <!-- Lịch hẹn -->
                            ${dayAppointments.length > 0 ? `
                                <div class="mt-3 pt-3 border-t border-slate-200 dark:border-slate-700">
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">
                                        <span class="material-symbols-outlined text-xs align-text-bottom">calendar_today</span>
                                        Lịch hẹn (${dayAppointments.length})
                                    </p>
                                    ${dayAppointments.slice(0, 3).map(appointment => `
                                        <div class="text-xs p-1.5 mb-1 rounded bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 truncate"
                                            title="${appointment.timeBooking ? appointment.timeBooking.substring(0, 5) : ''} - ${appointment.name}">
                                            ${appointment.timeBooking ? appointment.timeBooking.substring(0, 5) : '--:--'} - 
                                            ${appointment.name.substring(0, 10)}${appointment.name.length > 10 ? '...' : ''}
                                        </div>
                                    `).join('')}
                                    ${dayAppointments.length > 3 ? 
                                        `<div class="text-xs text-blue-600 dark:text-blue-400 italic text-center">
                                            +${dayAppointments.length - 3} lịch hẹn khác
                                        </div>` : ''
                                    }
                                </div>
                            ` : ''}
                        </div>
                    `;
                });
                
                html += `
                            </div>
                        </div>
                    </div>
                `;
                
                return html;
            }

            // Render chế độ xem theo tháng
            function renderMonthView(data) {
                const monthData = data.month_data;
                
                // Tạo lịch theo tháng
                let html = `
                    <div class="border border-slate-200 dark:border-slate-700 rounded-lg overflow-hidden">
                        <div class="grid grid-cols-7 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
                            ${['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'].map(day => `
                                <div class="text-center py-3 text-xs font-medium text-slate-600 dark:text-slate-400 border-r border-slate-200 dark:border-slate-700">
                                    ${day}
                                </div>
                            `).join('')}
                        </div>
                        <div class="grid grid-cols-7">
                `;
                
                // Tính ngày bắt đầu của tháng (lùi lại để fill ngày đầu tuần)
                const firstDay = monthData.days.length > 0 ? monthData.days[0] : {date_string: ''};
                const startDate = monthData.start_date;
                
                // Tạo các ngày trong tháng
                monthData.days.forEach(day => {
                    const dayKey = day.date_string;
                    const daySchedules = (data.schedules && data.schedules[dayKey]) || [];
                    const dayAppointments = (data.appointments && data.appointments[dayKey]) || [];
                    
                    html += `
                        <div class="min-h-32 p-2 border-r border-b border-slate-200 dark:border-slate-700 
                                ${day.is_weekend ? 'bg-slate-50/50 dark:bg-slate-800/50' : ''} 
                                ${day.is_today ? 'bg-primary/5' : ''}"
                            ondblclick="openAddScheduleModal('${day.date_string}', '${day.day_name} ${day.day_number}')">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-medium ${day.is_today ? 'text-primary' : 'text-slate-700 dark:text-slate-300'}">
                                    ${day.day_number}
                                </span>
                                ${daySchedules.length > 0 ? 
                                    `<span class="text-xs bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 px-1.5 py-0.5 rounded-full">
                                        ${daySchedules.length} lịch
                                    </span>` : ''
                                }
                            </div>
                            
                            <!-- Hiển thị lịch làm việc -->
                            ${daySchedules.slice(0, 2).map(schedule => `
                                <div class="text-xs p-1 mb-1 rounded bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 truncate"
                                    title="${schedule.time.substring(0, 5)} - Tối đa: ${schedule.maxBooking} bệnh nhân">
                                    <span class="font-medium">${schedule.time.substring(0, 5)}</span>
                                    <span class="text-green-600 dark:text-green-500">(${schedule.maxBooking})</span>
                                </div>
                            `).join('')}
                            
                            ${daySchedules.length > 2 ? 
                                `<div class="text-xs text-green-600 dark:text-green-400 italic mb-2">
                                    +${daySchedules.length - 2} lịch khác
                                </div>` : ''
                            }
                            
                            <!-- Hiển thị lịch hẹn -->
                            ${dayAppointments.length > 0 ? 
                                `<div class="mt-1">
                                    <div class="text-xs text-blue-600 dark:text-blue-400 mb-1">
                                        ${dayAppointments.length} lịch hẹn
                                    </div>
                                </div>` : ''
                            }
                        </div>
                    `;
                });
                
                html += `
                        </div>
                    </div>
                `;
                
                return html;
            }

            // Helper functions cho trạng thái
            function getStatusClass(statusId) {
                const classes = {
                    1: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-400',
                    2: 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-400',
                    3: 'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-400',
                    4: 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-400'
                };
                return classes[statusId] || 'bg-slate-100 text-slate-800 dark:bg-slate-900/40 dark:text-slate-400';
            }

            function getStatusText(statusId) {
                const texts = {
                    1: 'Chờ xác nhận',
                    2: 'Đã xác nhận',
                    3: 'Đã khám',
                    4: 'Đã hủy'
                };
                return texts[statusId] || 'Không xác định';
            }

            function formatWeekTitleForDisplay(weekData) {
                const endDate = new Date(weekData.end_date);
                const endDay = endDate.getDate();
                const endMonth = endDate.getMonth() + 1; // 0-11
                const year = endDate.getFullYear();
                const endDayOfWeek = endDate.getDay(); // 0-6 (0 = CN, 1 = T2, ...)
                
                // Lấy tên tháng tiếng Việt
                const monthNames = [
                    'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                ];
                const monthName = monthNames[endMonth - 1] || '';
                
                // Format: "Tuần 50 - Thứ 2, 14 Tháng 12, 2025"
                return `Tuần ${weekData.week_number} - ${endDay} ${monthName}, ${year}`;
            }

            // Chuyển tuần
            function navigateSchedule(direction) {
                fetch(`/doctor/work-schedule/navigate?direction=${direction}&date=${currentWeekDate}&view=${scheduleView}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        currentWeekDate = data.new_date;
                        loadWorkSchedule();
                    } else {
                        alert('Không thể chuyển tuần: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra khi chuyển tuần');
                });
            }

            // Chuyển chế độ xem
            function changeScheduleView(view) {
                scheduleView = view;
                loadWorkSchedule();
                
                // Cập nhật active state cho các nút
                document.querySelectorAll('[onclick^="changeScheduleView"]').forEach(button => {
                    const buttonView = button.getAttribute('onclick').match(/'([^']+)'/)[1];
                    if (buttonView === view) {
                        button.classList.add('bg-white', 'dark:bg-slate-700', 'text-primary', 'shadow-sm');
                        button.classList.remove('text-slate-600', 'dark:text-slate-300', 'hover:bg-white', 'dark:hover:bg-slate-700');
                    } else {
                        button.classList.remove('bg-white', 'dark:bg-slate-700', 'text-primary', 'shadow-sm');
                        button.classList.add('text-slate-600', 'dark:text-slate-300', 'hover:bg-white', 'dark:hover:bg-slate-700');
                    }
                });
            }

            // Mở modal thêm lịch
            function openAddScheduleModal(date, displayText) {
                const modal = document.getElementById('scheduleModal');
                const modalTitle = document.getElementById('modalTitle');
                const form = document.getElementById('scheduleForm');
                const formMethod = document.getElementById('formMethod');
                const modalDate = document.getElementById('modalDate');
                const displayDate = document.getElementById('displayDate');
                const submitButton = document.getElementById('submitButton');
                
                // Reset form
                form.reset();
                form.method = 'POST';
                formMethod.value = 'POST';
                form.action = '{{ route("doctor.work-schedule.store") }}';
                document.getElementById('scheduleId').value = '';
                document.getElementById('scheduleTime').value = '08:00';
                document.getElementById('maxBooking').value = '10';
                
                // Cập nhật thông tin
                modalTitle.textContent = `Thêm lịch làm việc ngày ${displayText}`;
                modalDate.value = date;
                displayDate.value = displayText;
                submitButton.textContent = 'Thêm lịch';
                
                modal.classList.remove('hidden');
            }

            // Mở modal sửa lịch - ĐÃ SỬA: Thêm tham số date và displayText
            function editSchedule(id, time, maxBooking, date, displayText) {
                const modal = document.getElementById('scheduleModal');
                const modalTitle = document.getElementById('modalTitle');
                const form = document.getElementById('scheduleForm');
                const formMethod = document.getElementById('formMethod');
                const submitButton = document.getElementById('submitButton');
                
                // Cập nhật form
                form.method = 'POST';
                formMethod.value = 'PUT';
                form.action = `/doctor/work-schedule/${id}`;
                document.getElementById('scheduleId').value = id;
                document.getElementById('scheduleTime').value = time;
                document.getElementById('maxBooking').value = maxBooking;
                
                // Sử dụng tham số được truyền vào
                document.getElementById('modalDate').value = date;
                document.getElementById('displayDate').value = displayText;
                
                modalTitle.textContent = 'Sửa lịch làm việc';
                submitButton.textContent = 'Cập nhật';
                
                modal.classList.remove('hidden');
            }

            // Xóa lịch
            function deleteSchedule(id) {
                if (!confirm('Bạn có chắc chắn muốn xóa lịch làm việc này?')) {
                    return;
                }
                
                fetch(`/doctor/work-schedule/${id}`, {
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
                        loadWorkSchedule(); // Reload lịch
                    } else {
                        alert('Lỗi: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra khi xóa lịch');
                });
            }

            // Đóng modal
            function closeScheduleModal() {
                document.getElementById('scheduleModal').classList.add('hidden');
            }

            // Xử lý form submit
            document.getElementById('scheduleForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const url = this.action;
                const method = this.querySelector('input[name="_method"]').value || 'POST';
                
                fetch(url, {
                    method: method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        closeScheduleModal();
                        loadWorkSchedule(); // Reload lịch
                    } else {
                        alert('Lỗi: ' + (data.message || 'Không thể lưu lịch'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra khi lưu lịch');
                });
            });

            // Đóng modal khi click bên ngoài
            document.getElementById('scheduleModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeScheduleModal();
                }
            });

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeScheduleModal();
                }
            });

            // Xử lý nút Quản lý lịch - nhảy xuống phần Lịch làm việc
            document.getElementById('manageScheduleBtn').addEventListener('click', function() {
                const scheduleSection = document.querySelector('.mt-8.bg-white.dark\\:bg-background-dark');
                if (scheduleSection) {
                    scheduleSection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Highlight phần Lịch làm việc
                    scheduleSection.classList.add('ring-2', 'ring-primary', 'ring-offset-2');
                    setTimeout(() => {
                        scheduleSection.classList.remove('ring-2', 'ring-primary', 'ring-offset-2');
                    }, 1500);
                }
            });

            // Xử lý nút Tạo lịch hẹn mới - mở modal tạo lịch hẹn
            document.getElementById('createAppointmentBtn').addEventListener('click', function() {
                openCreateAppointmentModal();
            });

            // Modal tạo lịch hẹn mới
            function openCreateAppointmentModal() {
                // Tạo modal nếu chưa có
                if (!document.getElementById('createAppointmentModal')) {
                    const modalHTML = `
                        <div id="createAppointmentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-6">
                                        <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">
                                            Tạo lịch hẹn mới
                                        </h3>
                                        <button onclick="closeCreateAppointmentModal()" 
                                                class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                            <span class="material-symbols-outlined">close</span>
                                        </button>
                                    </div>
                                    
                                    <form id="createAppointmentForm">
                                        @csrf
                                        <div class="space-y-6">
                                            <!-- Thông tin bệnh nhân -->
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Họ và tên bệnh nhân *
                                                    </label>
                                                    <input type="text" name="name" required
                                                        class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                        placeholder="Nhập họ tên bệnh nhân">
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Email *
                                                    </label>
                                                    <input type="email" name="email" required
                                                        class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                        placeholder="Nhập email bệnh nhân">
                                                </div>
                                                
                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Số điện thoại *
                                                    </label>
                                                    <input type="tel" name="phone" required
                                                        class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                        placeholder="Nhập số điện thoại">
                                                </div>
                                                
                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Giới tính *
                                                    </label>
                                                    <div class="flex gap-4">
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" name="gender" value="Nam" checked
                                                                class="h-4 w-4 text-primary border-slate-300 focus:ring-primary">
                                                            <span class="ml-2 text-slate-700 dark:text-slate-300">Nam</span>
                                                        </label>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" name="gender" value="Nữ"
                                                                class="h-4 w-4 text-primary border-slate-300 focus:ring-primary">
                                                            <span class="ml-2 text-slate-700 dark:text-slate-300">Nữ</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Ngày sinh
                                                    </label>
                                                    <input type="date" name="birthday"
                                                        class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent">
                                                </div>
                                            </div>
                                            
                                            <!-- Thông tin lịch hẹn -->
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Ngày hẹn *
                                                    </label>
                                                    <input type="date" name="dateBooking" required
                                                        class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                        min="${new Date().toISOString().split('T')[0]}">
                                                </div>
                                                
                                                <div>
                                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                        Giờ hẹn *
                                                    </label>
                                                    <select name="timeBooking" required
                                                        class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent">
                                                        <option value="">Chọn giờ hẹn</option>
                                                        ${generateTimeOptions()}
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <!-- Lý do khám -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                    Lý do khám / Triệu chứng
                                                </label>
                                                <textarea name="description" rows="3"
                                                    class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                    placeholder="Mô tả triệu chứng hoặc lý do khám..."></textarea>
                                            </div>
                                            
                                            <!-- Địa chỉ -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                    Địa chỉ
                                                </label>
                                                <input type="text" name="address"
                                                    class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                    placeholder="Nhập địa chỉ">
                                            </div>
                                            
                                            <!-- Ghi chú -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                                    Ghi chú thêm
                                                </label>
                                                <textarea name="note" rows="2"
                                                    class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 px-4 py-3 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-transparent"
                                                    placeholder="Ghi chú thêm (nếu có)..."></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-200 dark:border-slate-700">
                                            <button type="button" onclick="closeCreateAppointmentModal()"
                                                    class="px-5 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                                                Hủy
                                            </button>
                                            <button type="submit"
                                                    class="px-5 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors flex items-center gap-2">
                                                <span class="material-symbols-outlined text-base">add</span>
                                                Tạo lịch hẹn
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    document.body.insertAdjacentHTML('beforeend', modalHTML);
                    
                    // Xử lý form submit
                    document.getElementById('createAppointmentForm').addEventListener('submit', function(e) {
                        e.preventDefault();
                        createAppointment();
                    });
                }
                
                // Hiển thị modal
                document.getElementById('createAppointmentModal').classList.remove('hidden');
                
                // Set ngày mặc định là ngày mai
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                document.querySelector('input[name="dateBooking"]').value = tomorrow.toISOString().split('T')[0];
            }

            // Đóng modal tạo lịch hẹn
            function closeCreateAppointmentModal() {
                const modal = document.getElementById('createAppointmentModal');
                if (modal) {
                    modal.classList.add('hidden');
                }
            }

            // Tạo options cho giờ hẹn
            function generateTimeOptions() {
                const times = [];
                // Tạo giờ từ 7:00 đến 17:00, cách nhau 30 phút
                for (let hour = 7; hour <= 17; hour++) {
                    for (let minute = 0; minute < 60; minute += 30) {
                        const timeString = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}`;
                        times.push(`<option value="${timeString}">${timeString}</option>`);
                    }
                }
                return times.join('');
            }

            // Xử lý tạo lịch hẹn
            function createAppointment() {
                const form = document.getElementById('createAppointmentForm');
                const formData = new FormData(form);
                
                // Thêm doctorId vào formData
                formData.append('doctorId', '{{ $doctor->id }}');
                
                fetch('/appointments', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Đã tạo lịch hẹn thành công!');
                        closeCreateAppointmentModal();
                        location.reload(); // Reload trang để hiển thị lịch hẹn mới
                    } else {
                        alert('Lỗi: ' + (data.message || 'Không thể tạo lịch hẹn'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra khi tạo lịch hẹn');
                });
            }

            // Đóng modal khi click bên ngoài
            document.addEventListener('click', function(e) {
                const createModal = document.getElementById('createAppointmentModal');
                if (createModal && e.target === createModal) {
                    closeCreateAppointmentModal();
                }
            });

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const createModal = document.getElementById('createAppointmentModal');
                    if (createModal && !createModal.classList.contains('hidden')) {
                        closeCreateAppointmentModal();
                    }
                    
                    const scheduleModal = document.getElementById('scheduleModal');
                    if (scheduleModal && !scheduleModal.classList.contains('hidden')) {
                        closeScheduleModal();
                    }
                }
            });
        </script>

        <style>
        .schedule-item {
            transition: all 0.2s ease;
        }

        .schedule-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 640px) {
            .grid-cols-7 > div {
                min-height: 120px;
            }
        }
        </style>


          
        </main>
      </div>
    </div>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("doctorMenuBtn");
            const dropdown = document.getElementById("doctorDropdown");

            btn.addEventListener("click", function () {
                dropdown.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                if (!btn.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        });
      </script>
  </body>
</html>
