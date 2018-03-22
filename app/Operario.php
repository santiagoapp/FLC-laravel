<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
	public $timestamps = false;

	public function cargo()
	{
		return $this->belongsTo('App\Cargo');
	}
	public function equipo()
	{
		return $this->hasMany('App\Equipo');
	}
}
