<?php

namespace App\Cours\Glossaire\Entities;

use Illuminate\Database\Eloquent\Model;

class Glossaire extends Model
{
    protected $table    = 'glossaires';
	protected $fillable = ['keyword','description'];
    public $timestamps  = false;

}