        <div class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-7xl flex-1">
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
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('home') }}">Trang chủ</a>
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('gioithieu') }}">Giới thiệu</a>
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('chuyenkhoa') }}">Chuyên khoa</a>
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('bacsi') }}">Bác sĩ</a>
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('lienhe') }}">Liên hệ</a>
                    </div>
                    <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors" onclick="window.location.href='{{ route('login') }}'">
                    <span class="truncate">Đăng nhập</span>
                    </button>
                </div>
                <button class="lg:hidden text-slate-900 dark:text-slate-50">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </header>
          </div>
        </div>