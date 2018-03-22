<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Carbon\Carbon;
use App\OT;
use App\RV;

class reportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OTs = OT::
        join('item_has_o_ts', 'o_ts.id', '=', 'item_has_o_ts.ot_id')
        // ->join('r_vs', 'o_ts.id', '=', 'r_vs.ot_id')
        ->join('items', 'item_has_o_ts.item_id', '=', 'items.id')
        ->select('o_ts.fecha_impresion',
            'o_ts.id',
            'o_ts.fecha_recibido_produccion',
            'o_ts.cliente',
            'o_ts.vendedor',
            // 'r_vs.expedicion', 
            // 'r_vs.vencimiento',
            'items.codigo', 
            'items.descripcion',
            'items.existencias',
            'item_has_o_ts.fecha_entrega'
        )
        ->where('fecha_recibido_produccion','<>', null)
        // ->whereColumn('r_vs.ot_id','=', 'o_ts.id')
        ->orderBy('id', 'asc')
        ->get();
        // dd($OTs);
        // $OTs = OT::where('fecha_recibido_produccion','<>', null)->get();
        // foreach ($ordenesActivas as $key => $ot) {
        //     $fecha_recibido_produccion = Carbon::parse($ot->fecha_recibido_produccion);
        //     $fecha_impresion = Carbon::parse($ot->fecha_impresion);
        //     // var_dump($fecha_recibido_produccion->diffInDays($fecha_impresion));
        // }
        // foreach ($OTs as $key => $ot) {
        //     var_dump($ot->rV);
        //     echo "________________________________";
        // }
        // dd($OTs);
        return view('datos.reportes',compact('OTs'));
        // dd($ordenesActivas);
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
