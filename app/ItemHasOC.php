<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHasOC extends Model
{
	public function itemHasOT()
	{
		return $this->morphedByMany('App\ItemsHasOT', 'items_doc');
	} 
	public function itemHasRQ()
	{
		return $this->morphedByMany('App\ItemsHasRQ', 'items_doc');
	}  
	public function matItemHasOS()
	{
		return $this->morphedByMany('App\MatItemsHasOS', 'items_doc');
	}  
}
