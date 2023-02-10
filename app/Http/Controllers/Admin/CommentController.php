<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\CommentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCommentRequest;
use App\Repositories\Contracts\Commentinterface;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Commentinterface $comment)
    {
        $this->authorizeResource(Comment::class);
        $this->comment     = $comment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentDataTable $dataTable)
    {
        return $dataTable->render('admin.comment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comment.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        DB::beginTransaction();

        try {

            $this->comment->update($comment->id);

            DB::commit();

            return redirect()->route('admin.comment.index');

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
    public function destroy(Comment $comment)
    {
        DB::beginTransaction();

        try {

            $this->comment->destroy($comment->id);
            DB::commit();

            return redirect()->route('admin.comment.index')->with('message', 'blog deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->comment->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
