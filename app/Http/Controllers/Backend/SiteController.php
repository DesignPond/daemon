<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Site\Repo\SiteInterface;
use App\Cours\Service\UploadInterface;

class SiteController extends Controller
{
    protected $upload;
    protected $site;

    public function __construct(UploadInterface $upload, SiteInterface  $site)
    {
        $this->upload      = $upload;
        $this->site        = $site;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $sites  = $this->site->getAll();

        return view('backend.sites.index')->with(['sites' => $sites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.sites.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $site = $this->site->create($request->all());

        alert()->success('Site crée');

        return redirect('admin/site/'.$site->id);
    }

    /**
     * @return Response
     */
    public function show($id)
    {
        $site  = $this->site->find($id);

        return view('backend.sites.show')->with(['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $site = $this->site->update($request->all());

        alert()->success('Site mis à jour');

        return redirect('admin/site/'.$site->id);
    }
}
