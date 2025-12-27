<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctor_users', function (Blueprint $table) {
            $table->id();                
            $table->foreignId('doctorId')->unique()->constrained('users')->cascadeOnDelete();
            $table->foreignId('clinicId')->nullable()->constrained('clinics')->nullOnDelete();
            $table->foreignId('specializationId')->constrained('specializations')->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('certification')->nullable();
            $table->enum('work_status', ['online', 'offline'])->default('online');
            $table->date('date_of_birth')->nullable();
            $table->decimal('average_rating', 3, 2)->default(5.00)->comment('Điểm đánh giá trung bình từ bảng feedbacks');
            $table->unsignedInteger('total_feedbacks')->default(0)->comment('Tổng số đánh giá');
            $table->timestamp('last_calculated_at')->nullable()->comment('Thời điểm cập nhật rating lần cuối');
            $table->index('average_rating', 'doctor_users_average_rating_index');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_users');
    }
};
