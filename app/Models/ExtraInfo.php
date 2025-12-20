<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtraInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patientId','historyBreath','placeId','oldForms','sendForms','moreInfo','blood_type','height','weight'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'placeId');
    }

    public function getBmiAttribute(): ?float
    {
        if ($this->height && $this->weight) {
            $heightInMeters = $this->height / 100;
            return round($this->weight / ($heightInMeters * $heightInMeters), 1);
        }
        return null;
    }

    public function getBmiStatusAttribute(): string
    {
        if (!$this->bmi) return '';

        if ($this->bmi < 18.5) return 'Thiếu cân';
        if ($this->bmi >= 18.5 && $this->bmi <= 22.9) return 'Bình thường';
        if ($this->bmi >= 23 && $this->bmi <= 24.9) return 'Thừa cân';
        if ($this->bmi >= 25 && $this->bmi <= 29.9) return 'Tiền béo phì';
        return 'Béo phì';
    }
}

