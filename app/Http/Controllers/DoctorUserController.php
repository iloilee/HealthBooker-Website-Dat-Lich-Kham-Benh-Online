<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // Lấy lịch hẹn sắp tới
        $appointments = Patient::where('doctorId', $doctor->id)
            ->whereDate('dateBooking', '>=', now())
            ->orderBy('dateBooking', 'asc')
            ->limit(3)
            ->get();

        // Lấy lịch làm việc
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
            ->limit(3)
            ->get();

        $schedules = Schedule::where('doctorId', $doctor->id)->get();

        return view('products.doctor_profile', compact('doctor', 'appointments', 'schedules'));
    }
}
