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
            ['gabarit' => 'arret', 'title' => 'Numéro', 'description' => 'Chaque acte inclut dans le recueil dispose d\'un numéro RS correspondant à sa position dans le classement thématique'],
            ['gabarit' => 'arret', 'title' => 'Forme de l\'acte', 'description' => 'L\'intitulé indique le type d\'acte normatif dont il s\'agit selon la classification propre à l\'ordre constitutionnel de l\'État (p.ex. une loi, un arrêté, une ordonnance, un décret, un règlement, une convention, un protocole)'],
            ['gabarit' => 'arret', 'title' => 'Objet',  'description' => 'Détermination de l\'objet'],
            ['gabarit' => 'arret', 'title' => 'Titre court',  'description' => 'Pour citer plus aisément un acte législatif, on peut lui donner un titre court. Il est inscrit dans le RS, entre parenthèses, sous le titre complet.'],
            ['gabarit' => 'arret', 'title' => 'Sigle',  'description' => 'On parle tantôt de sigle, tantôt d\'abréviation (« die Abkürzung » ; «l\'abbreviazione »). Les sigles choisis ont d\'abord été le fait de la pratique; la diversité qui en résultait était source de confusions. C\'est pourquoi le Tribunal fédéral a peu à peu consacré des sigles officieux, qui figurent au début de chaque volume du Recueil officiel de ses arrêts'],
            ['gabarit' => 'arret', 'title' => 'Date d\'adoption', 'description' => 'Date d\'adoption'],
            ['gabarit' => 'arret', 'title' => 'Organe', 'description' => 'Organe qui a adopté le texte législatif'],
            ['gabarit' => 'arret', 'title' => 'Visa, Base cst.', 'description' => 'Les «visas ». On appelle ainsi toutes les références aux documents sur lesquels se fonde l\'acte, références introduites par la préposition invariable « vu » (issu du participe passé du verbe « voir» ; «gestützt auf»; « visto »).'],
            ['gabarit' => 'arret', 'title' => 'Réf. au Message du CF', 'description' => 'Réf. au Message du CF'],
            ['gabarit' => 'arret', 'title' => 'Verbe', 'description' => 'verbe marquant la décision de l\'organe qui l\'édicte. Ainsi l\'Assemblée fédérale ou le Conseil fédéral «arrête ». Dans la terminologie propre au droit, le verbe « arrêter » (« beschliessen » ; « decretare ») désigne l\'acte par lequel une autorité législative ou judiciaire prend une décision. C\'est de là que viennent d\'ailleurs les termes « arrêté » désignant un type d\'acte législatif et « arrêt » désignant un type de décision judiciaire.' ],
            ['gabarit' => 'text',  'title' => '',  'description' => ''],
            ['gabarit' => 'text',  'title' => 'Clause d\'exécution',  'description' => 'Clause d\'exécution'],
            ['gabarit' => 'text',  'title' => 'Clause abrogatoire',  'description' => 'Clause abrogatoire'],
            ['gabarit' => 'text',  'title' => 'Règles de droit intemporel',  'description' => 'Règles de droit intemporel'],
        );

        // Uncomment the below to run the seeder
        DB::table('types')->insert($models);
    }
}