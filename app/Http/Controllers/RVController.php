<?php

namespace App\Http\Controllers;

use App\RV;
use App\Item;
use App\ItemHasRV;
use Illuminate\Http\Request;

class RVController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = RV::paginate(15);
        return view('datos.RV',compact('result'));
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
     * @param  \App\RV  $rV
     * @return \Illuminate\Http\Response
     */
    public function show(RV $rV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RV  $rV
     * @return \Illuminate\Http\Response
     */
    public function edit(RV $rV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RV  $rV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RV $rV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RV  $rV
     * @return \Illuminate\Http\Response
     */
    public function destroy(RV $rV)
    {
        //
    }
    public function mostrarItems(Request $request)
    {
        $arr = array();
        
        $result = ItemHasRV::where('rv_id',$request->id)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['cantidad'][] = $res->cantidad;
            $arr['nota'][] = $res->nota;
        }

        return response()->json($arr);
    }
}
