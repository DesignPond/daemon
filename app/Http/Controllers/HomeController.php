<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Requests\SendMessage;
use App\Cours\Page\Repo\PageInterface;
use App\Cours\Glossaire\Repo\GlossaireInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $page;
    protected $helper;
    protected $glossaire;

    public function __construct(PageInterface $page, GlossaireInterface $glossaire)
    {
        $this->page      = $page;
        $this->glossaire = $glossaire;
        $this->helper    = new \App\Helper\Helper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function accueil()
    {
        $page       = $this->page->getBySlug('accueil');
        $parent     = $page->getAncestorsAndSelf()->toHierarchy();

        return view('frontend.accueil')->with([ 'page' => $page, 'parent' => $parent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function contact()
    {
        return view('frontend.contact');
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
}
