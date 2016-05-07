<?php namespace App\Cours\Site\Repo;

use App\Cours\Site\Repo\SiteInterface;
use App\Cours\Site\Entities\Site as M;

class SiteEloquent implements SiteInterface{

    protected $site;

    public function __construct(M $site)
    {
        $this->site = $site;
    }

    public function getAll(){

        return $this->site->all();
    }

    public function find($id){

        return $this->site->find($id);
    }

    public function create(array $data){

        $site = $this->site->create(array(
            'nom'  => $data['nom'],
            'url'  => isset($data['url']) ? $data['url'] : '',
            'logo' => isset($data['logo']) ? $data['logo'] : '',
            'description' => isset($data['description']) ? $data['description'] : '',
            'slug'        => (isset($data['slug']) && !empty($data['slug']) ? \Str::slug($data['nom']) : '')
        ));

        if( ! $site )
        {
            return false;
        }

        return $site;
    }

    public function update(array $data){

        $site = $this->site->findOrFail($data['id']);

        if( ! $site )
        {
            return false;
        }

        $site->fill($data);
        $site->save();

        return $site;
    }

    public function delete($id)
    {
        $site = $this->site->find($id);

        return $site->delete();
    }
}
