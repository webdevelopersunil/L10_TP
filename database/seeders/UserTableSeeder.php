<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'      =>  'Admin',
                'email'     =>  'admin@gmail.com',
                'password'  =>  'admin@123',
            ],
            [
                'name'      =>  'User',
                'email'     =>  'user@gmail.com',
                'password'  =>  'user@123',
            ],
        ];

        foreach ($users as $user) {

            User::create($user);
        }
    }
}
