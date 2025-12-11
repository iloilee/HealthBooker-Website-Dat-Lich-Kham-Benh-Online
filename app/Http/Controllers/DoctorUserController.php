<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DoctorUser;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            ->limit(10)
            ->get();

        $schedules = Schedule::where('doctorId', $doctor->id)->get();

        $workStatus = $this->getTodayWorkStatus();

        return view('auth.bacsilog', compact('doctor', 'appointments', 'schedules', 'workStatus'));
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

    /**
     * Lấy thông tin tình hình làm việc hôm nay
     */
    public function getTodayWorkStatus()
    {
        $doctor = DoctorUser::where('doctorId', auth()->id())->first(); 
        $doctorId = $doctor->id;
        
        $completedAppointments = Patient::where('doctorId', $doctorId)
            ->whereDate('dateBooking', Carbon::today())
            ->where('timeBooking', '<', Carbon::now()->format('H:i:s'))
            ->where('statusId', 3) 
            ->count();
            
        $totalAppointments = 16;

        // 3. Thời gian làm việc còn lại
        $remainingWorkTime = $this->calculateRemainingWorkTime($doctorId);

        return [
            'completed_appointments' => $completedAppointments,
            'total_appointments' => $totalAppointments,
            'remaining_work_time' => $remainingWorkTime['time'],
            'remaining_work_time_text' => $remainingWorkTime['text'],
            'is_online' => true 
        ];
    }
    
    /**
     * Tính thời gian làm việc còn lại
     */
    private function calculateRemainingWorkTime($doctorId)
    {
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        
        $schedule = Schedule::where('doctorId', $doctorId)
            ->where(function($query) use ($now) {
                $query->where('date', $now->format('Y-m-d'));
            })
            ->first();
        if (!$schedule) {
            $morningStart = Carbon::createFromTime(7, 0, 0);
            $morningEnd = Carbon::createFromTime(11, 0, 0);
            $afternoonStart = Carbon::createFromTime(13, 0, 0);
            $afternoonEnd = Carbon::createFromTime(17, 0, 0);
        } else {
            $morningStart = Carbon::parse($today . ' ' . $schedule->morning_start);
            $morningEnd = Carbon::parse($today . ' ' . $schedule->morning_end);
            $afternoonStart = Carbon::parse($today . ' ' . $schedule->afternoon_start);
            $afternoonEnd = Carbon::parse($today . ' ' . $schedule->afternoon_end);
        }
        

        $remainingMinutes = 0;
        // Kiểm tra buổi sáng
        if ($now < $morningEnd) {
            if ($now < $morningStart) {
                // Chưa đến giờ làm buổi sáng
                $remainingMinutes += $morningStart->diffInMinutes($morningEnd);
                $remainingMinutes += $afternoonStart->diffInMinutes($afternoonEnd);
            } else {
                // Đang trong giờ làm buổi sáng
                $remainingMinutes += $now->diffInMinutes($morningEnd);
                $remainingMinutes += $afternoonStart->diffInMinutes($afternoonEnd);
            }
        } 
        // Kiểm tra buổi chiều
        elseif ($now < $afternoonEnd) {
            if ($now < $afternoonStart) {
                // Giữa buổi sáng và chiều
                $remainingMinutes += $afternoonStart->diffInMinutes($afternoonEnd);
            } else {
                // Đang trong giờ làm buổi chiều
                $remainingMinutes += $now->diffInMinutes($afternoonEnd);
            }
        }
        // Ngoài giờ làm việc
        else {
            $remainingMinutes = 0;
        }
        // Format thời gian
        $hours = floor($remainingMinutes / 60);
        $minutes = $remainingMinutes % 60;
        
        if ($hours > 0 && $minutes > 0) {
            $text = "Còn {$hours} giờ {$minutes} phút làm việc";
        } elseif ($hours > 0) {
            $text = "Còn {$hours} giờ làm việc";
        } elseif ($minutes > 0) {
            $text = "Còn {$minutes} phút làm việc";
        } else {
            $text = "Đã hết giờ làm việc";
        }
        
        return [
            'time' => $remainingMinutes,
            'text' => $text,
            'hours' => $hours,
            'minutes' => $minutes
        ];
    }

}
