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
            'name'=>'Dr. Nguyễn An',
            'email'=>'doctor4@gmail.com',
            'password'=>Hash::make('123456'),
            'gender'=> 'male',
            'roleId'=>2,   
            'avatar'=>'https://media.istockphoto.com/id/2207618864/photo/portrait-of-male-medical-professional-in-lab-coat-with-hands-in-pockets-standing-on-white.jpg?s=612x612&w=0&k=20&c=oIxLcIbVlAN0ZLRQ9fGaQoTNOUX19TcEQHiNmo6D_gY=',
            'isActive'=>1
        ]);

        User::create([
            'name'=>'Dr. Lê Bảo',
            'email'=>'doctor5@gmail.com',
            'password'=>Hash::make('123456'),
            'gender'=> 'male',
            'roleId'=>2,   
            'avatar'=>'https://media.istockphoto.com/id/1418258989/photo/professional-doctor-in-white-uniform-posing-on-camera-with-clipboard.jpg?s=612x612&w=0&k=20&c=jgyohIi6aFuX6kUdatVyg0ETzUlc-U4i-HGb-JMwFxs=',
            'isActive'=>1
        ]);

        User::create([
            'name'=>'Dr. Trần Cường',
            'email'=>'doctor6@gmail.com',
            'password'=>Hash::make('123456'),
            'gender'=> 'male',
            'roleId'=>2,   
            'avatar'=>'https://media.istockphoto.com/id/1635982957/photo/happy-asian-man-doctor-and-arms-crossed-in-confidence-of-healthcare-consultant-at-the-office.jpg?s=612x612&w=0&k=20&c=h6afWku3v9XVNVtZ86zYn0nIH8lOw-3v4rdIIt_VwA8=',
            'isActive'=>1
        ]);

        User::create([
            'name'=>'Dr. Phạm Di',
            'email'=>'doctor7@gmail.com',
            'password'=>Hash::make('123456'),
            'gender'=> 'male',
            'roleId'=>2,   
            'avatar'=>'https://www.shutterstock.com/image-photo/portrait-caucasian-female-doctor-standing-600nw-2557673827.jpg',
            'isActive'=>1
        ]);

        User::create([
            'name'=>'Dr. Nguyễn Hạnh',
            'email'=>'doctor8@gmail.com',
            'password'=>Hash::make('123456'),
            'gender'=> 'male',
            'roleId'=>2,   
            'avatar'=>'https://www.shutterstock.com/image-photo/portrait-happy-asian-female-doctor-260nw-2590900925.jpg',
            'isActive'=>1
        ]);
    }
}

