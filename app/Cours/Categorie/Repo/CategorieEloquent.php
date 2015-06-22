<?php namespace App\Cours\Categorie\Repo;

use App\Cours\Categorie\Repo\CategorieInterface;
use App\Cours\Categorie\Entities\Categorie as M;

class CategorieEloquent implements CategorieInterface{

    protected $categorie;

    public function __construct(M $categorie)
    {
        $this->categorie = $categorie;
    }

    public function getAll(){

        return $this->categorie->all();
    }

    public function find($id){

        return $this->categorie->with(array(''))->findOrFail($id);
    }

    public function create(array $data){

        $categorie = $this->categorie->create(array(
            'title' => $data['title']
        ));

        if( ! $categorie )
        {
            return false;
        }

        return $categorie;

    }

    public function update(array $data){

        $categorie = $this->categorie->findOrFail($data['id']);

        if( ! $categorie )
        {
            return false;
        }

        $categorie->fill($data);
        $categorie->save();

        return $categorie;
    }

    public function delete($id){

        $categorie = $this->categorie->find($id);

        return $categorie->delete($id);
    }

}
