<?php
namespace App\Cours\Groupe\Repo;

use App\Cours\Groupe\Repo\GroupeInterface;
use App\Cours\Groupe\Entities\Groupes as M;

class GroupeEloquent implements GroupeInterface
{
    protected $groupe;

    public function __construct(M $groupe)
    {
        $this->groupe = $groupe;
    }

    public function getAll(){

        return $this->groupe->all();
    }

    public function find($id){

        return $this->groupe->with(array(''))->findOrFail($id);
    }

    public function create(array $data){

        $groupe = $this->groupe->create(array(
            'title'      => $data['title']
        ));

        if( ! $groupe )
        {
            return false;
        }

        return $groupe;

    }

    public function update(array $data){

        $groupe = $this->groupe->findOrFail($data['id']);

        if( ! $groupe )
        {
            return false;
        }

        $groupe->fill($data);
        $groupe->save();

        return $groupe;
    }

    public function delete($id){

        $groupe = $this->groupe->find($id);

        return $groupe->delete($id);
    }

}
