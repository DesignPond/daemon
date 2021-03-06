<?php

namespace App\Cours\User\Repo;

interface UserInterface {

    public function getAll();
    public function find($data);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}
