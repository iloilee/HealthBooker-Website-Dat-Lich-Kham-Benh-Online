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
        Schema::create('supporterlogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId')->nullable()->constrained('patients')->cascadeOnDelete();
            $table->foreignId('supporterId')->nullable()->constrained('users')->nullOnDelete();
            $table->string('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporterlogs');
    }
};
