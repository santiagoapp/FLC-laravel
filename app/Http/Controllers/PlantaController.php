<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planta;

class PlantaController extends Controller
{

    public function index()
    {
        $result = Planta::all();
        return view('plantas.index',compact('result'));
    }

    public function store(Request $request)
    {
        $planta = new Planta;
        $planta->nombre = $request->name;
        $planta->abreviacion = $request->abreviacion;
        $planta->save();
        return response()->json($planta);
    }

    public function actualizar(Request $request)
    {
        $planta = Planta::find($request->hidden);
        $planta->nombre = $request->name;
        $planta->abreviacion = $request->abreviacion;
        $planta->save();
        return response()->json($planta);
    }
    public function eliminar(Request $request)
    {
        $planta = Planta::find($request->id);
        $planta->zona()->delete();
        $planta->delete();

        return response()->json($planta);
    }
}
