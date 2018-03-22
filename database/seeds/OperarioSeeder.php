<?php

use Illuminate\Database\Seeder;
use App\Operario;

class OperarioSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

    $nombres = [
        'CESAR AUGUSTO',
        'CESAR CAMILO',
        'JORGE ENRIQUE',
        'JAIME ALBERTO',
        'MANUEL DAVID',
        'ALEXANDER',
        'GONZALO',
        'AURELIO',
        'WILMAR ANDRES',
        'DANIEL FRANCISCO',
        'CARLOS MAURICIO',
        'LUIS FRANCISCO',
        'GUSTAVO ERNESTO',
        'FABIO OSCAR',
        'LUIS FERNANDO',
        'ROBILSON EDUARDO',
        'ROMEL FRANCISCO',
    ];
    $apellidos = [
        'BUITRAGO CUERVO',
        'BUSTOS VELA',
        'GARZON PEÑUELA',
        'GOMEZ ROJAS',
        'GONZALEZ MELO',
        'MARTINEZ BONILLA',
        'MORENO CRUZ',
        'OSPINA BULLA',
        'QUEMBA OLIVEROS',
        'QUINTERO DIAZ',
        'RAMIREZ CHAVARRIA',
        'RODRIGUEZ CRUZ',
        'SANCHEZ MARTIN',
        'TIRADO GUERRA',
        'JUEZ ALFONSO',
        'BUITRAGO DUQUE',
        'BUSTOS VELA',
    ];
    foreach ($apellidos as $key => $apellido) {
        factory(App\Operario::class)->create([
            'nombre' => $nombres[$key],
            'apellido' => $apellido,
            'cargo_id' => rand(1,14)
        ]);
    }
}
}
