<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function doctors()
    {
        return $this->hasMany(DoctorUser::class, 'specializationId');
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Nếu đã là URL đầy đủ
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }
            
            // Nếu là đường dẫn storage
            if (strpos($this->image, 'storage/') === 0) {
                return asset($this->image);
            }
            
            // Nếu chỉ là tên file
            return asset('storage/specializations/' . $this->image);
        }
        
        return null;
    }
}

