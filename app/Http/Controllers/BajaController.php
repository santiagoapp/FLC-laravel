<?php

namespace App\Http\Controllers;

use App\Baja;
use App\Equipo;
use App\Cargo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Baja::all();
        $equipos = Equipo::all();
        $cargos = Cargo::all();
        return view('bajas.index',compact('result','equipos','cargos'));
    }

    public function store(Request $request)
    {
        $baja = new Baja;
        $baja->equipo_id = $request->equipo;
        $baja->motivo = $request->motivo;
        $baja->autoriza = $request->autoriza;
        $baja->cargo = $request->cargo;

        $baja->save();
        $baja->equipo;
        return response()->json($baja);
    }

    public function actualizar(Request $request)
    {
        $baja = Baja::find($request->hidden);
        $baja->equipo_id = $request->equipo;
        $baja->motivo = $request->motivo;
        $baja->autoriza = $request->autoriza;
        $baja->cargo = $request->cargo;

        $baja->save();
        $baja->equipo;
        return response()->json($baja);
    }

    public function eliminar(Request $request)
    {
        $baja = Baja::find($request->id);
        $baja->delete();

        return response()->json($baja);
    }
    public function show(Baja $baja)
    {

    }
    public function generarPDF()

    {
        $pdf = PDF::loadView('<h1>Test</h1>');
        return $pdf->download('asd.pdf');
    }
}
