<?php

namespace App\Repositories;

use Auth;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Repositories\Contracts\CategoryInterface;

class CategoryRepository implements CategoryInterface
{

	private $_category;
	private $_request;

	public function __construct(Category $category)
	{
		$this->_category = $category;

		$this->_request  = app('request');
	}

	public function all()
    {
		return $this->_category->withOutParent()->get();
	}

	public function getHierarchy()
	{
		return collect($this->_category->getHierarchy())->pluck('title','id');
	}

	public function find($id)
  {
		return $this->_category->findOrFail($id);
	}

	public function store()
    {
		return $this->_category->create([
				'title' => $this->_request->title,
				'slug' => Str::slug($this->_request->slug, '-'),
                'description' => $this->_request->description,
                'parent_id' => $this->_request->parent,
				'meta_title' => $this->_request->meta_title,
				'meta_description' => $this->_request->meta_description,
				'status' => $this->_request->status,
				'created_by' => Auth::user()->id
			]);
	}

	public function update($id)
    {
		$category = $this->_category->find($id);
		$category->title = $this->_request->title;
		$category->slug  = Str::slug($this->_request->slug, '-');
        $category->description = $this->_request->description;
        $category->parent_id = $this->_request->parent;
		$category->meta_title = $this->_request->meta_title;
		$category->meta_description = $this->_request->meta_description;
		$category->status = $this->_request->status;
		$category->update();

		return $category;
	}

	public function destroy($id)
    {
		return $this->_category->destroy($id);
	}

}
