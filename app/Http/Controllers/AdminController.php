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
use App\Models\Clinic;
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
        $clinics = Clinic::all();
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

        // Lọc theo phòng khám
        if ($request->filled('clinic')) {
            $query->where('doctor_users.clinicId', $request->clinic);
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status) {
            $query->where('doctor_users.work_status', $request->status);
        }

        // Phân trang
        $doctors = $query->paginate(10);
        $specializations = Specialization::all();

        return view('admin.manage-doctors', compact('doctors', 'specializations','clinics'));
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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'address' => 'nullable|string|max:255',
                'specializationId' => 'required|exists:specializations,id',
                'clinicId' => 'required|exists:clinics,id',
                'phone' => 'nullable|string|max:15',
                'bio' => 'nullable|string',
                'experience_years' => 'nullable|integer|min:0|max:50',
                'certification' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date',
                'work_status' => 'required|in:online,offline'
            ]);
            
            $doctor = null;
            DB::transaction(function () use ($request, &$doctor) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt($request->password),
                    'address' => $request->address,
                    'roleId' => 2,
                ]);

                $doctor = DoctorUser::create([
                    'doctorId' => $user->id,
                    'clinicId' => $request->clinicId,
                    'specializationId' => $request->specializationId,
                    'phone' => $request->phone,
                    'bio' => $request->bio,
                    'experience_years' => $request->experience_years,
                    'certification' => $request->certification,
                    'date_of_birth' => $request->date_of_birth,
                    'work_status' => $request->work_status
                ]);
            });
            
            return response()->json([
                'success' => true,
                'message' => 'Thêm bác sĩ thành công!',
                'doctor' => $doctor->load('user', 'specialization')
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi xác thực dữ liệu',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $doctor = DoctorUser::with(['user', 'specialization'])
            ->findOrFail($id);
        
        $specializations = Specialization::all();
        
        return response()->json([
            'success' => true,
            'doctor' => $doctor,
            'specializations' => $specializations
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $doctor = DoctorUser::with('user')->findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $doctor->user->id,
                'address' => 'nullable|string|max:255',
                'clinicId' => 'required|exists:clinics,id',
                'specializationId' => 'required|exists:specializations,id',
                'phone' => 'nullable|string|max:15',
                'bio' => 'nullable|string',
                'experience_years' => 'nullable|integer|min:0|max:50',
                'certification' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date',
                'work_status' => 'required|in:online,offline'
            ]);
            
            DB::transaction(function () use ($request, $doctor) {

                $doctor->user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);

                if ($request->filled('password')) {
                    $doctor->user->update([
                        'password' => bcrypt($request->password)
                    ]);
                }

                $doctor->update([
                    'clinicId' => $request->clinicId,
                    'specializationId' => $request->specializationId,
                    'phone' => $request->phone,
                    'bio' => $request->bio,
                    'experience_years' => $request->experience_years,
                    'certification' => $request->certification,
                    'date_of_birth' => $request->date_of_birth,
                    'work_status' => $request->work_status
                ]);
            });
            
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật thông tin bác sĩ thành công!',
                'doctor' => $doctor->load('user', 'specialization')
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi xác thực dữ liệu',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $doctor = DoctorUser::findOrFail($id);
            
            DB::transaction(function () use ($doctor) {
                $doctor->delete();        // xóa doctor_users
                $doctor->user->delete();  // xóa users
            });
            
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa bác sĩ thành công!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
}