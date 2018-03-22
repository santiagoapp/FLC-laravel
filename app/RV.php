<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemHasRV;

class RV extends Model
{
	protected $table = 'r_vs';

	public function oT()
	{
		return $this->belongsTo('App\OT', 'ot_id', 'id');
	}
	public function items()
	{
		return $this->hasMany('App\ItemHasRV', 'rv_id', 'id');
	}
}
