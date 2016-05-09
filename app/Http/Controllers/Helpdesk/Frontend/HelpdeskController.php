<?php

namespace App\Http\Controllers\Helpdesk\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Worker\HelpdeskInterface;
use App\Cours\Help\Repo\TicketInterface;

class HelpdeskController extends Controller
{
    protected $helpdesk;
    protected $ticket;

    public function __construct(HelpdeskInterface $helpdesk, TicketInterface $ticket)
    {
        $this->helpdesk = $helpdesk;
        $this->ticket   = $ticket;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets  = $this->helpdesk->getTickets();
        $complete = $this->helpdesk->getCompleted();
        
        return view('frontend.tickets.index')->with(['tickets' => $tickets, 'complete' => $complete]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        $tickets  = $this->helpdesk->getTickets();
        $complete = $this->helpdesk->getCompleted();

        return view('frontend.tickets.complete')->with(['tickets' => $tickets, 'complete' => $complete]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->helpdesk->getCategory();
        $priorities = $this->helpdesk->getPriority();
        $statuses   = $this->helpdesk->getStatus();
        
        return view('frontend.tickets.create')->with(['categories' => $categories, 'priorities' => $priorities, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = $this->ticket->create($request->all());

        return redirect('ticket')->with(['status' => 'success' , 'message' => 'Le ticket a été ouvert']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = $this->helpdesk->find($id);

        return view('frontend.tickets.show')->with(['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
