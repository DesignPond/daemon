<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Box\Repo\BoxInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BoxController extends Controller
{

    protected $box;

    public function __construct(BoxInterface $box)
    {
        $this->box = $box;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function projet($id)
    {
        $boxes = $this->box->getAll($id);

        return response()->json(['error' => false, 'items' => $boxes]);
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
        $box = $request->input('model');

        $new = $this->box->create(json_decode($box,true));

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
        return $this->box->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->box->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $box = $request->input('model');

        return $this->box->update(json_decode($box,true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->box->delete($id);

        return response()->json(['error' => false]);
    }
}
