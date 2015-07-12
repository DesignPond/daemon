<?php namespace App\Cours\Arrow\Repo;

use App\Cours\Arrow\Repo\ArrowInterface;
use App\Cours\Arrow\Entities\Arrow as M;

class ArrowEloquent implements ArrowInterface{

    protected $arrow;

    public function __construct(M $arrow)
    {
        $this->arrow = $arrow;
    }

    public function getAll(){

        return $this->arrow->all();
    }

    public function projet($id){

        return $this->arrow->where('projet_id','=',$id)->get();
    }

    public function find($id){

        return $this->arrow->findOrFail($id);
    }

    public function create(array $data){

        $arrow = $this->arrow->create(array(
            'projet_id' => $data['projet_id'],
            'top'       => $data['top'],
            'left'      => $data['left'],
            'no'        => (isset($data['no']) ? $data['no'] : ''),
            'couleur'   => $data['couleur'],
            'position'  => $data['position']
        ));

        if( ! $arrow )
        {
            return false;
        }

        return $arrow;

    }

    public function update(array $data){

        $arrow = $this->arrow->findOrFail($data['id']);

        if( ! $arrow )
        {
            return false;
        }

        $arrow->fill($data);
        $arrow->save();

        return $arrow;
    }

    public function delete($id){

        $arrow = $this->arrow->find($id);

        if( ! $arrow )
        {
            return false;
        }

        return $arrow->delete($id);

    }

}
