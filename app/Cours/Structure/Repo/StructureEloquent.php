<?php namespace App\Cours\Structure\Repo;

use App\Cours\Structure\Repo\StructureInterface;
use App\Cours\Structure\Entities\Structure as M;

class StructureEloquent implements StructureInterface{

    protected $structure;

    public function __construct(M $structure)
    {
        $this->structure = $structure;
    }

    public function getAll(){

        return $this->structure->all();
    }

    public function find($id){

        return $this->structure->with(array(''))->findOrFail($id);
    }

    public function create(array $data){

        $structure = $this->structure->create(array(
            'projet_id'  => $data['projet_id'],
            'user_id'    => $data['user_id'],
            'type_id'    => $data['type_id'],
            'groupe_id'  => $data['groupe_id'],
            'rang'       => $data['rang'],
            'content'    => $data['content'],
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ));

        if( ! $structure )
        {
            return false;
        }

        return $structure;

    }

    public function update(array $data){

        $structure = $this->structure->findOrFail($data['id']);

        if( ! $structure )
        {
            return false;
        }

        $structure->fill($data);

        $structure->updated_at = date('Y-m-d G:i:s');
        $structure->save();

        return $structure;
    }

    public function delete($id){

        $structure = $this->structure->find($id);

        return $structure->delete($id);
    }

}
