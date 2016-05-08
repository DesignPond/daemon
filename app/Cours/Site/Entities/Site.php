<?php namespace App\Cours\Site\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model{

    use SoftDeletes;

    protected $dates    = ['deleted_at'];
    protected $table    = 'sites';
    protected $fillable = ['nom','url','logo','slug','description'];

    public function pages()
    {
        return $this->hasMany('App\Cours\Page\Entities\Page');
    }

    public function root()
    {
        return $this->hasOne('App\Cours\Page\Entities\Page')->where('parent_id','=',0);
    }
}