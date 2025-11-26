<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'doctorId','date','time','maxBooking','sumBooking'
    ];

    public function doctor()
    {
        return $this->belongsTo(DoctorUser::class, 'doctorId');
    }
}

