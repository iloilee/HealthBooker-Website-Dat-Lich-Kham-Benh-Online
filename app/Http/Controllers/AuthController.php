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

