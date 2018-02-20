<?php

namespace App\Http\Controllers;

use App\RQ;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $arr = array();
        // $result = RQ::whereDate('fecha', '>', date('2017-1-1'));
        $result = RQ::whereDate('fecha', '>' ,'2016-12-31')->get();

        // foreach ($result as $res) {

        //     $arr['id'][] = $res->id;
        //     $arr['start_date'][] = $res->fecha_entrega;
        //     $arr['end_date'][] = $res->fecha_entrega;
        //     $arr['text'][] = $res->autoriza;
        // }

        // $result = response()->json($arr);
        // $result = $arr;
        return view('calendario',compact('result'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
