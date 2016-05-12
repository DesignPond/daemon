<?php

namespace App\Cours\Help\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'helpdesk_comments';

    protected $fillable = ['name', 'content', 'html', 'ticket_id', 'user_id'];

    /**
     * Get related ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo('App\Cours\Help\Entities\Ticket', 'ticket_id');
    }

    /**
     * Get comment owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Cours\User\Entitie\User', 'user_id');
    }
}
