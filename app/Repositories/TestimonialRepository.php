<?php

namespace App\Repositories;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\TestimonialInterface;

class TestimonialRepository implements TestimonialInterface 
{
	
	private $_testimonial;
	private $_request;

	public function __construct(Testimonial $testimonial) 
	{
		$this->_testimonial = $testimonial;

		$this->_request  = app('request');
	}
	
	public function all() 
	{
		return $this->_testimonial->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_testimonial->findOrFail($id);
	}
	
	public function store() 
	{
		return $this->_testimonial->create([
				'name' => $this->_request->name,
				'designation' => $this->_request->designation,
				'description' => $this->_request->description,
				'image' => $this->_request->image,
				'created_by' => Auth::user()->id
			]);
	}
	
	public function update($id) 
	{
		$testimonial = $this->_testimonial->find($id);
		$testimonial->name = $this->_request->name;
		$testimonial->designation = $this->_request->designation;
		$testimonial->description = $this->_request->description;
		$testimonial->image = $this->_request->image;
		$testimonial->update();

		return $testimonial;
	}
	
	public function destroy($id) 
	{
		return $this->_testimonial->destroy($id);
	}

	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_testimonial->findOrFail($id)->destroy($id);
		}
	}
    
}
