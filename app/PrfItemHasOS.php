<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrfItemHasOS extends Model
{
	protected $table = 'prf_item_has_o_s';

	public function items()
	{
		return $this->hasMany('App\Item', 'id', 'item_id');
	}

	public function oS()
	{
		return $this->hasOne('App\OS', 'id', 'os_id');
	}
}
