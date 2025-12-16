@extends('layouts.admin')
@section('content')
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-primary/20"
                >
                  <span class="material-symbols-outlined">stethoscope</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Tổng số Bác sĩ
                  </p>
                  <p class="text-2xl font-bold">125</p>
                </div>
              </div>
            </div>
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-green-500/10 text-green-500 dark:bg-green-500/20"
                >
                  <span class="material-symbols-outlined">groups</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Tổng số Bệnh nhân
                  </p>
                  <p class="text-2xl font-bold">1,830</p>
                </div>
              </div>
            </div>
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-500/10 text-amber-500 dark:bg-amber-500/20"
                >
                  <span class="material-symbols-outlined">calendar_month</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Lịch hẹn hôm nay
                  </p>
                  <p class="text-2xl font-bold">42</p>
                </div>
              </div>
            </div>
            <div
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 p-5"
            >
              <div class="flex items-center gap-4">
                <div
                  class="flex h-12 w-12 items-center justify-center rounded-full bg-red-500/10 text-red-500 dark:bg-red-500/20"
                >
                  <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <div>
                  <p class="text-sm text-slate-500 dark:text-slate-400">
                    Lịch hẹn chờ duyệt
                  </p>
                  <p class="text-2xl font-bold">8</p>
                </div>
              </div>
            </div>
          </div>
          <div
            class="mt-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850">
            <div class="border-b border-slate-200 dark:border-slate-800 p-4">
              <h3 class="text-lg font-semibold">Lịch hẹn gần đây</h3>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-sm">
                <thead
                  class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300"
                >
                  <tr>
                    <th class="px-4 py-3 font-medium">Bệnh nhân</th>
                    <th class="px-4 py-3 font-medium">Bác sĩ</th>
                    <th class="px-4 py-3 font-medium">Chuyên khoa</th>
                    <th class="px-4 py-3 font-medium">Ngày khám</th>
                    <th class="px-4 py-3 font-medium">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Trần Văn An</td>
                    <td class="px-4 py-3">BS. Nguyễn Thị Mai</td>
                    <td class="px-4 py-3">Tim mạch</td>
                    <td class="px-4 py-3">25/07/2024 - 09:30</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300"
                        >Đã xác nhận</span
                      >
                    </td>
                  </tr>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Lê Thị Bích</td>
                    <td class="px-4 py-3">BS. Lê Văn Hùng</td>
                    <td class="px-4 py-3">Da liễu</td>
                    <td class="px-4 py-3">25/07/2024 - 10:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-amber-100 px-2 py-1 text-xs font-medium text-amber-700 dark:bg-amber-900/50 dark:text-amber-300"
                        >Chờ xác nhận</span
                      >
                    </td>
                  </tr>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Phạm Minh Cường</td>
                    <td class="px-4 py-3">BS. Trần Anh Dũng</td>
                    <td class="px-4 py-3">Nhi khoa</td>
                    <td class="px-4 py-3">24/07/2024 - 14:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-700 dark:bg-slate-700 dark:text-slate-300"
                        >Đã hoàn thành</span
                      >
                    </td>
                  </tr>
                  <tr class="border-b border-slate-200 dark:border-slate-800">
                    <td class="px-4 py-3">Vũ Thị Lan</td>
                    <td class="px-4 py-3">BS. Hoàng Thu Trang</td>
                    <td class="px-4 py-3">Sản phụ khoa</td>
                    <td class="px-4 py-3">24/07/2024 - 11:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 dark:bg-red-900/50 dark:text-red-300"
                        >Đã hủy</span
                      >
                    </td>
                  </tr>
                  <tr>
                    <td class="px-4 py-3">Đặng Văn Long</td>
                    <td class="px-4 py-3">BS. Nguyễn Thị Mai</td>
                    <td class="px-4 py-3">Tim mạch</td>
                    <td class="px-4 py-3">26/07/2024 - 08:00</td>
                    <td class="px-4 py-3">
                      <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300"
                        >Đã xác nhận</span
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
@endsection