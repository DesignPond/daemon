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
            ['title' => 'Intitulé',  'description' => 'Intitulé'],
            ['title' => 'Préambule', 'description' => 'Préambule'],
            ['title' => 'But de l\'acte', 'description' => 'Le but de l\'acte (l\'article-programme « der Zweckartikel » l\'articolo sullo scopo»). 11 indique en une formule générale l\'objet et souvent le (ou les) objectif(s) de l\'acte. Cette indication peut servir d\'indice pour l\'interprétation (téléologique; cf. nt\' 1651) d\'une des dispositions qui suivent.'],
            ['title' => 'Règle définitoire', 'description' => 'Les règles défi nitoires. Afin de préciser le champ d\'application de l\'acte et simplifier son application ultérieure, le législateur propose de plus en plus la définition des principales notions utilisées. Le procédé est fréquent dans les traités internationaux, en raison des divergences de terminologie qui peuvent exister entre les systèmes de droit (p.ex. art. 2 ch. 2 et 4 ch. 3 CEDH). Ces définitions peuvent également figurer dans les ordonnances d\'application ou d\'exécution.'],
            ['title' => 'Dispositions finales',  'description' => 'Les dispositions finales (« die Schlussbestimmungen» ; « le disposizioni finali ») précisent les conditions d\'exécution de l\'acte. Elles comprennent en principe les parties suivantes : 503 P Les clauses d\'exécution. La mise en oeuvre du régime instauré par la loi peut appeler des règles complémentaires, dites d\'exécution. L\'acte désigne les organes compétents pour les adopter et précise souvent les modalités de l\'intervention. '],
            ['title' => 'Entrée en vigueur', 'description' => 'Entrée en vigueur'],
            ['title' => 'Signatures', 'description' => 'Signatures'],
            ['title' => 'Formule de promulgation', 'description' => 'Formule de promulgation'],
        );

        // Uncomment the below to run the seeder
        DB::table('groupes')->insert($models);
    }
}
