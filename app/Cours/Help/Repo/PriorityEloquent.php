<?php
namespace App\Cours\Help\Repo;

use App\Cours\Help\Repo\PriorityInterface;
use App\Cours\Help\Entities\Priority as M;

class PriorityEloquent implements PriorityInterface
{
    protected $priority;

    public function __construct(M $priority)
    {
        $this->priority = $priority;
    }

    public function getAll(){

        return $this->priority->all();
    }

    public function find($id){

        return $this->priority->findOrFail($id);
    }

    public function create(array $data){

        $priority = $this->priority->create(array(
            'name'  => $data['name'],
            'color' => $data['color']
        ));

        if( ! $priority )
        {
            return false;
        }

        return $priority;

    }

    public function update(array $data){

        $priority = $this->priority->findOrFail($data['id']);

        if( ! $priority )
        {
            return false;
        }

        $priority->fill($data);
        $priority->save();

        return $priority;
    }

    public function delete($id){

        $priority = $this->priority->find($id);

        return $priority->delete($id);
    }

}
