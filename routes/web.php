<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorUserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ExtraInfoController;
use App\Http\Controllers\SupporterLogController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorSearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;

Route::get('/', [DoctorSearchController::class, 'index'])->name('home');
Route::get('/search-doctors', [DoctorSearchController::class, 'search'])->name('doctors.search');

Route::middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/quantrivienlog', function () {return view('admin.dashboard');})->name('admin.dashboard');
    Route::get('/manage-doctors', function () {return view('admin.manage-doctors');})->name('admin.manage-doctors');
    Route::get('/manage-patients', function () {return view('admin.manage-patients');})->name('admin.manage-patients');
    Route::get('/manage-bookings', function () {return view('admin.manage-bookings');})->name('admin.manage-bookings');
    Route::get('/manage-specializations', function () {return view('admin.manage-specializations');})->name('admin.manage-specializations');
    Route::get('/manage-reports', function () {return view('admin.manage-reports');})->name('admin.manage-reports');
    Route::get('/settings', function () {return view('admin.settings');})->name('admin.settings');

});

Route::middleware(['auth', 'role:DOCTOR'])->group(function () {
    Route::get('/bacsilog', [DoctorUserController::class, 'dashboard'])
     ->name('bacsilog')
     ->middleware('auth');
    
    Route::get('/bacsilog/profile', [DoctorUserController::class, 'profile'])
        ->name('doctor_profile');

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

Route::middleware(['auth', 'role:PATIENT'])->group(function () {
    Route::get('/benhnhanlog', function () {return view('auth.benhnhanlog');})->name('benhnhanlog');

    Route::get('/datlichthanhcong', function () { return view('patients.datlichthanhcong');})->name('datlichthanhcong');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/doctor/{doctorId}/schedules', [BookingController::class, 'getSchedules'])->name('booking.schedules');
    Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::get('/hososuckhoe', [PatientController::class, 'show'])->name('hososuckhoe');
});

   
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
Route::get('/cauhoithuonggap', function () {return view('abouts.cauhoithuonggap');})->name('cauhoithuonggap');

// API routes cho AJAX
Route::middleware(['auth'])->prefix('api')->group(function () {
    Route::get('/doctors/search', [BookingController::class, 'searchDoctors'])->name('api.doctors.search');
    Route::get('/doctors/{doctorId}/available-times', [BookingController::class, 'getAvailableTimes'])->name('api.doctors.times');
});

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('specializations', SpecializationController::class);
Route::resource('clinics', ClinicController::class);
Route::resource('doctor-users', DoctorUserController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('statuses', StatusController::class);
Route::resource('patients', PatientController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('sessions', SessionController::class);
Route::resource('places', PlaceController::class);
Route::resource('posts', PostController::class);
Route::resource('extra-infos', ExtraInfoController::class);
Route::resource('supporter-logs', SupporterLogController::class);

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
