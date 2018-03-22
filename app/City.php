<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public function departaments()
	{
		return $this->belongsTo('App\Departament', 'id', 'departament_id');
	}
}
