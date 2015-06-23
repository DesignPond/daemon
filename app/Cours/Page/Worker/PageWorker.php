<?php namespace App\Cours\Page\Worker;

use App\Cours\Page\Repo\PageInterface;

class PageWorker{

    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    public function prepareTree($nodes){

        $data = [];

        if(is_array($nodes))
        {
            foreach($nodes as $node)
            {
                if(isset($node['id']))
                {
                    $data[] = array_merge($data,['id' => $node['id']]);
                }

                if(!empty($node['children']))
                {
                    foreach($node['children'] as $child)
                        $data[] = array_merge($data, $this->prepareTree($child));
                }
            }
        }
        else{
            $data[] = array_merge($data,['id' => $node['id']]);
        }

        return $data;

    }

}