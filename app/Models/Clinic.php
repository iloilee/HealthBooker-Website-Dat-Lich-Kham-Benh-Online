<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name','address','phone','introductionHTML','introductionMarkdown',
        'description','image'
    ];

    public function doctors()
    {
        return $this->hasMany(DoctorUser::class, 'clinicId');
    }
}

