<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * Seed a default admin user into the database.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update the admin user. If an admin already exists, its password will be updated.
        User::updateOrCreate(
            [
                'email' => 'admin@assaf.com',
            ],
            [
                'name' => 'Admin',
                // Default password is now "assaf@1234". In production please change!
                'password' => Hash::make('assaf@1234'),
            ]
        );
    }
}