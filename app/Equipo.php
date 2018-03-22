<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{

	public $timestamps = false;

	public function clasificacion()
	{
		return $this->belongsTo('App\Clasificacion');
	}
	public function operario()
	{
		return $this->belongsTo('App\Operario');
	}
	public function zona()
	{
		return $this->belongsTo('App\Zona');
	}
	public function correctivo()
	{
		return $this->hasMany('App\Correctivo');
	}
	
}
