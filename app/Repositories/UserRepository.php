<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\UserInterface;

class UserRepository implements UserInterface 
{
	
	private $_user;
	private $_role;
	private $_request;

	public function __construct(User $user, Role $role) 
	{
		$this->_user = $user;
		$this->_role = $role;
		$this->_request = app('request');
	}
	
	public function all() 
	{
		return $this->_user->orderBy('created_at', 'desc')->get();
	}

	public function find($id) 
	{
		return $this->_user->findOrFail($id);
	}
	
	public function store() 
	{
		$user = $this->_user->create([
            'name' => $this->_request->name,
            'email' => $this->_request->email,
            'password' => Hash::make($this->_request->password)
        ]);

		$role = $this->_role->find($this->_request->role);

		$user->assignRole($role);

		return $user;
	}
	
	public function update($id) 
	{
        $this->find($id)->update($this->_request->all());

		$role = $this->_role->find($this->_request->role);

		$user = $this->find($id)->syncRoles($role);
		
		return $user;
	}

	public function updatePassword($id) 
	{
		return $this->find($id)->update(['password'=> Hash::make($this->_request->new_password)]);
	}
	
	public function destroy($id) 
	{
		return $this->_user->destroy($id);
	}

	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_user->findOrFail($id)->destroy($id);
		}
	}
    
}
