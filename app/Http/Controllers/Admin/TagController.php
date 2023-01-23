<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\DataTables\TagDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Repositories\Contracts\TagInterface;

class TagController extends Controller
{
    private $tag;

    public function __construct(TagInterface $tag)
    {
        $this->authorizeResource(Tag::class);
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagDataTable $dataTable)
    {
        return $dataTable->render('admin.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        DB::beginTransaction();

        try {

            $tag = $this->tag->store();

            DB::commit();

            return redirect()->route('admin.tag.index')->with('message','tag created successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        DB::beginTransaction();

        try {

            $this->tag->update($tag->id);

            DB::commit();

            return redirect()->route('admin.tag.index')->with('message','tag updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        DB::beginTransaction();

        try {

            $this->tag->destroy($tag->id);

            DB::commit();

            return redirect()->route('admin.tag.index')->with('message','tag deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }
}
