<?php

namespace App\Repositories;

use App\Models\SocialLink;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\SocialLinkInterface;

class SocialLinkRepository implements SocialLinkInterface
{
	
	private $_social_link;
	private $_request;

	public function __construct(SocialLink $social_link) 
	{
		$this->_social_link = $social_link;

		$this->_request = app('request');
	}	
	
	public function store() 
	{
		return $this->_social_link->create([
			'name' => $this->_request->name,
			'icon' => $this->_request->icon,
			'url' => $this->_request->url,
			'created_by' => Auth::user()->id
		]);
	}
	
	public function update($id) 
	{
		$social_link = $this->_social_link->find($id);
		$social_link->name = $this->_request->name;
		$social_link->icon = $this->_request->icon;
		$social_link->url = $this->_request->url;
		$social_link->update();

		return $social_link;
	}
	
	public function destroy($id) 
	{
		return $this->_social_link->destroy($id);
	}
    
}
