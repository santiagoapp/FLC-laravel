<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrfItemHasOS extends Model
{
    /**
     * Acceso a todos los items de maquinado o servicio de una orden de compra
     */
    public function itemsDeProductosFinales()
    {
    	return $this->morphMany('App\OC', 'ordenesDeCompra');
    }
}
