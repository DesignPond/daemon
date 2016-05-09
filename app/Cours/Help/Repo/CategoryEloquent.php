<?php
namespace App\Cours\Help\Repo;

use App\Cours\Help\Repo\CategoryInterface;
use App\Cours\Help\Entities\Category as M;

class CategoryEloquent implements CategoryInterface
{
    protected $category;

    public function __construct(M $category)
    {
        $this->category = $category;
    }

    public function getAll(){

        return $this->category->all();
    }

    public function find($id){

        return $this->category->findOrFail($id);
    }

    public function create(array $data){

        $category = $this->category->create(array(
            'name'  => $data['name'],
            'color' => $data['color']
        ));

        if( ! $category )
        {
            return false;
        }

        return $category;

    }

    public function update(array $data){

        $category = $this->category->findOrFail($data['id']);

        if( ! $category )
        {
            return false;
        }

        $category->fill($data);
        $category->save();

        return $category;
    }

    public function delete($id){

        $category = $this->category->find($id);

        return $category->delete($id);
    }

}
