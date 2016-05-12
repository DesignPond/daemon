<?php

namespace App\Cours\Help\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'helpdesk_categories';

    protected $fillable = ['name', 'color'];

    /**
     * Indicates that this model should not be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get related tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Cours\Help\Entities\Ticket', 'category_id');
    }
}
