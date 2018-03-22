<?php

namespace App\Http\Controllers;

use App\RQ;
use App\ItemHasRQ;
use App\Item;
use Carbon\Carbon;
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
        $result = RQ::paginate(15);
        return view('datos.RQ',compact('result'));
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
        $arr = array();

        $url = url()->current();
        $url_array = explode('/', $url);
        $requisicion = $url_array[count($url_array)-1];
        
        $result = ItemHasRQ::where('rq_id',$requisicion)->get();

        foreach ($result as $res) {

            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['compra'][] = $res->compra;
            $arr['servicio'][] = $res->servicio;
            $arr['estado'][] = $res->estado;
            $arr['existencias'][] = $item->existencias;
            $arr['fecha'][] = $res->fecha;

        }

        return response()->json($arr);
        // return $requisicion;
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
    public function mostrarItems(Request $request)
    {
        $arr = array();
        
        $result = ItemHasRQ::where('rq_id',$request->id)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['compra'][] = $res->compra;
            $arr['servicio'][] = $res->servicio;
            $arr['estado'][] = $res->estado;
            $arr['existencia'][] = round($item->existencias);
            $arr['fecha'][] = Carbon::parse($res->fecha)->format('Y-m-d');
        }

        return response()->json($arr);
    }
}
