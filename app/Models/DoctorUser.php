<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'doctorId','clinicId','specializationId','phone','photo','avatar',
        'bio','experience_years','certification','date_of_birth'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctorId');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specializationId');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinicId');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'doctorId');
    }

    public function scopeActive($query)
    {
        return $query->whereHas('user', function($q) {
            $q->where('isActive', true);
        });
    }
}

