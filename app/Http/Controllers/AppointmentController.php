<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\DoctorUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppointmentController extends Controller
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
        try {
            // Validate dữ liệu đầu vào
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'gender' => 'required|in:male,female',
                'dateBooking' => 'required|date|after_or_equal:today',
                'timeBooking' => 'required|date_format:H:i',
                'description' => 'nullable|string|max:500',
                'address' => 'nullable|string|max:255',
                'birthday' => 'nullable|date|before:today',
                'note' => 'nullable|string|max:500',
                'doctorId' => 'required|exists:doctor_users,id'
            ], [
                'name.required' => 'Vui lòng nhập họ tên bệnh nhân',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'dateBooking.required' => 'Vui lòng chọn ngày hẹn',
                'dateBooking.after_or_equal' => 'Ngày hẹn không được là ngày trong quá khứ',
                'timeBooking.required' => 'Vui lòng chọn giờ hẹn',
                'doctorId.required' => 'Thiếu thông tin bác sĩ',
                'doctorId.exists' => 'Bác sĩ không tồn tại'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dữ liệu không hợp lệ',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Kiểm tra xem bác sĩ có tồn tại không
            $doctor = DoctorUser::find($request->doctorId);
            if (!$doctor) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bác sĩ không tồn tại'
                ], 404);
            }

            // Kiểm tra lịch làm việc của bác sĩ
            $schedule = Schedule::where('doctorId', $doctor->id)
                ->where('date', $request->dateBooking)
                ->where('time', $request->timeBooking)
                ->first();

            if (!$schedule) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bác sĩ không có lịch làm việc vào khung giờ này'
                ], 400);
            }

            // Kiểm tra số lượng booking đã đạt tối đa chưa
            if ($schedule->sumBooking >= $schedule->maxBooking) {
                return response()->json([
                    'success' => false,
                    'message' => 'Khung giờ này đã đủ số lượng bệnh nhân tối đa'
                ], 400);
            }

            // Kiểm tra xem đã có lịch hẹn trùng email hoặc số điện thoại chưa
            $existingAppointment = Patient::where('doctorId', $doctor->id)
                ->where('dateBooking', $request->dateBooking)
                ->where('timeBooking', $request->timeBooking)
                ->where(function($query) use ($request) {
                    $query->where('email', $request->email)
                        ->orWhere('phone', $request->phone);
                })
                ->first();

            if ($existingAppointment) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email hoặc số điện thoại đã được đăng ký cho khung giờ này'
                ], 400);
            }

            // Tạo lịch hẹn mới
            $appointment = Patient::create([
                'doctorId' => $doctor->id,
                'name' => $request->name,
                'email' => $request->email, // THÊM EMAIL
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'dateBooking' => $request->dateBooking,
                'timeBooking' => $request->timeBooking,
                'description' => $request->description,
                'note' => $request->note,
                'statusId' => 1, // Trạng thái: Chờ xác nhận
                'created_by' => Auth::id(), // Người tạo (bác sĩ hiện tại)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Cập nhật số lượng booking trong schedule
            $schedule->increment('sumBooking');

            return response()->json([
                'success' => true,
                'message' => 'Tạo lịch hẹn thành công',
                'data' => [
                    'id' => $appointment->id,
                    'name' => $appointment->name,
                    'email' => $appointment->email,
                    'phone' => $appointment->phone,
                    'date' => $appointment->dateBooking,
                    'time' => $appointment->timeBooking,
                    'status' => 'Chờ xác nhận'
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Error creating appointment: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tạo lịch hẹn: ' . $e->getMessage()
            ], 500);
        }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirm($id)
    {
        $appointment = Patient::findOrFail($id);
        $appointment->statusId = 2; // Đã xác nhận
        $appointment->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Đã xác nhận lịch hẹn thành công'
        ]);
    }

    public function cancel(Request $request, $id)
    {
        $validated = $request->validate([
            'reason' => 'required|string|min:3|max:500'
        ]);
        
        $appointment = Patient::findOrFail($id);
        $appointment->statusId = 4; // Đã hủy
        $appointment->cancellation_reason = $validated['reason']; 
        $appointment->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Đã hủy lịch hẹn thành công'
        ]);
    }
}
