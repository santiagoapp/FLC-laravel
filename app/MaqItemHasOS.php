<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaqItemHasOS extends Model
{
	protected $table = 'maq_item_has_o_s';

	public function items()
	{
		return $this->hasMany('App\Item', 'id', 'item_id');
	}

	public function oS()
	{
		return $this->hasOne('App\OS', 'id', 'os_id');
	}	

}
