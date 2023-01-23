<?php

namespace App\Http\Controllers;

use App\Models\Page;


class PageController extends Controller
{
    /**
     * Show the Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->where('slug', '!=' , 'home')->firstOrFail();

        return view('frontend.page', ['page' => $page])->withShortcodes();
    }
}
