<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    public function index()
    {
        $result = Clasificacion::all();
        return view('clasificacions.index',compact('result'));
    }

    public function store(Request $request)
    {
        $clasificacion = new Clasificacion;
        $clasificacion->nombre = $request->name;
        $clasificacion->save();
        return response()->json($clasificacion);
    }

    public function actualizar(Request $request)
    {
        $clasificacion = Clasificacion::find($request->hidden);
        $clasificacion->nombre = $request->name;
        $clasificacion->save();
        return response()->json($clasificacion);
    }
    public function eliminar(Request $request)
    {
        $clasificacion = Clasificacion::find($request->id);
        $clasificacion->equipo()->delete();
        $clasificacion->delete();

        return response()->json($clasificacion);
    }
}
