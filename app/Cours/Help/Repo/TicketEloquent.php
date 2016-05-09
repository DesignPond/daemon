<?php
namespace App\Cours\Help\Repo;

use App\Cours\Help\Repo\TicketInterface;
use App\Cours\Help\Entities\Ticket as M;

class TicketEloquent implements TicketInterface
{
    protected $ticket;

    public function __construct(M $ticket)
    {
        $this->ticket = $ticket;
    }

    public function getAll($completed = false)
    {
        if($completed)
        {
            return $this->ticket->complete()->get();
        }

        return $this->ticket->active()->get();
    }

    public function find($id){

        return $this->ticket->findOrFail($id);
    }

    public function create(array $data){

        $ticket = $this->ticket->create(array(
            'subject'      => $data['subject'],
            'content'      => $data['content'],
            'html'         => isset($data['html']) ? $data['html'] : '',
            'status_id'    => $data['status_id'],
            'priority_id'  => $data['priority_id'],
            'category_id'  => $data['category_id'],
            'completed_at' => isset($data['completed_at']) && !empty($data['completed_at']) ? $data['completed_at'] : null
        ));

        if( ! $ticket )
        {
            return false;
        }

        return $ticket;

    }

    public function update(array $data){

        $ticket = $this->ticket->findOrFail($data['id']);

        if( ! $ticket )
        {
            return false;
        }

        $ticket->fill($data);
        $ticket->save();

        return $ticket;
    }

    public function delete($id){

        $ticket = $this->ticket->find($id);

        return $ticket->delete($id);
    }

}
