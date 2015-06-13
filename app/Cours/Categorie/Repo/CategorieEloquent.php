<?php namespace App\Cours\Categorie\Repo;

use App\Cours\Categorie\Repo\CategorieInterface;
use App\Cours\Categorie\Entities\Categories as M;

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
            'pid'        => $data['pid'],
            'user_id'    => $data['user_id'],
            'title'      => $data['title'],
            'image'      => $data['image'],
            'ismain'     => $data['ismain'],
            'hideOnSite' => $data['hideOnSite'],
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
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

        $categorie->updated_at = date('Y-m-d G:i:s');
        $categorie->save();

        return $categorie;
    }

    public function delete($id){

        $categorie = $this->categorie->find($id);

        return $categorie->delete($id);
    }

}
