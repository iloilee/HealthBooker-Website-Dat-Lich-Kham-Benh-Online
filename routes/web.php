<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\DoctorUserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorSearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagePatientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FaqController;

Route::get('/', [DoctorSearchController::class, 'index'])->name('home');
Route::get('/search-doctors', [DoctorSearchController::class, 'search'])->name('doctors.search');

Route::middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/settings', function () {return view('admin.settings');})->name('admin.settings');

    Route::get('/quantrivienlog', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manage-doctors', [AdminController::class, 'index'])->name('admin.manage-doctors');
    Route::get('/manage-doctors/{id}/profile', [DoctorUserController::class, 'show'])->name('manage-doctors.profile');
    Route::delete('/manage-doctors/{id}', [AdminController::class, 'destroy'])->name('manage-doctors.destroy');
    Route::patch('/manage-doctors/{id}/status', [AdminController::class, 'updateStatus'])->name('manage-doctors.updateStatus');
    Route::post('/manage-doctors/store', [AdminController::class, 'store'])->name('manage-doctors.store');
    Route::get('/manage-doctors/{id}/edit', [AdminController::class, 'edit'])->name('manage-doctors.edit');
    Route::put('/manage-doctors/{id}', [AdminController::class, 'update'])->name('manage-doctors.update');

    // Routes quản lý bệnh nhân
    Route::get('/manage-patients', [ManagePatientController::class, 'index'])->name('admin.manage-patients');
    Route::get('/manage-patients/{id}', [ManagePatientController::class, 'show'])->name('admin.patients.show');
    Route::post('/manage-patients/store', [ManagePatientController::class, 'store'])->name('admin.patients.store');
    Route::get('/manage-patients/{id}/edit', [ManagePatientController::class, 'edit'])->name('admin.patients.edit');
    Route::put('/manage-patients/{id}', [ManagePatientController::class, 'update'])->name('admin.patients.update');
    Route::delete('/manage-patients/{id}', [ManagePatientController::class, 'destroy'])->name('admin.patients.destroy');
    Route::post('/manage-patients/{id}/toggle-status', [ManagePatientController::class, 'toggleStatus'])->name('admin.patients.toggle-status');

    // Routes quản lý lịch hẹn
    Route::get('/manage-bookings', [AppointmentController::class, 'index'])->name('admin.manage-bookings');
    Route::get('/manage-bookings/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
    Route::post('/manage-bookings/store', [AppointmentController::class, 'store'])->name('admin.appointments.store');
    Route::get('/manage-bookings/{id}', [AppointmentController::class, 'show'])->name('admin.appointments.show');
    Route::get('/manage-bookings/{id}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
    Route::put('/manage-bookings/{id}', [AppointmentController::class, 'update'])->name('admin.appointments.update');
    Route::post('/manage-bookings/status/update', [AppointmentController::class, 'updateStatus'])->name('admin.appointments.update-status');
    Route::post('/manage-bookings/{id}/confirm', [AppointmentController::class, 'confirm'])->name('admin.appointments.confirm');
    Route::post('/manage-bookings/{id}/cancel', [AppointmentController::class, 'cancel'])->name('admin.appointments.cancel');
    Route::delete('/manage-bookings/{id}', [AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
    Route::get('/manage-bookings/times/available', [AppointmentController::class, 'getAvailableTimes'])->name('admin.appointments.available-times');
    Route::get('/api/get-schedule-info', [AppointmentController::class, 'getScheduleInfo'])->name('admin.appointments.schedule-info');

    // Routes quản lý chuyên khoa
    Route::prefix('manage-specializations')->group(function () {
        Route::get('/', function () { return view('admin.manage-specializations'); })->name('admin.manage-specializations');
        Route::get('/data', [SpecializationController::class, 'getAll'])->name('admin.specializations.data');
        Route::post('/store', [SpecializationController::class, 'store'])->name('admin.specializations.store');
        Route::get('/{id}/edit', [SpecializationController::class, 'edit'])->name('admin.specializations.edit');
        Route::put('/{id}', [SpecializationController::class, 'update'])->name('admin.specializations.update');
        Route::delete('/{id}', [SpecializationController::class, 'destroy'])->name('admin.specializations.destroy');
        Route::post('/{id}/toggle-status', [SpecializationController::class, 'toggleStatus'])->name('admin.specializations.toggle-status');
    });

    // Route báo cáo & thống kê
    Route::get('/manage-reports', [ReportController::class, 'index'])->name('admin.manage-reports');
    Route::get('/manage-reports/export', [ReportController::class, 'export'])->name('admin.reports.export');
});

Route::middleware(['auth', 'role:DOCTOR'])->group(function () {
    Route::get('/bacsilog', [DoctorUserController::class, 'dashboard'])
     ->name('bacsilog')
     ->middleware('auth');

    Route::post('/doctor/profile/update', [DoctorUserController::class, 'updateProfile'])
        ->name('doctor.profile.update');

    Route::post('/appointments/{id}/confirm', [AppointmentController::class, 'confirm'])
        ->name('appointments.confirm');
    
    Route::post('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])
            ->name('appointments.cancel');
        
    Route::get('/appointments/{id}', [AppointmentController::class, 'show'])
            ->name('appointments.show');

    Route::prefix('doctor/work-schedule')->name('doctor.work-schedule.')->group(function () {
        Route::get('/', [DoctorUserController::class, 'getWorkSchedule'])
            ->name('get');
        
        Route::post('/', [DoctorUserController::class, 'addWorkSchedule'])
            ->name('store');

        Route::put('/{id}', [DoctorUserController::class, 'updateWorkSchedule'])
            ->name('update');
        
        Route::delete('/{id}', [DoctorUserController::class, 'deleteWorkSchedule'])
            ->name('delete');

        Route::get('/navigate', [DoctorUserController::class, 'navigateWorkSchedule'])
            ->name('navigate');
    });

    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
});

Route::middleware(['auth'])->group(function () {
    // Route hủy lịch cho bệnh nhân
    Route::post('/patient/appointments/{id}/cancel', [AppointmentController::class, 'cancelForPatient'])
        ->name('patient.appointments.cancel');
    
    // Route kiểm tra điều kiện hủy lịch
    Route::get('/patient/appointments/{id}/check-cancel', [AppointmentController::class, 'checkCancelEligibility'])
        ->name('patient.appointments.checkCancel');
});

Route::middleware(['auth', 'role:PATIENT'])->group(function () {
    Route::get('/benhnhanlog', [PatientController::class, 'index'])->name('benhnhanlog');
    Route::get('/datlichthanhcong', function () { return view('patients.datlichthanhcong');})->name('datlichthanhcong');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/doctor/{doctorId}/schedules', [BookingController::class, 'getSchedules'])->name('booking.schedules');
    Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::get('/hososuckhoe', [PatientController::class, 'show'])->name('hososuckhoe');
});

Route::get('/bacsilog/profile', [DoctorUserController::class, 'profile'])
    ->name('doctor_profile');   
Route::get('/chuyenkhoa', [SpecializationController::class, 'index'])
    ->name('chuyenkhoa');
Route::get('/chuyenkhoa/{id}', [SpecializationController::class, 'show'])
    ->name('specializations.show');
Route::get('/chuyenkhoa/{id}/search', [SpecializationController::class, 'search'])
    ->name('specializations.search');

Route::get('/bacsi', [DoctorUserController::class, 'index'])->name('doctors.index');
Route::get('/bacsi/{id}', [DoctorUserController::class, 'show'])->name('doctors.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/gioithieu', function () {return view('abouts.gioithieu');})->name('gioithieu');
Route::get('/chinhsachbaomat', function () {return view('abouts.chinhsachbaomat');})->name('chinhsachbaomat');
Route::get('/dieukhoansudung', function () {return view('abouts.dieukhoansudung');})->name('dieukhoansudung');
Route::get('/cauhoithuonggap', [App\Http\Controllers\FaqController::class, 'index'])->name('cauhoithuonggap');

// API routes cho AJAX
Route::middleware(['auth'])->prefix('api')->group(function () {
    Route::get('/doctors/search', [BookingController::class, 'searchDoctors'])->name('api.doctors.search');
    Route::get('/doctors/{doctorId}/available-times', [BookingController::class, 'getAvailableTimes'])->name('api.doctors.times');
});

Route::get('/api/faqs/search', [App\Http\Controllers\FaqController::class, 'search'])->name('api.faqs.search');

Route::resource('specializations', SpecializationController::class);
Route::resource('doctor-users', DoctorUserController::class);
Route::resource('patients', PatientController::class);

Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::get('/change-password', [AuthController::class, 'changePasswordForm'])->middleware('auth')->name('password.change');
Route::post('/change-password', [AuthController::class, 'updatePassword'])->middleware('auth')->name('password.update.auth');
Route::get('auth/google', [SocialController::class, 'redirectGoogle'])->middleware('guest')->name('google.login');
Route::get('auth/google/callback', [SocialController::class, 'callbackGoogle'])->name('google.callback');
