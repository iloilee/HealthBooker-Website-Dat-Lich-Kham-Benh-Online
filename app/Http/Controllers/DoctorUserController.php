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
use Carbon\CarbonPeriod;
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

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Nam,Nữ',
            'date_of_birth' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        if ($now < $morningEnd) {
            if ($now < $morningStart) {
                $remainingMinutes += $morningStart->diffInMinutes($morningEnd);
                $remainingMinutes += $afternoonStart->diffInMinutes($afternoonEnd);
            } else {
                $remainingMinutes += $now->diffInMinutes($morningEnd);
                $remainingMinutes += $afternoonStart->diffInMinutes($afternoonEnd);
            }
        } 
        elseif ($now < $afternoonEnd) {
            if ($now < $afternoonStart) {
                $remainingMinutes += $afternoonStart->diffInMinutes($afternoonEnd);
            } else {
                $remainingMinutes += $now->diffInMinutes($afternoonEnd);
            }
        }
        else {
            $remainingMinutes = 0;
        }
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

    /**
     * Lấy lịch làm việc theo tuần (API)
     */
    public function getWorkScheduleWeek(Request $request)
    {
        try {
            $user = Auth::user();
            $doctor = DoctorUser::where('doctorId', $user->id)->first();
            
            if (!$doctor) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bác sĩ không tồn tại'
                ], 404);
            }
            
            // Lấy ngày từ request hoặc dùng ngày hiện tại
            $date = $request->get('date', Carbon::now()->format('Y-m-d'));
            $currentDate = Carbon::parse($date);
            
            // Lấy dữ liệu tuần
            $weekData = $this->getWeekData($currentDate);
            
            // Lấy lịch làm việc trong tuần
            $startDate = $weekData['start_date']->format('Y-m-d');
            $endDate = $weekData['end_date']->format('Y-m-d');
            
            $schedules = Schedule::where('doctorId', $doctor->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->get()
                ->groupBy(function($item) {
                    return Carbon::parse($item->date)->format('Y-m-d');
                });
            
            // Lấy lịch hẹn trong tuần
            $appointments = Patient::where('doctorId', $doctor->id)
                ->whereBetween('dateBooking', [$startDate, $endDate])
                ->get()
                ->groupBy(function($item) {
                    return Carbon::parse($item->dateBooking)->format('Y-m-d');
                });
            
            return response()->json([
                'success' => true,
                'data' => [
                    'week_data' => $weekData,
                    'schedules' => $schedules,
                    'appointments' => $appointments
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Thêm lịch làm việc mới
     */
    public function addWorkSchedule(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'maxBooking' => 'nullable|integer|min:1'
            ]);
            
            $user = Auth::user();
            $doctor = DoctorUser::where('doctorId', $user->id)->first();
            
            if (!$doctor) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bác sĩ không tồn tại'
                ], 404);
            }
            
            // Kiểm tra xem đã có lịch cho ngày và giờ này chưa
            $existingSchedule = Schedule::where('doctorId', $doctor->id)
                ->where('date', $request->date)
                ->where('time', $request->time)
                ->first();
            
            if ($existingSchedule) {
                return response()->json([
                    'success' => false,
                    'message' => 'Đã có lịch làm việc cho thời gian này'
                ], 400);
            }
            
            // Tạo lịch mới
            $schedule = Schedule::create([
                'doctorId' => $doctor->id,
                'date' => $request->date,
                'time' => $request->time,
                'maxBooking' => $request->maxBooking ?? 10, // Mặc định 10 booking
                'sumBooking' => 0
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm lịch làm việc thành công',
                'data' => $schedule
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Cập nhật lịch làm việc
     */
    public function updateWorkSchedule(Request $request, $id)
    {
        try {
            $request->validate([
                'time' => 'required|date_format:H:i',
                'maxBooking' => 'nullable|integer|min:1'
            ]);
            
            $schedule = Schedule::find($id);
            
            if (!$schedule) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lịch làm việc không tồn tại'
                ], 404);
            }
            
            $user = Auth::user();
            $doctor = DoctorUser::where('doctorId', $user->id)->first();
            
            // Kiểm tra quyền
            if ($schedule->doctorId != $doctor->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn không có quyền cập nhật lịch này'
                ], 403);
            }
            
            // Cập nhật
            $schedule->update([
                'time' => $request->time,
                'maxBooking' => $request->maxBooking ?? $schedule->maxBooking
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Đã cập nhật lịch làm việc thành công',
                'data' => $schedule
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Xóa lịch làm việc
     */
    public function deleteWorkSchedule($id)
    {
        try {
            $schedule = Schedule::find($id);
            
            if (!$schedule) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lịch làm việc không tồn tại'
                ], 404);
            }
            
            $user = Auth::user();
            $doctor = DoctorUser::where('doctorId', $user->id)->first();
            
            // Kiểm tra quyền
            if ($schedule->doctorId != $doctor->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn không có quyền xóa lịch này'
                ], 403);
            }
            
            // Kiểm tra nếu đã có booking thì không cho xóa
            if ($schedule->sumBooking > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể xóa lịch đã có bệnh nhân đăng ký'
                ], 400);
            }
            
            $schedule->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa lịch làm việc thành công'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Chuyển tuần lịch làm việc
     */
    public function navigateWorkScheduleWeek(Request $request)
    {
        try {
            $direction = $request->get('direction', 'next');
            $currentDate = Carbon::parse($request->get('date', Carbon::now()->format('Y-m-d')));
            
            if ($direction === 'next') {
                $newDate = $currentDate->addWeek();
            } else {
                $newDate = $currentDate->subWeek();
            }
            
            return response()->json([
                'success' => true,
                'new_date' => $newDate->format('Y-m-d')
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Lấy dữ liệu tuần
     */
    private function getWeekData(Carbon $date)
    {
        // Tuần bắt đầu từ Thứ 2
        $startOfWeek = $date->copy()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = $date->copy()->endOfWeek(Carbon::SUNDAY);
        
        $weekDays = [];
        $currentDay = $startOfWeek->copy();
        
        // Tạo mảng các ngày trong tuần
        for ($i = 0; $i < 7; $i++) {
            $weekDays[] = [
                'date' => $currentDay->copy(),
                'day_name' => $this->getVietnameseDayName($currentDay->dayOfWeek),
                'short_name' => $this->getVietnameseShortDayName($currentDay->dayOfWeek),
                'day_number' => $currentDay->day,
                'is_today' => $currentDay->isToday(),
                'is_weekend' => $currentDay->isWeekend(),
                'month' => $currentDay->month,
                'year' => $currentDay->year,
                'date_string' => $currentDay->format('Y-m-d')
            ];
            $currentDay->addDay();
        }
        
        return [
            'start_date' => $startOfWeek,
            'end_date' => $endOfWeek,
            'days' => $weekDays,
            'week_number' => $date->weekOfYear,
            'month_name' => $this->getVietnameseMonthName($date->month)
        ];
    }
    
    /**
     * Helper functions
     */
    private function getVietnameseDayName($dayOfWeek)
    {
        $days = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'];
        return $days[$dayOfWeek] ?? '';
    }
    
    private function getVietnameseShortDayName($dayOfWeek)
    {
        $days = ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'];
        return $days[$dayOfWeek] ?? '';
    }
    
    private function getVietnameseMonthName($month)
    {
        $months = [
            'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
        ];
        return $months[$month - 1] ?? '';
    }

}
