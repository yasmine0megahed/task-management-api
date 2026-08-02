<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin1@test.com',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user2@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user3@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user4@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user5@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user6@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user7@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user8@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user9@test.com',
                'password' => 'password',
            ],
            [
                'name' => 'User',
                'email' => 'user10@test.com',
                'password' => 'password',
            ],

        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
