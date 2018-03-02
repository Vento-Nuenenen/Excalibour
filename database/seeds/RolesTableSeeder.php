<?php

use App\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Roles
         *
         */
        if (Role::where('slug', '=', 'admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 5,
            ]);
        }

        if (Role::where('slug', '=', 'Leiter')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Leiter',
                'slug'        => 'leiter',
                'description' => 'Leiter Role',
                'level'       => 1,
            ]);
        }

        if (Role::where('slug', '=', 'tn1e')->first() === null) {
            $userRole = Role::create([
                'name'        => '1. Exer',
                'slug'        => 'tn1e',
                'description' => 'TN Exer 1 Role',
                'level'       => 0,
            ]);
        }

        if (Role::where('slug', '=', 'tn2e')->first() === null) {
            $userRole = Role::create([
                'name'        => '2. Exer',
                'slug'        => 'tn2e',
                'description' => 'TN Exer 2 Role',
                'level'       => 0,
            ]);
        }

        if (Role::where('slug', '=', 'unverified')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Unverified',
                'slug'        => 'unverified',
                'description' => 'Unverified Role',
                'level'       => 0,
            ]);
        }
    }
}
