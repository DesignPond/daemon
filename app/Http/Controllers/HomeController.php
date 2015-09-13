<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Requests\SendMessage;
use App\Cours\Page\Repo\PageInterface;
use App\Cours\Schema\Repo\SchemaInterface;
use App\Cours\Link\Repo\LinkInterface;
use App\Cours\Glossaire\Repo\GlossaireInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $page;
    protected $projet;
    protected $link;
    protected $alllinks;
    protected $helper;
    protected $glossaire;

    public function __construct(PageInterface $page,SchemaInterface $schema, LinkInterface $link, GlossaireInterface $glossaire)
    {
        $this->page      = $page;
        $this->schema    = $schema;
        $this->link      = $link;
        $this->glossaire = $glossaire;

        $this->alllinks = $this->link->getAll();
        $this->helper = new \App\Helper\Helper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function accueil()
    {
        $links = $this->alllinks->where('parent_id', 0);

        return view('frontend.index')->with(['links' => $links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function contact()
    {
        $links = $this->alllinks->where('parent_id', 0);

        return view('frontend.contact')->with(['links' => $links]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function page($slug)
    {
        $page = $this->page->getBySlug($slug);

        return view('frontend.page')->with(['page' => $page]);
    }

    /**
     * Send contact message
     *
     * @return Response
     */
    public function sendMessage(SendMessage $request){

        $data = array('email' => $request->email, 'name' => $request->name, 'remarque' => $request->remarque );

        Mail::send('emails.contact', $data, function ($message) use ($data) {

            $message->from($data['email'], $data['name']);

            $message->to('info@methodologie.ch')->subject('Message depuis le site www.methodologie.ch');
        });

        return redirect('/')->with(array('status' => 'success', 'message' => '<strong>Merci pour votre message</strong><br/>Nous vous contacterons dès que possible.'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
