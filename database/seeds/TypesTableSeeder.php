<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('types')->truncate();

        $models = array(
            ['title' => 'Numéro'],
            ['title' => 'Forme de l\'acte'],
            ['title' => 'Objet'],
            ['title' => 'Titre court'],
            ['title' => 'Sigle'],
            ['title' => 'Date d\'adoption'],
            ['title' => 'Organe'],
            ['title' => 'Visa, Base cst.'],
            ['title' => 'Réf. au Message du CF'],
            ['title' => 'Verbe'],
        );

        // Uncomment the below to run the seeder
        DB::table('types')->insert($models);
    }
}