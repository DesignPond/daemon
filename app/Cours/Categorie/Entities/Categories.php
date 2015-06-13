<?php namespace App\Cours\Categorie\Entities;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $fillable = ['pid','user_id','deleted','title','image','ismain','hideOnSite'];


}