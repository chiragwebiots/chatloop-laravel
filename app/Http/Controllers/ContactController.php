<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
    protected $contact;
    protected $user;
    public function __construct(Contact $contact, User $user)
    {
        $this->contact = $contact;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateContactRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        $this->contact->create($request->except(['_method', '_token']));
    
        Mail::to($this->user::role('admin')->pluck('email'))->send(new ContactMail($request->except(['_method', '_token'])));
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CreateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(CreateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
