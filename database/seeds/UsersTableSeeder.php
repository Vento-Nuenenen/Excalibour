<?php

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $faker = Faker\Factory::create();
        $profile = new Profile();
        $adminRole = Role::whereName('Admin')->first();
        $userRole = Role::whereName('User')->first();
        $tnRole = Role::whereName('tn1e')->first();

        // Seed test admin
        $seededAdminEmail = 'admin@admin.com';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'scoutname'                      => $faker->userName,
                'first_name'                     => $faker->firstName,
                'last_name'                      => $faker->lastName,
                'email'                          => $seededAdminEmail,
                'password'                       => Hash::make('password'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_confirmation_ip_address' => $faker->ipv4,
                'admin_ip_address'               => $faker->ipv4,
            ]);

            $user->profile()->save($profile);
            $user->attachRole($adminRole);
=======
        // Seed test admin
        $seededAdminEmail = 'admin@exer.ch';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'scout_name'                     => 'Admin',
                'first_name'                     => 'Admin',
                'last_name'                      => 'Admin',
                'email'                          => $seededAdminEmail,
                'password'                       => Hash::make('password'),
            ]);

>>>>>>> master
            $user->save();
        }

        // Seed test user
        $user = User::where('email', '=', 'user@user.com')->first();
        if ($user === null) {
            $user = User::create([
<<<<<<< HEAD
                'scoutname'                      => $faker->userName,
                'first_name'                     => $faker->firstName,
                'last_name'                      => $faker->lastName,
                'email'                          => 'user@user.com',
                'password'                       => Hash::make('password'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => $faker->ipv4,
                'signup_confirmation_ip_address' => $faker->ipv4,
            ]);

            $user->profile()->save(new Profile());
            $user->attachRole($userRole);
            $user->save();
        }

        // Seed test user
        $user = User::where('email', '=', 'tn@tn.com')->first();
        if ($user === null) {
            $user = User::create([
                'scoutname'                      => $faker->userName,
                'first_name'                     => $faker->firstName,
                'last_name'                      => $faker->lastName,
                'email'                          => 'tn@tn.com',
                'password'                       => Hash::make('password'),
                'token'                          => str_random(64),
                'loginable'                      => false,
                'activated'                      => true,
                'signup_ip_address'              => $faker->ipv4,
                'signup_confirmation_ip_address' => $faker->ipv4,
            ]);

            $user->profile()->save(new Profile());
            $user->attachRole($tnRole);
=======
                'scout_name'                     => 'Vento',
                'first_name'                     => 'Caspar',
                'last_name'                      => 'Brenneisen',
                'email'                          => 'caspar.brenneisen@protonmail.ch',
                'password'                       => Hash::make('password'),
                'FK_GRP'                         => 4,
            ]);

>>>>>>> master
            $user->save();
        }
    }
}
