<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class FeeController extends Controller
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

    public function defaulters(){
        // return Deal::with(["redeem" => function($q){
        //     $q->where('user_id', '=', 1);
        // }])->get();
        return Student::with(["std","advances","user" => function($contacts){
            $contacts->with('contacts');
        },"dues" => function($q){
            $q->where('status', '=', 'due')->with('fee');
        }])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataset($search = null)
    {
        $name =  User::role('Student')->with(['contacts','userable' => function ($query) {
            $query->with('std');
        }])
        ->where('email','like','%'.$search.'%')
        ->orWhere('f_name','like','%'.$search.'%')
        ->orWhere('m_name','like','%'.$search.'%')
        ->orWhere('l_name','like','%'.$search.'%')
        ->orWhere('userable_id','like','%'.$search.'%')
        ->take(15)->get();
        return $name;
    }

    public function getfee($id){
        $student = Student::find($id);
        $student->dues->where('status','=','due');
        $student->advances->where('status','=','advance');
        return ($student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
