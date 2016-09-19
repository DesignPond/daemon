<?php
namespace App\Helper;

class Helper{

    public function renderSubMenu($node)
    {
        // <li class="is-active">
        //<a href="#content" class=""><span class="one-page-nav-icon"><i class="fa fa-thumbs-o-up"></i></span>Main features</a>

        $url = 'page/';

        if( $node->isLeaf() )
        {
            return '<li class="'.(\Request::is($url.$node->slug) ? 'is-active selected' : '').'">
                <a href="'.url($url.$node->slug).'" title="'.$node->title.'"><span class="one-page-nav-icon"><i class="fa fa-angle-right "></i></span>' . $node->title . '</a>
                </li>';
        }
        else
        {
            $html  = '<li class="'.(\Request::is($url.$node->slug) ? 'is-active selected' : '').'">
                <a href="'.url($url.$node->slug).'"><span class="one-page-nav-icon"><i class="fa fa-cube"></i></span>' . $node->title .'</a>';
            $html .= '<ul>';

            foreach($node->children as $child)
                $html .= $this->renderSubMenu($child);

            $html .= '</ul>';
            $html .= '</li>';
        }

        return $html;
    }
    
    public function renderMenu($node)
    {
        $url = 'page/';

        if( $node->isLeaf() )
        {
            return '<li><a href="'.url($url.$node->slug).'" title="'.$node->title.'">' . $node->title . '</a></li>';
        }
        else
        {
            $html  = '<li><a href="'.url($url.$node->slug).'">' . $node->title .'</a>';
            $html .= '<ul>';

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
            return '<li><a href="'.url('schemas/'.$node->id).'" title="'.$node->title.'">' . $node->title . '</a></li>';
        }
        else
        {
            $html = '<li><a href="' . url('schemas/' . $node->id) . '" title="'.$node->title.'">' . $node->title . '</a>';

            if(!$node->children->isEmpty())
            {
                $html .= '<ul class="sub-menu">';

                foreach ($node->children as $child)
                {
                    $html .= $this->renderMenuSimple($child);
                }

                $html .= '</ul>';
            }

            $html .= '</li>';
        }

        return (isset($html) ? $html : '');
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

    public function renderNode($node)
    {
        $form = '<form action="'.url('admin/page/'.$node->id).'" method="POST">
                              <input type="hidden" name="_method" value="DELETE">'.csrf_field().'
                              <button data-action="page: '.$node->title.'" class="btn btn-danger btn-xs deleteAction">X</button>
                          </form>';

        if( $node->isLeaf() )
        {
            return '<li class="dd-item" data-id="'.$node->id.'"><div class="dd-handle"><a href="admin/page/'.$node->id.'">' . $node->title . '</a>'.$form.'</div></li>';
        }
        else
        {
            $html  = '<li class="dd-item" data-id="'.$node->id.'"><div class="dd-handle">';
            $html .= '<a href="admin/page/'.$node->id.'">' . $node->title.'</a>';
            $html .= $form;
            $html .= '</div>';
            $html .= '<ol class="dd-list">';

            foreach($node->children as $child)
                $html .= $this->renderNode($child);

            $html .= '</ol>';
            $html .= '</li>';
        }
        return $html;
    }


    /**
     * Hightlight terms
     */
    function highight($text,$keywords)
    {
        // $text:     the text from which you want to highlight and return...
        // $keywords: either string or array or words that should be highlighted in the text.
        $popover = 'tabindex="0" class="highlight" data-trigger="focus" data-toggle="popover" data-placement="top"';
        // Find matches
        for ($x = 0; $x < count($keywords); $x++)
        {
            if (strlen($keywords[$x]['keyword']) > 1)
            {
                $key     = $keywords[$x]['keyword'];
                $contenu = $keywords[$x]['description'];
                $text    = preg_replace("/\b($key)\b/i", '<span '.$popover.' title="'.$key.'" data-content="'.$contenu.'">'.$key.'</span>', $text);
            }
        }

        return $text;
    }

    public function ListFolder($path, $directory_class = NULL, $link = FALSE)
    {
        //using the opendir function
        $dir_handle = @opendir($path) or die("Unable to open $path");

        //Leave only the lastest folder name
        $dirname = end(explode("/", $path));

        while (false !== ($file = readdir($dir_handle)))
        {
            if($file!="." && $file!=".." && $file!=".DS_Store")
            {
                if (is_dir($path."/".$file))
                {
                    //Display a list of sub folders.
                    ListFolder($path."/".$file , $directory_class);
                }

            }
        }

        //closing the directory
        closedir($dir_handle);
    }

}