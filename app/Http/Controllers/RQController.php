<?php

namespace App\Http\Controllers;

use App\RQ;
use Illuminate\Http\Request;

class RQController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datos.RQ');
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
     * @param  \App\RQ  $rQ
     * @return \Illuminate\Http\Response
     */
    public function show(RQ $rQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RQ  $rQ
     * @return \Illuminate\Http\Response
     */
    public function edit(RQ $rQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RQ  $rQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RQ $rQ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RQ  $rQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(RQ $rQ)
    {
        //
    }
}
