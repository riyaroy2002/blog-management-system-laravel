<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name'  => 'Super',
            'last_name'   => 'Admin',
            'email'       => 'bms@yopmail.com',
            'contact_no'  => '8888888888',
            'password'    => 'Password123#',
            'is_verified' => 1,
            'is_block'    => 0,
            'role'        => 'admin'
        ]);

        User::create([
            'first_name'  => 'User',
            'last_name'   => '01',
            'email'       => 'user01@yopmail.com',
            'contact_no'  => '8888888889',
            'password'    => 'Password123#',
            'is_verified' => 1,
            'is_block'    => 0,
            'role'        => 'user'
        ]);

        User::create([
            'first_name'  => 'Author',
            'last_name'   => '01',
            'email'       => 'author01@yopmail.com',
            'contact_no'  => '8888888887',
            'password'    => 'Password123#',
            'is_verified' => 1,
            'is_block'    => 0,
            'role'        => 'author'
        ]);
    }
}
