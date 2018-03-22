<?php

use Illuminate\Database\Seeder;
use App\Clasificacion;

class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$clasificaciones = [
    		'Mecánico',
    		'Electrico',
    		'Electro Neumático-Hidraulico'
    	];
    	foreach ($clasificaciones as $key => $clasificacion) {
    		factory(App\Clasificacion::class)->create([
    			'nombre' => $clasificacion
    		]);
    	}
    }
}
