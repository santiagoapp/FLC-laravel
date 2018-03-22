<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
	public $timestamps = false;
	
	public function clasificacion()
	{
		return $this->belongsTo('App\Clasificacion');
	}
}
