<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('extra_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId')->nullable()->constrained('patients')->cascadeOnDelete();
            $table->text('historyBreath')->nullable();
            $table->foreignId('placeId')->nullable()->constrained('places')->nullOnDelete();
            $table->text('oldForms')->nullable();
            $table->text('sendForms')->nullable();
            $table->text('moreInfo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('extra_infos');
    }
};
