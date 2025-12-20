<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DoctorUser;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalDoctors = DoctorUser::count();
        $totalPatients = User::where('roleId', 3)->count();
        $totalAppointments = Patient::count();
        $todayAppointments = Patient::whereDate('dateBooking', Carbon::today())->count();
        
        // Lịch hẹn chờ xác nhận
        $pendingAppointments = Patient::whereHas('status', function($query) {
            $query->where('name', 'like', '%chờ%');
        })->orWhere('statusId', 1)->count();
        
        // lấy 20 Lịch hẹn gần đây 
        $recentAppointments = Patient::with(['doctor.user', 'status'])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalDoctors',
            'totalPatients',
            'totalAppointments',
            'todayAppointments',
            'pendingAppointments',
            'recentAppointments'
        ));
    }
}