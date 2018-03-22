<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CitiesController extends Controller
{
	public function verCiudades(Request $request)
	{
		$cities = City::where('departament_id',$request->id)->get();
		$arr = $cities->toArray();
		return response()->json($arr);
	}
	public function buscarHoras(Request $request)
	{
		$cities = City::where('name',$request->ciudad)->get();
		$arr = $cities->toArray();
		return response()->json($arr);
	}
}
