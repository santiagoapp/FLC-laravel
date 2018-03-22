<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $result = Cargo::all();
        return view('cargos.index',compact('result'));
    }

    public function store(Request $request)
    {
        $cargo = new Cargo;
        $cargo->nombre = $request->name;
        $cargo->save();
        return response()->json($cargo);
    }

    public function actualizar(Request $request)
    {
        $cargo = Cargo::find($request->hidden);
        $cargo->nombre = $request->name;
        $cargo->save();
        return response()->json($cargo);
    }
    public function eliminar(Request $request)
    {
        $cargo = Cargo::find($request->id);
        $cargo->operario()->delete();
        $cargo->delete();

        return response()->json($cargo);
    }
}
