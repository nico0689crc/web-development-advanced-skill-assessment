<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolsAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'create members']);
        Permission::firstOrCreate(['name' => 'view members']);
        Permission::firstOrCreate(['name' => 'edit members']);
        Permission::firstOrCreate(['name' => 'delete members']);

        $administratorRole = Role::firstOrCreate(['name' => 'administrator']);
        $administratorRole->givePermissionTo(Permission::all());

        $memberRole = Role::firstOrCreate(['name' => 'member']);
        $memberRole->givePermissionTo('view members');
        $memberRole->givePermissionTo('edit members');
    }
}
