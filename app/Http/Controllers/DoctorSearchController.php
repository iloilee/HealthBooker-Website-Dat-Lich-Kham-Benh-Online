<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorUser;
use App\Models\Specialization;
use Illuminate\Support\Facades\Cache;

class DoctorSearchController extends Controller
{
    public function index()
    {
        // Cache danh sách chuyên khoa (chỉ load 1 lần)
        $specializations = Cache::remember('specializations', 3600, function () {
            return Specialization::select('id', 'name')->get();
        });
        
        return view('products.index', compact('specializations'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $perPage = $request->ajax() ? 5 : 12;

        // Query tối ưu: chỉ select cột cần thiết
        $query = DoctorUser::query()
            ->select('doctor_users.*') // Chỉ lấy cột cần
            ->with([
                'user:id,name,avatar', // Chỉ lấy 3 cột từ user
                'specialization:id,name', // Chỉ lấy 2 cột từ specialization
                'clinic:id,name,address' // Chỉ lấy 3 cột từ clinic
            ])
            ->whereHas('user', function($q) {
                $q->where('isActive', true); // Chỉ lấy bác sĩ active
            });

        // Tìm kiếm theo từ khóa
        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->whereHas('user', function($subQ) use ($keyword) {
                    $subQ->where('name', 'like', "%{$keyword}%");
                })
                ->orWhereHas('specialization', function($subQ) use ($keyword) {
                    $subQ->where('name', 'like', "%{$keyword}%");
                });
            });
        }

        // Lọc theo chuyên khoa
        if ($request->filled('specialization')) {
            $query->where('specializationId', $request->specialization);
        }

        // Lọc theo phòng khám
        if ($request->filled('clinic')) {
            $query->where('clinicId', $request->clinic);
        }

        // Sắp xếp: ưu tiên bác sĩ có nhiều kinh nghiệm
        $query->orderByDesc('experience_years')->orderBy('doctorId');

        $doctors = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => $doctors->total(),
                'html' => view('partials.doctor-dropdown', compact('doctors'))->render()
            ]);
        }

        return view('search-results', compact('doctors'));
    }
}