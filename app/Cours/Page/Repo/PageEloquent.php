<?php namespace App\Cours\Page\Repo;

use App\Cours\Page\Repo\PageInterface;
use App\Cours\Page\Entities\Pages as M;

class PageEloquent implements PageInterface{

    protected $page;

    public function __construct(M $page)
    {
        $this->page = $page;
    }

    public function getAll(){

        return $this->page->all();
    }

    public function find($id){

        return $this->page->with(array(''))->findOrFail($id);
    }

    public function create(array $data){

        $page = $this->page->create(array(
            'auteur'     => $data['auteur'],
            'ouvrage'    => $data['ouvrage'],
            'page'       => $data['page'],
            'paragraphe'  => $data['paragraphe'],
            'title'      => $data['title'],
            'content'    => $data['content'],
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ));

        if( ! $page )
        {
            return false;
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

        return $page;
    }

    public function delete($id){

        $page = $this->page->find($id);

        return $page->delete($id);
    }

}
