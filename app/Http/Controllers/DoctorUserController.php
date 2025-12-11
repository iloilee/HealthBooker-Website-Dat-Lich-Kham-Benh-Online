<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DoctorUser;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Feedback;

class DoctorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function dashboard()
    {
        $user = Auth::user(); 

        $doctor = DoctorUser::with(['user', 'specialization', 'clinic'])
            ->where('doctorId', $user->id)
            ->first();
        
        $appointments = Patient::where('doctorId', $doctor->id)
            ->whereDate('dateBooking', '>=', now())
            ->orderBy('dateBooking', 'asc')
            ->orderBy('timeBooking', 'asc')
            ->limit(3)
            ->get();

        $schedules = Schedule::where('doctorId', $doctor->id)->get();

        return view('auth.bacsilog', compact('doctor', 'appointments', 'schedules'));
    }
    
    public function profile()
    {
        $user = Auth::user(); 

        $doctor = DoctorUser::with(['user', 'specialization', 'clinic'])
            ->where('doctorId', $user->id)
            ->first();
        $appointments = Patient::where('doctorId', $doctor->id)
            ->whereDate('dateBooking', '>=', now())
            ->orderBy('dateBooking', 'asc')
            ->limit(5)
            ->get();

        $schedules = Schedule::where('doctorId', $doctor->id)->get();

        return view('products.doctor_profile', compact('doctor', 'appointments', 'schedules'));
    }
    
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $doctor = DoctorUser::where('doctorId', $user->id)->first();

        // Validate
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Nam,Nữ',
            'date_of_birth' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cập nhật bảng users
        $userData = [];
        if ($request->filled('name')) {
            $userData['name'] = $request->name;
        }
        if ($request->filled('email')) {
            $userData['email'] = $request->email;
        }
        if ($request->filled('phone')) {
            $userData['phone'] = $request->phone;
        }
        if ($request->filled('address')) {
            $userData['address'] = $request->address;
        }
        if ($request->filled('gender')) {
            $userData['gender'] = $request->gender;
        }

        if (!empty($userData)) {
            $user->update($userData);
        }

        // Cập nhật bảng doctor_users
        $doctorData = [];
        if ($request->filled('date_of_birth')) {
            $doctorData['date_of_birth'] = $request->date_of_birth;
        }

        if (!empty($doctorData)) {
            $doctor->update($doctorData);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar && \Storage::disk('public')->exists($user->avatar)) {
                \Storage::disk('public')->delete($user->avatar);
            }
            
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $path]);
        }

        return back()->with('success', 'Lưu thông tin thành công!');
    }
}
