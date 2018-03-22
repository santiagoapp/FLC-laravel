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

	public function itemsRV()
	{
		return $this->hasMany('App\ItemHasRV', 'item_has_ot_id', 'item_id');
	}

	public function oT()
	{
		return $this->belongsTo('App\OT', 'id', 'ot_id');
	}

	public function itemsDoc()
	{
		return $this->morphToMany('App\ItemHasOC', 'items_doc');
	}
}
