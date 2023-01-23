<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialLink;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\SocialLinkDataTable;
use App\Http\Requests\CreateUpdateSocialLinkRequest;
use App\Repositories\Contracts\SocialLinkInterface;

class SocialLinkController extends Controller
{
    private $social_link;

    public function __construct(SocialLinkInterface $social_link)
    {
        $this->authorizeResource(SocialLink::class);        
        $this->social_link = $social_link;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.theme_options.social-links.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theme_options.social-links.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateSocialLinkRequest $request)
    {        
        DB::beginTransaction();

        try {

            $this->social_link->store();

            DB::commit();

            return redirect()->route('admin.social-links.index')->with('message','Social link created successfully.');;

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $social_link)
    {
        return view('admin.theme_options.social-links.edit', ['social_link' => $social_link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateSocialLinkRequest $request, SocialLink $social_link)
    {
        DB::beginTransaction();

        try {

            $this->social_link->update($social_link->id);

            DB::commit();

            return redirect()->route('admin.social-links.index')->with('message','Social link updated successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $social_link)
    {
        DB::beginTransaction();

        try {

            $this->social_link->destroy($social_link->id);

            DB::commit();
            
            return redirect()->route('admin.social-links.index')->with('message','Social link deleted successfully.');;

        } catch (\Exception $e) {

            DB::rollback();
            
            throw $e;
        }
    }
}
