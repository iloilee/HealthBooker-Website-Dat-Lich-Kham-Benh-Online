<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'admin - iLoileDev',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456'),
            'roleId'=>1,   
            'isActive'=>1
        ]);

        User::create([
            'name' => 'Dr. Nguyen Van A',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('123456'),
            'roleId' => 2,
            'isActive' => 1
        ]);

        User::create([
            'name' => 'Nguyen Van B',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('123456'),
            'roleId' => 3,
            'isActive' => 1
        ]);
    }
}

