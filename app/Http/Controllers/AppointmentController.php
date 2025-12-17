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

    public function cancelForPatient(Request $request, $id)
    {
        try {
            \Log::info('=== BẮT ĐẦU HỦY LỊCH ===');
            
            // Validate dữ liệu đầu vào
            $validator = Validator::make($request->all(), [
                'reason' => 'required|string|min:3|max:500'
            ], [
                'reason.required' => 'Vui lòng nhập lý do hủy lịch',
                'reason.min' => 'Lý do hủy phải có ít nhất 3 ký tự',
                'reason.max' => 'Lý do hủy không được vượt quá 500 ký tự'
            ]);

            if ($validator->fails()) {
                \Log::warning('Validation failed:', $validator->errors()->toArray());
                return response()->json([
                    'success' => false,
                    'message' => 'Dữ liệu không hợp lệ',
                    'errors' => $validator->errors()
                ], 422);
            }

            \Log::info('Tìm lịch hẹn ID: ' . $id);
            // Tìm lịch hẹn
            $appointment = Patient::find($id);
            
            if (!$appointment) {
                \Log::warning('Không tìm thấy lịch hẹn ID: ' . $id);
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy lịch hẹn'
                ], 404);
            }

            \Log::info('Lấy thông tin user');
            // Lấy thông tin user đang đăng nhập
            $user = Auth::user();
            
            if (!$user) {
                \Log::warning('User không xác thực');
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn chưa đăng nhập'
                ], 401);
            }

            \Log::info('Kiểm tra role user: ' . $user->roleId);
            // Kiểm tra xem user có phải là bệnh nhân không
            if ($user->roleId != 3) { // 3 = PATIENT
                \Log::warning('User không phải bệnh nhân, roleId: ' . $user->roleId);
                return response()->json([
                    'success' => false,
                    'message' => 'Chỉ bệnh nhân mới được hủy lịch hẹn'
                ], 403);
            }

            \Log::info('Kiểm tra quyền sở hữu');
            // Kiểm tra xem lịch hẹn có thuộc về bệnh nhân này không
            // So sánh bằng email hoặc số điện thoại
            $isOwner = ($appointment->email === $user->email) || 
                    ($appointment->phone === $user->phone);
            
            \Log::info('Kết quả kiểm tra quyền:', [
                'isOwner' => $isOwner,
                'appointment_email' => $appointment->email,
                'user_email' => $user->email,
                'appointment_phone' => $appointment->phone,
                'user_phone' => $user->phone
            ]);
            
            if (!$isOwner) {
                \Log::warning('Không có quyền hủy lịch');
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn không có quyền hủy lịch hẹn này. Lịch hẹn không thuộc về bạn.'
                ], 403);
            }

            \Log::info('Kiểm tra trạng thái hiện tại: ' . $appointment->statusId);
            // Kiểm tra trạng thái hiện tại
            if ($appointment->statusId == 4) {
                \Log::warning('Lịch hẹn đã bị hủy từ trước');
                return response()->json([
                    'success' => false,
                    'message' => 'Lịch hẹn này đã bị hủy từ trước'
                ], 400);
            }

            \Log::info('Kiểm tra thời gian');
            // Kiểm tra nếu đã qua ngày hẹn
            try {
                $appointmentDate = Carbon::parse($appointment->dateBooking . ' ' . $appointment->timeBooking);
                if ($appointmentDate->isPast()) {
                    \Log::warning('Không thể hủy lịch hẹn đã qua');
                    return response()->json([
                        'success' => false,
                        'message' => 'Không thể hủy lịch hẹn đã qua'
                    ], 400);
                }
            } catch (\Exception $e) {
                \Log::error('Lỗi parse thời gian: ' . $e->getMessage());
                // Bỏ qua lỗi parse thời gian
            }

            \Log::info('Kiểm tra nếu đã khám');
            // Kiểm tra nếu đã khám (statusId = 3)
            if ($appointment->statusId == 3) {
                \Log::warning('Không thể hủy lịch hẹn đã khám');
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể hủy lịch hẹn đã khám'
                ], 400);
            }

            // Lưu lại thông tin cũ để rollback nếu cần
            $oldStatusId = $appointment->statusId;
            $oldSumBooking = null;
            $schedule = null;

            \Log::info('Giảm số lượng booking trong schedule nếu cần');
            // Giảm số lượng booking trong schedule nếu lịch đã được xác nhận
            if ($appointment->statusId == 2) { // Đã xác nhận
                $schedule = Schedule::where('doctorId', $appointment->doctorId)
                    ->where('date', $appointment->dateBooking)
                    ->where('time', $appointment->timeBooking)
                    ->first();
                
                if ($schedule) {
                    $oldSumBooking = $schedule->sumBooking;
                    \Log::info('Tìm thấy schedule, sumBooking hiện tại: ' . $oldSumBooking);
                    if ($schedule->sumBooking > 0) {
                        $schedule->decrement('sumBooking');
                        \Log::info('Đã giảm sumBooking, sumBooking mới: ' . $schedule->sumBooking);
                    }
                } else {
                    \Log::warning('Không tìm thấy schedule cho lịch hẹn');
                }
            }

            \Log::info('Cập nhật trạng thái và lý do hủy');
            // Cập nhật trạng thái và lý do hủy
            $updated = $appointment->update([
                'statusId' => 4, // Đã hủy
                'cancellation_reason' => $request->reason,
                'updated_at' => Carbon::now()
            ]);

            if (!$updated) {
                \Log::error('Không thể cập nhật lịch hẹn');
                throw new \Exception('Không thể cập nhật lịch hẹn');
            }

            // Ghi log hành động
            \Log::info('Bệnh nhân hủy lịch hẹn thành công', [
                'patient_id' => $user->id,
                'appointment_id' => $appointment->id,
                'doctor_id' => $appointment->doctorId,
                'reason' => $request->reason,
                'old_status' => $oldStatusId,
                'new_status' => 4,
                'timestamp' => Carbon::now()
            ]);

            \Log::info('=== KẾT THÚC HỦY LỊCH THÀNH CÔNG ===');
            
            return response()->json([
                'success' => true,
                'message' => 'Đã hủy lịch hẹn thành công',
                'data' => [
                    'id' => $appointment->id,
                    'statusId' => $appointment->statusId,
                    'statusText' => 'Đã hủy',
                    'cancellation_reason' => $appointment->cancellation_reason,
                    'date' => $appointment->dateBooking,
                    'time' => $appointment->timeBooking
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error khi hủy lịch: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ: ' . $e->getMessage(),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('=== LỖI KHI HỦY LỊCH ===');
            \Log::error('Error message: ' . $e->getMessage());
            \Log::error('File: ' . $e->getFile());
            \Log::error('Line: ' . $e->getLine());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Rollback nếu có lỗi
            if (isset($appointment) && isset($oldStatusId)) {
                \Log::info('Rollback lịch hẹn');
                try {
                    $appointment->update([
                        'statusId' => $oldStatusId,
                        'cancellation_reason' => null
                    ]);
                    \Log::info('Rollback lịch hẹn thành công');
                } catch (\Exception $rollbackError) {
                    \Log::error('Lỗi rollback lịch hẹn: ' . $rollbackError->getMessage());
                }
                
                // Rollback schedule nếu cần
                if (isset($schedule) && isset($oldSumBooking)) {
                    \Log::info('Rollback schedule');
                    try {
                        $schedule->update(['sumBooking' => $oldSumBooking]);
                        \Log::info('Rollback schedule thành công');
                    } catch (\Exception $rollbackError) {
                        \Log::error('Lỗi rollback schedule: ' . $rollbackError->getMessage());
                    }
                }
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi hủy lịch hẹn: ' . $e->getMessage()
            ], 500);
        }
    }

    public function checkCancelEligibility($id)
    {
        try {
            \Log::info('Kiểm tra điều kiện hủy lịch ID: ' . $id);
            
            $appointment = Patient::find($id);
            
            if (!$appointment) {
                \Log::warning('Không tìm thấy lịch hẹn ID: ' . $id);
                return response()->json([
                    'canCancel' => false,
                    'message' => 'Không tìm thấy lịch hẹn'
                ]);
            }
            
            $user = Auth::user();
            \Log::info('User kiểm tra:', [
                'user_id' => $user->id,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
                'user_role' => $user->roleId
            ]);
            
            \Log::info('Thông tin lịch hẹn:', [
                'appointment_email' => $appointment->email,
                'appointment_phone' => $appointment->phone,
                'appointment_status' => $appointment->statusId,
                'appointment_date' => $appointment->dateBooking,
                'appointment_time' => $appointment->timeBooking
            ]);
            
            // Kiểm tra xem user có phải là bệnh nhân không
            if ($user->roleId != 3) {
                \Log::warning('User không phải bệnh nhân, roleId: ' . $user->roleId);
                return response()->json([
                    'canCancel' => false,
                    'message' => 'Chỉ bệnh nhân mới được hủy lịch hẹn'
                ]);
            }
            
            // Kiểm tra xem lịch hẹn có thuộc về bệnh nhân này không
            $isOwner = ($appointment->email === $user->email) || 
                    ($appointment->phone === $user->phone);
            
            \Log::info('Kiểm tra quyền sở hữu:', [
                'isOwner' => $isOwner,
                'email_match' => ($appointment->email === $user->email),
                'phone_match' => ($appointment->phone === $user->phone)
            ]);
            
            if (!$isOwner) {
                \Log::warning('Không có quyền hủy lịch');
                return response()->json([
                    'canCancel' => false,
                    'message' => 'Bạn không có quyền hủy lịch hẹn này'
                ]);
            }
            
            // Kiểm tra trạng thái
            if ($appointment->statusId == 4) {
                \Log::info('Lịch hẹn đã bị hủy');
                return response()->json([
                    'canCancel' => false,
                    'message' => 'Lịch hẹn này đã bị hủy'
                ]);
            }
            
            if ($appointment->statusId == 3) {
                \Log::info('Lịch hẹn đã khám');
                return response()->json([
                    'canCancel' => false,
                    'message' => 'Lịch hẹn này đã khám, không thể hủy'
                ]);
            }
            
            // Kiểm tra thời gian
            try {
                $appointmentDateTime = Carbon::parse($appointment->dateBooking . ' ' . $appointment->timeBooking);
                $now = Carbon::now();
                
                \Log::info('Thời gian kiểm tra:', [
                    'appointment_datetime' => $appointmentDateTime,
                    'now' => $now,
                    'is_past' => $appointmentDateTime->isPast()
                ]);
                
                if ($appointmentDateTime->isPast()) {
                    \Log::info('Lịch hẹn đã qua');
                    return response()->json([
                        'canCancel' => false,
                        'message' => 'Lịch hẹn đã qua, không thể hủy'
                    ]);
                }
                
                // Kiểm tra thời gian tối thiểu trước khi hủy (ví dụ: 2 giờ)
                $hoursBefore = $now->diffInHours($appointmentDateTime, false);
                \Log::info('Thời gian còn lại:', ['hours_before' => $hoursBefore]);
                
                if ($hoursBefore < 2) {
                    \Log::info('Không đủ thời gian hủy');
                    return response()->json([
                        'canCancel' => false,
                        'message' => 'Không thể hủy lịch hẹn trước 2 giờ so với giờ hẹn'
                    ]);
                }
                
            } catch (\Exception $e) {
                \Log::error('Lỗi kiểm tra thời gian: ' . $e->getMessage());
                // Nếu có lỗi khi parse thời gian, vẫn cho phép hủy
            }
            
            \Log::info('Có thể hủy lịch');
            return response()->json([
                'canCancel' => true,
                'message' => 'Bạn có thể hủy lịch hẹn này',
                'appointment' => [
                    'id' => $appointment->id,
                    'date' => $appointment->dateBooking,
                    'time' => $appointment->timeBooking,
                    'status' => $appointment->statusId
                ]
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Lỗi kiểm tra điều kiện hủy lịch: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'canCancel' => false,
                'message' => 'Có lỗi xảy ra khi kiểm tra điều kiện hủy lịch: ' . $e->getMessage()
            ], 500);
        }
    }
}
