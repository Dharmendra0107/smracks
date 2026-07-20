<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Creates (or updates) the one admin login for the panel.
     *
     * IMPORTANT: change this password immediately after your first
     * login, either via `php artisan tinker` running:
     *   User::first()->update(['password' => Hash::make('new-password-here')]);
     * or by building a simple "change password" form later.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@smracks.in'],
            [
                'name' => 'SM Racks Admin',
                'password' => Hash::make('ChangeThisPassword123!'),
                'email_verified_at' => now(),
            ]
        );
    }
}