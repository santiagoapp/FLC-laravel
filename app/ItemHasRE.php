<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHasRE extends Model
{
	protected $table = 'item_has_r_es';

	public function items()
	{
		return $this->hasMany('App\Item', 'id', 'item_id');
	}
	public function rE()
	{
		return $this->hasMany('App\RE', 'id', 're_id');
	}

}
