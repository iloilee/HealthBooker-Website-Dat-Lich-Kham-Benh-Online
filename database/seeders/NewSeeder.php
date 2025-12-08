<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::where('id', 2)->update([
            'phone' => '0918234567',
            'address' => '22 Nguyễn Huệ, Quận 1, TP Hồ Chí Minh',
        ]);

        \App\Models\User::where('id', 3)->update([
            'phone' => '0934675123',
            'address' => '88 Cầu Giấy, Quận Cầu Giấy, Hà Nội',
        ]);

        \App\Models\User::where('id', 4)->update([
            'phone' => '0972346591',
            'address' => '45 Hùng Vương, TP Huế',
        ]);

        \App\Models\User::where('id', 5)->update([
            'phone' => '0908456732',
            'address' => '67 Nguyễn Văn Linh, TP Đà Nẵng',
        ]);

        \App\Models\User::where('id', 6)->update([
            'phone' => '0987621534',
            'address' => '12 Lê Lợi, TP Cần Thơ',
        ]);
        
        \App\Models\User::where('id', 7)->update([
            'phone' => '0947851263',
            'address' => '101 Lê Duẩn, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 8)->update([
            'phone' => '0912345678',
            'address' => '123 Nguyễn Huệ, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 9)->update([
            'phone' => '0935124789',
            'address' => '45 Phạm Thái Bường, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 10)->update([
            'phone' => '0982456712',
            'address' => '78 Trương Định, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 11)->update([
            'phone' => '0903567891',
            'address' => '12 Lý Thường Kiệt, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 12)->update([
            'phone' => '0975681245',
            'address' => '56 Nguyễn Trãi, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 13)->update([
            'phone' => '0968432157',
            'address' => '34 Phan Đình Phùng, TP Vĩnh Long',
        ]);

        \App\Models\User::where('id', 14)->update([
            'phone' => '0923675184',
            'address' => '89 Trần Đại Nghĩa, TP Vĩnh Long',
        ]);

    }
}