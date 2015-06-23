<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cours\Page\Repo\PageInterface;
use App\Http\Requests\CreatePage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->getAll();
        $root  = $this->page->getRoot();

        return view('backend.pages.index')->with(array( 'pages' => $pages, 'root' => $root ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pages = $this->page->getAll();
        
        return view('backend.pages.create')->with(['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePage $request)
    {
        $page = $this->page->create($request->all());

        return redirect('admin/page/'.$page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page    = $this->page->find($id);
        $parents = $this->page->getAll();

        return view('backend.pages.show')->with(array( 'page' => $page ,'parents' => $parents));
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
    public function update($id, Request $request)
    {
/*        echo '<pre>';
        print_r($request->all());
        echo '</pre>';exit;*/

        $page = $this->page->update($request->all());

        return redirect('admin/page/'.$page->id);
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

    public function hierarchy(Request $request)
    {
        $data = $request->input('data');

        echo '<pre>';
        print_r($data);
        echo '</pre>';

    }

    public function build()
    {
        $pages = [
            ['id' => 1, 'title' => 'La recherche juridique', 'children' => [
                ['id' => 2, 'title' => 'La législation suisse' , 'children' => [
                    ['id' => 3, 'title' => 'La législation fédérale'],
                    ['id' => 4, 'title' => 'La structure d’une loi fédérale'],
                    ['id' => 5, 'title' => 'Les législations cantonales']
                ]],
                ['id' => 6, 'title' => 'La jurisprudence', 'children' => [
                    ['id' => 7, 'title'  => 'Les jurisprudences fédérales'],
                    ['id' => 8, 'title'  => 'Les jurisprudences cantonales'],
                    ['id' => 9, 'title'  => 'La consultation de la jurisprudence'],
                    ['id' => 10, 'title' => 'La structure des arrêts du Tribunal fédéral']
                ]],
                ['id' => 11, 'title' => 'La doctrine', 'children' => [
                    ['id' => 12, 'title' => 'Les principaux types de publication'],
                    ['id' => 13, 'title' => 'La consultation de la doctrine'],
                    ['id' => 14, 'title' => 'Les revues principales du droit suisse']
                ]]
            ]],
            ['id' => 15, 'title' => 'La rédaction juridique', 'children' => [
                ['id' => 16, 'title' => 'Généralités'],
                ['id' => 17, 'title' => 'La préparation', 'children' => [
                    ['id' => 18, 'title' => 'Détermination de l’objectif'],
                    ['id' => 19, 'title' => 'Position du problème'],
                    ['id' => 20, 'title' => 'Examen du problème']
                ]],
                ['id' => 21, 'title' => 'La rédaction proprement dite', 'children' => [
                    ['id' => 22, 'title' => 'Les objectifs'],
                    ['id' => 23, 'title' => 'La structure'],
                    ['id' => 24, 'title' => 'La formulation']
                ]],
                ['id' => 25, 'title' => 'La mise au point', 'children' => [
                    ['id' => 26, 'title' => 'L\'établissement de l\'appareil critique'],
                    ['id' => 27, 'title' => 'Les modes de références'],
                    ['id' => 28, 'title' => 'La mise en forme']
                ]]
            ]]
        ];

        $all_pages  = \App\Cours\Page\Entities\Page::buildTree($pages); // => true
    }
    
}
