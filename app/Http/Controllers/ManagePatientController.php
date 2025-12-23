<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManagePatientController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('roleId', 3) // Chỉ lấy người dùng có vai trò bệnh nhân
            ->with(['patients' => function($query) {
                $query->latest()->take(1); // Lấy lịch sử khám gần nhất
            }, 'patients.doctor.user']);

        // Tìm kiếm theo tên, email, ID, SĐT
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status) {
            if ($request->status === 'active') {
                $query->where('isActive', true);
            } elseif ($request->status === 'blocked') {
                $query->where('isActive', false);
            }
        }

        // Phân trang
        $patients = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.manage-patients', compact('patients'));
    }

    public function show($id)
    {
        $patient = User::with(['patients' => function($query) {
                $query->with(['doctor.user', 'status'])
                    ->orderBy('dateBooking', 'desc')
                    ->orderBy('timeBooking', 'desc');
            }])
            ->where('roleId', 3)
            ->findOrFail($id);

        // Format thông tin
        $patient->formatted_id = 'BN' . str_pad($patient->id, 5, '0', STR_PAD_LEFT);
        
        // Lấy lần khám cuối cùng
        $lastAppointment = $patient->patients->first();
        
        // Tổng số lần khám
        $totalAppointments = $patient->patients->count();

        return view('admin.patient-detail', compact('patient', 'lastAppointment', 'totalAppointments'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|string|max:15|unique:users',
                'password' => 'required|string|min:6',
                'gender' => 'required|in:Nam,Nữ,Khác',
                'date_of_birth' => 'required|date',
                'address' => 'nullable|string|max:500',
                'isActive' => 'boolean'
            ]);

            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt($request->password),
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'roleId' => 3, // Bệnh nhân
                    'isActive' => $request->isActive ?? true
                ]);

                // Có thể tạo một bản ghi patient mặc định nếu cần
                Patient::create([
                    'userId' => $user->id,
                    'doctorId' => 1, // ID bác sĩ mặc định hoặc null
                    'statusId' => 1, // Trạng thái mặc định
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'address' => $request->address,
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Thêm bệnh nhân thành công!'
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
        $patient = User::where('roleId', 3)->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'patient' => $patient
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $patient = User::where('roleId', 3)->findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $patient->id,
                'phone' => 'required|string|max:15|unique:users,phone,' . $patient->id,
                'gender' => 'required|in:Nam,Nữ,Khác',
                'date_of_birth' => 'required|date',
                'address' => 'nullable|string|max:500',
                'isActive' => 'boolean'
            ]);

            $patient->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'isActive' => $request->isActive ?? $patient->isActive
            ]);

            // Cập nhật thông tin trong bảng patients nếu cần
            Patient::where('userId', $patient->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật thông tin bệnh nhân thành công!',
                'patient' => $patient
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
            $patient = User::where('roleId', 3)->findOrFail($id);
            
            // Sử dụng soft delete
            $patient->delete();

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa bệnh nhân thành công!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleStatus($id)
    {
        try {
            $patient = User::where('roleId', 3)->findOrFail($id);
            
            $patient->update([
                'isActive' => !$patient->isActive
            ]);

            return response()->json([
                'success' => true,
                'message' => $patient->isActive ? 'Đã kích hoạt tài khoản!' : 'Đã khóa tài khoản!',
                'isActive' => $patient->isActive
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
}