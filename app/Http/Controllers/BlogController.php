<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\Category;
use App\Http\Requests\CreateUpdateCommentRequest;

class BlogController extends Controller
{
    private $Setting;
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->Setting = Setting::first();
        $this->comment = $comment;
    }

    /**
     * Show the list of blogs
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if ($this->Setting->display_homepage == 'post') {

            $blogs = Blog::orderByDesc('sticky')->latest()->paginate($this->Setting->post_show);

            return view('frontend.blog-list', ['blogs' => $blogs]);

        }else {

            $settings = Setting::where('id', $this->Setting->id)->get('postpage');

            foreach ($settings as $setting) {

                $page_id = $setting->postpage;
                $page = Page::where('id', $page_id)->firstOrFail();
            }

            return view('frontend.index', ['page' => $page])->withShortcodes();
        }
    }

    /**
     * Show the list of blogs by category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category(Category $category)
    {
        $blogs = $category->blogs()->orderByDesc('sticky')->orderByDesc('created_at')->get();
        return view('frontend.archive', ['blogs' => $blogs, 'data' => $category]);
    }

    /**
     * Show the list of blogs by category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tag(Tag $tag)
    {
        $blogs = $tag->blogs()->orderByDesc('sticky')->orderByDesc('created_at')->get();
        
        return view('frontend.archive', ['blogs' => $blogs, 'data' => $tag]);
    }

    /**
     * Show the list of blogs by author
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function author($author)
    {
        $blogs = Blog::whereHas('createdBy', function ($query) use ($author) {
                $query->Where('name', 'LIKE', '%' . $author . '%');
            })->get();

        return view('frontend.archive', ['blogs' => $blogs, 'data' => $author]);
    }

    /**
     * Show the details of blog
     * @param  $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        return view('frontend.single', ['blog' => $blog]);
    }

    /**
     * Save the blog comment
     * 
     * @param  $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function comment(CreateUpdateCommentRequest $request)
    {
        $this->comment->Create($request->except(['_method', '_token']));
        return back()->with('success', 'Comment Sent Successfully.');
    }
}
