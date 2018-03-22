<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHasRQ;
use App\ItemHasOT;
use App\RQ;
use App\OT;
use App\Departament;
use App\City;
Use Carbon\Carbon;

class agregarOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OTs = OT::all();
        return view('agregarOT',compact('OTs'));
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
    public function mostrarOT(Request $request)
    {
        $OT = OT::find($request->id);
        return response()->json($OT);
    }
    public function guardarFechaRecibido(Request $request)
    {
        $OT = OT::find($request->id);
        $fecha = Carbon::parse($request->fecha_recibido);
        $OT->fecha_recibido_produccion = $fecha;
        $response = $OT->save();
        $response = ($response) ? "Registro actualizado" : "Algo salió mal :c" ;
        return $response;
    }
}
