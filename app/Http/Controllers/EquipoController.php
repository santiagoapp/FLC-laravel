<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Clasificacion;
use App\Zona;
use App\Operario;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Equipo::all();
        $zonas = Zona::all();
        $operarios = Operario::all();
        $clasificacions = Clasificacion::all();
        // dd($result[1]);
        return view('equipos.index',compact('result','zonas','clasificacions','operarios'));
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
        $equipo = new Equipo;

        $extension = $request->file('imagen')->getClientOriginalExtension();
        $dir = public_path('img/equipos/');
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
        $imgDir = $request->file('imagen')->move($dir, $filename);

        $equipo->catalogo = $request->catalogo;
        $equipo->dibujo = $request->dibujo;
        $equipo->diagrama_electrico = $request->diagrama_electrico;
        $equipo->manual = $request->manual;
        $equipo->marca = $request->marca;
        $equipo->modelo = $request->modelo;
        $equipo->factura = $request->factura;
        $equipo->corriente = $request->corriente;
        $equipo->voltaje = $request->voltaje;
        $equipo->procedencia = $request->procedencia;
        $equipo->nombre = $request->nombre;
        $equipo->maquina_id = $request->maquina_id;
        $equipo->zona_id = $request->zona;
        $equipo->clasificacion_id = $request->clasificacion;
        $equipo->operario_id = $request->operario;
        $equipo->descripcion = $request->descripcion;
        $equipo->observacion = $request->observacion;
        $equipo->ruta_imagen = $filename;

        $equipo->save();
        $equipo->clasificacion;
        $equipo->operario;
        $equipo->zona;
        return response()->json($equipo);

    }

    public function eliminar(Request $request)
    {
        $equipo = Equipo::find($request->id);
        $equipo->delete();

        return response()->json($equipo);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
