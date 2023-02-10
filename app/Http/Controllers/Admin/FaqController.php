<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\DataTables\FaqDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FaqInterface;
use App\Http\Requests\CreateUpdateFaqRequest;

class FaqController extends Controller
{
    private $faq;

    public function __construct(FaqInterface $faq)
    {
        $this->authorizeResource(Faq::class);        
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqDataTable $dataTable)
    {
        return $dataTable->render('admin.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateFaqRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->faq->store();

            DB::commit();

            return redirect()->route('admin.faq.index')->with('message','faq created successfully.');;

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateFaqRequest $request, Faq $faq)
    {
        DB::beginTransaction();

        try {

            $this->faq->update($faq->id);

            DB::commit();

            return redirect()->route('admin.faq.index')->with('message','faq updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        DB::beginTransaction();

        try {

            $this->faq->destroy($faq->id);

            DB::commit();
            
            return redirect()->route('admin.faq.index')->with('message','faq deleted successfully.');;

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    public function deleteRows(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $this->faq->deleteRows($request);
            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
