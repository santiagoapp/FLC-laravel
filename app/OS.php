<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
	protected $table = 'o_s';

	public function rQ()
	{
		return $this->belongsTo('App\RQ', 'id', 'rq_id');
	}

}
