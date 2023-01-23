<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Repositories\Contracts\RoleInterface;
use App\Repositories\Contracts\UserInterface;

class UserController extends Controller
{
    private $role;
    private $user;

    public function __construct(RoleInterface $role, UserInterface $user)
    {
        $this->authorizeResource(User::class);
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all()->pluck('name','id')->toArray();

        return view('admin.user.create', ['roles' => $roles])->with('message','Data added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = $this->user->store();

            DB::commit();

            return redirect()->route('admin.user.index', $user->id)->with('message','User added Successfully');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $this->role->all()->pluck('name','id');

        return view('admin.user.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {

            $this->user->update($user->id);

            DB::commit();

            return back()->with('message','user profile update successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Update Password
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $this->user->updatePassword($id);

            DB::commit();

            return back()->with('message','user password update successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();

        try {

            $this->user->destroy($user->id);

            DB::commit();

            return redirect()->route('admin.user.index')->with('message','user deleted Successfully');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->user->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
        
    }
}
