<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Specialization;
use App\Models\DoctorUser;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Feedback;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class DoctorUserController extends Controller
{
    public function index(Request $request)
    {
        // Lấy query từ User có role là bác sĩ
        $query = User::where('roleId', 2)
            ->where('isActive', true)
            ->with(['doctorInfo', 'doctorInfo.specialization']);
        
        // Lọc theo chuyên khoa
        if ($request->filled('specialty') && $request->specialty != 'Tất cả') {
            $query->whereHas('doctorInfo.specialization', function($q) use ($request) {
                $q->where('name', $request->specialty);
            });
        }
        
        // Lọc theo kinh nghiệm
        if ($request->filled('experience') && $request->experience != 'Tất cả') {
            $query->whereHas('doctorInfo', function($q) use ($request) {
                switch ($request->experience) {
                    case 'Dưới 5 năm':
                        $q->where('experience_years', '<', 5);
                        break;
                    case '5 - 10 năm':
                        $q->whereBetween('experience_years', [5, 10]);
                        break;
                    case '10 - 15 năm':
                        $q->whereBetween('experience_years', [10, 15]);
                        break;
                    case 'Trên 15 năm':
                        $q->where('experience_years', '>', 15);
                        break;
                }
            });
        }
        
        // Lọc theo giới tính
        if ($request->filled('gender') && $request->gender != 'Tất cả') {
            $query->where('gender', $request->gender);
        }
        
        // Phân trang (12 bác sĩ mỗi trang)
        $doctors = $query->paginate(12);
        
        // Lấy danh sách chuyên khoa cho dropdown
        $specializations = Specialization::all();
        
        return view('products.bacsi', compact('doctors', 'specializations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $doctorInfo = DoctorUser::with([
            'user',
            'specialization',
            'clinic',
            'feedbacks.patient.user' 
        ])->where('doctorId', $id)  
        ->firstOrFail();

        $feedbacks = Feedback::with('patient.user')
            ->where('doctorId', $id)
            ->whereNotNull('content') 
            ->orderBy('created_at', 'desc')
            ->paginate(5); 

        $totalReviews = Feedback::where('doctorId', $id)->count();

        return view('products.bacsi-chitiet', compact(
            'doctorInfo', 
            'feedbacks',
            'totalReviews'
        ));
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
        // lấy feedback gần đây và yêu cầu hủy lịch
        $doctor = DoctorUser::where('doctorId', $user->id)->first();
    
        if (!$doctor) {
            return redirect()->route('home');
        }
        
        $recentFeedbacks = DB::table('feedbacks')
            ->join('patients', 'feedbacks.patientId', '=', 'patients.id')
            ->where('feedbacks.doctorId', $doctor->id)
            ->whereNull('feedbacks.deleted_at')
            ->orderBy('feedbacks.created_at', 'desc')
            ->limit(5)
            ->get(['feedbacks.*', 'patients.name as patient_name', 'patients.phone as patient_phone']);
        
        $cancellationRequests = DB::table('patients')
            ->where('doctorId', $doctor->id)
            ->where('statusId', 4) // Trạng thái đã hủy
            ->whereNotNull('cancellation_reason')
            ->whereDate('dateBooking', '>=', now()->subDays(7)) // Lấy trong 7 ngày gần đây
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        
        $pendingCancellations = DB::table('patients')
            ->where('doctorId', $doctor->id)
            ->where('statusId', 1) // Trạng thái chờ xác nhận
            ->whereNotNull('cancellation_reason') // Có lý do hủy
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        

        return view('auth.bacsilog', compact('doctor', 'appointments', 'schedules', 'workStatus', 
            'recentFeedbacks',
            'cancellationRequests',
            'pendingCancellations',
        'user'));
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
     * Lấy lịch làm việc 
     */
    public function getWorkSchedule(Request $request) 
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
            
            // Lấy tham số từ request - THÊM DÒNG NÀY
            $view = $request->get('view', 'week'); // day, week, month
            $date = $request->get('date', Carbon::now()->format('Y-m-d'));
            $currentDate = Carbon::parse($date);
            
            // PHẦN NÀY THAY THẾ TOÀN BỘ: Lấy dữ liệu theo chế độ xem
            $scheduleData = $this->getScheduleDataByView($view, $currentDate, $doctor->id);
            
            return response()->json([
                'success' => true,
                'data' => $scheduleData // THAY ĐỔI CẤU TRÚC TRẢ VỀ
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Lấy dữ liệu theo chế độ xem - THÊM METHOD MỚI
     */
    private function getScheduleDataByView($view, Carbon $date, $doctorId)
    {
        switch ($view) {
            case 'day':
                return $this->getDayViewData($date, $doctorId);
            case 'week':
                return $this->getWeekViewData($date, $doctorId);
            case 'month':
                return $this->getMonthViewData($date, $doctorId);
            default:
                return $this->getWeekViewData($date, $doctorId);
        }
    }

    /**
     * Chế độ xem theo ngày - THÊM METHOD MỚI
     */
    private function getDayViewData(Carbon $date, $doctorId)
    {
        $dateString = $date->format('Y-m-d');
        
        // Lịch làm việc trong ngày
        $schedules = Schedule::where('doctorId', $doctorId)
            ->where('date', $dateString)
            ->orderBy('time')
            ->get();
        
        // Lịch hẹn trong ngày
        $appointments = Patient::where('doctorId', $doctorId)
            ->whereDate('dateBooking', $dateString)
            ->orderBy('timeBooking')
            ->get();
        
        return [
            'view' => 'day',
            'title' => $this->getVietnameseDayName($date->dayOfWeek) . ', ' . 
                    $date->format('d') . ' ' . 
                    $this->getVietnameseMonthName($date->month) . ' ' . 
                    $date->format('Y'),
            'schedules' => $schedules,
            'appointments' => $appointments,
            'day_data' => [
                'date' => $date,
                'day_name' => $this->getVietnameseDayName($date->dayOfWeek),
                'day_number' => $date->day,
                'month_name' => $this->getVietnameseMonthName($date->month),
                'year' => $date->year,
                'is_today' => $date->isToday(),
                'date_string' => $dateString
            ]
        ];
    }
    
    /**
     * Chế độ xem theo tuần - TÁCH TỪ LOGIC CŨ THÀNH METHOD RIÊNG
     */
    private function getWeekViewData(Carbon $date, $doctorId)
    {
        // Lấy dữ liệu tuần
        $weekData = $this->getWeekData($date);
        
        // Lịch làm việc trong tuần
        $startDate = $weekData['start_date']->format('Y-m-d');
        $endDate = $weekData['end_date']->format('Y-m-d');
        
        $schedules = Schedule::where('doctorId', $doctorId)
            ->whereBetween('date', [$startDate, $endDate])
            ->get()
            ->groupBy(function($item) {
                return Carbon::parse($item->date)->format('Y-m-d');
            });
        
        // Lịch hẹn trong tuần
        $appointments = Patient::where('doctorId', $doctorId)
            ->whereBetween('dateBooking', [$startDate, $endDate])
            ->get()
            ->groupBy(function($item) {
                return Carbon::parse($item->dateBooking)->format('Y-m-d');
            });
        
        return [
            'view' => 'week',
            'title' => 'Tuần ' . $weekData['week_number'] . ' - ' . 
                    $weekData['start_date']->format('d') . ' - ' . 
                    $weekData['end_date']->format('d') . ' ' . 
                    $weekData['month_name'] . ', ' . 
                    $weekData['start_date']->year,
            'schedules' => $schedules,
            'appointments' => $appointments,
            'week_data' => $weekData
        ];
    }

    /**
     * Chế độ xem theo tháng - THÊM METHOD MỚI
     */
    private function getMonthViewData(Carbon $date, $doctorId)
    {
        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth();
        
        // Tạo lịch cho tháng
        $monthDays = [];
        $currentDay = $startOfMonth->copy();
        
        while ($currentDay <= $endOfMonth) {
            $monthDays[] = [
                'date' => $currentDay->copy(),
                'day_name' => $this->getVietnameseShortDayName($currentDay->dayOfWeek),
                'day_number' => $currentDay->day,
                'is_today' => $currentDay->isToday(),
                'is_weekend' => $currentDay->isWeekend(),
                'date_string' => $currentDay->format('Y-m-d')
            ];
            $currentDay->addDay();
        }
        
        // Lịch làm việc trong tháng
        $schedules = Schedule::where('doctorId', $doctorId)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(function($item) {
                return Carbon::parse($item->date)->format('Y-m-d');
            });
        
        // Lịch hẹn trong tháng
        $appointments = Patient::where('doctorId', $doctorId)
            ->whereBetween('dateBooking', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(function($item) {
                return Carbon::parse($item->dateBooking)->format('Y-m-d');
            });
        
        return [
            'view' => 'month',
            'title' => $this->getVietnameseMonthName($date->month) . ' ' . $date->format('Y'),
            'schedules' => $schedules,
            'appointments' => $appointments,
            'month_data' => [
                'start_date' => $startOfMonth,
                'end_date' => $endOfMonth,
                'days' => $monthDays,
                'month_name' => $this->getVietnameseMonthName($date->month),
                'year' => $date->year
            ]
        ];
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
     * Chuyển chế độ xem
     */
    public function navigateWorkSchedule(Request $request) 
    {
        try {
            $direction = $request->get('direction', 'next');
            $currentDate = Carbon::parse($request->get('date', Carbon::now()->format('Y-m-d')));
            $view = $request->get('view', 'week'); // THÊM THAM SỐ view
            
            switch ($view) { // THÊM SWITCH CASE
                case 'day':
                    if ($direction === 'next') {
                        $newDate = $currentDate->addDay();
                    } else {
                        $newDate = $currentDate->subDay();
                    }
                    break;
                    
                case 'week':
                    if ($direction === 'next') {
                        $newDate = $currentDate->addWeek();
                    } else {
                        $newDate = $currentDate->subWeek();
                    }
                    break;
                    
                case 'month':
                    if ($direction === 'next') {
                        $newDate = $currentDate->addMonth();
                    } else {
                        $newDate = $currentDate->subMonth();
                    }
                    break;
                    
                default:
                    if ($direction === 'next') {
                        $newDate = $currentDate->addWeek();
                    } else {
                        $newDate = $currentDate->subWeek();
                    }
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
        
        $index = $dayOfWeek - 1;
        if ($index < 0) {
            $index = 6; // Sunday (0) -> Chủ nhật (6)
        }
        
        return $days[$index] ?? '';
    }
    
    private function getVietnameseShortDayName($dayOfWeek)
    {
        $days = ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'];
        
        $index = $dayOfWeek - 1;
        if ($index < 0) {
            $index = 6; // Sunday (0) -> CN (6)
        }
        
        return $days[$index] ?? '';
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
