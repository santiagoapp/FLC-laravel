<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
	public function equipo()
	{
		return $this->belongsTo('App\Equipo','equipo_id','id');
	}
	public function autoriza()
	{
		return $this->belongsTo('App\Operario','autoriza_id','id');
	}

}
