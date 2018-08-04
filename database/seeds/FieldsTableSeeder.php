<?php

use Illuminate\Database\Seeder;
	use Illuminate\Support\Carbon;

	class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('field')->insert([
		    ['id' => '1','name' => 'Übermittlung','description' => 'In der Übermittlung werden Übermittlungstechniken geprüft.','MAX_POINTS' => '20'],
		    ['id' => '2','name' => 'Pfadikunde','description' => 'In der Pfadikunde wird das Wissen zur Pfadi und Abteilungen der Umgebung geprüft.','MAX_POINTS' => '20'],
		    ['id' => '3','name' => 'Pioniertechnik','description' => 'In der Pioniertechnik werden Knoten und der umgang mit Material geprüft.','MAX_POINTS' => '20'],
		    ['id' => '4','name' => 'Naturkunde','description' => 'In der Naturkunde müssen Bäume und Wolken erkannt werden.','MAX_POINTS' => '20'],
		    ['id' => '5','name' => 'Samariter','description' => 'Im Samariter werden Themen der ersten Hilfe geprüft.','MAX_POINTS' => '20'],
		    ['id' => '6','name' => 'Kartenkunde','description' => 'In der Kartenkunde wird die Orientierung und das Wissen zu Karten geprüft.','MAX_POINTS' => '20'],
	    ]);
    }
}
