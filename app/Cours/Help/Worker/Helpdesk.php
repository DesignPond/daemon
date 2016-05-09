<?php

namespace App\Cours\Help\Worker;

use App\Cours\Help\Repo\TicketInterface;
use App\Cours\Help\Repo\CategoryInterface;
use App\Cours\Help\Repo\CommentInterface;
use App\Cours\Help\Repo\PriorityInterface;
use App\Cours\Help\Repo\StatusInterface;

class Helpdesk implements HelpdeskInterface
{
    protected $ticket;
    protected $category;
    protected $comment;
    protected $priority;
    protected $status;
    
    public function __construct(TicketInterface $ticket, CategoryInterface $category, CommentInterface $comment, PriorityInterface $priority, StatusInterface $status)
    {
        $this->ticket   = $ticket;
        $this->category = $category;
        $this->comment  = $comment;
        $this->priority = $priority;
        $this->status   = $status;
    }

    public function getTickets()
    {
        return $this->ticket->getAll();
    }

    public function getCompleted()
    {
        return $this->ticket->getAll(true);
    }

    public function find($id)
    {
        return $this->ticket->find($id);
    }
}