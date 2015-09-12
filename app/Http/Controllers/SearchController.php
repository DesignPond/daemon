<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours\Page\Repo\PageInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cours\Link\Repo\LinkInterface;

class SearchController extends Controller
{
    protected $page;

    public function __construct(PageInterface $page, LinkInterface $link)
    {
        $this->page = $page;

        $this->link = $link;
        $alllinks   = $this->link->getAll();
        $links      = $alllinks->where('parent_id', 0);

        \View::share('links', $links);
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
