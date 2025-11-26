<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable, AuthenticatableTrait;

    protected $fillable = [
        'name','email','password','address','phone','avatar','gender',
        'roleId','isActive'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleId');
    }

    public function doctor()
    {
        return $this->hasOne(DoctorUser::class, 'doctorId');
    }
}

