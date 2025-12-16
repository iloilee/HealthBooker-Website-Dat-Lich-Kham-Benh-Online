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
            $table->foreignId('doctorId')->constrained('users')->cascadeOnDelete();
            $table->foreignId('clinicId')->nullable()->constrained('clinics')->nullOnDelete();
            $table->foreignId('specializationId')->constrained('specializations')->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->text('bio')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('certification')->nullable();
            $table->date('date_of_birth')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_users');
    }
};
