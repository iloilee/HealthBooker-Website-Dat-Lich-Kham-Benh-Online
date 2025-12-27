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

    // Thêm appends để tự động thêm image_url vào response
    protected $appends = ['image_url'];

    public function doctors()
    {
        return $this->hasMany(DoctorUser::class, 'specializationId');
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        // Nếu đã là URL đầy đủ
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }
        
        // Nếu là đường dẫn storage (bắt đầu bằng storage/)
        if (strpos($this->image, 'storage/') === 0) {
            return asset($this->image);
        }
        
        // Nếu chỉ là tên file
        return asset('storage/specializations/' . $this->image);
    }

    /**
     * Get a placeholder image if no image exists
     */
    public function getDisplayImageAttribute()
    {
        return $this->image_url ?: $this->getDefaultIcon();
    }

    /**
     * Get default icon based on specialization name
     */
    private function getDefaultIcon()
    {
        $icons = [
            'Tim mạch' => 'cardiology',
            'Da liễu' => 'dermatology',
            'Nhi khoa' => 'child_care',
            'Thần kinh' => 'neurology',
            'Răng hàm mặt' => 'dentistry',
            'Sản phụ khoa' => 'pregnant_woman',
            'Cơ xương khớp' => 'orthopedics',
            'Mắt' => 'ophthalmology',
            'Nha Khoa' => 'dentistry',
            'Tiêu hóa' => 'gastroenterology',
        ];

        foreach ($icons as $keyword => $icon) {
            if (stripos($this->name, $keyword) !== false) {
                return $icon;
            }
        }

        return 'medical_services'; // Icon mặc định
    }

    public function patients()
    {
        return $this->hasManyThrough(Patient::class, DoctorUser::class, 'specializationId', 'doctorId', 'id', 'id');
    }
}

