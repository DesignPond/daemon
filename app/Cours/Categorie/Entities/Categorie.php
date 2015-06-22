<?php namespace App\Cours\Categorie\Entities;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
    public $timestamps = false;
	protected $fillable = ['title'];
}