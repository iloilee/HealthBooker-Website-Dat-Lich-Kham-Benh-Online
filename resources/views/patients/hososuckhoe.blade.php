@extends('layouts.app')
@section('content')
<div class="layout-container flex h-full grow flex-col">
                <div class="flex flex-1 justify-center">
                    <div
                        class="layout-content-container flex flex-col max-w-[1280px] flex-1">
                        <main class="flex flex-col gap-8 px-4 md:px-10 py-8">
                            <div
                                class="flex flex-col md:flex-row gap-6 items-start md:items-center justify-between bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-100 dark:border-slate-700"
                            >
                                <div class="flex items-center gap-6">
                                    <div
                                        class="w-24 h-24 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center overflow-hidden border-2 border-primary/20"
                                    >
                                        <img
                                            alt="Patient"
                                            class="w-full h-full object-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHxnw54n7fv0pXlG_4gjd_1Pgf7e_yYDbtXkQV-HHLJjXibQ0RQxr7v6L5KWoEztILjhnYCqfl2AKS3UYIaAD760pm07ikSY5u7GRE1wpIb4JBbHWkSF8eye3BT68kEXKCA8KIHUfu8YStV4W7RD1GdWWLe0H3j-0bezbwHl_5vDrGCzOt0ZvWckQpb66vyyXdIkDPtBrouaQxM7BFIh4rxj8VlgbXMSmPsXF3Yy4mlyFukQvmVCdrdBRGBHsYPZriVY56DfFKXUA"
                                        />
                                    </div>
                                    <div>
                                        <h1
                                            class="text-2xl font-bold text-slate-900 dark:text-white"
                                        >
                                            Nguyễn Văn A
                                        </h1>
                                        <p
                                            class="text-slate-500 dark:text-slate-400 text-sm"
                                        >
                                            Mã bệnh nhân:
                                            <span
                                                class="font-mono text-slate-700 dark:text-slate-300"
                                                >HB-2024-8921</span
                                            >
                                        </p>
                                        <div class="flex flex-wrap gap-4 mt-3">
                                            <span
                                                class="inline-flex items-center gap-1 text-sm text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-3 py-1 rounded-full"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-base"
                                                    >calendar_month</span
                                                >
                                                15/08/1985 (39 tuổi)
                                            </span>
                                            <span
                                                class="inline-flex items-center gap-1 text-sm text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-3 py-1 rounded-full"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-base"
                                                    >wc</span
                                                >
                                                Nam
                                            </span>
                                            <span
                                                class="inline-flex items-center gap-1 text-sm text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-3 py-1 rounded-full"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-base"
                                                    >call</span
                                                >
                                                090 123 4567
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-full md:w-auto">
                                    <button
                                        class="flex-1 md:flex-none items-center justify-center gap-2 bg-primary text-white px-5 py-2.5 rounded-lg font-medium hover:bg-primary/90 transition-colors flex"
                                    >
                                        <span
                                            class="material-symbols-outlined text-lg"
                                            >edit_calendar</span
                                        >
                                        Đặt lịch khám mới
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div
                                    class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm"
                                >
                                    <div
                                        class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2"
                                    >
                                        <span
                                            class="material-symbols-outlined text-red-500"
                                            >favorite</span
                                        >
                                        <span class="text-sm font-medium"
                                            >Nhóm máu</span
                                        >
                                    </div>
                                    <p
                                        class="text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        O+
                                    </p>
                                </div>
                                <div
                                    class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm"
                                >
                                    <div
                                        class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2"
                                    >
                                        <span
                                            class="material-symbols-outlined text-blue-500"
                                            >height</span
                                        >
                                        <span class="text-sm font-medium"
                                            >Chiều cao</span
                                        >
                                    </div>
                                    <p
                                        class="text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        175
                                        <span
                                            class="text-base font-normal text-slate-500"
                                            >cm</span
                                        >
                                    </p>
                                </div>
                                <div
                                    class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm"
                                >
                                    <div
                                        class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2"
                                    >
                                        <span
                                            class="material-symbols-outlined text-green-500"
                                            >monitor_weight</span
                                        >
                                        <span class="text-sm font-medium"
                                            >Cân nặng</span
                                        >
                                    </div>
                                    <p
                                        class="text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        72
                                        <span
                                            class="text-base font-normal text-slate-500"
                                            >kg</span
                                        >
                                    </p>
                                </div>
                                <div
                                    class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm"
                                >
                                    <div
                                        class="flex items-center gap-2 text-slate-500 dark:text-slate-400 mb-2"
                                    >
                                        <span
                                            class="material-symbols-outlined text-orange-500"
                                            >accessibility_new</span
                                        >
                                        <span class="text-sm font-medium"
                                            >BMI</span
                                        >
                                    </div>
                                    <p
                                        class="text-2xl font-bold text-slate-900 dark:text-white"
                                    >
                                        23.5
                                        <span
                                            class="text-base font-normal text-slate-500"
                                            >(Bình thường)</span
                                        >
                                    </p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <div class="lg:col-span-2 space-y-8">
                                    <section
                                        class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden"
                                    >
                                        <div
                                            class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center"
                                        >
                                            <h3
                                                class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-primary"
                                                    >history</span
                                                >
                                                Lịch sử khám bệnh gần đây
                                            </h3>
                                            <a
                                                class="text-primary text-sm font-medium hover:underline"
                                                href="#"
                                                >Xem tất cả</a
                                            >
                                        </div>
                                        <div
                                            class="divide-y divide-slate-100 dark:divide-slate-700"
                                        >
                                            <div
                                                class="p-6 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors"
                                            >
                                                <div
                                                    class="flex justify-between items-start mb-2"
                                                >
                                                    <div>
                                                        <h4
                                                            class="font-bold text-slate-900 dark:text-white"
                                                        >
                                                            Khám tổng quát định
                                                            kỳ
                                                        </h4>
                                                        <p
                                                            class="text-sm text-slate-500 dark:text-slate-400"
                                                        >
                                                            Bệnh viện Đại học Y
                                                            Dược TP.HCM
                                                        </p>
                                                    </div>
                                                    <span
                                                        class="text-sm font-medium text-slate-500 bg-slate-100 dark:bg-slate-700 dark:text-slate-300 px-2 py-1 rounded"
                                                        >10/05/2024</span
                                                    >
                                                </div>
                                                <p
                                                    class="text-slate-600 dark:text-slate-300 text-sm mt-2 line-clamp-2"
                                                >
                                                    Bệnh nhân tỉnh táo, tiếp xúc
                                                    tốt. Huyết áp ổn định 120/80
                                                    mmHg. Tim đều, phổi trong.
                                                    Đề nghị xét nghiệm máu và
                                                    nước tiểu thường quy.
                                                </p>
                                                <div class="mt-3 flex gap-2">
                                                    <span
                                                        class="inline-flex items-center gap-1 text-xs text-primary bg-primary/10 px-2 py-1 rounded border border-primary/20"
                                                    >
                                                        <span
                                                            class="material-symbols-outlined text-sm"
                                                            >description</span
                                                        >
                                                        Kết quả xét nghiệm
                                                    </span>
                                                    <span
                                                        class="inline-flex items-center gap-1 text-xs text-primary bg-primary/10 px-2 py-1 rounded border border-primary/20"
                                                    >
                                                        <span
                                                            class="material-symbols-outlined text-sm"
                                                            >medication</span
                                                        >
                                                        Đơn thuốc
                                                    </span>
                                                </div>
                                            </div>
                                            <div
                                                class="p-6 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors"
                                            >
                                                <div
                                                    class="flex justify-between items-start mb-2"
                                                >
                                                    <div>
                                                        <h4
                                                            class="font-bold text-slate-900 dark:text-white"
                                                        >
                                                            Khám Tai Mũi Họng
                                                        </h4>
                                                        <p
                                                            class="text-sm text-slate-500 dark:text-slate-400"
                                                        >
                                                            Phòng khám Đa khoa
                                                            HealthBooker
                                                        </p>
                                                    </div>
                                                    <span
                                                        class="text-sm font-medium text-slate-500 bg-slate-100 dark:bg-slate-700 dark:text-slate-300 px-2 py-1 rounded"
                                                        >22/02/2024</span
                                                    >
                                                </div>
                                                <p
                                                    class="text-slate-600 dark:text-slate-300 text-sm mt-2 line-clamp-2"
                                                >
                                                    Chẩn đoán: Viêm họng cấp.
                                                    Triệu chứng: Ho khan, đau
                                                    rát họng, sốt nhẹ về chiều.
                                                    Đã kê đơn thuốc kháng sinh
                                                    và giảm đau.
                                                </p>
                                                <div class="mt-3 flex gap-2">
                                                    <span
                                                        class="inline-flex items-center gap-1 text-xs text-primary bg-primary/10 px-2 py-1 rounded border border-primary/20"
                                                    >
                                                        <span
                                                            class="material-symbols-outlined text-sm"
                                                            >medication</span
                                                        >
                                                        Đơn thuốc
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    
                                </div>
                                <div class="lg:col-span-1 space-y-8">
                                    <div
                                        class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6"
                                    >
                                        <h3
                                            class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2"
                                        >
                                            <span
                                                class="material-symbols-outlined text-red-500"
                                                >warning</span
                                            >
                                            Dị ứng
                                        </h3>
                                        <ul class="space-y-3">
                                            <li
                                                class="flex items-start gap-3 p-3 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-100 dark:border-red-900/30"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-red-500 text-sm mt-0.5"
                                                    >block</span
                                                >
                                                <div>
                                                    <p
                                                        class="text-sm font-bold text-slate-800 dark:text-slate-200"
                                                    >
                                                        Penicillin
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-600 dark:text-slate-400"
                                                    >
                                                        Mức độ: Nghiêm trọng
                                                    </p>
                                                </div>
                                            </li>
                                            <li
                                                class="flex items-start gap-3 p-3 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-100 dark:border-red-900/30"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-red-500 text-sm mt-0.5"
                                                    >block</span
                                                >
                                                <div>
                                                    <p
                                                        class="text-sm font-bold text-slate-800 dark:text-slate-200"
                                                    >
                                                        Hải sản vỏ cứng
                                                    </p>
                                                    <p
                                                        class="text-xs text-slate-600 dark:text-slate-400"
                                                    >
                                                        Mức độ: Nhẹ (mẩn ngứa)
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div
                                        class="bg-gradient-to-br from-primary to-blue-600 rounded-xl shadow-lg p-6 text-white"
                                    >
                                        <h3
                                            class="text-lg font-bold mb-4 flex items-center gap-2"
                                        >
                                            <span
                                                class="material-symbols-outlined"
                                                >event_upcoming</span
                                            >
                                            Lịch hẹn sắp tới
                                        </h3>
                                        <div
                                            class="bg-white/10 backdrop-blur-sm rounded-lg p-4 mb-4 border border-white/20"
                                        >
                                            <div
                                                class="flex items-center justify-between mb-2"
                                            >
                                                <span
                                                    class="text-xs font-semibold bg-white/20 px-2 py-0.5 rounded text-white"
                                                    >Tái khám</span
                                                >
                                                <span
                                                    class="text-xs text-blue-100"
                                                    >Còn 5 ngày</span
                                                >
                                            </div>
                                            <p class="font-bold text-lg mb-1">
                                                Khám Nội Tiết
                                            </p>
                                            <p
                                                class="text-sm text-blue-100 mb-3"
                                            >
                                                Bs. Trần Thị Mai - Bệnh viện
                                                ĐHYD
                                            </p>
                                            <div
                                                class="flex items-center gap-2 text-sm border-t border-white/20 pt-2"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-base"
                                                    >schedule</span
                                                >
                                                09:00 - 15/06/2024
                                            </div>
                                        </div>
                                        <button
                                            class="w-full bg-white text-primary font-bold py-2 rounded-lg text-sm hover:bg-slate-50 transition-colors"
                                        >
                                            Xem tất cả lịch hẹn
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
@endsection