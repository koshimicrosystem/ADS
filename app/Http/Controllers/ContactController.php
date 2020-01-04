<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email_number = $request->email_number;
        $contact->type = $request->contacttype;
        if($request->status == "default"){
            $contact->default = true;
        }
        $user->contacts()->save($contact);
        
        return $user->contacts()->orderBy('updated_at', 'desc')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $contact_id)
    {
        Contact::find($contact_id)->delete();
        $user = User::find($user_id);
        return $user->contacts()->orderBy('updated_at', 'desc')->get();
    }
    public function default($user_id, $contact_id)
    {
        $contact = Contact::find($contact_id);
        $contact->default = !$contact->default;
        $contact->save();

        $user = User::find($user_id);
        return $user->contacts()->orderBy('updated_at', 'desc')->get();
    }
}
