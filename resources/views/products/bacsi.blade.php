@extends('layouts.app')
@section('content')
<div
  class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
>
  <div class="layout-container flex h-full grow flex-col">
    <div
      class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5"
    >
      <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
        <main class="w-full py-10 px-4 md:px-0">
          <div class="flex flex-col gap-8 md:flex-row">
            <aside class="w-full md:w-1/4 lg:w-1/5">
              <div class="sticky top-10">
                <h2
                  class="text-lg font-bold text-slate-900 dark:text-slate-50 mb-4"
                >
                  Bộ lọc tìm kiếm
                </h2>
                <div class="space-y-6">
                  <div>
                    <label
                      class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                      for="specialty"
                      >Chuyên khoa</label
                    >
                    <select
                      class="w-full rounded-md border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                      id="specialty"
                      name="specialty"
                    >
                      <option>Tất cả</option>
                      <option>Tim mạch</option>
                      <option>Da liễu</option>
                      <option>Nhi khoa</option>
                      <option>Tiêu hóa</option>
                      <option>Sản phụ khoa</option>
                    </select>
                  </div>
                  <div>
                    <label
                      class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                      for="experience"
                      >Kinh nghiệm</label
                    >
                    <select
                      class="w-full rounded-md border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                      id="experience"
                      name="experience"
                    >
                      <option>Tất cả</option>
                      <option>Dưới 5 năm</option>
                      <option>5 - 10 năm</option>
                      <option>10 - 15 năm</option>
                      <option>Trên 15 năm</option>
                    </select>
                  </div>
                  <div>
                    <label
                      class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                      for="gender"
                      >Giới tính</label
                    >
                    <select
                      class="w-full rounded-md border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                      id="gender"
                      name="gender"
                    >
                      <option>Tất cả</option>
                      <option>Nam</option>
                      <option>Nữ</option>
                    </select>
                  </div>
                  <button
                    class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors"
                  >
                    <span class="truncate">Áp dụng</span>
                  </button>
                </div>
              </div>
            </aside>
            <div class="w-full md:w-3/4 lg:w-4/5">
              <div class="flex justify-between items-center mb-6">
                <h1
                  class="text-2xl font-bold text-slate-900 dark:text-slate-50"
                >
                  Danh sách Bác sĩ
                </h1>
                <p class="text-sm text-slate-600 dark:text-slate-400">
                  Tìm thấy 4 kết quả
                </p>
              </div>
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg"
                >
                  <div class="flex items-start gap-4">
                    <img
                      alt="Portrait of Dr. Nguyễn Văn Hùng"
                      class="w-24 h-24 rounded-full object-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAMe_-STbYS8CS5gAsIkEmOx4wTw4Bl3Uho1sedKEauRHApxbQP1mmWLXYp8wgK7P-kX7KcwH-3k2xNYSe6yEaLHP6Y892OvL9eKjjf0gxRTQ9oEySIKRcrFyWU1KlPjk9iOmyODfKlWAVhEYEP4UUK4lP5r2j-CK0rQmXHnjCdUEIB7g29yTgHdD31JIpz9uguIxpETs8nx8ySAWMGyOgtdItL86QOVAFZH07upbkCDp4gf7-rFKTLsAx3-g-uyhEPR605Hakr5c"
                    />
                    <div class="flex-1">
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS. Nguyễn Văn Hùng
                      </h3>
                      <p class="text-sm text-primary font-medium">Tim mạch</p>
                      <div class="flex items-center gap-1 mt-1 text-yellow-500">
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span
                          class="material-symbols-outlined !text-base text-slate-300 dark:text-slate-600"
                          >star</span
                        >
                        <span
                          class="text-sm text-slate-500 dark:text-slate-400 ml-1"
                          >(120 đánh giá)</span
                        >
                      </div>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mt-2"
                      >
                        Kinh nghiệm: 15 năm
                      </p>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700"
                  >
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                    >
                      Xem chi tiết
                    </button>
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors"
                    >
                      Đặt lịch hẹn
                    </button>
                  </div>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg"
                >
                  <div class="flex items-start gap-4">
                    <img
                      alt="Portrait of Dr. Trần Thị Mai"
                      class="w-24 h-24 rounded-full object-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIoQ1msg9a3femUHCky6B0bXvHDyaEXtyHZueO63Aqmwd8EPcLzk7WTKOgcX-X9vE6LYZlHylE0i95r6H0BXIva-sD0WhemqgL6K6N-8TIbPxKy1FYTtHzL5KY04LSBnNSjCVg7U53yLIfURfgFl4RK__5A598GgSk0GadXrlMqeKBlnoha-hypB5Sz6UejM2SPIJ2WYby9tZcojnf-kn2FWWO1MIkbOG4XExNRDVLDM9T_B3MstbqPrVFQ9ggdrhjVt6O60y1Cto"
                    />
                    <div class="flex-1">
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS. Trần Thị Mai
                      </h3>
                      <p class="text-sm text-primary font-medium">Da liễu</p>
                      <div class="flex items-center gap-1 mt-1 text-yellow-500">
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star_half</span
                        >
                        <span
                          class="text-sm text-slate-500 dark:text-slate-400 ml-1"
                          >(98 đánh giá)</span
                        >
                      </div>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mt-2"
                      >
                        Kinh nghiệm: 8 năm
                      </p>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700"
                  >
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                    >
                      Xem chi tiết
                    </button>
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors"
                    >
                      Đặt lịch hẹn
                    </button>
                  </div>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg"
                >
                  <div class="flex items-start gap-4">
                    <img
                      alt="Portrait of Dr. Lê Văn Nam"
                      class="w-24 h-24 rounded-full object-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuC71Wj3h3U6bDH6xXws5IBOM4wecR0SJxeHqVXgRxAKUgpOftwM0lOpiXEfEIHvk_xPOmRyyPQEt2qcF9jUoqK-oQ9n2_tZBGHlzvCo-OfSkBYiFTXprONwAAbqGL-eJd6QkNgSW-kJh10C9puHD8UXEamtzg_rnCRKlTX-DVIOU8VhuqSszcp0aCT49FwsRn7UV37D8BpWwoCrhaWrjFifo3NGDGOiPm0cUpexH2yp0cvy5tmBzaDFhYfEQSGTH05f_NCiJTJhLKM"
                    />
                    <div class="flex-1">
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS. Lê Văn Nam
                      </h3>
                      <p class="text-sm text-primary font-medium">Nhi khoa</p>
                      <div class="flex items-center gap-1 mt-1 text-yellow-500">
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span
                          class="text-sm text-slate-500 dark:text-slate-400 ml-1"
                          >(215 đánh giá)</span
                        >
                      </div>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mt-2"
                      >
                        Kinh nghiệm: 12 năm
                      </p>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700"
                  >
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                    >
                      Xem chi tiết
                    </button>
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors"
                    >
                      Đặt lịch hẹn
                    </button>
                  </div>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg"
                >
                  <div class="flex items-start gap-4">
                    <img
                      alt="Portrait of Dr. Phạm Thị Thu"
                      class="w-24 h-24 rounded-full object-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWugOHP4ct9uYei4inlHXbjIMX-nZSYEGb0OaZWlORbhmLyDqQZBFT6FHSZKWDWarqfJ4JC7Y2aw0CyeVw1lHZ_jGr7al1Kgf6iSGnmTozNwi2NFIbbxJNzMH9cheieQufLGUeq-TXb2oPKeY6jPaNsRBM2HlR-0LU76BcviL2RQaUhWl2b4BtyiQn5Z1k97RYYGTTrrhvJp9G2BPUdVRdf1YFadrqogz9a9IJolDsUmsY7gdvq8qLqCZb3HuPsmUsA3Z_QJFDxt0"
                    />
                    <div class="flex-1">
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS. Phạm Thị Thu
                      </h3>
                      <p class="text-sm text-primary font-medium">
                        Sản phụ khoa
                      </p>
                      <div class="flex items-center gap-1 mt-1 text-yellow-500">
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star_half</span
                        >
                        <span
                          class="text-sm text-slate-500 dark:text-slate-400 ml-1"
                          >(178 đánh giá)</span
                        >
                      </div>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mt-2"
                      >
                        Kinh nghiệm: 10 năm
                      </p>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700"
                  >
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                    >
                      Xem chi tiết
                    </button>
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors"
                    >
                      Đặt lịch hẹn
                    </button>
                  </div>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg"
                >
                  <div class="flex items-start gap-4">
                    <img
                      alt="Portrait of Dr. Nguyễn Văn Hùng"
                      class="w-24 h-24 rounded-full object-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAMe_-STbYS8CS5gAsIkEmOx4wTw4Bl3Uho1sedKEauRHApxbQP1mmWLXYp8wgK7P-kX7KcwH-3k2xNYSe6yEaLHP6Y892OvL9eKjjf0gxRTQ9oEySIKRcrFyWU1KlPjk9iOmyODfKlWAVhEYEP4UUK4lP5r2j-CK0rQmXHnjCdUEIB7g29yTgHdD31JIpz9uguIxpETs8nx8ySAWMGyOgtdItL86QOVAFZH07upbkCDp4gf7-rFKTLsAx3-g-uyhEPR605Hakr5c"
                    />
                    <div class="flex-1">
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS. Trịnh Trần Phương Hướng
                      </h3>
                      <p class="text-sm text-primary font-medium">Tiêu hóa</p>
                      <div class="flex items-center gap-1 mt-1 text-yellow-500">
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span
                          class="material-symbols-outlined !text-base text-slate-300 dark:text-slate-600"
                          >star</span
                        >
                        <span
                          class="text-sm text-slate-500 dark:text-slate-400 ml-1"
                          >(185 đánh giá)</span
                        >
                      </div>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mt-2"
                      >
                        Kinh nghiệm: 18 năm
                      </p>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700"
                  >
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                    >
                      Xem chi tiết
                    </button>
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors"
                    >
                      Đặt lịch hẹn
                    </button>
                  </div>
                </div>
                <div
                  class="flex flex-col gap-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 transition-shadow hover:shadow-lg"
                >
                  <div class="flex items-start gap-4">
                    <img
                      alt="Portrait of Dr. Nguyễn Văn Hùng"
                      class="w-24 h-24 rounded-full object-cover"
                      src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAMe_-STbYS8CS5gAsIkEmOx4wTw4Bl3Uho1sedKEauRHApxbQP1mmWLXYp8wgK7P-kX7KcwH-3k2xNYSe6yEaLHP6Y892OvL9eKjjf0gxRTQ9oEySIKRcrFyWU1KlPjk9iOmyODfKlWAVhEYEP4UUK4lP5r2j-CK0rQmXHnjCdUEIB7g29yTgHdD31JIpz9uguIxpETs8nx8ySAWMGyOgtdItL86QOVAFZH07upbkCDp4gf7-rFKTLsAx3-g-uyhEPR605Hakr5c"
                    />
                    <div class="flex-1">
                      <h3
                        class="text-lg font-bold text-slate-900 dark:text-slate-50"
                      >
                        BS. Nguyễn Phúc Anh
                      </h3>
                      <p class="text-sm text-primary font-medium">Thần Kinh</p>
                      <div class="flex items-center gap-1 mt-1 text-yellow-500">
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span class="material-symbols-outlined !text-base"
                          >star</span
                        >
                        <span
                          class="material-symbols-outlined !text-base text-slate-300 dark:text-slate-600"
                          >star</span
                        >
                        <span
                          class="text-sm text-slate-500 dark:text-slate-400 ml-1"
                          >(120 đánh giá)</span
                        >
                      </div>
                      <p
                        class="text-sm text-slate-600 dark:text-slate-400 mt-2"
                      >
                        Kinh nghiệm: 10 năm
                      </p>
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-3 mt-auto pt-4 border-t border-slate-200 dark:border-slate-700"
                  >
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 border border-slate-300 dark:border-slate-600 bg-transparent text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors"
                    >
                      Xem chi tiết
                    </button>
                    <button
                      class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold hover:bg-primary/90 transition-colors"
                    >
                      Đặt lịch hẹn
                    </button>
                  </div>
                </div>
              </div>
              <nav
                aria-label="Pagination"
                class="flex items-center justify-center mt-10"
              >
                <a
                  class="relative inline-flex items-center rounded-l-md px-2 py-2 text-slate-400 ring-1 ring-inset ring-slate-300 hover:bg-slate-50 dark:ring-slate-600 dark:hover:bg-slate-700 focus:z-20 focus:outline-offset-0"
                  href="#"
                >
                  <span class="sr-only">Previous</span>
                  <span class="material-symbols-outlined !text-xl"
                    >chevron_left</span
                  >
                </a>
                <a
                  aria-current="page"
                  class="relative z-10 inline-flex items-center bg-primary px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                  href="#"
                  >1</a
                >
                <a
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-900 dark:text-slate-50 ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 focus:z-20 focus:outline-offset-0"
                  href="#"
                  >2</a
                >
                <a
                  class="relative hidden items-center px-4 py-2 text-sm font-semibold text-slate-900 dark:text-slate-50 ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 focus:z-20 focus:outline-offset-0 md:inline-flex"
                  href="#"
                  >3</a
                >
                <span
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-700 dark:text-slate-300 ring-1 ring-inset ring-slate-300 dark:ring-slate-600 focus:outline-offset-0"
                  >...</span
                >
                <a
                  class="relative hidden items-center px-4 py-2 text-sm font-semibold text-slate-900 dark:text-slate-50 ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 focus:z-20 focus:outline-offset-0 md:inline-flex"
                  href="#"
                  >8</a
                >
                <a
                  class="relative inline-flex items-center rounded-r-md px-2 py-2 text-slate-400 ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 focus:z-20 focus:outline-offset-0"
                  href="#"
                >
                  <span class="sr-only">Next</span>
                  <span class="material-symbols-outlined !text-xl"
                    >chevron_right</span
                  >
                </a>
              </nav>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection