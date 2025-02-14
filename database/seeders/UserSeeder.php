<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'kuro',
                'fullname' => 'Kuro No Kenshi',
                'email' => 'kuro@gmail.com',
                'password' => Hash::make('12345'),
                'isAdmin' => true,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'kibo',
                'fullname' => 'Kibo No Uta',
                'email' => 'kibo@gmail.com',
                'password' => Hash::make('12345'),
                'isAdmin' => false, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'shiro',
                'fullname' => 'Shiro No Neko',
                'email' => 'shiro@gmail.com',
                'password' => Hash::make('12345'),
                'isAdmin' => false, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
