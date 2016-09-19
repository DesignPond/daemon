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

        alert()->success('Ajouté');

        return redirect('admin/priority');
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

        alert()->success('Mise à jour');

        return redirect('admin/priority');
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

        alert()->success('Supprimé');

        return redirect('admin/priority');
    }
}
