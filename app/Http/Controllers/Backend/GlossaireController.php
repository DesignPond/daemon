<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Cours\Glossaire\Repo\GlossaireInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GlossaireController extends Controller
{
    protected $glossaire;

    public function __construct(GlossaireInterface $glossaire)
    {
        $this->glossaire = $glossaire;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $glossaires = $this->glossaire->getAll();

        return view('backend.glossaires.index')->with(array( 'glossaires' => $glossaires));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.glossaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $glossaire = $this->glossaire->create($request->all());

        return redirect('admin/glossaire/'.$glossaire->id)->with(array('status' => 'success' , 'message' => 'Les mots a été ajoutées' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $glossaire = $this->glossaire->find($id);

        return view('backend.glossaires.show')->with(['glossaire' => $glossaire]);
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
        $glossaire = $this->glossaire->update($request->all());

        return redirect('admin/glossaire/'.$glossaire->id)->with( array('status' => 'success' , 'message' => 'Mise à jour ok' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->glossaire->delete($id);

        return redirect('admin/glossaire')->with(array('status' => 'success' , 'message' => 'Les mots ont été supprimées' ));
    }
}
