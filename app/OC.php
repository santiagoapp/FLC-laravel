<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OC extends Model
{
	/**
	* Acceso a todos los items del modelo relacionado
	*/
	public function ordenesDeCompra()
	{
		return $this->morphTo();
	}
}
