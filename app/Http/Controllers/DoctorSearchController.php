<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorUser;
use App\Models\Specialization;

class DoctorSearchController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('products.index', compact('specializations'));
    }

    public function search(Request $request)
    {
        $query = DoctorUser::with(['user', 'specialization', 'clinic']);

        // Tìm kiếm theo từ khóa (tên bác sĩ)
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->whereHas('user', function($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%");
            })->orWhereHas('specialization', function($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%");
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

        // Giới hạn 5 kết quả cho dropdown, nhiều hơn cho trang đầy đủ
        $perPage = $request->ajax() ? 5 : 12;
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
