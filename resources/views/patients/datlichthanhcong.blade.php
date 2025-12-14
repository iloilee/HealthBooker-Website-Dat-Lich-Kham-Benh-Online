@extends('layouts.app')
@section('content')
<div class="layout-container flex h-full grow flex-col">
        <main
          class="flex-1 w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16"
        >
          <div
            class="bg-white dark:bg-background-dark p-6 sm:p-8 rounded-xl border border-slate-200 dark:border-slate-800 flex flex-col items-center text-center"
          >
            <div
              class="mb-4 flex size-16 items-center justify-center rounded-full bg-success/10 text-success"
            >
              <span
                class="material-symbols-outlined !text-4xl"
                style="font-variation-settings: 'FILL' 1"
                >check_circle</span
              >
            </div>
            <h1
              class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-slate-50 mb-2"
            >
              Đặt lịch khám thành công!
            </h1>
            <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-md">
              Cảm ơn bạn đã tin tưởng HealthBooker. Thông tin chi tiết về cuộc
              hẹn đã được gửi đến email của bạn.
            </p>
            <div
              class="w-full max-w-md bg-slate-50 dark:bg-slate-800/50 p-6 rounded-lg border border-slate-200 dark:border-slate-800 text-left space-y-4 mb-8"
            >
              <h2
                class="text-lg font-bold text-slate-900 dark:text-slate-50 text-center mb-4"
              >
                Tóm tắt lịch hẹn
              </h2>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >person</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Bác sĩ
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    ThS.BS Trần Minh Khôi
                  </p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >medical_services</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Chuyên khoa
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    Da liễu
                  </p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >calendar_month</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Thời gian
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    09:00 - Chủ Nhật, 03/12/2023
                  </p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span
                  class="material-symbols-outlined text-primary !text-xl mt-0.5"
                  >location_on</span
                >
                <div class="flex-1">
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Địa điểm
                  </p>
                  <p class="font-semibold text-slate-800 dark:text-slate-200">
                    Phòng khám Da liễu, Quận 1, TP.HCM
                  </p>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 sm:gap-4 w-full">
              <button
                class="flex-1 sm:flex-none flex min-w-[160px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90"
              >
                <span class="material-symbols-outlined !text-xl mr-2"
                  >event</span
                >
                <span class="truncate">Thêm vào lịch</span>
              </button>
              <button
                class="flex-1 sm:flex-none flex min-w-[160px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-11 px-4 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-slate-200 dark:hover:bg-slate-700"
              >
                <span class="material-symbols-outlined !text-xl mr-2"
                  >home</span
                >
                <span class="truncate">Về trang chủ</span>
              </button>
            </div>
            <a
              class="mt-6 text-primary text-sm font-semibold hover:underline"
              href="#"
              >Quản lý tất cả lịch hẹn</a
            >
          </div>
        </main>
      </div>
@endsection