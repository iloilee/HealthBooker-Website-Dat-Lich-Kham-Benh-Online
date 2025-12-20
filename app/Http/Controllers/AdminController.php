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
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        $query = DoctorUser::with(['user', 'specialization'])
            ->select('doctor_users.*')
            ->join('users', 'doctor_users.doctorId', '=', 'users.id')
            ->leftJoin('specializations', 'doctor_users.specializationId', '=', 'specializations.id');

        // Tìm kiếm
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('users.name', 'like', "%{$search}%")
                  ->orWhere('users.email', 'like', "%{$search}%")
                  ->orWhere('doctor_users.phone', 'like', "%{$search}%");
            });
        }

        // Lọc theo chuyên khoa
        if ($request->has('specialization') && $request->specialization) {
            $query->where('doctor_users.specializationId', $request->specialization);
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status) {
            $query->where('doctor_users.work_status', $request->status);
        }

        // Phân trang
        $doctors = $query->paginate(10);
        $specializations = Specialization::all();

        return view('admin.manage-doctors', compact('doctors', 'specializations'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:online,offline'
        ]);

        $doctor = DoctorUser::findOrFail($id);
        $doctor->update(['work_status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật trạng thái thành công!'
        ]);
    }
}