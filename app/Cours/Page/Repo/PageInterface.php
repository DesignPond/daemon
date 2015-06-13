<?php namespace App\Cours\Categorie\Repo;

interface CategorieInterface {

    public function getAll($pid);
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}
