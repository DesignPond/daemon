<?php namespace App\Cours\Page\Repo;

use App\Cours\Page\Repo\PageInterface;
use App\Cours\Page\Entities\Page as M;

class PageEloquent implements PageInterface{

    protected $page;

    public function __construct(M $page)
    {
        $this->page = $page;
    }

    public function getAll(){

        return $this->page->all();
    }

    public function getCategories(){

        return $this->page->where('parent_categorie','=',1)->get();
    }

    public function getTree($key = null, $seperator = '  '){

        return $this->page->getNestedList('title', $key, $seperator);
    }

    public function search($term)
    {
        return $this->page->where('content','LIKE', '%'.$term.'%')->get();
    }

    public function getRoot(){

        return $this->page->where('parent_id','=',0)->get();
    }

    public function find($id){

        return $this->page->findOrFail($id);
    }

    public function getBySlug($slug)
    {
        return $this->page->where('slug','=',$slug)->first();
    }

    public function buildTree($data)
    {
        return $this->page->buildTree($data);
    }

    public function create(array $data){

        $page = $this->page->create(array(
            'rang'        => (isset($data['rang']) ? $data['rang'] : 0),
            'site'        => (isset($data['site']) ? $data['site'] : 0),
            'main'        => (isset($data['main']) ? $data['main'] : ''),
            'title'       => $data['title'],
            'content'     => $data['content'],
            'template'    => 'page',
            'slug'        => (isset($data['title']) && !empty($data['title']) ? \Str::slug($data['title']) : ''),
            'created_at'  => date('Y-m-d G:i:s'),
            'updated_at'  => date('Y-m-d G:i:s')
        ));

        if( ! $page )
        {
            return false;
        }

        if($data['parent_id'] > 0)
        {
            $parent = $this->page->findOrFail($data['parent_id']);
            $page->makeChildOf($parent);
        }

        return $page;

    }

    public function update(array $data){

        $page = $this->page->findOrFail($data['id']);

        if( ! $page )
        {
            return false;
        }

        $page->fill($data);

        $page->updated_at = date('Y-m-d G:i:s');
        $page->save();

        if($data['parent_id'] > 0)
        {
            $parent = $this->page->findOrFail($data['parent_id']);
            $page->makeChildOf($parent);
        }

        return $page;
    }

    public function delete($id){

        $page = $this->page->find($id);

        return $page->delete($id);
    }

}
