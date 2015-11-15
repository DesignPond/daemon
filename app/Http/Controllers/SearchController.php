<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Page\Repo\PageInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Search user
     *
     * @return Response
     */
    public function search(Request $request)
    {
        $results = $this->page->search($request->input('term'));

        return view('frontend.search')->with(['results' => $results, 'term' => $request->input('term')]);
    }
}
