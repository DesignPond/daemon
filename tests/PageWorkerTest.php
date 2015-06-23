<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageWorkerTest extends TestCase
{
    protected $worker;

    public function setUp()
    {
        parent::setUp();

        $this->worker = \App::make('App\Cours\Page\Worker\PageWorker');
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

        $result = $this->worker->prepareTree($data);
        echo '<pre>';
        print_r($result);
        echo '</pre>';exit;

        $this->assertEquals($result,$expected);
    }
}
