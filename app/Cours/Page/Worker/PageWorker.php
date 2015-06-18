<?php namespace App\Cours\Page\Worker;

use App\Cours\Page\Repo\PageInterface;

class PageWorker{

    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    public function prepareTree($nodes){
        return true;

    }

}