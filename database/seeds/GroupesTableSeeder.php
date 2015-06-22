<?php

use Illuminate\Database\Seeder;

class GroupesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('groupes')->truncate();

        $models = array(
            ['title' => 'Intitulé'],
            ['title' => 'Préambule']
        );

        // Uncomment the below to run the seeder
        DB::table('groupes')->insert($models);
    }
}
