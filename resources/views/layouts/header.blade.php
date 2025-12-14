            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-700 px-4 md:px-10 py-3">
                <div class="flex items-center gap-4 text-slate-900 dark:text-slate-50">
                    <div class="size-6 text-primary">
                    <a href="{{ route('home') }}">
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
                    <h2 class="text-slate-900 dark:text-slate-50 text-lg font-bold leading-tight tracking-[-0.015em]">
                        HealthBooker
                    </h2>
                    </a>
                </div>
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
                        if (Auth::guest()) {
                            $showAppointmentBtn = true; // Khách vãng lai
                        } elseif (Auth::check() && Auth::user()->roleId == 3) { // PATIENT
                            $showAppointmentBtn = true;
                        }
                    @endphp
                    
                    @if($showAppointmentBtn)
                        <a 
                            class="{{ request()->routeIs('datlichkhambenh') 
                                ? 'text-primary text-sm font-bold leading-normal' 
                                : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                            href="{{ route('datlichkhambenh') }}"
                        >
                            Đặt lịch khám
                        </a>
                        <a 
                            class="{{ request()->routeIs('hososuckhoe') 
                                ? 'text-primary text-sm font-bold leading-normal' 
                                : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                            href="{{ route('hososuckhoe') }}"
                        >
                            Hồ sơ sức khỏe
                        </a>
                    @endif
                    <a 
                        class="{{ request()->routeIs('gioithieu') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('gioithieu') }}"
                    >
                        Giới thiệu
                    </a>
                    <a 
                        class="{{ request()->routeIs('chuyenkhoa') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('chuyenkhoa') }}"
                    >
                        Chuyên khoa
                    </a>
                    <a 
                        class="{{ request()->routeIs('bacsi') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('bacsi') }}"
                    >
                        Bác sĩ
                    </a>
                    <a 
                        class="{{ request()->routeIs('contact') 
                            ? 'text-primary text-sm font-bold leading-normal' 
                            : 'text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium' }} text-sm leading-normal" 
                        href="{{ route('contact') }}"
                    >
                        Liên hệ
                    </a>                   
                    </div>
                    @auth
                        <div class="relative h-12 flex items-center">
                            <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer ">
                                <div class="text-sm">
                                    <p class="font-bold text-slate-900 dark:text-slate-50">
                                        {{ Auth::user()->name }}
                                    </p>
                                </div>

                                <span class="material-symbols-outlined text-slate-600 dark:text-slate-400">
                                    expand_more
                                </span>
                            </div>

                            <div id="doctorDropdown"
                                class="absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 shadow-lg rounded-lg border border-slate-200 dark:border-slate-700 hidden"
                            >
                                @php
                                    $dashboardRoute = match(Auth::user()->roleId) {
                                        2 => route('bacsilog'),      // DOCTOR
                                        1 => route('quantrivienlog'), // ADMIN
                                        3 => route('benhnhanlog'),    // PATIENT
                                        default => route('home')
                                    };
                                @endphp
                                
                                <a href="{{ $dashboardRoute }}"
                                    class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700">
                                    Bảng điều khiển
                                </a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Chưa đăng nhập --}}
                        <button
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors"
                            onclick="window.location.href='{{ route('login') }}'">
                            <span class="truncate">Đăng nhập</span>
                        </button>
                    @endauth
                </div>
                <button class="lg:hidden text-slate-900 dark:text-slate-50">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("doctorMenuBtn");
        const menu = document.getElementById("doctorDropdown");

        if (btn) {
            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        }
        document.addEventListener("click", (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add("hidden");
            }
        });
    });
</script>
