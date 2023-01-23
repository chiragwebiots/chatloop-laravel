<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\AccountInterface;

class AccountRepository implements AccountInterface 
{
	
	private $_request;

	public function __construct()
	{
		$this->_request = app('request');
	}
	
	/**
     * Update Profile
     */
	public function updateProfile()
	{
		return Auth::user()->update($this->_request->all());
	}

	
	/**
     * Update Password
     */
	public function updatePassword()
	{
		return Auth::user()->update(['password'=> Hash::make($this->_request->new_password)]);
	}
    
}
