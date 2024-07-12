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
        $userName = env('APPLICATION_USERNAME');
        $email = env('APPLICATION_EMAIL');
        $password = env('APPLICATION_PASSWORD');

        $user = User::where('email', $email)->first();

        if(!$user){
            User::factory()->create([
                'name' => $userName,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => $password
            ]);
        }
    }
}
