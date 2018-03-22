<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHasRQ;
use App\ItemHasOT;
use App\RQ;
use App\OT;
use App\Departament;
use App\City;

class AgregarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $result = ItemHasRQ::all();
    	$OTs = OT::all();
    	$cities = City::all();
    	$departaments = Departament::all();
        // $result = RQ::whereDate('fecha', '>' ,'2016-12-31')->get();
    	return view('agregar',compact('departaments','OTs','cities'));
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
    public function mostrarInformacion(Request $request)
    {
    	$RQs = RQ::where('ot_id',$request->id)->get();
        $items = ItemHasOT::where('ot_id',$request->id)->get();
        $oT = OT::find($request->id);
        $arr1 = $RQs->toArray();
        $arr2 = $items->toArray();
        $arr3 = $oT->toArray();
        $arr = [$arr1,$arr2,$arr3];

        return response()->json($arr);
    }
}
