<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RE extends Model
{
	protected $table = 'r_es';

	public function oT()
	{
		return $this->belongsTo('App\OT', 'id', 'ot_id');
	}
}
