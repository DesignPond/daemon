<?php

namespace App\Http\Controllers\Helpdesk\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Repo\TicketInterface;
use App\Cours\Help\Worker\HelpdeskInterface;

class TicketController extends Controller
{
    protected $ticket;
    protected $helpdesk;

    public function __construct(HelpdeskInterface $helpdesk, TicketInterface  $ticket)
    {
        $this->ticket   = $ticket;
        $this->helpdesk = $helpdesk;

        setlocale(LC_ALL, 'fr_FR.UTF-8');
    }

    /**
     * @return Response
     */
    public function index()
    {
        $tickets  = $this->ticket->getAll();

        return view('backend.helpdesk.tickets.index')->with(['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->helpdesk->getCategory();
        $priorities = $this->helpdesk->getPriority();
        $statuses   = $this->helpdesk->getStatus();

        return view('backend.helpdesk.tickets.create')->with(['categories' => $categories, 'priorities' => $priorities, 'statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $ticket = $this->ticket->create($request->all());

        return redirect('admin/ticket/'.$ticket->id)->with(['status' => 'success' , 'message' => 'Le ticket a été créé']);
    }

    /**
     * @return Response
     */
    public function show($id)
    {
        $ticket     = $this->ticket->find($id);
        $categories = $this->helpdesk->getCategory();
        $priorities = $this->helpdesk->getPriority();
        $statuses   = $this->helpdesk->getStatus();

        return view('backend.helpdesk.tickets.show')->with(['ticket' => $ticket, 'categories' => $categories, 'priorities' => $priorities, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $ticket = $this->ticket->update($request->all());

        return redirect('admin/ticket/'.$ticket->id)->with(['status' => 'success' , 'message' => 'Le ticket a été mise à jour']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->comment->delete($id);

        return redirect('admin/ticket')->with(array('status' => 'success' , 'message' => 'Le ticket a été supprimé' ));
    }
}
