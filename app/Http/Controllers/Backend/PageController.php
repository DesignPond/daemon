<?php

namespace App\Http\Controllers\Backend;

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
}
