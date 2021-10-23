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
        User::factory(1)->create([
            'name' => 'super-admin',
            'phone' => '09155232106',
            'role' => Role::SUPER_ADMIN()
        ]);
        // Create other users
        User::factory(10)->create();
    }
}
