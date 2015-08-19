<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Page\Worker\PageWorker;
use App\Cours\Page\Repo\PageInterface;
use App\Http\Requests\CreatePage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $page;
    protected $worker;

    public function __construct(PageInterface $page, PageWorker $worker)
    {
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
        $pages = $this->page->getTree('id', '&nbsp;&nbsp;&nbsp;');
        
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

        return redirect('admin/page/'.$page->id)->with(array('status' => 'success' , 'message' => 'La page a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page  = $this->page->find($id);
        $pages = $this->page->getTree('id', '&nbsp;&nbsp;&nbsp;');

        return view('backend.pages.show')->with(array( 'page' => $page ,'pages' => $pages));
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

        $page = $this->page->update($request->all());

        return redirect('admin/page/'.$page->id)->with( array('status' => 'success' , 'message' => 'La page a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->page->delete($id);

        return redirect('admin/page')->with(array('status' => 'success' , 'message' => 'La page a été supprimé' ));
    }

    public function hierarchy(Request $request)
    {
        $data = $request->input('data');

        $tree = $this->worker->prepareTree($data);
       // $new  = $this->page->buildTree($tree);

        echo '<pre>';
        print_r($tree);
        echo '</pre>';

    }

    public function build()
    {
        $pages = [
            ['id' => 29, 'slug' => str_slug('Accueil'), 'title' => 'Accueil', 'Rang' => 1],
            ['id' => 1,  'slug' => str_slug('La recherche juridique'), 'title' => 'La recherche juridique', 'rang' => 2, 'children' => [
                ['id' => 2, 'slug' => str_slug('La législation suisse'), 'title' => 'La législation suisse' , 'children' => [
                    ['id' => 3, 'slug' => str_slug('La législation fédérale'), 'title' => 'La législation fédérale'],
                    ['id' => 4, 'slug' => str_slug('La structure d’une loi fédérale'), 'title' => 'La structure d’une loi fédérale'],
                    ['id' => 5, 'slug' => str_slug('Les législations cantonales'), 'title' => 'Les législations cantonales']
                ]],
                ['id' => 6, 'slug' => str_slug('La jurisprudence'), 'title' => 'La jurisprudence', 'children' => [
                    ['id' => 7,  'slug' => str_slug('Les jurisprudences fédérales'), 'title'  => 'Les jurisprudences fédérales'],
                    ['id' => 8,  'slug' => str_slug('Les jurisprudences cantonales'), 'title'  => 'Les jurisprudences cantonales'],
                    ['id' => 9,  'slug' => str_slug('La consultation de la jurisprudence'), 'title'  => 'La consultation de la jurisprudence'],
                    ['id' => 10, 'slug' => str_slug('La structure des arrêts du Tribunal fédéral'),  'title' => 'La structure des arrêts du Tribunal fédéral']
                ]],
                ['id' => 11, 'slug' => str_slug('La doctrine'), 'title' => 'La doctrine', 'children' => [
                    ['id' => 12, 'slug' => str_slug('Les principaux types de publication'), 'title' => 'Les principaux types de publication'],
                    ['id' => 13, 'slug' => str_slug('La consultation de la doctrine'), 'title' => 'La consultation de la doctrine'],
                    ['id' => 14, 'slug' => str_slug('Les revues principales du droit suisse'), 'title' => 'Les revues principales du droit suisse']
                ]]
            ]],
            ['id' => 15, 'slug' => str_slug('La rédaction juridique'), 'title' => 'La rédaction juridique', 'rang' => 3, 'children' => [
                ['id' => 16, 'slug' => str_slug('Généralités'), 'title' => 'Généralités'],
                ['id' => 17, 'slug' => str_slug('La préparation'), 'title' => 'La préparation', 'children' => [
                    ['id' => 18, 'slug' => str_slug('Détermination de l’objectif'), 'title' => 'Détermination de l’objectif'],
                    ['id' => 19, 'slug' => str_slug('Position du problème'), 'title' => 'Position du problème'],
                    ['id' => 20, 'slug' => str_slug('Examen du problème'), 'title' => 'Examen du problème']
                ]],
                ['id' => 21, 'slug' => str_slug('La rédaction proprement dite'), 'title' => 'La rédaction proprement dite', 'children' => [
                    ['id' => 22, 'slug' => str_slug('Les objectifs'), 'title' => 'Les objectifs'],
                    ['id' => 23, 'slug' => str_slug('La structure'), 'title' => 'La structure'],
                    ['id' => 24, 'slug' => str_slug('La formulation'), 'title' => 'La formulation']
                ]],
                ['id' => 25, 'slug' => str_slug('La mise au point'), 'title' => 'La mise au point', 'children' => [
                    ['id' => 26, 'slug' => str_slug('L\'établissement de l\'appareil critique'), 'title' => 'L\'établissement de l\'appareil critique'],
                    ['id' => 27, 'slug' => str_slug('Les modes de références'), 'title' => 'Les modes de références'],
                    ['id' => 28, 'slug' => str_slug('La mise en forme'), 'title' => 'La mise en forme']
                ]]
            ]],
            ['id' => 30, 'slug' => str_slug('Contact'), 'title' => 'Contact','rang' => 4],
        ];

        $all_pages  = \App\Cours\Page\Entities\Page::buildTree($pages); // => true
    }
    
}
