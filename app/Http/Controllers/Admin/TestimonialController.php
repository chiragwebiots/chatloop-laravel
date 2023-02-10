<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\TestimonialDataTable;
use App\Repositories\Contracts\TestimonialInterface;
use App\Http\Requests\CreateUpdateTestimonialRequest;

class TestimonialController extends Controller
{

    private $testimonial;

    public function __construct(TestimonialInterface $testimonial)
    {
        $this->authorizeResource(Testimonial::class);
        $this->testimonial = $testimonial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TestimonialDataTable $dataTable)
    {
        return $dataTable->render('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateTestimonialRequest $request)
    {
        DB::beginTransaction();

        try {

           $this->testimonial->store();

            DB::commit();

            return redirect()->route('admin.testimonial.index')->with('message','testimonial created successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        DB::beginTransaction();

        try {

            $this->testimonial->update($testimonial->id);

            DB::commit();

            return redirect()->route('admin.testimonial.index')->with('message','testimonial updated successfully.');;

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        DB::beginTransaction();

        try {
            
            $this->testimonial->destroy($testimonial->id);

            DB::commit();

            return redirect()->route('admin.testimonial.index')->with('message','testimonial deleted successfully.');;

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->testimonial->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
