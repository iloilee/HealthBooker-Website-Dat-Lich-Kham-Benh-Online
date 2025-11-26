<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtraInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patientId','historyBreath','placeId','oldForms','sendForms','moreInfo'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'placeId');
    }
}

