<?php

namespace App\Http\Controllers\Helpdesk\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Repo\CommentInterface;
use App\Cours\Help\Repo\TicketInterface;

class CommentController extends Controller
{
    protected $comment;
    protected $ticket;

    public function __construct(CommentInterface  $comment, TicketInterface $ticket)
    {
        $this->comment = $comment;
        $this->ticket  = $ticket;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $comments = $this->comment->getPaginate();

        return view('backend.helpdesk.comments.index')->with(['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tickets  = $this->ticket->getAll();

        return view('backend.helpdesk.comments.create')->with(['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $comment = $this->comment->create($request->all());

        return redirect('admin/comment/'.$comment->id)->with(['status' => 'success' , 'message' => 'Le comment a été créé']);
    }

    /**
     * @return Response
     */
    public function show($id)
    {
        $comment  = $this->comment->find($id);
        $tickets  = $this->ticket->getAll();

        return view('backend.helpdesk.comments.show')->with(['comment' => $comment, 'tickets' => $tickets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $comment = $this->comment->update($request->all());

        return redirect('admin/comment/'.$comment->id)->with(['status' => 'success' , 'message' => 'Le commentaire a été mis à jour']);
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

        return redirect('admin/comment')->with(array('status' => 'success' , 'message' => 'Le commentaire a été supprimé' ));
    }
}
