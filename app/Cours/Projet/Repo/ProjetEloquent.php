<?php
namespace App\Cours\Projet\Repo;

use App\Cours\Projet\Repo\ProjetInterface;
use App\Cours\Projet\Entities\Projet as M;

class ProjetEloquent implements ProjetInterface
{

    protected $projet;

    public function __construct(M $projet)
    {
        $this->projet = $projet;
    }

    public function getAll(){

        return $this->projet->all();
    }

    public function find($id){

        return $this->projet->with(array('user','structures'))->findOrFail($id);
    }

    public function create(array $data){

        $projet = $this->projet->create(array(
            'title'      => $data['title'],
            'user_id'    => $data['user_id'],
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ));

        if( ! $projet )
        {
            return false;
        }

        return $projet;

    }

    public function update(array $data){

        $projet = $this->projet->findOrFail($data['id']);

        if( ! $projet )
        {
            return false;
        }

        $projet->fill($data);

        $projet->updated_at = date('Y-m-d G:i:s');
        $projet->save();

        return $projet;
    }

    public function delete($id){

        $projet = $this->projet->find($id);

        return $projet->delete($id);
    }

}
