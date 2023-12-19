<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed roles
        $adminRole = Role::create([
            'slug' => 'admin',
            'name' => 'Administrator',
        ]);

        // Seed a user with the admin role
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
        ]);

        // Assign the admin role to the user
        $adminUser->roles()->sync($adminRole->id);
    }
}
