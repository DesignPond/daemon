<?php

namespace App\Http\Controllers\Helpdesk\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Repo\StatusInterface;

class StatusController extends Controller
{
    protected $status;

    public function __construct(StatusInterface  $status)
    {
        $this->status = $status;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $statuses = $this->status->getAll();

        return view('backend.helpdesk.statuses.index')->with(['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.helpdesk.statuses.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $status = $this->status->create($request->all());

        return redirect('admin/status/'.$status->id)->with(['status' => 'success' , 'message' => 'Le statut a été créé']);
    }

    /**
     * @return Response
     */
    public function show($id)
    {
        $status  = $this->status->find($id);

        return view('backend.helpdesk.statuses.show')->with(['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $status = $this->status->update($request->all());

        return redirect('admin/status/'.$status->id)->with(['status' => 'success' , 'message' => 'Le statut a été mise à jour']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->status->delete($id);

        return redirect('admin/status')->with(array('status' => 'success' , 'message' => 'Le statut a été supprimé' ));
    }
}
