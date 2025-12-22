<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index('name');
            $table->index('isActive');
        });

        Schema::table('doctor_users', function (Blueprint $table) {
            $table->index('specializationId');
            $table->index('clinicId');
        });

        Schema::table('specializations', function (Blueprint $table) {
            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['isActive']);
        });

        Schema::table('doctor_users', function (Blueprint $table) {
            $table->dropIndex(['specializationId']);
            $table->dropIndex(['clinicId']);
        });

        Schema::table('specializations', function (Blueprint $table) {
            $table->dropIndex(['name']);
        });
    }
};