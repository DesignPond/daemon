<?php

namespace App\Cours\Structure\Entities;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = ['user_id','projet_id','type_id','groupe_id','rang','content'];

}
