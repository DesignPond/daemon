<?php namespace App\Cours\Box\Repo;

use App\Cours\Box\Repo\BoxInterface;
use App\Cours\Box\Entities\Box as M;

class BoxEloquent implements BoxInterface{

    protected $box;

    public function __construct(M $box)
    {
        $this->box = $box;
    }

    public function getAll(){

        return $this->box->all();
    }

    public function projet($id){

        return $this->box->where('projet_id','=',$id)->get();
    }

    public function find($id){

        return $this->box->findOrFail($id);
    }

    public function create(array $data){

        $box = $this->box->create(array(
            'projet_id' => $data['projet_id'],
            'top'       => $data['top'],
            'left'      => $data['left'],
            'no'        => (isset($data['no']) ? $data['no'] : ''),
            'width'     => $data['width'],
            'height'    => $data['height'],
            'couleur'   => (isset($data['couleur']) ? $data['couleur'] : ''),
            'text'      => (isset($data['text']) ? $data['text'] : ''),
            'border'    => (isset($data['border']) ? $data['border'] : ''),
            'zindex'    => 1,
        ));

        if( ! $box )
        {
            return false;
        }

        return $box;

    }

    public function update(array $data){

        $box = $this->box->findOrFail($data['id']);

        if( ! $box )
        {
            return false;
        }

        $box->fill($data);
        $box->save();

        return $box;
    }

    public function delete($id){

        $box = $this->box->find($id);

        if( ! $box )
        {
            return false;
        }

        return $box->delete($id);

    }

}
