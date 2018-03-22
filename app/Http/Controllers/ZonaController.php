<?php

namespace App\Http\Controllers;

use App\Zona;
use App\Planta;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

    public function index()
    {
        $result = Zona::all();
        $plantas = Planta::all();
        return view('zonas.index',compact('result','plantas'));
    }

    public function store(Request $request)
    {
        $zona = new Zona;
        $zona->nombre = $request->nombre;
        $zona->nomenclatura = $request->nomenclatura;
        $zona->planta_id = $request->planta;
        $zona->save();
        $zona->planta;
        return response()->json($zona);
    }

    public function actualizar(Request $request)
    {
        $zona = Zona::find($request->hidden);
        $zona->nombre = $request->nombre;
        $zona->nomenclatura = $request->nomenclatura;
        $zona->planta_id = $request->planta;
        $zona->save();
        $zona->planta;
        return response()->json($zona);
    }

    public function eliminar(Request $request)
    {
        $zona = Zona::find($request->id);
        $zona->delete();

        return response()->json($zona);
    }
}
