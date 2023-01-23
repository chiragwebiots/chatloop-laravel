<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Contracts\CategoryInterface;

class CategoryController extends Controller
{

    private $category;

    public function __construct(CategoryInterface $category)
    {
        $this->authorizeResource(Category::class);
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', ['categories' => $this->category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            
            $category = $this->category->store();

            DB::commit();

            return redirect()->route('admin.category.edit', $category->id)->with('message','category added successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['cat' => $category, 'categories' => $this->category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();

        try {
            
            $this->category->update($category->id);

            DB::commit();

            return redirect()->route('admin.category.edit', $category->id)->with('message','category updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {

            $this->category->destroy($category->id);
            DB::commit();
            
            return redirect()->route('admin.category.index')->with('message','category deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();
                        
            throw $e;

        }
    }
}
