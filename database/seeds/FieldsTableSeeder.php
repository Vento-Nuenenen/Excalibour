<?php

use Illuminate\Database\Seeder;

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
            ['id' => '1', 'field_name' => 'Übermittlung', 'field_description' => 'In der Übermittlung werden Übermittlungstechniken geprüft.', 'MAX_POINTS' => '20'],
            ['id' => '2', 'field_name' => 'Pfadikunde', 'field_description' => 'In der Pfadikunde wird das Wissen zur Pfadi und Abteilungen der Umgebung geprüft.', 'MAX_POINTS' => '20'],
            ['id' => '3', 'field_name' => 'Pioniertechnik', 'field_description' => 'In der Pioniertechnik werden Knoten und der umgang mit Material geprüft.', 'MAX_POINTS' => '20'],
            ['id' => '4', 'field_name' => 'Naturkunde', 'field_description' => 'In der Naturkunde müssen Bäume und Wolken erkannt werden.', 'MAX_POINTS' => '20'],
            ['id' => '5', 'field_name' => 'Samariter', 'field_description' => 'Im Samariter werden Themen der ersten Hilfe geprüft.', 'MAX_POINTS' => '20'],
            ['id' => '6', 'field_name' => 'Kartenkunde', 'field_description' => 'In der Kartenkunde wird die Orientierung und das Wissen zu Karten geprüft.', 'MAX_POINTS' => '20'],
        ]);
    }
}
