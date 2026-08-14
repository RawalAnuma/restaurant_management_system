<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Aarav Sharma',
                'email' => 'aarav@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Saanvi Thapa',
                'email' => 'saanvi@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Rohan Gurung',
                'email' => 'rohan@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Anisha Karki',
                'email' => 'anisha@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Prakash Adhikari',
                'email' => 'prakash@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Nisha Shrestha',
                'email' => 'nisha@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Suman Rai',
                'email' => 'suman@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Aayush Bastola',
                'email' => 'aayush@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Kritika Poudel',
                'email' => 'kritika@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Bishal Khadka',
                'email' => 'bibek@example.com',
                'password' => 'password',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}