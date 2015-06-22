<?php
namespace App\Cours\Groupe\Entities;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public $timestamps = false;
	protected $fillable = ['title'];

}