<?php
namespace App\Cours\Projet\Entities;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
	protected $fillable = ['title','user_id'];

    /**
     * Structures
     *
     * @var query
     */
    public function user()
    {
        return $this->belongsTo('App\Cours\User\Entities\User');
    }

    /**
     * Structures
     *
     * @var query
     */
    public function structures()
    {
        return $this->hasMany('App\Cours\Structure\Entities\Structure', 'projet_id');
    }
}