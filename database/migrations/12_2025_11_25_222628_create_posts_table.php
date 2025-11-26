<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('contentMarkdown')->nullable();
            $table->text('contentHTML')->nullable();
            $table->foreignId('forDoctorId')->nullable()->constrained('doctor_users')->nullOnDelete();
            $table->foreignId('forSpecializationId')->nullable()->constrained('specializations')->nullOnDelete();
            $table->foreignId('forClinicId')->nullable()->constrained('clinics')->nullOnDelete();
            $table->foreignId('writerId')->constrained('users')->cascadeOnDelete();
            $table->boolean('confirmByDoctor')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
