<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Admin
         */
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
        ]);
        $admin->assignRole('admin');

        /**
         * Manager 
         */
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager@123')
        ]);
        $manager->assignRole('manager');

        /**
         * Test Users
         */
        $role = Role::firstOrCreate(['name' => 'user']);
        User::factory(200)->create()->each(function ($user) use ($role) {
            $user->assignRole('user');
        });
    }
}
