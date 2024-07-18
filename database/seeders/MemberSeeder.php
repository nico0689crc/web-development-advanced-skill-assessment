<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\User;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberCount = Member::count();
        
        if($memberCount == 0)
        {
            $user = User::create([
                'first_name' => env('APPLICATION_MEMBER_FIRST_NAME'),
                'last_name' => env('APPLICATION_MEMBER_LAST_NAME'),
                'email' => env('APPLICATION_MEMBER_EMAIL'),
                'password' => Hash::make(env('APPLICATION_PASSWORD')),
            ]);

            $member = new Member;
            $member->age = 36;
            $member->phone = '+1 (830) 370-4488';
            $member->address = '7916 Johnson Alley East Enoch, IN 17456';
            $member->professional_summary = 'Dolorem nulla modi illum amet doloribus corporis voluptatem. Ullam minima est inventore.';
            $member->uuid = Str::uuid();
            $member->user_id = $user->id;
            $member->save();

            Member::factory()->count(100)->create();
        }
    }
}
