<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Requests\SendMessage;
use App\Cours\Page\Repo\PageInterface;
use App\Cours\Site\Repo\SiteInterface;
use App\Cours\Page\Worker\PageWorker;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $page;
    protected $helper;
    protected $site;
    protected $worker;

    public function __construct(PageInterface $page, SiteInterface $site, PageWorker $worker)
    {
        $this->page   = $page;
        $this->site   = $site;
        $this->worker = $worker;
        $this->helper = new \App\Helper\Helper;
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

        return view('frontend.index')->with([ 'page' => $page, 'parent' => $parent]);
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
        $page  = $this->page->getBySlug($slug);
        $pages = $this->page->getSiteRoot($page->site_id);
        $site  = $this->site->find($page->site_id);

        return view('frontend.page')->with(['page' => $page, 'pages' => $pages,'site' => $site]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function site($id)
    {
        $site = $this->page->getSiteRoot($id);

        return view('frontend.site')->with(['site' => $site]);
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

        alert()->success('<strong>Merci pour votre message</strong><br/>Nous vous contacterons dès que possible.');

        return redirect('/');

    }
}
