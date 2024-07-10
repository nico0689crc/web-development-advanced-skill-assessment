<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Member;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id');
        });

        // Ensure existing records have a UUID
        Member::chunk(100, function ($members) {
            foreach ($members as $member) {
                $member->uuid = (string) Str::uuid();
                $member->save();
            }
        });

        Schema::table('members', function (Blueprint $table) {
            $table->uuid('uuid')->change();
            $table->unique('uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropUnique(['uuid']);
            $table->dropColumn('uuid');
        });
    }
};
