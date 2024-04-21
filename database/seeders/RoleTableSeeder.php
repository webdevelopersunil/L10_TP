<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles and their corresponding names
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'User'],
            // Add more roles as needed
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}
