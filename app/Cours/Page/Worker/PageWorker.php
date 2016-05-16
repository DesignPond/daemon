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

    public function tree($source_dir, $directory_depth = 0, $hidden = FALSE, $onlydir = TRUE)
    {
        if ($fp = @opendir($source_dir))
        {
            $filedata	= array();
            $new_depth	= $directory_depth - 1;
            $source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

            while (FALSE !== ($file = readdir($fp)))
            {
                // Remove '.', '..', and hidden files [optional]
                if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
                {
                    continue;
                }

                if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
                {
                    $filedata[$file] = $this->tree($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
                }
                else
                {
                    if(!$onlydir)
                    {
                        $filedata[] = $file;
                    }
                }
            }

            closedir($fp);
            return $filedata;
        }

        return FALSE;
    }

    public function treeDirectories($directories, $path = '', $loop = 0, $colors = [])
    {
        $key   = key($directories);
        $exist = (isset($directories[$key]) && is_array( $directories[$key] ) ? true : false);

        $class = $loop > 0 ? '' : 'file-tree-list js-file-tree treeview' ;
        $html  = ($exist ? '<ul class="'.$class.'" data-expanded="true">' : '');

        if($exist)
        {
            foreach($directories as $name => $subdir)
            {
                if(is_array($subdir))
                {
                    $html .= '<li style="'.(isset($colors[$name]) ? 'font-weight:500;color:'.$colors[$name] : '').'"><i class="fa fa-folder-o"></i> &nbsp;'.$name.'</span>';
                    $html .= $this->treeDirectories($subdir, $path.$name.'/', $loop + 1, $colors);
                    $loop += 1;
                    $html .= '</li>';
                }
            }
        }

        $html .= ($exist ? '</ul>' : '' );

        return $html;
    }

}