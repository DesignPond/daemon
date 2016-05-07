<?php namespace App\Cours\Site\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model{

    use SoftDeletes;

    protected $dates    = ['deleted_at'];
    protected $table    = 'sites';
    protected $fillable = ['nom','url','logo','slug','description'];

    public function newsletter()
    {
        return $this->hasMany('App\Droit\Newsletter\Entities\Newsletter');
    }

    public function menus()
    {
        return $this->hasMany('App\Droit\Menu\Entities\Menu');
    }

    public function pages()
    {
        return $this->hasMany('App\Droit\Page\Entities\Page');
    }

    public function arrets()
    {
        return $this->hasMany('App\Droit\Arret\Entities\Arret');
    }

    public function analyses()
    {
        return $this->hasMany('App\Droit\Analyse\Entities\Analyse');
    }

    public function categories()
    {
        return $this->hasMany('App\Droit\Categorie\Entities\Categorie');
    }

    public function questions()
    {
        return $this->hasMany('App\Droit\Faq\Entities\Faq_question');
    }

}