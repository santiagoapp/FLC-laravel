<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
use App\Item;

class DatabaseSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    $num_os = 0;
    $num_items_mq = 0;
    $numero_rv = 0;

    $faker = Faker\Factory::create();
// Ask for db migration refresh, default is no
    if ($this->command->confirm('¿Desea refrescar la migración antes de alimentar la base de datos?'))
    {
// Call the php artisan migrate:refresh
        $this->command->call('migrate:refresh');
        $this->command->warn("Datos eliminados, comenzando con una base de datos limpia.");
    }

// Seed the default permissions
    $permissions = Permission::defaultPermissions();

    foreach ($permissions as $perms) {
        Permission::firstOrCreate(['name' => $perms]);
    }

    $this->command->info('Permisos por defecto agregados.');

    $usuarios = $this->command->ask('Ingrese el numero de usuarios');
    $this->createUser($usuarios);

    $numero_ots = $this->command->ask('Ingrese el numero de registros');
    for ($i=1; $i <= $numero_ots; $i++) { 
// crear ordenes de trabajo
        $ot = factory(\App\OT::class)->create();
        $this->command->info('Orden de trabajo No. ' . $i . ' creada.');
// crear items
        $item = factory(\App\Item::class)->create();
        $this->command->info('Item No. ' . $i . ' creado.');
// crea la rv
        if (rand(1,100)<=50) {
            $numero_rv = $numero_rv + 1;
            $rvs = factory(\App\RV::class)->create([
                'ot_id' => $ot->id,
            ]);
        }
        
    }
    for ($i=1; $i <= $numero_ots; $i++) { 

// crear items de la OT
        for ($ij=1; $ij < rand(5,8); $ij++) { 

            $item_aleatorio = rand(1,$numero_ots);
            $ot_aleatorio = rand(1,$numero_ots);
            $rv_aleatorio = rand(1,$numero_rv);

            $itemsOT = factory(\App\ItemHasOT::class)->create([
                'item_id' => $item_aleatorio,
                'ot_id' => $ot_aleatorio,
            ]);

            $itemsRV = factory(\App\ItemHasRV::class)->create([
                'item_has_ot_id' => $item_aleatorio,
                'rv_id' => $i,
            ]);
        }

// crea la rq
        $rq = factory(\App\RQ::class)->create([
            'ot_id' => $ot->id,
        ]); 
        $this->command->info('Requisicion No. ' . $i . ' creada');
// crear items de la rq
        $itemsRQ = factory(\App\ItemHasRQ::class,rand(1,5))->create([
            'item_id' => $item->id,
            'rq_id' => $rq->id,
        ]);

        foreach ($itemsRQ as $key => $itemRQ) {
            $this->command->info('Item No. ' . $key . ' de la RQ ' . $i . ' creado.');


// crea ordenes de servicio de la rq
            if ($itemRQ->servicio) {
                $num_os = $num_os +1;
                $os = factory(\App\OS::class)->create([
                    'rq_id' => $rq->id, 
                ]);
                $this->command->info('Orden de servicio No. ' . $i . ' creada.');
                switch (rand(1,3)) {
// producto final, materia prima y servicio
                    case 1:
                    $itemPT = factory(\App\PrfItemHasOS::class,rand(1,3))->create([
                        'item_id' => $item->id,
                        'os_id' => $os->id,
                    ]);
                    $itemMP = factory(\App\MatItemHasOS::class,rand(1,3))->create([
                        'item_id' => $item->id,
                        'os_id' => $os->id,
                    ]);
                    $itemMQ = factory(\App\MaqItemHasOS::class,rand(1,3))->create([
                        'item_id' => $item->id,
                        'os_id' => $os->id,
                    ]);
                    break;
// materia prima y servicio
                    case 2:
                    $itemMP = factory(\App\MatItemHasOS::class,rand(1,3))->create([
                        'item_id' => $item->id,
                        'os_id' => $os->id,
                    ]);
                    $num_items_mq = $num_items_mq +1;
                    break;
// servicio
                    case 3:
                    $itemMQ = factory(\App\MaqItemHasOS::class,rand(1,3))->create([
                        'item_id' => $item->id,
                        'os_id' => $os->id,
                    ]);
                    break;
                }
            }

// crea la oc
            if ($itemRQ->compra) {
                $ocs = factory(\App\OC::class,rand(1,3))->create();
                foreach ($ocs as $key => $oc) {
                    $dsa = rand(1,7);

                    if($itemRQ->servicio){

                        for ($j=1; $j < $dsa; $j++) {

                            $asd_type = $faker->randomElement($array = array ('App\ItemHasOT','App\ItemHasRQ','App\MatItemHasOS'));

                            if ( $asd_type == 'App\MatItemHasOS') {
                                $asd_id = rand(1,$num_items_mq);
                            }else{
                                $asd_id = rand(1,$numero_ots);
                            }
                            $itemOC = factory(\App\ItemHasOC::class)->create([
                                'oc_id' => $oc->id,
                                'items_doc_id' => $asd_id,
                                'items_doc_type' => $asd_type,
                            ]);
                        }
                    }
                    else{

                        if ( rand(0,1) == 0) {
                            $asd_id = rand(1,$numero_ots);
                            $asd_type = 'App\ItemsHasOT';
                        }else{
                            $asd_id = rand(1,$numero_ots);
                            $asd_type = 'App\ItemsHasRQ';
                        }
                        for ($k=1; $k < $dsa; $k++) { 
                            $itemOC = factory(\App\ItemHasOC::class)->create([
                                'oc_id' => $oc->id,
                                'items_doc_id' => $asd_id,
                                'items_doc_type' => $asd_type,
                            ]);
                        }
                    }
                }
            }
        }

// crea la re
        $res = factory(\App\RE::class,rand(1,5))->create([
            'ot_id' => $ot->id,
        ]); 
        $this->command->info('Entrada No. ' . $i . ' creada');
// crea items de las entradas
        foreach ($res as $re) {
            factory(\App\ItemHasRE::class,rand(1,3))->create([
                're_id' => $re->id,
                'item_id' => $item->id,
            ]);
            $this->command->info('Orden de servicio No. ' . $i . ' creada.');
        }


        $this->command->info('Remision No. ' . $i . ' creada');
// // items para la rv
//         foreach ($itemsOT as $key => $itemOT) {
//             factory(\App\ItemHasRV::class)->create([
//                 'rv_id' => $rvs->id,
//                 'item_has_ot_id' => $itemOT->id,
//             ]);
//         }


        $this->command->info('Item de remision No. ' . $i . ' creado.');
    }
}


private function createUser($usuarios)
{
    for ($i=0; $i < $usuarios; $i++) { 
        $user = factory(User::class)->create();
        $this->command->info('Detalles de la cuenta:');
        $this->command->warn($user->email);
        $this->command->warn('la contraseña es: "secret" sin las comillas');        
    }
}
}
