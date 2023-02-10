<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $Setting;

    public function __construct()
    {
        $this->Setting = new Setting();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        if ($this->Setting->first()->display_homepage == 'post') {

            $blogs = Blog::orderByDesc('sticky')->latest()->paginate($this->Setting->post_show);
            return view('frontend.blog-list', ['blogs' => $blogs]);
        }
            
        $setting = Setting::where('id', $this->Setting->first()->id)->firstOrFail();
        $page_id = ($setting->display_homepage == 'page') ? $setting->homepage : $setting->postpage;

        $page = Page::where('id', $page_id)->firstOrFail();
        return view('frontend.index', ['page' => $page])->withShortcodes();
    }
}
