<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Thêm tất cả giá trị mới tạm thời
        DB::statement("ALTER TABLE users MODIFY gender ENUM('male','female','other','Nam','Nữ','Khác') NULL;");

        // 2. Cập nhật dữ liệu
        DB::table('users')->where('gender', 'male')->update(['gender' => 'Nam']);
        DB::table('users')->where('gender', 'female')->update(['gender' => 'Nữ']);
        DB::table('users')->where('gender', 'other')->update(['gender' => 'Khác']);

        // 3. Giảm ENUM về giá trị mới
        DB::statement("ALTER TABLE users MODIFY gender ENUM('Nam','Nữ','Khác') NULL;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert lại dữ liệu tiếng Anh
        DB::table('users')->where('gender', 'Nam')->update(['gender' => 'male']);
        DB::table('users')->where('gender', 'Nữ')->update(['gender' => 'female']);
        DB::table('users')->where('gender', 'Khác')->update(['gender' => 'other']);

        // Đổi enum về cũ
        DB::statement("ALTER TABLE users MODIFY gender ENUM('male','female','other') NULL;");
    }
};
