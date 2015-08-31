<?php namespace App\Cours\Page\Worker;

use App\Cours\Page\Repo\PageInterface;
use App\Cours\Link\Repo\LinkInterface;

class PageWorker{

    protected $page;
    protected $link;

    public function __construct(PageInterface $page,LinkInterface $link)
    {
        $this->page = $page;
        $this->link = $link;
    }

    public function getLinks($page){

        $ancestors = $page->getAncestorsAndSelf()->reverse()->lists('id');

        if(!$ancestors->isEmpty())
        {
            foreach($ancestors as $ancestor)
            {
                $links = $this->link->byParent($ancestor);

                if(!$links->isEmpty())
                {
                    return $links;
                }
            }
        }

        return $this->link->byParent(0);
    }

    public function prepareTree($nodes){

        $data = [];

        if(is_array($nodes))
        {
            foreach($nodes as $node)
            {
                $page = $this->page->find($node['id']);

                $data[$node['id']]['id']         = $node['id'];
                $data[$node['id']]['auteur']     = $page->auteur;
                $data[$node['id']]['title']      = $page->title;
                $data[$node['id']]['slug']       = $page->slug;
                $data[$node['id']]['ouvrage']    = $page->ouvrage;
                $data[$node['id']]['page']       = $page->page;
                $data[$node['id']]['paragraphe'] = $page->paragraphe;
                $data[$node['id']]['content']    = $page->content;

                if(isset($node['children']) && !empty($node['children']))
                {
                    $children = $this->prepareTree($node['children']);
                    $data[$node['id']]['children'] = $children;
                }
            }
        }

        return $data;

    }

}