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
        $user = User::where('email', env('APPLICATION_ADMIN_EMAIL'))->first();

        if(!$user){
            $new_user = User::factory()->create([
                'first_name' => env('APPLICATION_ADMIN_FIRST_NAME'),
                'last_name' => env('APPLICATION_ADMIN_LAST_NAME'),
                'email' => env('APPLICATION_ADMIN_EMAIL'),
                'email_verified_at' => now(),
                'password' => env('APPLICATION_PASSWORD')
            ]);

            $new_user->assignRole('administrator');
        }
    }
}
