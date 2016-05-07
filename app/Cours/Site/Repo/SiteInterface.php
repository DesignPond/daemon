<?php namespace App\Cours\Site\Repo;

interface SiteInterface {

    public function getAll();
    public function find($data);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}