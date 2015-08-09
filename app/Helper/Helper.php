<?php
namespace App\Helper;

class Helper{

    public function renderMenu($node)
    {
        if( $node->isLeaf() )
        {
            $url = (!$node->isRoot() ? 'page/' : '');
            return '<li><a href="'.url($url.$node->slug).'" title="'.$node->title.'">' . $node->title . '</a></li>';
        }
        else
        {
            if($node->isRoot())
            {
                $pieces    = explode(' ', $node->title);
                $last_word = array_pop($pieces);
                $html  = '<li><a href="'.url('page/'.$node->slug).'" title="'.$last_word.'">' . implode(' ',$pieces) .'</a>';
            }
            else
            {
                $html  = '<li><a href="'.url('page/'.$node->slug).'">' . $node->title .'</a>';
            }

            $html .= '<ul class="sub-menu">';

            foreach($node->children as $child)
                $html .= $this->renderMenu($child);

            $html .= '</ul>';
            $html .= '</li>';
        }

        return $html;
    }

    public function renderMenuSimple($node)
    {
        if( $node->isLeaf() )
        {
            return '<li><a href="'.url('schemas/'.$node->id).'" title="'.$node->title.'"><i class="fa fa-long-arrow-right"></i> &nbsp;' . $node->title . '</a></li>';
        }
        else
        {
            $html = '<li><a href="' . url('schemas/' . $node->id) . '" title="'.$node->title.'"><i class="fa fa-long-arrow-right"></i> &nbsp;' . $node->title . '</a>';

            $html .= '<ul class="sub-menu">';

            if(!$node->children->isEmpty())
            {
                foreach ($node->children as $child)
                {
                    $html .= $this->renderMenuSimple($child);
                }
            }

            $html .= '</ul>';
            $html .= '</li>';
        }

        return $html;
    }

    public function renderSidebar($node, $page)
    {
        if( $node->isLeaf() )
        {
            return '<li class="widget-container widget_nav_menu"><a href="'.url('page/'.$node->slug).'" title="'.$node->title.'">' . $node->title . '</a></li>';
        }
        else
        {
            $html  = '<li class="widget-container widget_nav_menu"><h6><a class="" href="'.url('page/'.$node->slug).'">' . $node->title .'</a></h6>';

            if($page->isDescendantOf($node))
            {
                $html .= '<ul class="list-unstyled clear-margins">';
                foreach($node->children as $child)
                    $html .= $this->renderMenu($child);
                $html .= '</ul>';
            }

            $html .= '</li>';
        }

        return $html;
    }

    function renderMenuItem($node,$level)
    {
        if( $node->isLeaf() )
        {
            return [
                'text'      => ['name' => $node->title],
                'innerHTML' => '<p><a href="'.url('schemas/'.$node->id).'" data-node="'.$node->id.'">'.$node->title.'</a></p>'
                //'innerHTML' => '<div class="nodeWrapper"><p>'.$node->title.'</p><a href="#" data-node="'.$node->id.'" class="addBtnNode">+</a></div>'
            ];
        }
        else
        {
            $html['text']['name'] = $node->title;
            $html['innerHTML']    = '<p><a href="'.url('schemas/'.$node->id).'" data-node="'.$node->id.'">'.$node->title.'</a></p>';

            //$html['innerHTML']    = '<div class="nodeWrapper"><p>'.$node->title.'</p><a href="#" data-node="'.$node->id.'" class="addBtnNode">+</a></div>';

            foreach($node->children as $child)
            {
                if($level > 0)
                {
                    if($level >= $child->getLevel())
                    {
                        $html['children'][] = $this->renderMenuItem($child,$level);
                    }
                }
                else
                {
                    $html['children'][] = $this->renderMenuItem($child, $level);
                }
            }
        }

        return $html;
    }


    public function jsonObj($nodes,$level)
    {

        $object = $this->renderMenuItem($nodes,$level);

        return json_encode($object);

    }

}