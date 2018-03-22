<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correctivo extends Model
{
	public $timestamps = false;
	
	public function operario()
	{
		return $this->belongsTo('App\Operario');
	}
	public function equipo()
	{
		return $this->belongsTo('App\Equipo');
	}
}
