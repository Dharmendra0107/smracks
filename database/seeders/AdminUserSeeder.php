<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@smracks.in'],
            [
                'name' => 'SM Racks Admin',
                'password' => Hash::make('admin@smracks'),
                'email_verified_at' => now(),
            ]
        );
    }
}