<?php

use Illuminate\Database\Seeder;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('structures')->truncate();

        $models = array(
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 1, 'groupe_id' => 1, 'rang' => 1, 'content' => '251'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 2, 'groupe_id' => 1, 'rang' => 2, 'content' => 'Loi fédérale'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 3, 'groupe_id' => 1, 'rang' => 3, 'content' => 'sur les cartels et autres restrictions à la concurrence'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 4, 'groupe_id' => 1, 'rang' => 4, 'content' => 'Loi sur les cartels'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 5, 'groupe_id' => 1, 'rang' => 5, 'content' => 'LCart)'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 6, 'groupe_id' => 1, 'rang' => 6, 'content' => 'du 6 octobre 1995 (Etat le 1er décembre 2014)'],

            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 7,  'groupe_id' => 2, 'rang' => 7,  'content'   => 'L\'Assemblée fédérale de la Confédération suisse,'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 8,  'groupe_id' => 2, 'rang' => 8,  'content'   => 'vu les art. 27, al. 1, 961, 97, al. 2, et 1222 de la Constitution 3, 4 en application des dispositions du droit de la concurrence des accords internationaux,'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 9,  'groupe_id' => 2, 'rang' => 9,  'content'   => 'vu le message du Conseil fédéral du 23 novembre 1994'],
            ['projet_id' => 1, 'user_id' => 1, 'type_id' => 10, 'groupe_id' => 2, 'rang' => 10, 'content' => 'arrête:'],

        );

        // Uncomment the below to run the seeder
        DB::table('structures')->insert($models);
    }
}
