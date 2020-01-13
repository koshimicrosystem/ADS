<?php

namespace App\Http\Controllers;

use App\Advance;
use App\Due;
use App\Fee;
use App\Student;
use App\Transection;
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
        $dues=Due::where([['status','=','due'],['student_id','=',$student->id]])->get();
        $advances=Advance::where([['status','=','advance'],['student_id','=',$student->id]])->get();
        return compact('dues','advances');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $student = Student::find($request->student_id);
        $dues=Due::where([['status','=','due'],['student_id','=',$student->id]])->get();
        $advances=Advance::where([['status','=','advance'],['student_id','=',$student->id]])->get();
        $pay_amount = $request->pay_amount;

        $transection = new Transection();
        $transection->amount = $request->pay_amount;
        $transection->student_id = $request->student_id;
        $transection->user_id = $request->user_id;
        $transection->save();

        foreach ($advances as $key => $value) {
            $pay_amount += $value->amount;
            $value->status= $transection->id;
            $value->save();
        }

        foreach ($dues as $key => $value) {
            if($pay_amount >= $value->amount){
                $value->status = 'paid';
                $pay_amount =$pay_amount - $value->amount;
                $value->transection_id = $transection->id;
                $value->save();
                continue;
            }else{
                continue;
            }
        }
        if($pay_amount > 0){
        $advance = new Advance();
        $advance->student_id = $student->id;
        $advance->amount = $pay_amount;
        $advance->transection_id = $transection->id;
        $advance->save();
        }

        $duest=Due::where([['status','=','due'],['student_id','=',$student->id]])->get();
        $advancest=Advance::where([['status','=','advance'],['student_id','=',$student->id]])->get();
        
        return compact('duest','advancest','transection');
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
