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
        $specializations = Cache::remember('specializations', 3600, function () {
            return Specialization::select('id', 'name')->get();
        });
        return view('products.index', compact('specializations'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $perPage = $request->ajax() ? 5 : 12;

        $query = DoctorUser::query()
            ->select('doctor_users.*') 
            ->with([
                'user:id,name,avatar', 
                'specialization:id,name', 
                'clinic:id,name,address' 
            ])
            ->whereHas('user', function($q) {
                $q->where('isActive', true);
            });

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
        if ($request->filled('specialization')) {
            $query->where('specializationId', $request->specialization);
        }

        if ($request->filled('clinic')) {
            $query->where('clinicId', $request->clinic);
        }

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