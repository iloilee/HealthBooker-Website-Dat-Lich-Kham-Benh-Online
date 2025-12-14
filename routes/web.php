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

Route::get('/', [DoctorSearchController::class, 'index'])->name('home');
Route::get('/search-doctors', [DoctorSearchController::class, 'search'])->name('doctors.search');

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
   
Route::get('/benhnhanlog', function () {
    return view('auth.benhnhanlog');
})->name('benhnhanlog')
  ->middleware(['auth', 'role:PATIENT']);

Route::get('/chuyenkhoa', function () {
    return view('products.chuyenkhoa');
})->name('chuyenkhoa');

Route::get('/chuyenkhoa/nhakhoa', function () {
    return view('specializations.nhakhoa');
})->name('chuyenkhoa.nhakhoa');

Route::get('/bacsi', function () {
    return view('products.bacsi');
})->name('bacsi');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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
    return view('patients.datlichkhambenh');
})->name('datlichkhambenh')
  ->middleware(['auth', 'role:PATIENT']);

Route::get('/datlichthanhcong', function () {
    return view('patients.datlichthanhcong');
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