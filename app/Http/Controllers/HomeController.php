<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHasRQ;
use App\ItemHasOT;
use App\RQ;
use App\OT;
use App\Departament;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ItemHasRQ::all();
        $OTs = OT::all();
        $departaments = Departament::all();
        // $result = RQ::whereDate('fecha', '>' ,'2016-12-31')->get();
        return view('home',compact('result','departaments','OTs'));
}
}
