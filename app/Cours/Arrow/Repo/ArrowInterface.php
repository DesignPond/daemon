<?php namespace App\Cours\Arrow\Repo;

interface ArrowInterface {

    public function getAll();
    public function projet($id);
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}
