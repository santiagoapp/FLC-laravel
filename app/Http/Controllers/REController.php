<?php

namespace App\Http\Controllers;

use App\RE;
use App\Item;
use App\ItemHasRE;
use Illuminate\Http\Request;

class REController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = RE::paginate(15);
        return view('datos.RE',compact('result'));

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
     * @param  \App\RE  $rE
     * @return \Illuminate\Http\Response
     */
    public function show(RE $rE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RE  $rE
     * @return \Illuminate\Http\Response
     */
    public function edit(RE $rE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RE  $rE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RE $rE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RE  $rE
     * @return \Illuminate\Http\Response
     */
    public function destroy(RE $rE)
    {
        //
    }
    public function mostrarItems(Request $request)
    {
        $arr = array();
        
        $result = ItemHasRE::where('re_id',$request->id)->get();

        foreach ($result as $res) {
            $item = Item::find($res->item_id);

            $arr['id'][] = $item->id;
            $arr['codigo'][] = $item->codigo;
            $arr['descripcion'][] = $item->descripcion;
            $arr['producto'][] = $item->descripcion;
            $arr['nota'][] = $res->nota;
        }

        return response()->json($arr);
    }
}
