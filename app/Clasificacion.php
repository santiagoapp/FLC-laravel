<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
	public $timestamps = false;

	public function equipo()
	{
		return $this->hasMany('App\Equipo');
	}
}
