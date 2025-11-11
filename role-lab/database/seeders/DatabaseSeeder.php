<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@ilmudata.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@ilmudata.id',
            'password' => Hash::make('password123'),
            'role' => 'manager',
        ]);
        User::create([
            'name' => 'General User',
            'email' => 'User@ilmudata.id',
            'password' => Hash::make('password123'),
            'role' => 'User',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
