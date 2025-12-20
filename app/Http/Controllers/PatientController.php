<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\ExtraInfo;

class PatientController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Lấy danh sách cuộc hẹn sắp tới (dựa trên user email hoặc phone)
        $upcomingAppointments = Patient::where(function($query) use ($user) {
            $query->where('email', $user->email)
                  ->orWhere('phone', $user->phone);
        })
        ->where('dateBooking', '>=', now()->format('Y-m-d'))
        ->whereNull('cancellation_reason')
        ->orderBy('dateBooking')
        ->orderBy('timeBooking')
        ->take(5)
        ->get();

        // Lấy lịch sử khám bệnh
        $medicalHistory = Patient::where(function($query) use ($user) {
            $query->where('email', $user->email)
                  ->orWhere('phone', $user->phone);
        })
        ->where('dateBooking', '<', now()->format('Y-m-d'))
        ->whereNull('cancellation_reason')
        ->orderBy('dateBooking', 'desc')
        ->take(10)
        ->get();

        return view('auth.benhnhanlog', compact('user', 'upcomingAppointments', 'medicalHistory'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    // public function show()
    // {
    //     $user = auth()->user();

    //     $patient = Patient::with(['extraInfo', 'doctor', 'status', 'user'])
    //         ->where('userId', $user->id)
    //         ->firstOrFail();

    //     // Tạo mã bệnh nhân (ví dụ: HB-2024-{id})
    //     $patientCode = 'HB-' . date('Y') . '-' . str_pad($patient->id, 4, '0', STR_PAD_LEFT);

    //     return view('patients.hososuckhoe', compact('patient', 'patientCode', 'user'));
    // }

    public function show()
    {
        $user = auth()->user();
        
        // Load user với extraInfo
        $user->load('extraInfo');
        
        // Tạo extraInfo nếu chưa có
        if (!$user->extraInfo) {
            $extraInfo = ExtraInfo::create([
                'userId' => $user->id,
                'blood_type' => null,
                'height' => null,
                'weight' => null,
                'moreInfo' => null,
                'historyBreath' => null,
                'patientId' => null, 
            ]);
            
            // Load lại quan hệ
            $user->load('extraInfo');
        }
        
        // Lấy patient MỚI NHẤT để hiển thị thông tin chung
        $latestPatient = Patient::with(['doctor', 'status'])
            ->where('userId', $user->id)
            ->latest('created_at')
            ->first();
        
        // Lấy tất cả patients để hiển thị lịch sử
        $allPatients = Patient::with(['doctor', 'status'])
            ->where('userId', $user->id)
            ->orderBy('dateBooking', 'desc')
            ->get();
        
        // Tạo patientCode dựa trên user ID
        $patientCode = 'HB-' . date('Y') . '-' . str_pad($user->id, 4, '0', STR_PAD_LEFT);
        
        return view('patients.hososuckhoe', [
            'user' => $user,
            'latestPatient' => $latestPatient,
            'allPatients' => $allPatients,
            'patientCode' => $patientCode
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
