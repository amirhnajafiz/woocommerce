<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a super admin
        User::factory(10)->create([
            'name' => 'super-admin',
            'phone' => '0098',
            'role' => Role::ADMIN()
        ]);
        // Create other users
        User::factory(10)->create();
    }
}
