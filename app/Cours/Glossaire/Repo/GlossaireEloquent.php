<?php
namespace App\Cours\Glossaire\Repo;

use App\Cours\Glossaire\Repo\GlossaireInterface;
use App\Cours\Glossaire\Entities\Glossaire as M;

class GlossaireEloquent implements GlossaireInterface
{
    protected $glossaire;

    public function __construct(M $glossaire)
    {
        $this->glossaire = $glossaire;
    }

    public function getAll(){

        return $this->glossaire->all();
    }

    public function find($id){

        return $this->glossaire->findOrFail($id);
    }

    public function create(array $data){

        $glossaire = $this->glossaire->create(array(
            'keyword'     => $data['keyword'],
            'description' => $data['description']
        ));

        if( ! $glossaire )
        {
            return false;
        }

        return $glossaire;

    }

    public function update(array $data){

        $glossaire = $this->glossaire->findOrFail($data['id']);

        if( ! $glossaire )
        {
            return false;
        }

        $glossaire->fill($data);
        $glossaire->save();

        return $glossaire;
    }

    public function delete($id){

        $glossaire = $this->glossaire->find($id);

        return $glossaire->delete($id);
    }

}
