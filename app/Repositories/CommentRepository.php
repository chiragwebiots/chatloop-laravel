<?php

namespace App\Repositories;

use Auth;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Repositories\Contracts\Commentinterface;


class CommentRepository implements Commentinterface 
{
	private $_comment;
	private $_request;

	public function __construct(Comment $comment) 
	{
		$this->_comment = $comment;
		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_comment->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_comment->findOrFail($id);
	}
	
	public function store() 
	{

	}
	
	public function update($id) 
	{
		$comment = $this->_comment->find($id);
		$comment->name = $this->_request->name ? $this->_request->name : $comment->name ;
        $comment->email = $this->_request->email ? $this->_request->email: $comment->email;
        $comment->message = $this->_request->message ? $this->_request->message : $comment->message;
		$comment->is_approved = $this->_request->is_approved ? $this->_request->is_approved : false;
		$comment->update();

		return $comment;
	}
	
	public function destroy($id) 
	{
		return $this->_comment->destroy($id);
	}

	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_comment->findOrFail($id)->destroy($id);
		}
	}
    
}
