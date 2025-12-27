<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Models\DoctorUser;
use App\Models\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Xử lý filter thời gian
        $filter = $request->get('filter', 'month');
        $startDate = null;
        $endDate = null;
        
        switch ($filter) {
            case 'today':
                $startDate = Carbon::today();
                $endDate = Carbon::today()->endOfDay();
                break;
            case 'week':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'custom':
                $startDate = $request->get('start_date') 
                    ? Carbon::parse($request->get('start_date'))
                    : Carbon::now()->startOfMonth();
                $endDate = $request->get('end_date')
                    ? Carbon::parse($request->get('end_date'))
                    : Carbon::now()->endOfMonth();
                break;
        }
        
        // Lấy thống kê chính
        $stats = $this->getMainStats($startDate, $endDate);
        
        // Lấy thống kê cuộc hẹn theo tuần
        $weeklyAppointments = $this->getWeeklyAppointments();
        
        // Lấy thống kê chuyên khoa phổ biến
        $specializationStats = $this->getSpecializationStats($startDate, $endDate);
        
        // Lấy danh sách bác sĩ tiêu biểu
        $topDoctors = $this->getTopDoctors($startDate, $endDate);
        
        return view('admin.manage-reports', compact(
            'stats',
            'weeklyAppointments',
            'specializationStats',
            'topDoctors',
            'filter',
            'startDate',
            'endDate'
        ));
    }
    
    private function getMainStats($startDate, $endDate)
    {
        // Tổng cuộc hẹn
        $totalAppointments = Patient::whereBetween('created_at', [$startDate, $endDate])->count();
        
        // Tổng cuộc hẹn tháng trước để tính %
        $previousStartDate = Carbon::parse($startDate)->subMonth();
        $previousEndDate = Carbon::parse($endDate)->subMonth();
        $previousAppointments = Patient::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        
        $appointmentGrowth = $previousAppointments > 0 
            ? (($totalAppointments - $previousAppointments) / $previousAppointments) * 100 
            : ($totalAppointments > 0 ? 100 : 0);
        
        // Bệnh nhân mới (users có role bệnh nhân)
        $newPatients = User::where('roleId', 3) // Giả sử roleId 3 là bệnh nhân
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
            
        $previousPatients = User::where('roleId', 3)
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->count();
            
        $patientGrowth = $previousPatients > 0
            ? (($newPatients - $previousPatients) / $previousPatients) * 100
            : ($newPatients > 0 ? 100 : 0);
        
        // Doanh thu (cần có bảng payments hoặc thêm field vào patients)
        // Tạm thời giả định mỗi cuộc hẹn có cost là 500,000 VND
        $revenue = $totalAppointments * 500000; // Giả sử mỗi cuộc hẹn 500k
        $previousRevenue = $previousAppointments * 500000;
        
        $revenueGrowth = $previousRevenue > 0
            ? (($revenue - $previousRevenue) / $previousRevenue) * 100
            : ($revenue > 0 ? 100 : 0);
        
        // Đánh giá trung bình (cần có bảng reviews)
        // Tạm thời hardcode
        $averageRating = 4.8;
        $totalReviews = 1120;
        
        return [
            'totalAppointments' => $totalAppointments,
            'appointmentGrowth' => $appointmentGrowth,
            'newPatients' => $newPatients,
            'patientGrowth' => $patientGrowth,
            'revenue' => $revenue,
            'revenueGrowth' => $revenueGrowth,
            'averageRating' => $averageRating,
            'totalReviews' => $totalReviews,
        ];
    }
    
    private function getWeeklyAppointments()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $days = [];
        
        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $count = Patient::whereDate('dateBooking', $date)->count();
            $days[] = [
                'day' => $date->format('D'),
                'dayName' => $this->getVietnameseDayName($date->dayOfWeek),
                'count' => $count,
                'percentage' => min(100, ($count / max(100, 100)) * 100), // Scale cho biểu đồ
            ];
        }
        
        return $days;
    }
    
    private function getVietnameseDayName($dayOfWeek)
    {
        $days = ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'];
        return $days[$dayOfWeek];
    }
    
    private function getSpecializationStats($startDate, $endDate)
    {
        $stats = Specialization::withCount(['patients' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('patients.created_at', [$startDate, $endDate]);
        }])->get();
        
        $total = $stats->sum('patients_count');
        
        return $stats->map(function($specialization) use ($total) {
            return [
                'name' => $specialization->name,
                'count' => $specialization->patients_count,
                'percentage' => $total > 0 ? ($specialization->patients_count / $total) * 100 : 0,
            ];
        })->sortByDesc('percentage')->take(5);
    }
    
    private function getTopDoctors($startDate, $endDate)
    {
        $doctors = DoctorUser::with(['user', 'specialization'])
            ->withCount(['patients' => function($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->orderByDesc('patients_count')
            ->take(10)
            ->get();
        
        return $doctors->map(function($doctor) {
            // Tính doanh thu giả định
            $revenue = $doctor->patients_count * 500000;
            
            return [
                'id' => $doctor->id,
                'name' => $doctor->user->name,
                'initials' => $this->getInitials($doctor->user->name),
                'specialization' => $doctor->specialization->name,
                'appointments_count' => $doctor->patients_count,
                'rating' => 4.5 + (rand(0, 40) / 100), // Giả định rating
                'revenue' => $revenue,
            ];
        });
    }
    
    private function getInitials($name)
    {
        $words = explode(' ', $name);
        $initials = '';
        
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
            if (strlen($initials) >= 2) break;
        }
        
        return $initials;
    }
    
    public function export(Request $request)
    {
        $filter = $request->get('filter', 'month');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        
        // Tạo file Excel hoặc PDF
        // Ở đây tạm thời redirect về trang báo cáo
        return redirect()->route('admin.manage-reports')
            ->with('success', 'Chức năng xuất báo cáo đang được phát triển');
    }
}