<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
	public function equipo()
	{
		return $this->belongsTo('App\Equipo');
	}

}
