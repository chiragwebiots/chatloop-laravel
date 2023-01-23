<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\PageInterface;

class PageRepository implements PageInterface 
{
	
	private $_page;
	private $_request;

	public function __construct(Page $page) 
	{
		$this->_page = $page;
		
		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_page->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_page->findOrFail($id);
	}
	
	public function store() 
	{
		return $this->_page->create([
				'title' => $this->_request->title,
				'slug' => Str::slug($this->_request->slug, '-'),
				'content' => $this->_request->content,
				'meta_title' => $this->_request->meta_title,
				'meta_description' => $this->_request->meta_description,
				'status' => $this->_request->status,
				'created_by' => Auth::user()->id
			]);
	}
	
	public function update($id) 
	{
		$page = $this->_page->find($id);
		$page->title = $this->_request->title;
		$page->slug  = Str::slug($this->_request->slug, '-');
		$page->content = $this->_request->content;
		$page->meta_title = $this->_request->meta_title;
		$page->meta_description = $this->_request->meta_description;
		$page->status = $this->_request->status;
		$page->update();

		return $page;
	}
	
	public function destroy($id) 
	{
		return $this->_page->destroy($id);
	}
    
	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_page->findOrFail($id)->destroy($id);
		}
	}
}
