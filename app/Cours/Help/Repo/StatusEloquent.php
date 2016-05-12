<?php
namespace App\Cours\Help\Repo;

use App\Cours\Help\Repo\StatusInterface;
use App\Cours\Help\Entities\Status as M;

class StatusEloquent implements StatusInterface
{
    protected $status;

    public function __construct(M $status)
    {
        $this->status = $status;
    }

    public function getAll(){

        return $this->status->all();
    }

    public function find($id){

        return $this->status->findOrFail($id);
    }

    public function create(array $data){

        $status = $this->status->create(array(
            'name'  => $data['name'],
            'color' => $data['color']
        ));

        if( ! $status )
        {
            return false;
        }

        return $status;

    }

    public function update(array $data){

        $status = $this->status->findOrFail($data['id']);

        if( ! $status )
        {
            return false;
        }

        $status->fill($data);
        $status->save();

        return $status;
    }

    public function delete($id){

        $status = $this->status->find($id);

        return $status->delete($id);
    }

}
