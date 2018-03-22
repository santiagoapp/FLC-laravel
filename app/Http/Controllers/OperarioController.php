<?php

namespace App\Http\Controllers;

use App\Operario;
use App\Cargo;
use Illuminate\Http\Request;

class OperarioController extends Controller
{

    public function index()
    {
        $result = Operario::all();
        $cargos = Cargo::all();
        return view('operarios.index',compact('result','cargos'));
    }

    public function store(Request $request)
    {
        $operario = new Operario;
        $operario->nombre = $request->nombre;
        $operario->apellido = $request->apellido;
        $operario->cargo_id = $request->cargo;
        $operario->save();
        $operario->cargo;
        return response()->json($operario);
    }
    public function actualizar(Request $request)
    {
        $operario = Operario::find($request->hidden);
        $operario->nombre = $request->nombre;
        $operario->apellido = $request->apellido;
        $operario->cargo_id = $request->cargo;
        $operario->save();
        $operario->cargo;
        return response()->json($operario);
    }

    public function eliminar(Request $request)
    {
        $operario = Operario::find($request->id);
        $operario->delete();

        return response()->json($operario);
    }
}
