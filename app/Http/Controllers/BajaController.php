<?php

namespace App\Http\Controllers;

use App\Baja;
use App\Equipo;
use App\Operario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;

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
        $operarios = Operario::all();
        return view('bajas.index',compact('result','equipos','operarios'));
    }
    public function show(Baja $baja)
    {
        $result = Baja::findOrFail($baja);
        $baja = $result[0];
        
        // dd($baja->autoriza);
        $pdf = PDF::loadView('prints.acta-de-bajas',compact('baja'));
        return $pdf->download('asd.pdf');
    }

    public function store(Request $request)
    {
        $baja = new Baja;
        $baja->equipo_id = $request->equipo;
        $baja->motivo = $request->motivo;
        $baja->autoriza_id = $request->autoriza;

        $baja->save();
        $baja->equipo;
        $baja->autoriza;
        return response()->json($baja);
    }

    public function actualizar(Request $request)
    {
        $baja = Baja::find($request->hidden);
        $baja->equipo_id = $request->equipo;
        $baja->motivo = $request->motivo;
        $baja->autoriza_id = $request->autoriza;

        $baja->save();
        $baja->equipo;
        $baja->autoriza;
        return response()->json($baja);
    }

    public function eliminar(Request $request)
    {
        $baja = Baja::find($request->id);
        $baja->delete();

        return response()->json($baja);
    }


}
