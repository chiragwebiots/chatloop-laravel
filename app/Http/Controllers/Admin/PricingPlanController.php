<?php

namespace App\Http\Controllers\Admin;

use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\PricingPlanDataTable;
use App\Repositories\Contracts\PricingPlanInterface;
use App\Http\Requests\CreateUpdatePricingPlanRequest;

class PricingPlanController extends Controller
{
    private $plan;

    public function __construct(PricingPlanInterface $plan)
    {
        $this->plan = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PricingPlanDataTable $dataTable)
    {
        return $dataTable->render('admin.pricing-plan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricing-plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdatePricingPlanRequest $request)
    {
        DB::beginTransaction();

        try {

            $plan = $this->plan->store();

            DB::commit();

            return redirect()->route('admin.pricing-plan.index')->with('message','pricingplan created successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(PricingPlan $pricingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingPlan $pricingPlan)
    {
        return view('admin.pricing-plan.edit', ['plan' => $pricingPlan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdatePricingPlanRequest $request, PricingPlan $pricingPlan)
    {
        DB::beginTransaction();

        try {

            $this->plan->update($pricingPlan->id);

            DB::commit();

            return redirect()->route('admin.pricing-plan.index')->with('message','pricingplan updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        DB::beginTransaction();

        try {

            $this->plan->destroy($pricingPlan->id);

            DB::commit();

            return redirect()->route('admin.pricing-plan.index')->with('message','pricingplan deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->plan->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
