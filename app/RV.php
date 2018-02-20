<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RV extends Model
{
	protected $table = 'r_vs';

	public function oT()
	{
		return $this->belongsTo('App\OT', 'id', 'ot_id');
	}
}
