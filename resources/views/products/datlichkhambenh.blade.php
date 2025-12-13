<!DOCTYPE html>

<html class="light" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Đặt Lịch Khám Bệnh - HealthBooker</title>
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
        <!-- TopNavBar -->
        <header
          class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-4 sm:px-6 lg:px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-50"
        >
          <div
            class="flex items-center gap-4 text-slate-900 dark:text-slate-50"
          >
            <a href="{{ route('home') }}" class="flex items-center gap-2">
              <div class="size-6 text-primary">
                <svg
                  fill="none"
                  viewbox="0 0 48 48"
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
                    <clippath id="clip0_6_330">
                      <rect fill="white" height="48" width="48"></rect>
                    </clippath>
                  </defs>
                </svg>
              </div>
              <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">
                HealthBooker
              </h2>
            </a>
          </div>
          <div class="hidden md:flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="{{ route('home') }}"
                >Trang chủ</a
              >
              <a class="text-primary text-sm font-bold leading-normal" href="#"
                >Đặt lịch khám</a
              >
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="#"
                >Bác sĩ</a
              >
              <a
                class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                href="#"
                >Hồ sơ sức khỏe</a
              >
            </div>
            <div class="flex gap-2">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90"
              >
                <span class="truncate">Đăng nhập</span>
              </button>
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-300 dark:hover:bg-slate-600"
              >
                <span class="truncate">Đăng ký</span>
              </button>
            </div>
          </div>
          <!-- Mobile Menu Icon -->
          <button
            class="md:hidden flex items-center justify-center size-10 rounded-lg text-slate-900 dark:text-slate-50 hover:bg-slate-100 dark:hover:bg-slate-800"
          >
            <span class="material-symbols-outlined">menu</span>
          </button>
        </header>
        <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <!-- Breadcrumbs -->
          <div class="flex flex-wrap gap-2 mb-6">
            <a
              class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal hover:text-primary"
              href="#"
              >Trang chủ</a
            >
            <span
              class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal"
              >/</span
            >
            <span
              class="text-slate-900 dark:text-slate-50 text-sm font-medium leading-normal"
              >Đặt lịch khám</span
            >
          </div>
          <!-- Page Heading -->
          <div class="flex flex-wrap justify-between gap-3 mb-8">
            <div class="flex min-w-72 flex-col gap-2">
              <p
                class="text-slate-900 dark:text-slate-50 text-4xl font-black leading-tight tracking-[-0.033em]"
              >
                Đặt Lịch Khám Bệnh Nhanh Chóng
              </p>
              <p
                class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal"
              >
                Tìm kiếm và đặt lịch với các bác sĩ chuyên khoa hàng đầu một
                cách dễ dàng.
              </p>
            </div>
          </div>
          <!-- Main Content: Filters + Results -->
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column: Filters -->
            <div class="lg:col-span-4 xl:col-span-3">
              <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 space-y-6"
              >
                <!-- SectionHeader -->
                <h2
                  class="text-slate-900 dark:text-slate-50 text-xl font-bold leading-tight tracking-[-0.015em]"
                >
                  Bộ lọc nâng cao
                </h2>
                <!-- Filter: Specialty -->
                <div>
                  <label
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                    for="specialty"
                    >Chuyên khoa</label
                  >
                  <select
                    class="w-full h-12 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:ring-primary focus:border-primary"
                    id="specialty"
                  >
                    <option>Tất cả chuyên khoa</option>
                    <option>Tim mạch</option>
                    <option>Da liễu</option>
                    <option>Nhi khoa</option>
                    <option>Sản phụ khoa</option>
                  </select>
                </div>
                <!-- Filter: Gender -->
                <div>
                  <p
                    class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                  >
                    Giới tính bác sĩ
                  </p>
                  <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        checked=""
                        class="form-radio text-primary focus:ring-primary/50"
                        name="gender"
                        type="radio"
                      />
                      <span class="text-slate-700 dark:text-slate-300"
                        >Tất cả</span
                      >
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        class="form-radio text-primary focus:ring-primary/50"
                        name="gender"
                        type="radio"
                      />
                      <span class="text-slate-700 dark:text-slate-300"
                        >Nam</span
                      >
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        class="form-radio text-primary focus:ring-primary/50"
                        name="gender"
                        type="radio"
                      />
                      <span class="text-slate-700 dark:text-slate-300">Nữ</span>
                    </label>
                  </div>
                </div>
                <button
                  class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90"
                >
                  <span class="truncate">Áp dụng</span>
                </button>
              </div>
            </div>
            <!-- Right Column: Search Results -->
            <div class="lg:col-span-8 xl:col-span-9 space-y-6">
              <!-- SearchBar -->
              <div class="relative">
                <div
                  class="text-slate-500 dark:text-slate-400 absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none"
                >
                  <span class="material-symbols-outlined">search</span>
                </div>
                <input
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-slate-50 focus:outline-0 focus:ring-2 focus:ring-primary border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 h-14 placeholder:text-slate-500 dark:placeholder:text-slate-400 pl-12 text-base font-normal leading-normal"
                  placeholder="Tìm bác sĩ, chuyên khoa, bệnh viện..."
                  value=""
                />
              </div>
              <!-- Doctor List -->
              <div class="space-y-4">
                <p class="text-slate-600 dark:text-slate-400">
                  Tìm thấy 3 bác sĩ phù hợp.
                </p>
                <!-- Doctor Profile Card 1 -->
                <div
                  class="bg-white dark:bg-background-dark p-4 sm:p-6 rounded-xl border border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-6 hover:border-primary dark:hover:border-primary transition-colors duration-200 cursor-pointer"
                >
                  <img
                    class="size-24 rounded-full mx-auto sm:mx-0"
                    data-alt="Portrait of Dr. Lê Thị Mai Anh"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAe4QVKaJ-BjukwXtXoYdQE6Bb8C_Ky25Ad8o0gSGiygIs3egwfOdB5C12LBAlckP6NxP7hKMs84HI-MAJduFfSOIH-pW7VAurGWzmv_M6TOnQf3HQVu6gZcwvS8kaqBQ_JxN5tdmYFke_YtH_oXBGQAPLrP05E48pxQXzhpss72yc77K-m2Xlij9YGFAb6DDelw4pOHY8Uqc0ertk-W-s0sjrlzR2zP2ypKaZQeCstf6mPV-tkAM20hwk7tAKBetSmyPMrBNwA6cI"
                  />
                  <div class="flex-1 text-center sm:text-left">
                    <div
                      class="flex items-center justify-center sm:justify-start gap-2 mb-1"
                    >
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS.CKII Lê Thị Mai Anh
                      </h3>
                      <div class="flex items-center gap-1 text-amber-500">
                        <span
                          class="material-symbols-outlined !text-base"
                          style="font-variation-settings: 'FILL' 1"
                          >star</span
                        >
                        <span
                          class="text-sm font-bold text-slate-700 dark:text-slate-300"
                          >4.9</span
                        >
                      </div>
                    </div>
                    <p class="text-sm text-primary font-semibold mb-2">
                      Chuyên khoa Tim mạch
                    </p>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">
                      15 năm kinh nghiệm. Từng công tác tại Bệnh viện Bạch Mai.
                    </p>
                    <div
                      class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 justify-center sm:justify-start"
                    >
                      <span class="material-symbols-outlined !text-base"
                        >location_on</span
                      >
                      <span>Bệnh viện Đa khoa Quốc tế Vinmec, Hà Nội</span>
                    </div>
                  </div>
                  <button
                    class="flex-shrink-0 self-center sm:self-start mt-2 sm:mt-0 flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-6 bg-primary/20 dark:bg-primary/20 text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/30"
                  >
                    <span class="truncate">Xem lịch</span>
                  </button>
                </div>
                <!-- Doctor Profile Card 2 (Selected State) -->
                <div
                  class="bg-white dark:bg-background-dark p-6 rounded-xl border-2 border-primary dark:border-primary"
                >
                  <div class="flex flex-col sm:flex-row gap-6 mb-6">
                    <img
                      class="size-24 rounded-full mx-auto sm:mx-0"
                      data-alt="Portrait of Dr. Trần Minh Khôi"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCkxmitPoFXpxvpuWGI_2HrlehwV-XKyJwlg73pQd1PVaQyg2r_G7zRxRCSOH1Cto51sKaQZmzRrp5y98OczTir5jkczGvLbtqF-XC1FtN5N8tJoS_tv9P6AtrXayMcfScy-5aW8R_g4AtylnmXXTrfpN7l3Ujq_USIa-pzxrwrD5c6WT1vnRBc5eqv0vyzOXB33UEATrQLpfCRVaoRF4gtErR8-Z1sGZ2AaZlk5Ng7dQQAXAYXVAVjyh0FBL16-aayJhaP4qXM3g"
                    />
                    <div class="flex-1 text-center sm:text-left">
                      <div
                        class="flex items-center justify-center sm:justify-start gap-2 mb-1"
                      >
                        <h3
                          class="text-lg font-bold text-slate-900 dark:text-slate-50"
                        >
                          ThS.BS Trần Minh Khôi
                        </h3>
                        <div class="flex items-center gap-1 text-amber-500">
                          <span
                            class="material-symbols-outlined !text-base"
                            style="font-variation-settings: 'FILL' 1"
                            >star</span
                          >
                          <span
                            class="text-sm font-bold text-slate-700 dark:text-slate-300"
                            >4.8</span
                          >
                        </div>
                      </div>
                      <p class="text-sm text-primary font-semibold mb-2">
                        Chuyên khoa Da liễu
                      </p>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mb-3"
                      >
                        10 năm kinh nghiệm trong điều trị các bệnh về da.
                      </p>
                      <div
                        class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 justify-center sm:justify-start"
                      >
                        <span class="material-symbols-outlined !text-base"
                          >location_on</span
                        >
                        <span>Phòng khám Da liễu, Quận 1, TP.HCM</span>
                      </div>
                    </div>
                  </div>
                  <!-- Date & Time Picker -->
                  <div>
                    <p
                      class="text-base font-bold text-slate-900 dark:text-slate-50 mb-4"
                    >
                      Chọn ngày giờ khám
                    </p>
                    <!-- Date Picker -->
                    <div class="flex items-center justify-between mb-4">
                      <button
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400"
                      >
                        <span class="material-symbols-outlined"
                          >chevron_left</span
                        >
                      </button>
                      <p
                        class="text-base font-semibold text-slate-800 dark:text-slate-200"
                      >
                        Tháng 12, 2023
                      </p>
                      <button
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400"
                      >
                        <span class="material-symbols-outlined"
                          >chevron_right</span
                        >
                      </button>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center mb-4">
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        T2
                      </div>
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        T3
                      </div>
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        T4
                      </div>
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        T5
                      </div>
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        T6
                      </div>
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        T7
                      </div>
                      <div class="text-xs text-slate-500 dark:text-slate-400">
                        CN
                      </div>
                      <div class="p-2 text-slate-400 dark:text-slate-600">
                        27
                      </div>
                      <div class="p-2 text-slate-400 dark:text-slate-600">
                        28
                      </div>
                      <div class="p-2 text-slate-400 dark:text-slate-600">
                        29
                      </div>
                      <div class="p-2 text-slate-400 dark:text-slate-600">
                        30
                      </div>
                      <button
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200"
                      >
                        1
                      </button>
                      <button
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200"
                      >
                        2
                      </button>
                      <button
                        class="p-2 rounded-full bg-primary text-white font-bold"
                      >
                        3
                      </button>
                      <button
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200"
                      >
                        4
                      </button>
                      <button
                        class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200"
                      >
                        5
                      </button>
                    </div>
                    <!-- Time Slot Grid -->
                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                      <button
                        class="text-center py-2 px-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-400 dark:text-slate-500 cursor-not-allowed"
                        disabled=""
                      >
                        08:00
                      </button>
                      <button
                        class="text-center py-2 px-3 rounded-lg border border-slate-300 dark:border-slate-700 hover:border-primary text-slate-800 dark:text-slate-200 dark:hover:border-primary dark:hover:text-primary"
                      >
                        08:30
                      </button>
                      <button
                        class="text-center py-2 px-3 rounded-lg border-2 border-primary bg-primary/10 dark:bg-primary/20 text-primary font-bold"
                      >
                        09:00
                      </button>
                      <button
                        class="text-center py-2 px-3 rounded-lg border border-slate-300 dark:border-slate-700 hover:border-primary text-slate-800 dark:text-slate-200 dark:hover:border-primary dark:hover:text-primary"
                      >
                        09:30
                      </button>
                      <button
                        class="text-center py-2 px-3 rounded-lg border border-slate-300 dark:border-slate-700 hover:border-primary text-slate-800 dark:text-slate-200 dark:hover:border-primary dark:hover:text-primary"
                      >
                        10:00
                      </button>
                      <button
                        class="text-center py-2 px-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-400 dark:text-slate-500 cursor-not-allowed"
                        disabled=""
                      >
                        10:30
                      </button>
                    </div>
                    <!-- CTA Button -->
                    <button
                      class="w-full mt-6 flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90"
                    >
                      <span class="truncate">Xác nhận đặt lịch</span>
                    </button>
                  </div>
                </div>
                <!-- Doctor Profile Card 3 -->
                <div
                  class="bg-white dark:bg-background-dark p-4 sm:p-6 rounded-xl border border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-6 hover:border-primary dark:hover:border-primary transition-colors duration-200 cursor-pointer"
                >
                  <img
                    class="size-24 rounded-full mx-auto sm:mx-0"
                    data-alt="Portrait of Dr. Nguyễn Văn Hùng"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxG8kDoyOsIWW_WsUvmBBhFwIYeN16GUhNmmC_bs_Xs849DyAzucnbcl71RSUzfqSxrv1SRpYwDqR7XQkUYe4CXRH7sIeS9Ne2d8nWTy8w44JKpEBWMZp93QjR5PTzJC5PowettSvcu3r9Jyn98ikpMyWs53i-h-Z3G6ZWQ7jTdmHq2YLyUXlXpD6KSB3Bs4babsDG22y_KHR_UlRQja2sZQqh5ZoI33-hU_27OrQ_6ixf3pogslgUnS6di1sdsQsZ5UVN4LpTDrM"
                  />
                  <div class="flex-1 text-center sm:text-left">
                    <div
                      class="flex items-center justify-center sm:justify-start gap-2 mb-1"
                    >
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        PGS.TS Nguyễn Văn Hùng
                      </h3>
                      <div class="flex items-center gap-1 text-amber-500">
                        <span
                          class="material-symbols-outlined !text-base"
                          style="font-variation-settings: 'FILL' 1"
                          >star</span
                        >
                        <span
                          class="text-sm font-bold text-slate-700 dark:text-slate-300"
                          >5.0</span
                        >
                      </div>
                    </div>
                    <p class="text-sm text-primary font-semibold mb-2">
                      Chuyên khoa Nhi
                    </p>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">
                      Hơn 20 năm kinh nghiệm. Chuyên gia đầu ngành về Nhi khoa.
                    </p>
                    <div
                      class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 justify-center sm:justify-start"
                    >
                      <span class="material-symbols-outlined !text-base"
                        >location_on</span
                      >
                      <span>Bệnh viện Nhi Trung ương, Hà Nội</span>
                    </div>
                  </div>
                  <button
                    class="flex-shrink-0 self-center sm:self-start mt-2 sm:mt-0 flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-6 bg-primary/20 dark:bg-primary/20 text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/30"
                  >
                    <span class="truncate">Xem lịch</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
