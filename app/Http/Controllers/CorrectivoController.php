<?php

namespace App\Http\Controllers;

use App\Correctivo;
use App\Equipo;
use App\Operario;
Use Carbon\Carbon;
use Illuminate\Http\Request;

class CorrectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Correctivo::all();
        $operarios = Operario::all();
        $equipos = Equipo::all();

        return view('correctivos.index',compact('result','equipos','operarios'));
    }

    
    public function store(Request $request)
    {

        $correctivo = new Correctivo;
        $correctivo->causa = $request->causa;
        $correctivo->estado = $request->estado;
        $correctivo->falla = $request->falla;
        $correctivo->equipo_id = $request->equipo;
        $correctivo->operario_id = $request->operario;
        $correctivo->fecha_inicio = Carbon::parse($request->fecha_inicio);
        $correctivo->fecha_fin = Carbon::parse($request->fecha_fin);
        $correctivo->observacion = $request->observacion;

        $correctivo->save();
        $correctivo->equipo;
        $correctivo->operario;
        return response()->json($correctivo);

    }
    public function actualizar(Request $request)
    {
        $correctivo = Correctivo::find($request->hidden);
        $correctivo->causa = $request->causa;
        $correctivo->estado = $request->estado;
        $correctivo->falla = $request->falla;
        $correctivo->equipo_id = $request->equipo;
        $correctivo->operario_id = $request->operario;
        $correctivo->fecha_inicio = Carbon::parse($request->fecha_inicio);
        $correctivo->fecha_fin = Carbon::parse($request->fecha_fin);
        $correctivo->observacion = $request->observacion;
        
        $correctivo->save();
        $correctivo->equipo;
        $correctivo->operario;
        return response()->json($correctivo);
    }

    public function eliminar(Request $request)
    {
        $correctivo = Correctivo::find($request->id);
        $correctivo->delete();

        return response()->json($correctivo);
    }
}
