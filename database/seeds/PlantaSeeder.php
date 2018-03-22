<?php

use Illuminate\Database\Seeder;
use App\Planta;

class PlantaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$plantas = [
    		'Bodega 1',
    		'Bodega 2',
    		'Bodega 3'
    	];
    	$abreviacion = [
    		'BD1',
    		'BD2',
    		'BD3'
    	];
    	foreach ($plantas as $key => $planta) {
    		factory(App\Planta::class)->create([
    			'nombre' => $planta,
    			'abreviacion' => $abreviacion[$key]
    		]);
    	}
    }
}
