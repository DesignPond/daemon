<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Schema\Repo\SchemaInterface;
use App\Cours\Link\Repo\LinkInterface;
use App\Cours\Page\Worker\PageWorker;
use App\Cours\Page\Repo\PageInterface;
use App\Cours\Groupe\Repo\GroupeInterface;
use App\Cours\Glossaire\Repo\GlossaireInterface;

class SchemaController extends Controller
{
    protected $schema;
    protected $page;
    protected $worker;
    protected $helper;
    protected $glossaire;

    public function __construct(SchemaInterface $schema, PageWorker $worker, PageInterface $page, GroupeInterface $groupe,LinkInterface $link, GlossaireInterface $glossaire)
    {
        $this->schema    = $schema;
        $this->link      = $link;
        $this->page      = $page;
        $this->worker    = $worker;
        $this->groupe    = $groupe;
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
        return view('backend.schemas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->page->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       // $schema  = $this->schema->find($id);
        $page    = $this->page->find($id);
        $parent  = $page->getAncestorsAndSelf()->toHierarchy();
        $groupes = $this->groupe->getAll();

        $links     = $this->worker->getLinks($page);
        $glossaires = $this->glossaire->getAll();

        return view('frontend.schema')->with([ 'page' => $page, 'id' => $id, 'parent' => $parent , 'groupes' => $groupes, 'links' => $links, 'glossaires' => $glossaires]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function schemas($id)
    {
        $schema = $this->page->find($id);
        $level  = $schema->getLevel();
        $level  = ($level > 0 ? $level + 1 : 1);

        return $this->helper->jsonObj($schema,$level);
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
