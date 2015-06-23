<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Projet\Repo\ProjetInterface;
use App\Cours\Groupe\Repo\GroupeInterface;
use App\Cours\Type\Repo\TypeInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjetController extends Controller
{
    protected $projet;
    protected $groupe;
    protected $type;

    public function __construct(ProjetInterface $projet, GroupeInterface $groupe, TypeInterface $type)
    {
        $this->projet = $projet;
        $this->groupe = $groupe;
        $this->type   = $type;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $groupes = $this->groupe->getAll();
        $types   = $this->type->getAll();

        $projet  = $this->projet->find(1);

        return view('backend.projets.index')->with(array( 'projet' => $projet, 'groupes' => $groupes, 'types' => $types ));
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
        //
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
