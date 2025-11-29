<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $role = $user->role->name;

            if ($role === 'DOCTOR') {
                $doctorData = [
                    'id' => $user->id,
                    'fullname' => $user->name,   
                    'speciality' => $user->speciality ?? 'Chưa có chuyên khoa',
                    'avatar' => $user->avatar ?? 'https://via.placeholder.com/150',
                    'is_active' => $user->is_active ?? 1,
                ];
                $request->session()->put('doctor', (object) $doctorData);
            }

            $role = Auth::user()->role->name;
            if ($role === 'ADMIN') return redirect()->route('quantrivienlog');
            if ($role === 'DOCTOR') return redirect()->route('bacsilog');
            if ($role === 'PATIENT') return redirect()->route('benhnhanlog');
            if ($role === 'SUPPORTER') return redirect()->route('home'); 
        }

        return back()->withErrors(['email'=>'Email hoặc mật khẩu không đúng']);
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
        ]);

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
        // return redirect()->route('login');
    }
}

