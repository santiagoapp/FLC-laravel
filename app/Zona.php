<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
	public $timestamps = false;

	public function planta()
	{
		return $this->belongsTo('App\Planta');
	}
	public function equipo()
	{
		return $this->hasMany('App\Equipo');
	}
}
