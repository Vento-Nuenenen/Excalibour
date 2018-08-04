<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group')->insert([
            ['id' => '1', 'name' => 'Ritter Berchtold', 'FK_FLD' => null],
            ['id' => '2', 'name' => 'Dracheburg', 'FK_FLD' => null],
            ['id' => '3', 'name' => 'Virus', 'FK_FLD' => null],
            ['id' => '4', 'name' => 'Nünenen', 'FK_FLD' => '3'],
            ['id' => '5', 'name' => 'Wendelsee', 'FK_FLD' => null],
        ]);
    }
}
