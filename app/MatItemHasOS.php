<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatItemHasOS extends Model
{
	protected $table = 'mat_item_has_o_s';

	public function items()
	{
		return $this->hasMany('App\Item', 'id', 'item_id');
	}

	public function oS()
	{
		return $this->hasOne('App\OS', 'id', 'os_id');
	}
}
