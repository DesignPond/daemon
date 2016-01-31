<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Page\Worker\PageWorker;
use App\Cours\Page\Repo\PageInterface;
use App\Cours\Glossaire\Repo\GlossaireInterface;

class PageController extends Controller
{
    protected $page;
    protected $worker;
    protected $helper;
    protected $glossaire;

    public function __construct(PageWorker $worker, PageInterface $page, GlossaireInterface $glossaire)
    {
        $this->page      = $page;
        $this->worker    = $worker;
        $this->glossaire = $glossaire;

        $this->helper    = new \App\Helper\Helper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page       = $this->page->getBySlug($id);
        $parent     = $page->getAncestorsAndSelf()->toHierarchy();
        $glossaires = $this->glossaire->getAll();

        $template   = $page->template;

        return view('frontend.'.$template)->with([ 'page' => $page, 'id' => $id, 'parent' => $parent , 'glossaires' => $glossaires]);
    }

}
