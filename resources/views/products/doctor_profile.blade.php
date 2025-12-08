<!DOCTYPE html>

<html lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Chỉnh sửa Hồ sơ Bác sĩ - HealthBooker</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
          'hb-blue': '#0D6EFD',
            'hb-blue-dark': '#0B5ED7',
            'hb-light-gray': '#F0F2F5',
            'hb-text-primary': '#212529',
            'hb-text-secondary': '#6C757D',
        },
        fontFamily: {
          display: ["Manrope", "sans-serif"],
        }
      },
    },
  };
</script>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
@if(session('success'))
    <div
        id="toast"
        class="fixed top-5 right-5 z-50 max-w-xs rounded-lg bg-green-500 p-4 text-white shadow-lg opacity-0 transform translate-x-10 transition-all duration-500"
    >
        <div class="flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="closeToast()" class="ml-2 font-bold text-white">&times;</button>
        </div>
        <div class="mt-2 h-1 w-full bg-green-300 rounded">
            <div id="toast-progress" class="h-1 bg-white rounded w-full"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toast = document.getElementById('toast');
            const progress = document.getElementById('toast-progress');
            const duration = 3000;
            let start = null;
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-10');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 100);
            function animateProgress(timestamp) {
                if (!start) start = timestamp;
                const elapsed = timestamp - start;
                const percent = Math.max(0, 100 - (elapsed / duration * 100));
                progress.style.width = percent + '%';

                if (elapsed < duration) {
                    requestAnimationFrame(animateProgress);
                }
            }
            requestAnimationFrame(animateProgress);
            setTimeout(() => closeToast(), duration);
            window.closeToast = function () {
                toast.classList.add('opacity-0', 'translate-x-10');
                setTimeout(() => toast.remove(), 500);
            }
        });
    </script>
@endif
<div class="min-h-screen" id="app-container">
<!-- BEGIN: MainHeader -->
<header
    class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-4 sm:px-6 lg:px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-50"
>
    <div class="flex items-center gap-4 text-slate-900 dark:text-slate-50">
        <div class="size-6 text-primary">
            <a href="{{ route('home') }}">
                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_6_330)">
                        <path clip-rule="evenodd"
                            d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z"
                            fill="currentColor" fill-rule="evenodd"></path>
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
                <a class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary" href="{{ route('bacsilog') }}">Tổng quan</a>
                <a class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                    href="#">Lịch hẹn</a>
                <a class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                    href="#">Bệnh nhân</a>
                <a class="text-slate-900 dark:text-slate-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary"
                    href="#">Tin nhắn</a>
                <a class="text-primary text-sm font-bold leading-normal"
                    href="#">Hồ sơ Bác sĩ</a>
            </div>
        </div>
    </div>

    <div class="hidden md:flex flex-1 justify-end items-center gap-4">
        <button
            class="flex items-center justify-center size-10 rounded-full text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">
            <span class="material-symbols-outlined">notifications</span>
        </button>

        <div class="relative">
            <div id="doctorMenuBtn" class="flex items-center gap-3 cursor-pointer">
                <img src="{{ $doctor->user->avatar ?? asset('images/default.jpg') }}" class="w-12 h-12 rounded-full">
                <div class="text-sm">
                    <p class="font-bold text-slate-900 dark:text-slate-50">{{ $doctor->user->name }}</p>
                    <p class="text-slate-500 dark:text-slate-400">{{ $doctor->specialization->name }}</p>
                </div>
                <span class="material-symbols-outlined text-slate-600 dark:text-slate-400">expand_more</span>
            </div>

            <div id="doctorDropdown"
                class="absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 shadow-lg rounded-lg border border-slate-200 dark:border-slate-700 hidden">
                <a href="{{ route('doctor_profile') }}"
                    class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700">
                    Hồ sơ cá nhân
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
    </div>

    <button
        class="md:hidden flex items-center justify-center size-10 rounded-lg text-slate-900 dark:text-slate-50 hover:bg-slate-100 dark:hover:bg-slate-800">
        <span class="material-symbols-outlined">menu</span>
    </button>
</header>

<!-- END: MainHeader -->
<!-- BEGIN: MainContent -->
<main class="max-w-screen-xl mx-auto px-6 py-10">
<!-- Page Title and Actions -->
<div class="flex justify-between items-center mb-6">
<h2 class="font-bold text-hb-text-primary text-3xl">Chỉnh sửa Hồ sơ Bác sĩ</h2>
<div class="flex space-x-3">
<button id="editBtn" class="bg-hb-blue hover:bg-hb-blue-dark text-white font-semibold py-2 px-4 rounded-lg">Chỉnh sửa</button> 
<button id="cancelBtn" class="hidden hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition-colors bg-gray-100">Hủy</button>
<button id="saveBtn" class="hidden bg-hb-blue hover:bg-hb-blue-dark text-white font-semibold py-2 px-4 rounded-lg transition-colors">Lưu thay đổi</button>
</div>
</div>
<!-- Main Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<!-- BEGIN: LeftColumn -->
<div class="lg:col-span-2 space-y-6">
<!-- Card: Personal Information -->
<section class="bg-white rounded-xl p-8 shadow" data-purpose="personal-information-card">
<h3 class="font-bold mb-6 text-xl">Thông tin cá nhân</h3>
<div class="space-y-6">
<div class="flex items-start space-x-6">
<!-- Profile Picture -->
<div class="relative flex-shrink-0">
<img alt="Avatar bác sĩ" class="w-20 h-20 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyCjmk59HnzFRmW5s6gXA5c8CMY34DG0TNT6UPz8MBAv4sw69KVxHtPvZBXzP-sEzwrHwBPnTG8I6prXeXQKpEhipMGfDvxzNAS8W2CKG_LdnUZHbsbuwFo0qvJBtsoVYPxzxhoZPO3s-PW-KFYLt_3pPN3FSTbaoN8Xl6Z0gp2-8M3PR_708vQ6F0AFjsXXLxNCqboPugy0ZoA7VOY6tRAOo-LFrZHaI0AonlcaJ3frELx9oM1XG1My9vUammfYRL2IaPkRLjmT4"/>
<button class="absolute bottom-0 right-0 bg-hb-blue text-white w-6 h-6 rounded-full flex items-center justify-center border-2 border-white">
<i class="fas fa-pencil-alt text-xs"></i>
</button>
</div>
<!-- Full Name Field -->
<div class="flex-grow">
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="full-name">Họ và tên</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="full-name" type="text" value="{{  $doctor->user->name }}" disabled/>
</div>
</div>
<!-- Form grid for smaller fields -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="gender">Giới tính</label>
<select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="gender" disabled>
<option>Nữ</option>
<option>Nam</option>
<option>Khác</option>
</select>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="dob">Ngày sinh</label>
<div class="relative">
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue pr-10" id="dob" type="text" value="05/15/1978" disabled/>
<span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
<i class="far fa-calendar-alt text-gray-400"></i>
</span>
</div>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="phone">Số điện thoại</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="phone" type="tel" value="{{ $doctor->user->phone }}" disabled/>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="email">Email</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="email" type="email" value="{{ $doctor->user->email }}" disabled/>
</div>
</div>
<!-- Address Field -->
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="address">Địa chỉ</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="address" type="text" value="{{ $doctor->user->address }}" disabled/>
</div>
</div>
</section>
<!-- Card: Professional Information -->
<section class="bg-white rounded-xl p-8 shadow" data-purpose="professional-information-card">
<h3 class="font-bold mb-6 text-xl">Thông tin chuyên môn</h3>
<div class="space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="specialty">Chuyên khoa chính</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="specialty" type="text" value="Tim mạch" disabled/>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="experience">Số năm kinh nghiệm</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="experience" type="number" value="15" disabled/>
</div>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="treatment-field">Lĩnh vực điều trị</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="treatment-field" type="text" value="Tim mạch can thiệp, Rối loạn nhịp tim" disabled/>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="certification">Bằng cấp/Chứng chỉ</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="certification" type="text" value="Bác sĩ Chuyên khoa II - Đại học Y Dược TPHCM" disabled/>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="workplace">Phòng khám</label>
<input class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue" id="workplace" type="text" value="Phòng khám" disabled/>
</div>
<div>
<label class="block text-sm text-hb-text-secondary mb-1 font-semibold" for="bio">Giới thiệu bản thân</label>
<textarea class="w-full border-gray-300 rounded-md shadow-sm focus:ring-hb-blue focus:border-hb-blue resize-y" id="bio" rows="5" disabled>Bác sĩ Trần Thị Bích là một chuyên gia hàng đầu trong lĩnh vực Tim mạch can thiệp. Với hơn 15 năm kinh nghiệm, bác sĩ đã thực hiện thành công hàng ngàn ca phẫu thuật phức tạp và nhận được sự tin tưởng tuyệt đối từ bệnh nhân. Bác sĩ luôn tận tâm, chu đáo và không ngừng cập nhật các phương pháp điều trị tiên tiến nhất trên thế giới để mang lại kết quả tốt nhất cho người bệnh.</textarea>
</div>
</div>
</section>
</div>
<!-- END: LeftColumn -->
<!-- BEGIN: RightColumn -->
<div class="lg:col-span-1 space-y-6">
<!-- Card: Work Schedule -->
<section class="bg-white rounded-xl p-8 shadow" data-purpose="work-schedule-card">
<div class="flex justify-between items-center mb-4">
<h3 class="text-lg font-bold">Lịch làm việc</h3>
<a class="text-sm font-semibold text-hb-blue hover:underline" href="#">Quản lý</a>
</div>
<div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
<p class="font-semibold">Thứ Ba, 23/07/2024</p>
<p class="text-sm text-green-600">Còn 5 lịch trống</p>
</div>
<div class="grid grid-cols-3 gap-2 mt-4">
<button class="bg-gray-100 text-hb-text-secondary py-2 rounded-md hover:bg-gray-200 transition-colors text-sm">08:00</button>
<button class="bg-gray-100 text-hb-text-secondary py-2 rounded-md hover:bg-gray-200 transition-colors text-sm">08:30</button>
<button class="bg-gray-100 text-hb-text-secondary py-2 rounded-md hover:bg-gray-200 transition-colors text-sm">09:00</button>
<button class="bg-gray-100 text-hb-text-secondary py-2 rounded-md hover:bg-gray-200 transition-colors text-sm">09:30</button>
<button class="bg-gray-100 text-hb-text-secondary py-2 rounded-md hover:bg-gray-200 transition-colors text-sm">10:00</button>
<button class="bg-gray-100 text-hb-text-secondary py-2 rounded-md hover:bg-gray-200 transition-colors text-sm">10:30</button>
</div>
</section>
<!-- Card: Patient Reviews -->
<section class="bg-white rounded-xl p-8 shadow" data-purpose="patient-reviews-card">
<div class="flex justify-between items-center mb-4">
<h3 class="text-lg font-bold">Đánh giá từ bệnh nhân</h3>
<a class="text-sm font-semibold text-hb-blue hover:underline" href="#">Quản lý</a>
</div>
<div class="space-y-4">
<!-- Review 1 -->
<div class="flex items-center space-x-3">
<img alt="Avatar bệnh nhân" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxCJBkdWj3JiaV90SqbRkzsn-pnt87h23wzqKWy5LVuzdEoEnGHCFleSESsfDALe5VjoGapqAFuK6CKKxllWc07dmLEOK3enc_sHGkuXGiei8nW5aL3rk5pBSwaW-3uiU8lmCfCO9lZqQLFDd8IY0HRx6vcBzIV7Eav7h04uYOf8zw1Gz4rEYrxzBcmJCHEPfLIUi9tVWSICk90vMcytq7cLu6mxf7CCJHLJXtV5z5-80ce8Iaiq6s7NjwvG8XiswDltNxp_506lE"/>
<div class="flex-grow">
<p class="font-semibold text-sm">Nguyễn Văn An</p>
<div class="flex items-center text-yellow-400">
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
</div>
</div>
</div>
<!-- Review 2 -->
<div class="flex items-center space-x-3">
<img alt="Avatar bệnh nhân" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8Ack5IqpLDtYvcVJDqhrMgD144uz6eaybB9Kdgxc8jykUFYFJ7Zf9xbLmBk7vL209Z6rWTlQKVHB8ZiAj0PoUtQwBwOcRM0vJ8zySj9oUg-3kq-4H_nh0uKX_AAsPuWKZrNAkUw01Dg-AxpW2cWzMCKp2FQa__pNslVvgTHvLTawu1vIsu_NxHQHO02ElYHOJSz1AaJ-DPJx9_bBiDZ531iUMu-ArJ0M6vOThX7o3I45vwpxt5z2_TegusbukYyHZuTctV6sE2GY"/>
<div class="flex-grow">
<p class="font-semibold text-sm">Lô Thị Hoa</p>
<div class="flex items-center text-yellow-400">
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
<i class="fas fa-star text-xs"></i>
</div>
</div>
</div>
</div>
</section>
</div>
<!-- END: RightColumn -->
</div>
</main>
<!-- END: MainContent -->
</div>
</body></html>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("doctorMenuBtn");
    const dropdown = document.getElementById("doctorDropdown");

    const editBtn = document.getElementById("editBtn");
    const saveBtn = document.getElementById("saveBtn");
    const cancelBtn = document.getElementById("cancelBtn");

    btn.addEventListener("click", function () {
        dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        if (!btn.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });

    // Tất cả elements trong form
    const fields = document.querySelectorAll(
        "input, select, textarea"
    );

    // Bật chế độ chỉnh sửa
    editBtn.addEventListener("click", function () {
        fields.forEach(f => f.disabled = false);

        editBtn.classList.add("hidden");
        saveBtn.classList.remove("hidden");
        cancelBtn.classList.remove("hidden");
    });

    // Hủy chỉnh sửa → Khóa lại
    cancelBtn.addEventListener("click", function () {
        fields.forEach(f => f.disabled = true);

        editBtn.classList.remove("hidden");
        saveBtn.classList.add("hidden");
        cancelBtn.classList.add("hidden");
    });

    // Lưu thay đổi
    saveBtn.addEventListener("click", function () {
        fields.forEach(f => f.disabled = true);

        editBtn.classList.remove("hidden");
        saveBtn.classList.add("hidden");
        cancelBtn.classList.add("hidden");
    });
});
</script>