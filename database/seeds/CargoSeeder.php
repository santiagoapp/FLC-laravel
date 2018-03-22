<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cargos = [
    		'Operario de corte',
    		'Operario de corte y transporte',
    		'Operario de empaques, troquelados y KIDs',
    		'Operario de ensamble y soldadura en sellado',
    		'Operario de mantenimiento',
    		'Operario de pulidora',
    		'Operario de sellado',
    		'Operario de taladrado',
    		'Operario de manguera metálica flexible',
    		'Operario de pintura',
    		'Soldador TIG manguera metálica flexible',
    		'Operario de pruebas de presión',
    		'Soldador MIG-MAG',
    		'Soldador TIG para juntas de expansión'
    	];
    	foreach ($cargos as $key => $cargo) {
    		factory(App\Cargo::class)->create([
    			'nombre' => $cargo,
    		]);
    	}
    }
}
