<?php

use Illuminate\Database\Seeder;

class ExerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('exer')->insert([
		    ['id' => '1','exer_name' => '1. Exer','escaped_exer_name' => 'exer_one'],
		    ['id' => '2','exer_name' => '2. Exer','escaped_exer_name' => 'exer_two'],
	    ]);
    }
}
