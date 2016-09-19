<?php

namespace App\Http\Controllers\Helpdesk\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Repo\CommentInterface;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(CommentInterface $comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = $this->comment->create($request->all());

        // Send email to webmaster
        \Mail::send('emails.comment', ['comment' => $comment], function ($m) use ($comment) {
            $m->from('doc@hubwebdroit.ch', 'Hubwebdroit | Documentation');
            $m->to('cindy.leschaud@gmail.com', 'DesignPond')->subject('Un nouveau commentaire a été posté');
        });

        alert()->success('Le commentaire a été ajouté');

        return redirect()->back()->with(['status' => 'success' , 'message' => 'Le commentaire a été ajouté']);
    }
}
