<?php
namespace App\Cours\Projet\Entities;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
	protected $fillable = ['title','user_id'];

    public function getStructureGroupeAttribute()
    {
        if(isset($this->structures) && !$this->structures->isEmpty())
        {
            $collection = new \Illuminate\Database\Eloquent\Collection;

            foreach($this->structures as $structure)
            {
                $structure->load('groupe');
                $categories[$structure->groupe->slug]['title'] = $structure->groupe->title;

                if($structure->type_id > 0)
                {
                    $structure->load('type');
                    if($structure->type->gabarit == 'arret')
                    {
                        $categories[$structure->groupe->slug]['types'][$structure->type->slug] = $structure->type->title;
                    }
                    else
                    {
                        $categories[$structure->groupe->slug]['types']['text_'.$structure->id] = 'Paragraphe '.$structure->id;
                    }
                }
            }

            return $collection->make($categories);
        }

        return [];
    }

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