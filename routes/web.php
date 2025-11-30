<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [
    ProductsController::class, 
    'index'
]);

Route::get('/quantrivienlog', function () {
    return view('auth.quantrivienlog');
})->name('quantrivienlog')
  ->middleware(['auth', 'role:ADMIN']);

// Route::get('/bacsilog', function () {
//     return view('auth.bacsilog');
// })->name('bacsilog')
//   ->middleware(['auth', 'role:DOCTOR']);

Route::get('/bacsilog', [DoctorUserController::class, 'dashboard'])
     ->name('bacsilog')
     ->middleware(['auth', 'role:DOCTOR']);

Route::get('/benhnhanlog', function () {
    return view('auth.benhnhanlog');
})->name('benhnhanlog')
  ->middleware(['auth', 'role:PATIENT']);

Route::get('/quenmatkhau', function () {
    return view('auth.quenmatkhau');
})->name('quenmatkhau');

Route::get('/dangki', function () {
    return view('auth.dangki');
})->name('dangki');

Route::get('/home', function () {
    return view('products.index'); 
})->name('home');

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
})->name('datlichkhambenh');

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

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');



// Test session
Route::get('/check-session', function () {
    return [
        'is_logged_in' => Auth::check(),
        'user' => Auth::user(),
        'session_all' => session()->all(),
    ];
});
