<?php

namespace App\Repositories;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\FaqInterface;

class FaqRepository implements FaqInterface 
{
	
	private $_faq;
	private $_request;

	public function __construct(Faq $faq) 
	{
		$this->_faq = $faq;
		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_faq->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_faq->findOrFail($id);
	}
	
	public function store() 
	{
		return $this->_faq->create([
				'title' => $this->_request->title,
				'description' => $this->_request->description,
				'created_by' => Auth::user()->id
			]);
	}
	
	public function update($id) 
	{
		$faq = $this->_faq->find($id);
		$faq->title = $this->_request->title;
		$faq->description = $this->_request->description;
		$faq->update();

		return $faq;
	}
	
	public function destroy($id) 
	{
		return $this->_faq->destroy($id);
	}
    
}
