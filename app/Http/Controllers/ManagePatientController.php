<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagePatientController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('roleId', 3)
            ->with(['patients' => function ($q) {
                $q->with(['doctor.user'])
                  ->orderByDesc('dateBooking')
                  ->limit(1);
            }]);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('id', $search);
            });
        }

        if ($request->status === 'active') {
            $query->where('isActive', true);
        } elseif ($request->status === 'blocked') {
            $query->where('isActive', false);
        }

        $patients = $query->orderByDesc('created_at')->paginate(10);

        return view('admin.manage-patients', compact('patients'));
    }

    public function show($id)
    {
        $patient = User::with(['patients.doctor.user'])
            ->where('roleId', 3)
            ->findOrFail($id);

        $lastAppointment = $patient->patients->first();
        $totalAppointments = $patient->patients->count();

        return view('admin.patient-detail', compact(
            'patient',
            'lastAppointment',
            'totalAppointments'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|min:6',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'address' => 'required|max:500',
            'isActive' => 'boolean'
        ]);

        DB::transaction(function () use ($request) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'gender' => $request->gender,
                'address' => $request->address,
                'roleId' => 3,
                'isActive' => $request->isActive ?? true
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Thêm bệnh nhân thành công'
        ]);
    }


    public function edit($id)
    {
        $user = User::with('patient')->where('roleId', 3)->findOrFail($id);

        // Lấy thông tin patient (bảng patients), nếu chỉ có 1 record thì lấy first()
        $patientData = $user->patients->first(); // null nếu chưa có

        return response()->json([
            'success' => true,
            'patient' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'gender' => $user->gender,
                'address' => $user->address,
                'isActive' => $user->isActive,
                'date_of_birth' => $patientData ? $patientData->date_of_birth : null
            ]
        ]);
    }


    public function update(Request $request, $id)
    {
        $patient = User::where('roleId', 3)->findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->id,
            'phone' => 'required|unique:users,phone,' . $patient->id,
            'gender' => 'required|in:Nam,Nữ,Khác',
            'date_of_birth' => 'required|date',
            'address' => 'required|max:500',
            'isActive' => 'boolean'
        ]);

        $patient->update($request->only([
            'name',
            'email',
            'phone',
            'gender',
            'address',
            'isActive'
        ]));

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
            'message' => 'Cập nhật bệnh nhân thành công'
        ]);
    }

    /**
     * 🔒 Khóa / Mở khóa tài khoản
     */
    public function toggleStatus(Request $request, $id)
    {
        $patient = User::where('roleId', 3)->findOrFail($id);

        $isLock = $request->action === 'lock';

        $patient->update([
            'isActive' => !$isLock
        ]);

        return response()->json([
            'success' => true,
            'message' => $isLock
                ? 'Đã khóa tài khoản bệnh nhân'
                : 'Đã mở khóa tài khoản bệnh nhân'
        ]);
    }

    public function destroy($id)
    {
        $user = User::where('roleId', 3)->findOrFail($id);

        $hasUpcomingAppointment = Patient::where('userId', $user->id)
            ->whereNotNull('dateBooking')
            ->whereDate('dateBooking', '>=', now()->toDateString())
            ->whereIn('statusId', [1, 2])
            ->exists();

        if ($hasUpcomingAppointment) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa bệnh nhân vì còn lịch hẹn đang chờ hoặc đã xác nhận'
            ], 400);
        }

        DB::transaction(function () use ($user) {
            Patient::where('userId', $user->id)->delete();

            $user->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa bệnh nhân và tài khoản thành công'
        ]);
    }

}
