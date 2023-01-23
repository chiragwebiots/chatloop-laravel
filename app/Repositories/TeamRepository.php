<?php

namespace App\Repositories;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\TeamInterface;

class TeamRepository implements TeamInterface 
{
	
	private $_team;
	private $_request;

	public function __construct(Team $team) 
	{
		$this->_team = $team;

		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_team->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_team->findOrFail($id);
	}
	
	public function store() 
	{
		return $this->_team->create([
			'name' => $this->_request->name,
			'designation' => $this->_request->designation,
			'description' => $this->_request->description,
			'facebook_link' => $this->_request->facebook_link,
			'google_link' => $this->_request->google_link,
			'twitter_link' => $this->_request->twitter_link,
			'instagram_link' => $this->_request->instagram_link,
			'rss_link' => $this->_request->rss_link,
			'image' => $this->_request->image,
			'created_by' => Auth::user()->id
		]);
	}
	
	public function update($id) 
	{
    	$team = $this->_team->find($id);
		$team->name = $this->_request->name;
		$team->designation = $this->_request->designation;
		$team->description = $this->_request->description;
		$team->facebook_link = $this->_request->facebook_link;
		$team->google_link = $this->_request->google_link;
		$team->twitter_link = $this->_request->twitter_link;
		$team->instagram_link = $this->_request->instagram_link;
		$team->rss_link = $this->_request->rss_link;
		$team->image = $this->_request->image;
		$team->update();
	}
	
	public function destroy($id) 
	{
		return $this->_team->destroy($id);
	}
    
	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_team->findOrFail($id)->destroy($id);
		}
	}
}
