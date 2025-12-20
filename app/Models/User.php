<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'name','email','password','address','phone','avatar','gender',
        'roleId','isActive'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'isActive' => 'boolean',
        'date_of_birth' => 'date',
    ];

    public function doctorInfo()
    {
        return $this->hasOne(DoctorUser::class, 'doctorId');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleId');
    }

    public function doctor()
    {
        return $this->hasOne(DoctorUser::class, 'doctorId');
    }

    public function patient()
    {
        return $this->hasMany(Patient::class, 'userId');
    }

    public function extraInfo()
    {
        return $this->hasOne(ExtraInfo::class, 'userId');
    }
}
