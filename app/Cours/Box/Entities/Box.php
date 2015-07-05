<?php namespace App\Cours\Box\Entities;

use Illuminate\Database\Eloquent\Model;

class Box extends Model {

    public $timestamps = false;
	protected $fillable = ['top', 'left', 'no', 'width', 'height', 'couleur','text', 'border', 'zindex'];

}