<?php
namespace App\Cours\Help\Repo;

interface TicketInterface
{
    public function getAll($completed = false);
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
