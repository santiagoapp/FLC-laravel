<?php

namespace App\Http\Controllers;

use App\OT;
use Illuminate\Http\Request;

class OTController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datos.OT');
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
     * @param  \App\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function show(OT $oT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function edit(OT $oT)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OT $oT)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OT  $oT
     * @return \Illuminate\Http\Response
     */
    public function destroy(OT $oT)
    {
        //
    }
}
