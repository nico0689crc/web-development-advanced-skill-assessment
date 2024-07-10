<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User Demo',
            'email' => 'user@demo.com',
            'email_verified_at' => now(),
            'password' => 'user@!democom', // Use a secure password for production
        ]);
    }
}
