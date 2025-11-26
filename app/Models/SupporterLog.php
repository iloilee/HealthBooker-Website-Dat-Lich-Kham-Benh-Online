<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupporterLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['patientId','supporterId','content'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }

    public function supporter()
    {
        return $this->belongsTo(User::class, 'supporterId');
    }
}

