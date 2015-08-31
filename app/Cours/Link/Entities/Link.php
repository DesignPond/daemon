<?php

namespace App\Cours\Link\Entities;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $fillable = ['titre','url','parent_id'];
    public $timestamps  = false;

    public function categorie(){

        return $this->hasOne('App\Cours\Page\Entities\Page', 'parent_id');
    }

}