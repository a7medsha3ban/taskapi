<?php

namespace Users\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Users\Models\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name'=>'Ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>Hash::make('123456')
        ]);

        User::create([
            'name'=>'Hesham',
            'email'=>'Hesham@gmail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
