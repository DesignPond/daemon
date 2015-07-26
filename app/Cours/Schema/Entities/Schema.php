<?php
namespace App\Cours\Schema\Entities;

use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{

    protected $table = 'schemas';

	protected $fillable = ['title','description','user_id','rang','slug'];

    /**
     * Structures
     *
     * @var query
     */
    public function box()
    {
        return $this->hasMany('App\Cours\Box\Entities\Box', 'schema_id', 'id');
    }

    /**
     * Structures
     *
     * @var query
     */
    public function arrow()
    {
        return $this->hasMany('App\Cours\Arrow\Entities\Arrow', 'schema_id', 'id');
    }
}