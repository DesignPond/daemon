<?php
namespace App\Cours\Type\Repo;

interface TypeInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
