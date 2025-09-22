<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin default
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // ganti sesuai kebutuhan
            'role' => 'admin', // sesuai ENUM
        ]);

        // User default
        User::create([
            'name' => 'Default User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Instruktur 1',
            'email' => 'instruktur1@example.com',
            'password' => Hash::make('password'),
            'role' => 'instruktur',
        ]);

        User::create([
            'name' => 'Instruktur 2',
            'email' => 'instruktur2@example.com',
            'password' => Hash::make('password'),
            'role' => 'instruktur',
        ]);
    }
}
