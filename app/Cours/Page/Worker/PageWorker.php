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

    /*
     function menuBuilder($menu_array, $is_sub = false)
{
    if(!$is_sub) {
        $menu = '<ul id="side-menu" class="nav"><li class="top-li"></li>';
    } else {
        $menu = '<ul class="nav side-submenu">';
    }

    $sub = '';
    foreach ($menu_array as $child) {
        foreach ($child as $key => $val) {
            if (is_array($val)) {
                $sub = menuBuilder($val, true);
            } else {
                $sub = null;
                $$key = $val;
            }
        }

        $menu .= "<li>".((trim($child['name'])!=null)?("<a>".$child['name']."</a>"):"")."$sub</li>";
        unset($url, $display, $sub);

    }
    return $menu . "</ul>";
}

$array = json_decode($json, true);
echo $list =  menuBuilder($array['data']['parentNode']['children']);

      */

}