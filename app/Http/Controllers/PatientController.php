<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
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
    public function show()
    {
        $user =  auth()->user();

        $patient = Patient::with(['extraInfo', 'doctor', 'status', 'user'])
            ->where('email', $user->email)
            ->firstOrFail();

        // Tạo mã bệnh nhân (ví dụ: HB-2024-{id})
        $patientCode = 'HB-' . date('Y') . '-' . str_pad($patient->id, 4, '0', STR_PAD_LEFT);

        return view('patients.hososuckhoe', compact('patient', 'patientCode', 'user'));
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
}
