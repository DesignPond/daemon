<?php namespace App\Cours\Box\Repo;

interface BoxInterface {

    public function getAll();
    public function projet($id);
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}