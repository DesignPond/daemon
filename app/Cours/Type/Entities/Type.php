<?php

namespace App\Cours\Type\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = ['title'];
    public $timestamps = false;
}