<?php namespace App\Cours\Box\Repo;

use App\Cours\Box\Repo\BoxInterface;
use App\Cours\Box\Entities\Box as M;

class BoxEloquent implements BoxInterface{

    protected $Box;

    public function __construct(M $Box)
    {
        $this->Box = $Box;
    }

    public function getAll(){

        return $this->Box->all();
    }

    public function find($id){

        return $this->Box->findOrFail($id);
    }

    public function create(array $data){

        $Box = $this->Box->create(array(
            'top'     => $data['top'],
            'left'    => $data['left'],
            'no'      => (isset($data['no']) ? $data['no'] : ''),
            'width'   => $data['width'],
            'height'  => $data['height'],
            'couleur' => (isset($data['couleur']) ? $data['couleur'] : ''),
            'text'    => (isset($data['text']) ? $data['text'] : ''),
            'border'  => (isset($data['border']) ? $data['border'] : ''),
            'zindex'  => (isset($data['zindex']) ? $data['zindex'] : ''),
        ));

        if( ! $Box )
        {
            return false;
        }

        return $Box;

    }

    public function update(array $data){

        $Box = $this->Box->findOrFail($data['id']);

        if( ! $Box )
        {
            return false;
        }

        $Box->fill($data);
        $Box->save();

        return $Box;
    }

    public function delete($id){

        $Box = $this->Box->find($id);

        return $Box->delete($id);
    }

}
