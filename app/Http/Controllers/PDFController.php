<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
	public function actaTemplate()
	{
		return view('prints.acta-de-bajas');
	}
}
