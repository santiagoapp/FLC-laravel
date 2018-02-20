<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHasOT extends Model
{

	protected $table = 'item_has_o_ts';

	public function items()
	{
		return $this->hasMany('App\Item', 'id', 'item_id');
	}

	public function oT()
	{
		return $this->hasMany('App\OT', 'id', 'ot_id');
	}
}
