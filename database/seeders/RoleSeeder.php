<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);
        $adminRole->syncPermissions([
            'create user',
            'viewAny user',
            'view user',
            'update user',
            'destroy user'
        ]);
    }
}
