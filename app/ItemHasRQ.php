<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHasRQ extends Model
{
	protected $table = 'item_has_r_qs';

	public function items()
	{
		return $this->hasMany('App\Item', 'id', 'item_id');
	}

	public function rQ()
	{
		return $this->hasMany('App\RQ', 'id', 'rq_id');
	}
}
