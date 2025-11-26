<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'doctorId','statusId','name','phone','dateBooking','timeBooking',
        'email','gender','year','address','description','isSentForms','isTakeCare'
    ];

    public function doctor()
    {
        return $this->belongsTo(DoctorUser::class, 'doctorId');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statusId');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'patientId');
    }

    public function extraInfo()
    {
        return $this->hasOne(ExtraInfo::class, 'patientId');
    }
}

