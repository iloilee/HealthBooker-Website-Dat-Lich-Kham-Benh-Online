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

            // Lưu bác sĩ vào session nếu role là DOCTOR
            $user = Auth::user();
            $role = $user->role->name;

            if ($role === 'DOCTOR') {
                // Lấy dữ liệu cần thiết cho dashboard, ví dụ: fullname, speciality, avatar, id, is_active...
                $doctorData = [
                    'id' => $user->id,
                    'fullname' => $user->name,   // hoặc $user->fullname nếu có cột riêng
                    'speciality' => $user->speciality ?? 'Chưa có chuyên khoa',
                    'avatar' => $user->avatar ?? 'https://via.placeholder.com/150',
                    'is_active' => $user->is_active ?? 1,
                ];
                $request->session()->put('doctor', (object) $doctorData);
            }

            // Điều hướng theo role
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
}

