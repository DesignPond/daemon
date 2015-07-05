<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('boxes')->truncate();

        $faker = Faker::create();

        for( $x = 1 ; $x < 11; $x++ )
        {
            $models[] =  [
                'top'     => $faker->randomNumber(3),
                'left'    => $faker->randomNumber(2),
                'no'      => $x,
                'width'   => $faker->randomNumber(3),
                'height'  => $faker->randomNumber(2),
                'couleur' => $faker->hexcolor,
                'text'    => $faker->sentence,
                'border'  => $faker->hexcolor,
                'zindex'  => 1,
            ];
        }

        // Uncomment the below to run the seeder
        DB::table('boxes')->insert($models);
    }
}
