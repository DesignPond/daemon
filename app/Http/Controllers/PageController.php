<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cours\Page\Repo\PageInterface;
use App\Http\Requests\CreatePage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->getAll();

        return view('backend.pages.index')->with(array( 'pages' => $pages ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pages = $this->page->getAll();
        
        return view('backend.pages.create')->with(['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePage $request)
    {
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';exit;
        $page = $this->page->create($request->all());

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
        $page    = $this->page->find($id);
        $parents = $this->page->getAll();

        return view('backend.pages.show')->with(array( 'page' => $page ,'parents' => $parents));
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
    public function update($id, Request $request)
    {
/*        echo '<pre>';
        print_r($request->all());
        echo '</pre>';exit;*/

        $page = $this->page->update($request->all());

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
        //
    }
}
