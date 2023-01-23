<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\TagInterface;

class TagRepository implements TagInterface 
{
	
	private $_tag;
	private $_request;

	public function __construct(Tag $tag) 
	{
		$this->_tag = $tag;

		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_tag->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_tag->findOrFail($id);
	}
	
	public function store() 
	{
		return $this->_tag->create([
				'title' => $this->_request->title,
				'slug' => Str::slug($this->_request->slug, '-'),
				'meta_title' => $this->_request->meta_title,
				'meta_description' => $this->_request->meta_description,
				'status' => $this->_request->status,
				'created_by' => Auth::user()->id
			]);
	}
	
	public function update($id) 
	{

		$tag = $this->_tag->find($id);
		$tag->title = $this->_request->title;
		$tag->slug  = Str::slug($this->_request->slug, '-');
		$tag->meta_title = $this->_request->meta_title;
		$tag->meta_description = $this->_request->meta_description;
		$tag->status = $this->_request->status;
		$tag->update();

		return $tag;
	}
	
	public function destroy($id) 
	{
		return $this->_tag->destroy($id);
	}
    
}
