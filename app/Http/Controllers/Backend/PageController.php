<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Cours\Page\Worker\PageWorker;
use App\Cours\Page\Repo\PageInterface;
use App\Cours\Site\Repo\SiteInterface;
use App\Http\Requests\CreatePage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $page;
    protected $site;
    protected $worker;

    public function __construct(PageInterface $page, SiteInterface $site, PageWorker $worker)
    {
        $this->page   = $page;
        $this->site   = $site;
        $this->worker = $worker;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->getAll();
        $root  = $this->page->getRoot();

        return view('backend.pages.index')->with(array( 'pages' => $pages, 'root' => $root ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pages = $this->page->getRoot();
        $sites = $this->site->getAll();
        
        return view('backend.pages.create')->with(['pages' => $pages, 'sites' => $sites]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePage $request)
    {
        $page = $this->page->create($request->all());

        alert()->success('Page crée');

        return redirect('admin/page/'.$page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page  = $this->page->find($id);
        $pages = $this->page->getRoot();
        $sites = $this->site->getAll();

        return view('backend.pages.show')->with(array('page' => $page ,'pages' => $pages, 'sites' => $sites));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $page = $this->page->update($request->all());

        alert()->success('Page mises à jour');

        return redirect('admin/page/'.$page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->page->delete($id);

        alert()->success('Page supprimée');

        return redirect('admin/page');
    }

    public function hierarchy(Request $request)
    {
        $data = $request->input('data');

        $tree = $this->worker->prepareTree($data);
       // $new  = $this->page->buildTree($tree);

        echo '<pre>';
        print_r($tree);
        echo '</pre>';

    }
}
