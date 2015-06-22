<?php

namespace App\Cours\Structure\Entities;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = ['user_id','projet_id','type_id','groupe_id','rang','content'];

    public function getContentTextAttribute()
    {
        $this->load('type');
        $type = $this->type->slug;
        $description = $this->type->description;

        $popover = ' tabindex="0" data-trigger="focus" data-toggle="popover" data-placement="top" title="'.$this->type->title.'" data-content="'.$description.'" ';

        printf( "<span %s class='class_type class_type_%d' id='$type'>%s</span> ",$popover, $this->type_id, $this->content);
    }

    /**
     * Types
     *
     * @var query
     */
    public function type()
    {
        return $this->belongsTo('App\Cours\Type\Entities\Type');
    }

    /**
     * Groupe
     *
     * @var query
     */
    public function groupe()
    {
        return $this->belongsTo('App\Cours\Groupe\Entities\Groupe');
    }
}
