<?php
namespace App\Cours\Link\Repo;

use App\Cours\Link\Repo\LinkInterface;
use App\Cours\Link\Entities\Link as M;

class LinkEloquent implements LinkInterface
{
    protected $link;

    public function __construct(M $link)
    {
        $this->link = $link;
    }

    public function getAll(){

        return $this->link->with(['categorie'])->get();
    }

    public function find($id){

        return $this->link->findOrFail($id);
    }

    public function byParent($id){

        return $this->link->where('parent_id','=',$id)->with(['categorie'])->get();
    }

    public function create(array $data){

        $link = $this->link->create(array(
            'titre'     => $data['titre'],
            'url'       => $data['url'],
            'parent_id' => $data['parent_id']
        ));

        if( ! $link )
        {
            return false;
        }

        return $link;

    }

    public function update(array $data){

        $link = $this->link->findOrFail($data['id']);

        if( ! $link )
        {
            return false;
        }

        $link->fill($data);
        $link->save();

        return $link;
    }

    public function delete($id){

        $link = $this->link->find($id);

        return $link->delete($id);
    }

}
