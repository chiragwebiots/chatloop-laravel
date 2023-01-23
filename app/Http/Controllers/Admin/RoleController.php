<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\Contracts\RoleInterface;

class RoleController extends Controller
{

    private $role;

    public function __construct(RoleInterface $role)
    {
        $this->authorizeResource(Spatie\Permission\Models\Role::class);
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create')->with('message','Role created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->role->store();

            DB::commit();

            return redirect()->route('admin.role.index');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->role->update($role->id);

        return redirect()->route('admin.role.index')->with('message','role updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $this->role->destroy($id);

            DB::commit();

            return redirect()->route('admin.role.index')->with('message','role deleted Successfully');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->role->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
