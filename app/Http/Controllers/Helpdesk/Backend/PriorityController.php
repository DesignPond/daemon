<?php

namespace App\Http\Controllers\Helpdesk\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Repo\PriorityInterface;

class PriorityController extends Controller
{
    protected $priority;

    public function __construct(PriorityInterface  $priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $priorities  = $this->priority->getAll();

        return view('backend.helpdesk.priorities.index')->with(['priorities' => $priorities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.helpdesk.priorities.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $priority = $this->priority->create($request->all());

        return redirect('admin/priority')->with(['status' => 'success' , 'message' => 'La priorité a été créé']);
    }

    /**
     * @return Response
     */
    public function show($id)
    {
        $priority  = $this->priority->find($id);

        return view('backend.helpdesk.priorities.show')->with(['priority' => $priority]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $priority = $this->priority->update($request->all());

        return redirect('admin/priority')->with(['status' => 'success' , 'message' => 'La priorité a été mise à jour']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->priority->delete($id);

        return redirect('admin/priority')->with(array('status' => 'success' , 'message' => 'La priorité a été supprimée' ));
    }
}
