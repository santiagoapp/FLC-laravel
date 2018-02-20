<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RQ extends Model
{
	protected $table = 'r_qs';

	public function oT()
	{
		return $this->hasOne('App\OT', 'id', 'ot_id');
	}
}
