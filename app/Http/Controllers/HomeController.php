<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHasRQ;
use App\RQ;

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
        // $result = RQ::whereDate('fecha', '>' ,'2016-12-31')->get();

        return view('home',compact('result'));
    }
}
