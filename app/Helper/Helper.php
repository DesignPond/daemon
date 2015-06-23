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
}