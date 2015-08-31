<?php
namespace App\Cours\Link\Repo;

interface LinkInterface
{
    public function getAll();
    public function find($id);
    public function byParent($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
