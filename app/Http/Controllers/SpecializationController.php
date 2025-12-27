<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\DoctorUser;
use Illuminate\Support\Facades\Storage;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::orderBy('name', 'asc')->get();
        return view('specializations.chuyenkhoa', compact('specializations'));
    }

    public function home()
    {
        $specializations = Specialization::orderBy('name', 'asc')->get();
        return view('home', compact('specializations'));
    }

    public function getAll()
    {
        $specializations = Specialization::withCount(['doctors' => function($query) {
            $query->whereNull('deleted_at');
        }])->orderBy('created_at', 'desc')->get();
        
        return response()->json($specializations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        try {
            $data = $request->only(['name', 'description']);
            
            if ($request->hasFile('image')) {
                // Lưu trực tiếp đường dẫn ảnh
                $imagePath = $request->file('image')->store('specializations', 'public');
                $data['image'] = 'storage/' . $imagePath; // Đường dẫn trực tiếp
            }
            
            $specialization = Specialization::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Thêm chuyên khoa thành công',
                'data' => $specialization
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
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

    public function edit($id)
    {
        $specialization = Specialization::findOrFail($id);
        return response()->json($specialization);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        try {
            $specialization = Specialization::findOrFail($id);
            $data = $request->only(['name', 'description']);
            
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu tồn tại
                if ($specialization->image && file_exists(public_path($specialization->image))) {
                    unlink(public_path($specialization->image));
                }
                
                // Lưu ảnh mới
                $imagePath = $request->file('image')->store('specializations', 'public');
                $data['image'] = 'storage/' . $imagePath;
            }
            
            $specialization->update($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật chuyên khoa thành công',
                'data' => $specialization
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $specialization = Specialization::findOrFail($id);
            
            // Kiểm tra xem có bác sĩ nào thuộc chuyên khoa này không
            $doctorCount = DoctorUser::where('specializationId', $id)->count();
            if ($doctorCount > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể xóa chuyên khoa này vì có ' . $doctorCount . ' bác sĩ đang thuộc chuyên khoa này.'
                ], 400);
            }
            
            // Xóa ảnh nếu tồn tại
            if ($specialization->image && file_exists(public_path($specialization->image))) {
                unlink(public_path($specialization->image));
            }
            
            $specialization->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa chuyên khoa thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function search(Request $request, $id)
    {
        return redirect()->route('specializations.show', [
            'id' => $id,
            'keyword' => $request->input('keyword')
        ]);
    }
}