<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
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
        //
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
        $appointment->cancellation_reason = $validated['reason']; // Lưu lý do
        $appointment->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Đã hủy lịch hẹn thành công'
        ]);
    }
}
