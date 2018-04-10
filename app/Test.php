<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $connection = 'sqlsrv';
	protected $table = 'RV';

	public function items()
	{
		return $this->belongsTo('App\MV_OT', 'ID', 'ID');
	}

}
