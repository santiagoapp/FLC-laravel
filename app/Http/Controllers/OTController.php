<?php

namespace App\Http\Controllers;

use App\OT;
use App\ItemHasOT;
use App\Item;
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
        $result = OT::paginate(15);
        return view('datos.OT',compact('result'));
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
        $arr = array();

        $url = url()->current();
        $url_array = explode('/', $url);
        $orden = $url_array[count($url_array)-1];
        
        $result = ItemHasOT::where('ot_id',$orden)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);
            
            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['fecha_entrega'][] = $res->fecha_entrega;
            $arr['existencias'][] = $item->existencias;
        }

        return response()->json($arr);
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
