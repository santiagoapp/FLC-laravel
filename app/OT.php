<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
	protected $connection = 'sqlsrv';
	protected $table = 'OT';

	public function items()
	{
		return $this->hasMany('App\MV_OT', 'ID', 'ID');
	}

	// public function items()
	// {
	// 	return $this->hasMany('App\ItemHasOT', 'item_id', 'id');
	// }
}
