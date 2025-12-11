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
                  href="#"
                  >Lịch hẹn</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="#"
                  >Bệnh nhân</a
                >
                <a
                  class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                  href="#"
                  >Tin nhắn</a
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
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-200 dark:hover:bg-slate-700 gap-2"
              >
                <span class="material-symbols-outlined !text-xl"
                  >manage_history</span
                >
                <span class="truncate">Quản lý lịch</span>
              </button>
              <button
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
                        <div
                            class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 h-full"
                        >
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
                                                    src="{{ $avatarUrl }}"
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
                            Hiển thị {{ $appointments->count() }} trong số 10 cuộc hẹn gần nhất
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




          

          <div
            class="mt-8 bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800"
          >
            <div
              class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6"
            >
              <h2
                class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]"
              >
                Lịch làm việc
              </h2>
              <div
                class="flex items-center gap-1 p-1 rounded-lg bg-slate-100 dark:bg-slate-800"
              >
                <button
                  class="px-3 py-1.5 text-sm font-semibold rounded-md text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700"
                >
                  Ngày
                </button>
                <button
                  class="px-3 py-1.5 text-sm font-semibold rounded-md bg-white dark:bg-slate-700 text-primary shadow-sm"
                >
                  Tuần
                </button>
                <button
                  class="px-3 py-1.5 text-sm font-semibold rounded-md text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700"
                >
                  Tháng
                </button>
              </div>
            </div>
            <div class="flex items-center justify-between mb-4">
              <button
                class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400"
              >
                <span class="material-symbols-outlined">chevron_left</span>
              </button>
              <p
                class="text-base font-semibold text-slate-800 dark:text-slate-200"
              >
                Tuần 18 - 24 Tháng 12, 2023
              </p>
              <button
                class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400"
              >
                <span class="material-symbols-outlined">chevron_right</span>
              </button>
            </div>
            <div
              class="grid grid-cols-1 sm:grid-cols-7 border-t border-l border-slate-200 dark:border-slate-700"
            >
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T2</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">18</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T3</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">19</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-primary/10 dark:bg-primary/20"
              >
                <p class="text-xs text-primary dark:text-primary/80">HÔM NAY</p>
                <p class="font-bold text-primary">20</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T5</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">21</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T6</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">22</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">T7</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">23</p>
              </div>
              <div
                class="text-center py-2 border-b border-r border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
              >
                <p class="text-xs text-slate-500 dark:text-slate-400">CN</p>
                <p class="font-bold text-slate-800 dark:text-slate-200">24</p>
              </div>
              <div
                class="h-64 sm:h-96 col-span-1 sm:col-span-7 border-r border-b border-slate-200 dark:border-slate-700 p-2 flex items-center justify-center text-slate-400 dark:text-slate-500"
              >
                <p>Lịch trình chi tiết hiển thị ở đây</p>
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
