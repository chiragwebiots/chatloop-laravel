<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\DataTables\TeamDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TeamInterface;
use App\Http\Requests\CreateUpdateTeamRequest;

class TeamController extends Controller
{
    private $team;

    public function __construct(TeamInterface $team)
    {
        $this->authorizeResource(Team::class);

        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeamDataTable $dataTable)
    {
        return $dataTable->render('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateTeamRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->team->store();

            DB::commit();

            return redirect()->route('admin.team.index')->with('message','team created successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateTeamRequest $request, Team $team)
    {
        DB::beginTransaction();

        try {

            $this->team->update($team->id);

            DB::commit();

            return redirect()->route('admin.team.index')->with('message','team updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $this->team->destroy($team->id);

    }
    
    public function deleteRows(Request $request)
    {   
        DB::beginTransaction();
        
        try {
            
            $this->team->deleteRows($request);
            
            DB::commit();
            
            return back()->with('message','team deleted successfully.');
            
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }

    }
}
