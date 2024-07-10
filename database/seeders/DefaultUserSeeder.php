<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'user@demo.com')->first();
        echo isset($user);

        if(!$user){
            User::factory()->create([
                'name' => 'User Demo',
                'email' => 'user@demo.com',
                'email_verified_at' => now(),
                'password' => 'user@!democom', // Use a secure password for production
            ]);
        }
    }
}
