<?php

namespace App\Repositories;

use App\Models\PricingPlan;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\PricingPlanInterface;

class PricingPlanRepository implements PricingPlanInterface 
{
	
	private $_plan;
	private $_request;

	public function __construct(PricingPlan $plan) 
	{
		$this->_plan = $plan;

		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_plan->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_plan->findOrFail($id);
	}
	
	public function store() 
	{
		return $this->_plan->create([
			'title' => $this->_request->title,
			'price' => $this->_request->price,
			'duration' => $this->_request->duration,
			'content' => $this->_request->content,
			'created_by' => Auth::user()->id
		]);
	}
	
	public function update($id) 
	{
    	$plan = $this->_plan->find($id);
		$plan->title = $this->_request->title;
		$plan->price = $this->_request->price;
		$plan->duration = $this->_request->duration;
		$plan->content = $this->_request->content;
		$plan->update();
	}
	
	public function destroy($id) 
	{
		return $this->_plan->destroy($id);
	}

	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_plan->findOrFail($id)->destroy($id);
		}
	}
    
}
