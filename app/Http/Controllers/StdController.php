<?php

namespace App\Http\Controllers;

use App\Std;
use Illuminate\Http\Request;

class StdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stds=Std::all();
        return $stds;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Std  $std
     * @return \Illuminate\Http\Response
     */
    public function show(Std $std)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Std  $std
     * @return \Illuminate\Http\Response
     */
    public function edit(Std $std)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Std  $std
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Std $std)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Std  $std
     * @return \Illuminate\Http\Response
     */
    public function destroy(Std $std)
    {
        //
    }
}
