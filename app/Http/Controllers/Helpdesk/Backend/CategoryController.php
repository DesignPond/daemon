<?php

namespace App\Http\Controllers\Helpdesk\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Help\Repo\CategoryInterface;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryInterface  $category)
    {
        $this->category = $category;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->getAll();

        return view('backend.helpdesk.categories.index')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.helpdesk.categories.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $category = $this->category->create($request->all());

        alert()->success('Catégorie crée');

        return redirect('admin/categorie');
    }

    /**
     * @return Response
     */
    public function show($id)
    {
        $categorie = $this->category->find($id);

        return view('backend.helpdesk.categories.show')->with(['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $category = $this->category->update($request->all());

        alert()->success('Catégorie mises à jour');

        return redirect('admin/categorie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->category->delete($id);

        alert()->success('carégorie supprimée');

        return redirect('admin/categorie');
    }
}
