<?php

namespace App\Http\Controllers;

use App\Models\DoctorUser;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Specialization;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Kiểm tra user đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt lịch');
        }

        // Kiểm tra role - so sánh với tên role 'PATIENT'
        $user = Auth::user();
        
        Log::info('Booking access attempt', [
            'user_id' => $user->id,
            'role' => $user->role ? $user->role->name : 'no role'
        ]);
        
        if (!$user->role || $user->role->name !== 'PATIENT') {
            return redirect()->route('home')
                ->with('error', 'Chỉ bệnh nhân mới có thể đặt lịch khám');
        }

        $query = DoctorUser::with(['user', 'specialization', 'clinic']);

        // **THAY ĐỔI: Filter by doctor ID if specified**
        if ($request->filled('doctor')) {
            $query->where('id', $request->doctor);
        }

        // Filter by specialty
        if ($request->filled('specialty')) {
            $query->where('specializationId', $request->specialty);
        }

        // Filter by gender
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('gender', $request->gender);
            });
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($subQ) use ($search) {
                    $subQ->where('name', 'like', "%{$search}%");
                })->orWhereHas('specialization', function($subQ) use ($search) {
                    $subQ->where('name', 'like', "%{$search}%");
                });
            });
        }

        $doctors = $query->paginate(10);
        $specializations = Specialization::all();

        // Lấy thông tin user đang đăng nhập
        $currentUser = Auth::user();
        $patient = Patient::where('email', $currentUser->email)->first();
        $date_of_birth = $patient?->date_of_birth;
        dump($date_of_birth);

        // **THAY ĐỔI: Truyền thêm selectedDoctorId cho view**
        return view('patients.booking', compact('doctors', 'specializations', 'currentUser', 'date_of_birth', 'request'));
    }

    public function getSchedules($doctorId, Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $schedules = Schedule::where('doctorId', $doctorId)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->where('date', '>=', now()->toDateString())
            ->whereRaw('sumBooking < maxBooking')
            ->get()
            ->groupBy('date');

        return response()->json([
            'schedules' => $schedules,
            'month' => $month,
            'year' => $year
        ]);
    }

    public function getAvailableTimes($doctorId, Request $request)
    {
        $date = $request->input('date');

        $schedules = Schedule::where('doctorId', $doctorId)
            ->where('date', $date)
            ->whereRaw('sumBooking < maxBooking')
            ->orderBy('time')
            ->get();

        return response()->json([
            'times' => $schedules->map(function($schedule) {
                return [
                    'id' => $schedule->id,
                    'time' => $schedule->time,
                    'available' => $schedule->maxBooking - $schedule->sumBooking,
                    'is_full' => $schedule->sumBooking >= $schedule->maxBooking
                ];
            })
        ]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'doctorId' => 'required|exists:doctor_users,id',
            'scheduleId' => 'required|exists:schedules,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|string',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Lấy thông tin schedule
            $schedule = Schedule::findOrFail($request->scheduleId);

            // Kiểm tra còn chỗ trống không
            if ($schedule->sumBooking >= $schedule->maxBooking) {
                return back()->with('error', 'Lịch khám này đã hết chỗ. Vui lòng chọn lịch khác.');
            }

            // Lấy status mặc định (PENDING)
            $status = Status::where('name', 'PENDING')
                ->orWhere('name', 'Chờ xác nhận')
                ->first();

            // Tạo patient booking
            $patient = Patient::create([
                'doctorId' => $request->doctorId,
                'statusId' => $status->id ?? null,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'description' => $request->description,
                'dateBooking' => $schedule->date,
                'timeBooking' => $schedule->time,
            ]);

            // Tăng sumBooking
            $schedule->increment('sumBooking');

            DB::commit();

            return redirect()->route('booking.index')
                ->with('success', 'Đặt lịch khám thành công! Chúng tôi sẽ liên hệ với bạn sớm.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}