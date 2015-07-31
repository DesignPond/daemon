<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Schema\Repo\SchemaInterface;
use App\Cours\Page\Worker\PageWorker;
use App\Cours\Page\Repo\PageInterface;

class SchemaController extends Controller
{
    protected $schema;
    protected $page;
    protected $worker;

    public function __construct(SchemaInterface $schema, PageWorker $worker, PageInterface $page)
    {
        $this->schema = $schema;
        $this->page   = $page;
        $this->worker = $worker;
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $schema  = $this->schema->find($id);
        $root    = $this->page->find($id);

        return view('frontend.schema')->with([ 'schema' => $schema, 'root' => $root ]);
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
