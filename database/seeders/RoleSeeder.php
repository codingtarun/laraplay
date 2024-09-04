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
        /**
         * Admin role
         */
        $adminRole = Role::create([
            'name' => 'admin'
        ]);
        /**
         * Admin role permissions
         */
        $adminRole->syncPermissions([
            'create user',
            'viewAny user',
            'view user',
            'update user',
            'destroy user'
        ]);

        /**
         * Manager role
         */
        $managerRole = Role::create([
            'name' => 'manager'
        ]);
        /**
         * Manager role permissions
         */
        $managerRole->syncPermissions([
            'viewAny user',
            'view user',
            'update user',
        ]);

        /**
         * User role
         */
        $userRole = Role::create([
            'name' => 'user',
        ]);
        /**
         * Manager role permissions
         */
        $userRole->syncPermissions([
            'view user',
            'update user',
        ]);
    }
}
