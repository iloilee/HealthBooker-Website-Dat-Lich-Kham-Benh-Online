<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'feedbacks';
    
    protected $fillable = [
        'doctorId','patientId','timeBooking','dateBooking','content','rating'
    ];

    public function doctor()
    {
        return $this->belongsTo(DoctorUser::class, 'doctorId');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }
}

