<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
	protected $table = 'o_s';

	public function rQ()
	{
		return $this->belongsTo('App\RQ', 'id', 'rq_id');
	}
	public function prfItemHasOS()
	{
		return $this->belongsTo('App\PrfItemHasOS', 'id', 'os_id');
	}
	public function matItemHasOS()
	{
		return $this->belongsTo('App\MatItemHasOS', 'id', 'os_id');
	}
	public function maqItemHasOS()
	{
		return $this->belongsTo('App\MaqItemHasOS', 'id', 'os_id');
	}

}
