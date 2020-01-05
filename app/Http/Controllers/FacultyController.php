<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Faculty;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('Faculty')->orderby('updated_at','desc')->with('contacts','userable')->get();
        return $users;
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
        $user = new User();
        $user->f_name = $request->f_name;
        $user->m_name = $request->m_name;
        $user->l_name = $request->l_name;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->password = Hash::make($request->phone_number);
        $user->email = $request->email;
        $user->save();
        $user->assignRole('Faculty');

        $number = new Contact();
        $number->default = true;
        $number->type = "Number";
        $number->email_number = $request->phone_number;
        $user->contacts()->save($number);

        $email = new Contact();
        $email->default = true;
        $email->type = "Email";
        $email->email_number = $request->email;
        $user->contacts()->save($email);

        $faculty = new Faculty();
        $faculty->doj=$request->doj;
        $faculty->save();

        $faculty->user()->save($user);
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->contacts;
        $user->addresses()->orderBy('updated_at', 'desc')->get();
        $user->roles()->orderBy('updated_at', 'desc')->get();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
