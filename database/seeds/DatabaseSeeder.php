<?php

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
=======
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            Model::unguard();

            $this->call(FieldsTableSeeder::class);
            $this->call(GroupsTableSeeder::class);
            $this->call(ExerTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(ParticipationsTableSeeder::class);

            Model::reguard();
        }
>>>>>>> master
    }
