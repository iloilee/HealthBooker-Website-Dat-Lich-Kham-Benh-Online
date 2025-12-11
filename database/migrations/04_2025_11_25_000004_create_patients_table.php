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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctorId')->constrained('doctor_users')->cascadeOnDelete();
            $table->foreignId('statusId')->nullable()->constrained('statuses')->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->date('dateBooking')->nullable();
            $table->time('timeBooking')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('year')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->boolean('isSentForms')->default(false);
            $table->boolean('isTakeCare')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
