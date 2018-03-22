<?php

namespace App\Http\Controllers;

use App\OS;
use App\Item;
use App\PrfItemHasOS;
use App\MatItemHasOS;
use App\MaqItemHasOS;
use Illuminate\Http\Request;

class OSController extends Controller
{
    /**

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = OS::paginate(15);
       return view('datos.OS',compact('result'));
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
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function show(OS $oS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function edit(OS $oS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OS $oS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OS  $oS
     * @return \Illuminate\Http\Response
     */
    public function destroy(OS $oS)
    {
        //
    }
    public function mostrarItemsPrf(Request $request)
    {
        $arr = array();

        $result = PrfItemHasOS::where('os_id',$request->id)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['estado'][] = $res->estado;
        }

        return response()->json($arr);
    }
    public function mostrarItemsMat(Request $request)
    {
        $arr = array();

        $result = MatItemHasOS::where('os_id',$request->id)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['estado'][] = $res->estado;
        }

        return response()->json($arr);
    }
    public function mostrarItemsMaq(Request $request)
    {
        $arr = array();

        $result = MaqItemHasOS::where('os_id',$request->id)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['existencia'][] = $item->existencias;
            $arr['fecha'][] = $res->fecha;
        }

        return response()->json($arr);
    }
}
