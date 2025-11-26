<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title','contentMarkdown','contentHTML','forDoctorId',
        'forSpecializationId','forClinicId','writerId','confirmByDoctor','image'
    ];

    public function doctor()
    {
        return $this->belongsTo(DoctorUser::class, 'forDoctorId');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'forSpecializationId');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'forClinicId');
    }

    public function writer()
    {
        return $this->belongsTo(User::class, 'writerId');
    }
}

