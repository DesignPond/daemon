<?php

use Illuminate\Database\Seeder;

class ProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('projets')->truncate();

        $models = array(
            ['title' => 1, 'user_id' => 1]
        );

        // Uncomment the below to run the seeder
        DB::table('projets')->insert($models);
    }
}
