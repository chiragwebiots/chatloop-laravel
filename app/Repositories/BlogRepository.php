<?php

namespace App\Repositories;

use Auth;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Repositories\Contracts\BlogInterface;


class BlogRepository implements BlogInterface 
{
	
	private $_blog;
	private $_request;

	public function __construct(Blog $blog) 
	{
		$this->_blog = $blog;
		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_blog->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_blog->findOrFail($id);
	}
	
	public function store() 
	{
		$blog = $this->_blog->create([
					'title' => $this->_request->title,
					'slug' => Str::slug($this->_request->slug, '-'),
					'excerpt' => $this->_request->excerpt,
					'content' => $this->_request->content,
					'image' => $this->_request->image,
					'featured' => $this->_request->featured ? 1 : 0,
					'sticky' => $this->_request->sticky ? 1 : 0,
					'meta_title' => $this->_request->meta_title,
					'meta_description' => $this->_request->meta_description,
					'status' => $this->_request->status,
					'created_by' => Auth::user()->id
				]);
		
		$blog->categories()->sync($this->_request->categories);
		
		$blog->tags()->sync($this->_request->tags);

		return $blog;
	}
	
	public function update($id) 
	{
		$blog = $this->_blog->find($id);
		$blog->title = $this->_request->title;
		$blog->slug  = Str::slug($this->_request->slug, '-');
        $blog->excerpt = $this->_request->excerpt;
        $blog->content = $this->_request->content;
		$blog->image = $this->_request->image;
        $blog->featured = $this->_request->featured ? 1 : 0;
        $blog->sticky = $this->_request->sticky ? 1 : 0;
		$blog->meta_title = $this->_request->meta_title;
		$blog->meta_description = $this->_request->meta_description;
		$blog->status = $this->_request->status;
		$blog->update();

		$blog->categories()->sync($this->_request->categories);
		$blog->tags()->sync($this->_request->tags);

		return $blog;
	}
	
	public function destroy($id) 
	{
		return $this->_blog->destroy($id);
	}

	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_blog->findOrFail($id)->destroy($id);
		}
	}
    
}
