<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\DoctorUser;


class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::orderBy('name', 'asc')->get();
        return view('products.chuyenkhoa', compact('specializations'));
    }

    public function home()
    {
        $specializations = Specialization::orderBy('name', 'asc')->get();
        return view('home', compact('specializations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id, Request $request)
    {
        $specialization = Specialization::findOrFail($id);
        $keyword = $request->input('keyword', '');
        
        $query = DoctorUser::where('specializationId', $id)
            ->whereNull('deleted_at')
            ->with(['user', 'clinic', 'specialization']);
        
        if (!empty($keyword)) {
            $query->whereHas('user', function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%");
            });
        }
        
        $doctors = $query->paginate(6);
        
        return view('specializations.chitiet_chuyenkhoa', compact('specialization', 'doctors', 'keyword'));
    }

    public function search(Request $request, $id)
    {
        return redirect()->route('specializations.show', [
            'id' => $id,
            'keyword' => $request->input('keyword')
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
