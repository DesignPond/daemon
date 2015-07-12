<?php namespace App\Cours\Arrow\Entities;

use Illuminate\Database\Eloquent\Model;

class Arrow extends Model {

    public $timestamps = false;
	protected $fillable = ['top', 'left', 'no', 'couleur', 'position'];

}