<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\DataTables\BlogDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Repositories\Contracts\TagInterface;
use App\Repositories\Contracts\BlogInterface;
use App\Repositories\Contracts\CategoryInterface;

class BlogController extends Controller
{

    private $blog;
    private $category;
    private $tag;

    public function __construct(BlogInterface $blog, CategoryInterface $category, TagInterface $tag)
    {
        $this->authorizeResource(Blog::class);
        $this->blog     = $blog;
        $this->tag      = $tag;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category;
        $tags = $this->tag->all()->pluck('title', 'id')->toArray();

        return view('admin.blog.create', ['categories' => $categories->getHierarchy(), 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->blog->store();

            DB::commit();

            return redirect()->route('admin.blog.index')->with('message', 'blog added successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = $this->category;

        $tags = $this->tag->all('post')->pluck('title', 'id')->toArray();

        return view('admin.blog.edit', ['blog' => $blog, 'categories' => $categories->getHierarchy(), 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        DB::beginTransaction();

        try {

            $this->blog->update($blog->id);

            DB::commit();

            return redirect()->route('admin.blog.index')->with('message', 'blog updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        DB::beginTransaction();

        try {

            $this->blog->destroy($blog->id);
            DB::commit();

            return redirect()->route('admin.blog.index')->with('message', 'blog deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->blog->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
