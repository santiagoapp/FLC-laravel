<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
	public $timestamps = false;

	public function zona()
	{
		return $this->hasMany('App\Zona');
	}
}
