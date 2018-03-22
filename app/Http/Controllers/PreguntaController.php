<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Clasificacion;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        $result = Pregunta::all();
        $clasificacions = Clasificacion::all();
        return view('preguntas.index',compact('result','clasificacions'));
    }

    public function store(Request $request)
    {
        $pregunta = new Pregunta;
        $pregunta->pregunta = $request->pregunta;
        $pregunta->clasificacion_id = $request->clasificacion;
        $pregunta->save();
        $pregunta->clasificacion;
        return response()->json($pregunta);
    }

    public function actualizar(Request $request)
    {
        $pregunta = Pregunta::find($request->hidden);
        $pregunta->pregunta = $request->pregunta;
        $pregunta->clasificacion_id = $request->clasificacion;
        $pregunta->save();
        $pregunta->clasificacion;
        return response()->json($pregunta);
    }

    public function eliminar(Request $request)
    {
        $pregunta = Pregunta::find($request->id);
        $pregunta->delete();

        return response()->json($pregunta);
    }
}
