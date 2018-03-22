<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
	protected $table = 'o_ts';

	public function rV()
	{
		return $this->hasMany('App\RV', 'ot_id', 'id');
	}

	public function items()
	{
		return $this->hasMany('App\ItemHasOT', 'item_id', 'id');
	}
}
