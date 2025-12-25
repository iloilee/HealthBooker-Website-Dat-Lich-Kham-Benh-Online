<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\DoctorUser;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    /**
     * Display a listing of appointments for admin.
     */
    public function index(Request $request)
    {
        try {
            // Lấy các tham số tìm kiếm và lọc
            $search = $request->input('search');
            $status = $request->input('status');
            $date = $request->input('date');
            
            // Query chính - ĐƠN GIẢN HÓA
            $query = Patient::with(['doctor.user', 'doctor.specialization'])
                ->orderBy('dateBooking', 'desc')
                ->orderBy('timeBooking', 'desc');

            // Tìm kiếm
            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('phone', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->orWhereHas('doctor.user', function($q2) use ($search) {
                          $q2->where('name', 'LIKE', "%{$search}%");
                      })
                      ->orWhereHas('doctor.specialization', function($q2) use ($search) {
                          $q2->where('name', 'LIKE', "%{$search}%");
                      });
                });
            }

            // Lọc theo trạng thái
            if ($status && $status !== 'all') {
                $statusMap = [
                    'Chờ xác nhận' => 1,
                    'Đã xác nhận' => 2,
                    'Đã hoàn thành' => 3,
                    'Đã hủy' => 4
                ];
                
                if (isset($statusMap[$status])) {
                    $query->where('statusId', $statusMap[$status]);
                }
            }

            // Lọc theo ngày
            if ($date) {
                $query->whereDate('dateBooking', $date);
            }

            // Phân trang
            $appointments = $query->paginate(10)->withQueryString();

            // Thêm statusInfo cho mỗi appointment
            foreach ($appointments as $appointment) {
                $appointment->statusInfo = $this->getStatusText($appointment->statusId);
            }

            // Thống kê
            $totalAppointments = Patient::count();
            
            $today = Carbon::today()->toDateString();
            $appointmentsToday = Patient::whereDate('dateBooking', $today)->count();
            
            $pendingAppointments = Patient::where('statusId', 1)->count();
            
            $monthStart = Carbon::now()->startOfMonth();
            $monthEnd = Carbon::now()->endOfMonth();
            $cancelledThisMonth = Patient::where('statusId', 4)
                ->whereBetween('created_at', [$monthStart, $monthEnd])
                ->count();

            return view('admin.manage-bookings', compact(
                'appointments',
                'totalAppointments',
                'appointmentsToday',
                'pendingAppointments',
                'cancelledThisMonth',
                'search',
                'status',
                'date'
            ));

        } catch (\Exception $e) {
            \Log::error('Error loading appointments: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tải dữ liệu lịch hẹn.');
        }
    }

    /**
     * Helper function để lấy text trạng thái
     */
    private function getStatusText($statusId)
    {
        $statuses = [
            1 => ['text' => 'Chờ xác nhận', 'class' => 'amber'],
            2 => ['text' => 'Đã xác nhận', 'class' => 'green'],
            3 => ['text' => 'Đã hoàn thành', 'class' => 'blue'],
            4 => ['text' => 'Đã hủy', 'class' => 'red']
        ];

        return $statuses[$statusId] ?? ['text' => 'Không xác định', 'class' => 'slate'];
    }

    /**
     * Xác nhận lịch hẹn (AJAX)
     */
    public function confirm($id)
    {
        try {
            $appointment = Patient::findOrFail($id);
            
            // Chỉ xác nhận lịch ở trạng thái chờ xác nhận
            if ($appointment->statusId != 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Chỉ có thể xác nhận lịch hẹn đang chờ xác nhận'
                ], 400);
            }
            
            $appointment->statusId = 2; // Đã xác nhận
            $appointment->save();

            return response()->json([
                'success' => true,
                'message' => 'Đã xác nhận lịch hẹn thành công',
                'status_text' => 'Đã xác nhận',
                'status_class' => 'green'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error confirming appointment: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Hủy lịch hẹn (AJAX)
     */
    public function cancel(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'reason' => 'required|string|min:3|max:500'
            ]);
            
            $appointment = Patient::findOrFail($id);
            
            // Chỉ hủy lịch chưa hoàn thành và chưa hủy
            if ($appointment->statusId == 3 || $appointment->statusId == 4) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể hủy lịch hẹn đã hoàn thành hoặc đã hủy'
                ], 400);
            }
            
            // Giảm số lượng booking trong schedule nếu lịch đã xác nhận
            if ($appointment->statusId == 2) {
                $schedule = Schedule::where('doctorId', $appointment->doctorId)
                    ->where('date', $appointment->dateBooking)
                    ->where('time', $appointment->timeBooking)
                    ->first();
                
                if ($schedule && $schedule->sumBooking > 0) {
                    $schedule->decrement('sumBooking');
                }
            }
            
            $appointment->statusId = 4; // Đã hủy
            $appointment->cancellation_reason = $validated['reason']; 
            $appointment->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Đã hủy lịch hẹn thành công',
                'status_text' => 'Đã hủy',
                'status_class' => 'red'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error cancelling appointment: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi hủy lịch hẹn'
            ], 500);
        }
    }

    /**
     * Display the specified appointment.
     */
    public function show($id)
    {
        try {
            $appointment = Patient::with([
                'doctor.user',
                'doctor.specialization'
            ])->findOrFail($id);

            // Thêm thông tin trạng thái
            $appointment->statusInfo = $this->getStatusText($appointment->statusId);
            
            return view('admin.appointments.show', compact('appointment'));

        } catch (\Exception $e) {
            \Log::error('Error viewing appointment: ' . $e->getMessage());
            return redirect()->route('admin.manage-bookings')->with('error', 'Không tìm thấy lịch hẹn.');
        }
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit($id)
    {
        try {
            
            $appointment = Patient::with(['doctor.user', 'doctor.specialization'])->findOrFail($id);
            $appointment->statusInfo = $this->getStatusText($appointment->statusId);
            $doctors = DoctorUser::with('user')->get();
            $specializations = Specialization::all();
            $availableTimes = Schedule::where('doctorId', $appointment->doctorId)
                ->where('date', $appointment->dateBooking)
                ->get(['time', 'maxBooking', 'sumBooking']);
            
            return view('admin.appointments.edit', compact(
                'appointment',
                'doctors',
                'specializations',
                'availableTimes'
            ));

        } catch (\Exception $e) {
            \Log::error('Error loading appointment edit form: ' . $e->getMessage());
            return redirect()->route('admin.manage-bookings')->with('error', 'Không tìm thấy lịch hẹn.');
        }
    }

    /**
     * Lấy thông tin schedule cho một khung giờ cụ thể
     */
    public function getScheduleInfo(Request $request)
    {
        try {
            $request->validate([
                'doctorId' => 'required|exists:doctor_users,id',
                'date' => 'required|date',
                'time' => 'required'
            ]);

            $schedule = Schedule::where('doctorId', $request->doctorId)
                ->where('date', $request->date)
                ->where('time', $request->time)
                ->first();

            if (!$schedule) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy lịch làm việc'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'maxBooking' => $schedule->maxBooking,
                'sumBooking' => $schedule->sumBooking
            ]);

        } catch (\Exception $e) {
            \Log::error('Error getting schedule info: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra'
            ], 500);
        }
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        try {
            $doctors = DoctorUser::with('user')->get();
            $specializations = Specialization::all();
            
            return view('admin.appointments.create', compact('doctors', 'specializations'));

        } catch (\Exception $e) {
            \Log::error('Error loading create form: ' . $e->getMessage());
            return redirect()->route('admin.manage-bookings')
                ->with('error', 'Có lỗi xảy ra khi tải form tạo lịch hẹn.');
        }
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $appointment = Patient::findOrFail($id);

            // Validate dữ liệu
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'gender' => 'required|in:Nam,Nữ,Khác',
                'dateBooking' => 'required|date',
                'timeBooking' => 'required', // Bỏ date_format:H:i
                'description' => 'nullable|string|max:500',
                'address' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date|before:today',
                'cancellation_reason' => 'nullable|string|max:500',
                'doctorId' => 'required|exists:doctor_users,id',
                'statusId' => 'required|in:1,2,3,4'
            ], [
                'name.required' => 'Vui lòng nhập họ tên bệnh nhân',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'dateBooking.required' => 'Vui lòng chọn ngày hẹn',
                'timeBooking.required' => 'Vui lòng chọn giờ hẹn',
                'doctorId.required' => 'Thiếu thông tin bác sĩ',
                'doctorId.exists' => 'Bác sĩ không tồn tại',
                'statusId.required' => 'Thiếu trạng thái'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Format thời gian nếu cần
            $timeBooking = $request->timeBooking;
            // Nếu time có độ dài 5 ký tự (HH:MM), thêm :00
            if (strlen($timeBooking) == 5) {
                $timeBooking .= ':00';
            }

            // Kiểm tra lịch làm việc của bác sĩ mới (nếu có thay đổi)
            if ($appointment->doctorId != $request->doctorId || 
                $appointment->dateBooking != $request->dateBooking || 
                $appointment->timeBooking != $timeBooking) {
                
                $schedule = Schedule::where('doctorId', $request->doctorId)
                    ->where('date', $request->dateBooking)
                    ->where('time', $timeBooking)
                    ->first();

                if (!$schedule) {
                    return redirect()->back()
                        ->with('error', 'Bác sĩ không có lịch làm việc vào khung giờ này')
                        ->withInput();
                }

                // Kiểm tra số lượng booking đã đạt tối đa chưa
                if ($schedule->sumBooking >= $schedule->maxBooking) {
                    return redirect()->back()
                        ->with('error', 'Khung giờ này đã đủ số lượng bệnh nhân tối đa')
                        ->withInput();
                }
            }

            // Lưu thông tin cũ để cập nhật schedule
            $oldDoctorId = $appointment->doctorId;
            $oldDate = $appointment->dateBooking;
            $oldTime = $appointment->timeBooking;

            // Cập nhật lịch hẹn
            $appointment->update([
                'doctorId' => $request->doctorId,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'dateBooking' => $request->dateBooking,
                'timeBooking' => $timeBooking,
                'description' => $request->description,
                'statusId' => $request->statusId,
                'cancellation_reason' => $request->cancellation_reason,
                'updated_at' => Carbon::now()
            ]);

            // Cập nhật schedule nếu có thay đổi bác sĩ/ngày/giờ
            if ($oldDoctorId != $request->doctorId || $oldDate != $request->dateBooking || $oldTime != $timeBooking) {
                // Giảm số lượng booking ở schedule cũ
                $oldSchedule = Schedule::where('doctorId', $oldDoctorId)
                    ->where('date', $oldDate)
                    ->where('time', $oldTime)
                    ->first();
                
                if ($oldSchedule && $oldSchedule->sumBooking > 0) {
                    $oldSchedule->decrement('sumBooking');
                }

                // Tăng số lượng booking ở schedule mới
                $newSchedule = Schedule::where('doctorId', $request->doctorId)
                    ->where('date', $request->dateBooking)
                    ->where('time', $timeBooking)
                    ->first();
                
                if ($newSchedule) {
                    $newSchedule->increment('sumBooking');
                }
            }

            return redirect()->route('admin.manage-bookings')
                ->with('success', 'Cập nhật lịch hẹn thành công!');

        } catch (\Exception $e) {
            \Log::error('Error updating appointment: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi cập nhật lịch hẹn: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate dữ liệu đầu vào
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'gender' => 'required|in:Nam,Nữ,Khác',
                'dateBooking' => 'required|date|after_or_equal:today',
                'timeBooking' => 'required', // Bỏ date_format:H:i
                'description' => 'nullable|string|max:500',
                'address' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date|before:today',
                'doctorId' => 'required|exists:doctor_users,id',
                'statusId' => 'required|in:1,2,3,4'
            ], [
                'name.required' => 'Vui lòng nhập họ tên bệnh nhân',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'dateBooking.required' => 'Vui lòng chọn ngày hẹn',
                'dateBooking.after_or_equal' => 'Ngày hẹn không được là ngày trong quá khứ',
                'timeBooking.required' => 'Vui lòng chọn giờ hẹn',
                'doctorId.required' => 'Thiếu thông tin bác sĩ',
                'doctorId.exists' => 'Bác sĩ không tồn tại',
                'statusId.required' => 'Thiếu trạng thái'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Format thời gian nếu cần
            $timeBooking = $request->timeBooking;
            // Nếu time có độ dài 5 ký tự (HH:MM), thêm :00
            if (strlen($timeBooking) == 5) {
                $timeBooking .= ':00';
            }

            // Kiểm tra lịch làm việc của bác sĩ
            $schedule = Schedule::where('doctorId', $request->doctorId)
                ->where('date', $request->dateBooking)
                ->where('time', $timeBooking)
                ->first();

            if (!$schedule) {
                return redirect()->back()
                    ->with('error', 'Bác sĩ không có lịch làm việc vào khung giờ này')
                    ->withInput();
            }

            // Kiểm tra số lượng booking đã đạt tối đa chưa
            if ($schedule->sumBooking >= $schedule->maxBooking) {
                return redirect()->back()
                    ->with('error', 'Khung giờ này đã đủ số lượng bệnh nhân tối đa')
                    ->withInput();
            }

            // Kiểm tra xem đã có lịch hẹn trùng email hoặc số điện thoại chưa
            $existingAppointment = Patient::where('doctorId', $request->doctorId)
                ->where('dateBooking', $request->dateBooking)
                ->where('timeBooking', $timeBooking)
                ->where(function($query) use ($request) {
                    $query->where('email', $request->email)
                        ->orWhere('phone', $request->phone);
                })
                ->first();

            if ($existingAppointment) {
                return redirect()->back()
                    ->with('error', 'Email hoặc số điện thoại đã được đăng ký cho khung giờ này')
                    ->withInput();
            }

            // Tạo lịch hẹn mới
            $appointment = Patient::create([
                'doctorId' => $request->doctorId,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'dateBooking' => $request->dateBooking,
                'timeBooking' => $timeBooking,
                'description' => $request->description,
                'statusId' => $request->statusId,
                'created_by' => Auth::id(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Cập nhật số lượng booking trong schedule
            $schedule->increment('sumBooking');

            return redirect()->route('admin.manage-bookings')
                ->with('success', 'Tạo lịch hẹn thành công!');

        } catch (\Exception $e) {
            \Log::error('Error creating appointment: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi tạo lịch hẹn: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Cập nhật trạng thái lịch hẹn (AJAX)
     */
    public function updateStatus(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:patients,id',
                'status' => 'required|in:1,2,3,4',
                'reason' => 'nullable|string|max:500'
            ]);

            $appointment = Patient::findOrFail($request->id);
            $oldStatus = $appointment->statusId;
            
            // Cập nhật trạng thái
            $appointment->statusId = $request->status;
            
            // Lưu lý do nếu có
            if ($request->has('reason') && !empty($request->reason)) {
                $appointment->cancellation_reason = $request->reason;
            }
            
            // Xóa lý do nếu không phải trạng thái hủy
            if ($request->status != 4) {
                $appointment->cancellation_reason = null;
            }
            
            $appointment->save();

            // Cập nhật schedule nếu thay đổi từ/xác nhận sang hủy
            if (($oldStatus == 2 && $request->status == 4) || 
                ($oldStatus == 1 && $request->status == 4)) {
                // Giảm số lượng booking trong schedule
                $schedule = Schedule::where('doctorId', $appointment->doctorId)
                    ->where('date', $appointment->dateBooking)
                    ->where('time', $appointment->timeBooking)
                    ->first();
                
                if ($schedule && $schedule->sumBooking > 0) {
                    $schedule->decrement('sumBooking');
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công',
                'status_text' => $this->getStatusText($request->status)['text'],
                'status_class' => $this->getStatusText($request->status)['class']
            ]);

        } catch (\Exception $e) {
            \Log::error('Error updating appointment status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Xóa lịch hẹn
     */
    public function destroy($id)
    {
        try {
            $appointment = Patient::findOrFail($id);
            
            // Giảm số lượng booking trong schedule nếu lịch đã xác nhận
            if ($appointment->statusId == 2) {
                $schedule = Schedule::where('doctorId', $appointment->doctorId)
                    ->where('date', $appointment->dateBooking)
                    ->where('time', $appointment->timeBooking)
                    ->first();
                
                if ($schedule && $schedule->sumBooking > 0) {
                    $schedule->decrement('sumBooking');
                }
            }
            
            $appointment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa lịch hẹn thành công'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error deleting appointment: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa lịch hẹn'
            ], 500);
        }
    }

    /**
     * Lấy danh sách giờ khả dụng của bác sĩ
     */
    public function getAvailableTimes(Request $request)
    {
        try {
            $request->validate([
                'doctorId' => 'required|exists:doctor_users,id',
                'date' => 'required|date'
            ]);

            $availableTimes = Schedule::where('doctorId', $request->doctorId)
                ->where('date', $request->date)
                ->where('maxBooking', '>', \DB::raw('sumBooking'))
                ->get(['time', 'maxBooking', 'sumBooking']);

            return response()->json([
                'success' => true,
                'times' => $availableTimes
            ]);

        } catch (\Exception $e) {
            \Log::error('Error getting available times: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra'
            ], 500);
        }
    }

    // Thêm constructor để chia sẻ phương thức getStatusText
    public function __construct()
    {
        // Chia sẻ phương thức getStatusText với view
        $this->getStatusText = function($statusId) {
            return $this->getStatusText($statusId);
        };
    }
}