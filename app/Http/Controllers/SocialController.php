<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite as SocialiteFacade;

class SocialController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Đăng nhập Google thất bại. Vui lòng thử lại.');
        }

        // Ensure email exists
        if (!$googleUser->getEmail()) {
            return redirect()->route('login')->with('error', 'Không thể lấy email từ tài khoản Google. Vui lòng đăng nhập bằng email/mật khẩu.');
        }

        // Find or create user (use `roleId` column as defined in migration)
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? 'Google User',
                'password' => Hash::make('social_' . uniqid()),
                'avatar' => $googleUser->getAvatar() ?? 'https://via.placeholder.com/150?text=Avatar',
                'roleId' => Role::where('name', 'PATIENT')->first()?->id ?? 1, // Default to PATIENT role
            ]
        );

        // Ensure user has a role (check `roleId`)
        if (!$user->roleId) {
            $patientRole = Role::where('name', 'PATIENT')->first();
            $user->update(['roleId' => $patientRole->id ?? 1]);
        }

        Auth::login($user, remember: true);

        // Load role relation to ensure it's available
        $user->load('role');

        // If doctor, inject into session
        if ($user->role && $user->role->name === 'DOCTOR') {
            $doctorData = [
                'id' => $user->id,
                'fullname' => $user->name,
                'speciality' => $user->speciality ?? 'Chưa có chuyên khoa',
                'avatar' => $user->avatar ?? 'https://via.placeholder.com/150',
                'isActive' => $user->isActive ?? true,
            ];
            session()->put('doctor', (object) $doctorData);
        }

        // Regenerate session AFTER setting data
        session()->regenerate();

        // Redirect based on role
        return $this->redirectByRole($user);
    }

    private function redirectByRole($user)
    {
        $role = $user->role?->name;

        return match ($role) {
            'ADMIN' => redirect()->route('quantrivienlog'),
            'DOCTOR' => redirect()->route('bacsilog'),
            'PATIENT' => redirect()->route('benhnhanlog'),
            'SUPPORTER' => redirect()->route('home'),
            default => redirect()->route('home'),
        };
    }
}
