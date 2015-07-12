<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Arrow\Repo\ArrowInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArrowController extends Controller
{

    protected $arrow;

    public function __construct(ArrowInterface $arrow)
    {
        $this->arrow = $arrow;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function projet($id)
    {
        $arrows = $this->arrow->getAll($id);

        return response()->json(['error' => false, 'items' => $arrows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $arrow = $request->input('model');

        $new = $this->arrow->create(json_decode($arrow,true));

        return response()->json(['error' => false, 'items' => $new]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->arrow->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->arrow->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $arrow = $request->input('model');

        return $this->arrow->update(json_decode($arrow,true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->arrow->delete($id);

        return response()->json(['error' => false]);
    }
}
