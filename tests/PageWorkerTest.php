<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageWorkerTest extends TestCase
{
    protected $worker;
    protected $helper;

    public function setUp()
    {
        parent::setUp();

        $this->worker = \App::make('App\Cours\Page\Worker\PageWorker');
        $this->helper = new \App\Helper\Helper;
    }

    public function tearDown()
    {

    }
    /**
     * @return void
     */
    public function testPrepareTree()
    {

        $data = [
            [
                'id' => 14 ,
                'children' =>
                 [
                    [
                        'id' => 1 ,
                        'children' => [['id' => 2],['id' => 3]]
                    ],
                    [
                        'id' => 5 ,
                        'children' => [['id' => 6],['id' => 7]]
                    ],
                    [
                        'id' => 8 ,
                        'children' => [['id' => 9],['id' => 10]]
                    ]
                 ]
            ]
        ];

        $expected = [];

        //$this->assertEquals($result,$expected);
    }

    public function testHighlightTextWithKeywords()
    {
        $popover  = 'tabindex="0" data-trigger="focus" data-toggle="popover" data-placement="top"';
        $text     = 'Ipsum iaculisémod viverra interdum varius malesuada lacinia convallis aliq curabitur ôdiot sed nulla nisi niçl mollis dès dès porta interdùm vivamus vel, ac auctor';
        $test     = 'Le Tribunal fédéral TF suisse est la plus haute juridiction suisse. Créé en 1875, il administre notamment, avant tout en tant qu\'instance de recours, la justice civile et la justice pénale; il statue aussi en qualité de cour constitutionnelle et tranche en dernière instance les litiges liés à l\'application du droit des assurances sociales. Son siège est à Lausanne';

        $keywords = [
            [
                'keyword'     => 'convallis aliq curabitur',
                'description' => 'the description1'
            ],
            [
                'keyword'     =>'interdùm',
                'description' => 'the description2'
            ],
            [
                'keyword'     =>'auctor',
                'description' => 'the description3'
            ],
            [
                'keyword'     =>'Le Tribunal fédéral TF suisse',
                'description' => 'the description3'
            ]
        ];

        $expected = 'Ipsum iaculisémod viverra interdum varius malesuada lacinia <span '.$popover.' title="convallis aliq curabitur" data-content="the description1">convallis aliq curabitur</span> ôdiot sed nulla nisi niçl mollis dès dès porta <span '.$popover.' title="interdùm" data-content="the description2">interdùm</span> vivamus vel, ac <span '.$popover.' title="auctor" data-content="the description3">auctor</span>';

        $result = $this->helper->highight($text,$keywords);

        $this->assertEquals($result,$expected);
    }
}
