<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\Contracts\RoleInterface;

class RoleRepository implements RoleInterface
{

	private $_role;
	private $_request;

	public function __construct(Role $roles)
	{
		$this->_role = $roles;

		$this->_request = app('request');
	}

	public function all()
	{
		return $this->_role->orderBy('created_at', 'asc')->get();
	}

	public function find($id)
	{
		return $this->_role->findOrFail($id);
	}

	public function store()
	{
		$role = $this->_role->create(['name' => $this->_request->name]);

		$role->givePermissionTo($this->_request->permissions);

		return $role;
	}

	public function update($id)
	{
		$role = $this->_role->find($id);
		$role->name = $this->_request->name;
		$role->save();

		$role->syncPermissions($this->_request->permissions);
		
		return $role;
	}

	public function destroy($id)
	{
		return $this->_role->destroy($id);

	}

	public function deleteRows($request)
	{
		foreach ($request->id as $id) {
			$this->_role->findOrFail($id)->destroy($id);
		}
	}
	

}
