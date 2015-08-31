<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Link\Repo\LinkInterface;
use App\Cours\Page\Repo\PageInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    protected $link;
    protected $page;

    public function __construct(LinkInterface $link, PageInterface $page)
    {
        $this->link = $link;
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $links = $this->link->getAll();
        $categories = $this->page->getCategories()->lists('title','id')->all();

        return view('backend.links.index')->with(array( 'links' => $links, 'categories' => $categories ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->page->getCategories();

        return view('backend.links.create')->with(array( 'categories' => $categories ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $link = $this->link->create($request->all());

        return redirect('admin/link/'.$link->id)->with(array('status' => 'success' , 'message' => 'Le lien a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $link = $this->link->find($id);
        $categories = $this->page->getCategories();

        return view('backend.links.show')->with(['link' => $link, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $link = $this->link->update($request->all());

        return redirect('admin/link/'.$link->id)->with( array('status' => 'success' , 'message' => 'Le lien a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->link->delete($id);

        return redirect('admin/link')->with(array('status' => 'success' , 'message' => 'Le link a été supprimé' ));
    }
}
