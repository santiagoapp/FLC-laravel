<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RV;

class ItemHasRV extends Model
{
	public function rV()
	{
		return $this->belongsTo('App\RV', 'rv_id', 'id');
	}
}
