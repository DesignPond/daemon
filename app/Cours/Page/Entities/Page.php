<?php

namespace App\Cours\Page\Entities;

use Baum\Node;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
* Page
*/
class Page extends Node {

    use SoftDeletes;

    /**
    * Table name.
    *
    * @var string
    */
    protected $table = 'pages';

    protected $dates    = ['deleted_at'];
    protected $fillable = ['title','content','slug','site_id','parent_id','lft','rgt','depth','rang'];

    protected $orderColumn = 'rang';

    public function getLimitTextAttribute()
    {
        return $this->truncate($this->content,350);
    }

    public function truncate($s, $l, $e = '...', $isHTML = false){

        $i    = 0;
        $tags = [];

        if($isHTML)
        {
            preg_match_all('/<[^>]+>([^<]*)/', $s, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
            foreach($m as $o)
            {
                if($o[0][1] - $i >= $l)
                    break;
                $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
                if($t[0] != '/')
                    $tags[] = $t;
                elseif(end($tags) == substr($t, 1))
                    array_pop($tags);
                $i += $o[1][1] - $o[0][1];
            }
        }

        return substr($s, 0, $l = min(strlen($s),  $l + $i)) . (count($tags = array_reverse($tags)) ? '' : '') . (strlen($s) > $l ? $e : '');
    }

    /**
     * Return an key-value array indicating the node's depth with $seperator
     *
     * @return Array
     */
    public static function getNestedList($column, $key = null, $seperator = ' ') {
        $instance = new static;

        $key = $key ?: $instance->getKeyName();
        $depthColumn = $instance->getDepthColumnName();

        $nodes = $instance->newNestedSetQuery()->get();
        $keys  = $nodes->pluck($key);

        $values = $nodes->map(function ($node, $key) use ($seperator, $depthColumn, $column) {
            return str_repeat($seperator, $node->$depthColumn). $node->$column;
        })->toArray();

        return $keys->combine($values)->toArray();
    }

    /**
     * Get a new "scoped" query builder for the Node's model.
     *
     * @param  bool  $excludeDeleted
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newNestedSetQuery($excludeDeleted = true) {
        $builder = $this->newQuery($excludeDeleted)->orderBy($this->leftColumn);

        if ( $this->isScoped() ) {
            foreach($this->scoped as $scopeFld)
                $builder->where($scopeFld, '=', $this->$scopeFld);
        }

        return $builder;
    }
}
