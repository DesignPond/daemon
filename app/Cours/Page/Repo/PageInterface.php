<?php namespace App\Cours\Page\Repo;

interface PageInterface {

    public function getAll();
    public function getCategories();
    public function find($id);
    public function search($term);
    public function buildTree($data);
    public function getBySlug($slug);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}
