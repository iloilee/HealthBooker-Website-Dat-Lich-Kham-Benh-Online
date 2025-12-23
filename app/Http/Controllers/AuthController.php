<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Kiểm tra trạng thái tài khoản
            if ($user->isActive == 0) {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.'
                ])->withInput($request->except('password'));
            }
            
            // Kiểm tra mật khẩu
            if (!Hash::check($request->password, $user->password)) {
                return back()->withErrors([
                    'email' => 'Email hoặc mật khẩu không đúng'
                ])->withInput($request->except('password'));
            }
            
            // Đăng nhập thủ công
            Auth::login($user);
            $request->session()->regenerate();

            // Xử lý dựa trên vai trò (giữ nguyên logic cũ)
            if ($user->role->name === 'DOCTOR') {
                $doctorData = [
                    'id' => $user->id,
                    'fullname' => $user->name,   
                    'speciality' => $user->speciality ?? 'Chưa có chuyên khoa',
                    'avatar' => $user->avatar ?? 'https://via.placeholder.com/150',
                    'is_active' => $user->is_active ?? 1,
                ];
                $request->session()->put('doctor', (object) $doctorData);
            }

            $role = $user->role->name;
            if ($role === 'ADMIN') return redirect()->route('admin.dashboard');
            if ($role === 'DOCTOR') return redirect()->route('bacsilog');
            if ($role === 'PATIENT') return redirect()->route('benhnhanlog');
            if ($role === 'SUPPORTER') return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng'
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function registerForm()
    {
        return view('auth.dangki');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Tên phải là chữ',
            'name.max' => 'Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải từ 6 ký tự trở lên',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roleId' => 3, //patient
        ]);

        return view('auth.dangki', ['success' => 'Đăng ký thành công! Chuyển sang trang đăng nhập...']);
    }

    public function forgotPasswordForm() {
        return view('auth.quenmatkhau');
    }
    public function resetPasswordForm($token)
    {
        return view('auth.resetpassword', ['token' => $token]);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại trong hệ thống',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return back()->with('success', 'Link đặt lại mật khẩu đã được gửi. Vui lòng kiểm tra email.');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Đặt lại mật khẩu thành công! Mời bạn đăng nhập.');
        }

        return back()->withErrors(['email' => 'Token không hợp lệ hoặc đã hết hạn!']);
    }
    public function changePasswordForm()
    {
        return view('auth.changepassword'); 
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải ít nhất 6 ký tự',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }   
}

