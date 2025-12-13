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

Route::get('/', function () {
    return view('products.index'); 
})->name('home');

Route::get('/quantrivienlog', function () {
    return view('auth.quantrivienlog');
})->name('quantrivienlog')
  ->middleware(['auth', 'role:ADMIN']);

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

    // ========== THÊM CÁC ROUTE MỚI CHO LỊCH LÀM VIỆC ==========
    Route::prefix('doctor/work-schedule')->name('doctor.work-schedule.')->group(function () {
        // API lấy lịch làm việc theo tuần
        Route::get('/week', [DoctorUserController::class, 'getWorkScheduleWeek'])
            ->name('week');
        
        // Thêm lịch làm việc mới
        Route::post('/', [DoctorUserController::class, 'addWorkSchedule'])
            ->name('store');
        
        // Cập nhật lịch làm việc
        Route::put('/{id}', [DoctorUserController::class, 'updateWorkSchedule'])
            ->name('update');
        
        // Xóa lịch làm việc
        Route::delete('/{id}', [DoctorUserController::class, 'deleteWorkSchedule'])
            ->name('delete');
        
        // Chuyển tuần
        Route::get('/navigate', [DoctorUserController::class, 'navigateWorkScheduleWeek'])
            ->name('navigate');
    });
});
   
Route::get('/benhnhanlog', function () {
    return view('auth.benhnhanlog');
})->name('benhnhanlog')
  ->middleware(['auth', 'role:PATIENT']);

Route::get('/chuyenkhoa', function () {
    return view('products.chuyenkhoa');
})->name('chuyenkhoa');

Route::get('/bacsi', function () {
    return view('products.bacsi');
})->name('bacsi');

Route::get('/lienhe', function () {
    return view('products.lienhe');
})->name('lienhe');

Route::get('/gioithieu', function () {
    return view('abouts.gioithieu');
})->name('gioithieu');

Route::get('/chinhsachbaomat', function () {
    return view('abouts.chinhsachbaomat');
})->name('chinhsachbaomat');

Route::get('/dieukhoansudung', function () {
    return view('abouts.dieukhoansudung');
})->name('dieukhoansudung');

Route::get('/cauhoithuonggap', function () {
    return view('abouts.cauhoithuonggap');
})->name('cauhoithuonggap');

Route::get('/datlichkhambenh', function () {
    return view('products.datlichkhambenh');
})->name('datlichkhambenh')
  ->middleware(['auth', 'role:PATIENT']);

Route::get('/datlichthanhcong', function () {
    return view('products.datlichthanhcong');
})->name('datlichthanhcong');

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

Route::get('/login', [AuthController::class, 'loginForm'])
->middleware('guest')
->name('login');
Route::post('/login', [AuthController::class, 'login'])
->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])
->name('logout');
Route::get('/register', [AuthController::class, 'registerForm'])
->middleware('guest')
->name('register');
Route::post('/register', [AuthController::class, 'register'])
->name('register.post');
Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])
->middleware('guest')
->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])
->middleware('guest')
->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
->name('password.update');
Route::get('/change-password', [AuthController::class, 'changePasswordForm'])
    ->middleware('auth')
    ->name('password.change');
Route::post('/change-password', [AuthController::class, 'updatePassword'])
    ->middleware('auth')
    ->name('password.update.auth');

Route::get('auth/google', [SocialController::class, 'redirectGoogle'])
->middleware('guest')
->name('google.login');
Route::get('auth/google/callback', [SocialController::class, 'callbackGoogle'])
->name('google.callback');

// Test session
Route::get('/check-session', function () {
    $user = Auth::user();
    $roleData = $user?->role;
    $doctorSession = session('doctor');
    
    return response()->json([
        'logged_in' => Auth::check(),
        'user_id' => $user?->id,
        'user_email' => $user?->email,
        'user_name' => $user?->name,
        'user_roleId' => $user?->roleId,
        'role_name' => $roleData?->name,
        'session_doctor_data' => $doctorSession,
        'all_session_keys' => array_keys(session()->all()),
        'session_all' => session()->all(),
    ]);
});