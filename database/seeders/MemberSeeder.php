<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberCount = Member::count();
        
        if($memberCount == 0 && app()->environment('production'))
        {
            Member::factory()->count(100)->create();
        }
    }
}
