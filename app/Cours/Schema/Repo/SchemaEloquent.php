<?php
namespace App\Cours\Schema\Repo;

use App\Cours\Schema\Repo\SchemaInterface;
use App\Cours\Schema\Entities\Schema as M;

class SchemaEloquent implements SchemaInterface
{

    protected $schema;

    public function __construct(M $schema)
    {
        $this->schema = $schema;
    }

    public function getAll(){

        return $this->schema->all();
    }

    public function find($id){

        return $this->schema->with(array('box','arrow'))->findOrFail($id);
    }

    public function create(array $data){

        $schema = $this->schema->create(array(
            'title'      => $data['title'],
            'user_id'    => $data['user_id'],
            'description'=> $data['description'],
            'rang'       => $data['rang'],
            'slug'       => $data['slug'],
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ));

        if( ! $schema )
        {
            return false;
        }

        return $schema;

    }

    public function update(array $data){

        $schema = $this->schema->findOrFail($data['id']);

        if( ! $schema )
        {
            return false;
        }

        $schema->fill($data);

        $schema->updated_at = date('Y-m-d G:i:s');
        $schema->save();

        return $schema;
    }

    public function delete($id){

        $schema = $this->schema->find($id);

        return $schema->delete($id);
    }

}
