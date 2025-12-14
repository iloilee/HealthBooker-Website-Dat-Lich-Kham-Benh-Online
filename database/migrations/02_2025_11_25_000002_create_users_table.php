<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('avatar')->nullable();
            $table->enum('gender',['Nam','Nữ','Khác'])->default('Nam');

            $table->foreignId('roleId')->constrained('roles')->cascadeOnDelete();
            
            $table->boolean('isActive')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
