<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsList = [
            // User Model Permissions
            [
                'name' => 'create user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'viewAny user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'destroy user',
                'guard_name' => 'web',
            ]
        ];

        DB::table('permissions')->insert($permissionsList);
    }
}
