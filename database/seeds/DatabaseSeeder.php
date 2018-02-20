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

        $usuarios = $this->command->ask('Ingrese el numero de registros');
        $this->createUser($usuarios);

        $this->command->info('Roles ' . $input_roles . ' Agregado satisfactoriamente');


        $numero_ots = $this->command->ask('Ingrese el numero de registros');
        for ($i=1; $i <= $numero_ots; $i++) { 
            // crear ordenes de trabajo
            $ot = factory(\App\OT::class)->create();
            $this->command->info('Orden de trabajo No. ' . $i . ' creada.');
            // crear items
            $item = factory(\App\Item::class)->create();
            $this->command->info('Item No. ' . $i . ' creado.');
            // crear items de la OT
            factory(\App\ItemHasOT::class, 5)->create([
                'item_id' => $item->id,
                'ot_id' => $ot->id,
            ]);        
            $this->command->info('Items OT No. ' . $i . 'creados.');
            // crea la rq
            $rq = factory(\App\RQ::class)->create([
                'ot_id' => $ot->id,
            ]); 
            $this->command->info('Requisicion No. ' . $i . ' creada');
            // crear items de la rq
            $itemRQ = factory(\App\ItemHasRQ::class,5)->create([
                'item_id' => $item->id,
                'rq_id' => $rq->id,
            ]);
            $this->command->info('Items OT No. ' . $i . 'creados.');
            // crea ordenes de servicio de la rq
            foreach ($itemRQ as $iRQ) {
                if ($iRQ->servicio) {
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
            // crea la rv
            $rvs = factory(\App\RV::class,rand(1,3))->create([
                'ot_id' => $ot->id,
            ]);

            $this->command->info('Remision No. ' . $i . ' creada');
            // items para la rv
            foreach ($rvs as $rv) {
                factory(\App\ItemHasRV::class,rand(1,3))->create([
                    'rv_id' => $rv->id,
                    'item_id' => $item->id,
                ]);
                $this->command->info('Item de remision No. ' . $i . ' creado.');
            }

        }
    }


    private function createUser()
    {
        for ($i=1; $i < $usuarios; $i++) { 
            $user = factory(User::class)->create();
            $this->command->info('Detalles de la cuenta:');
            $this->command->warn($user->email);
            $this->command->warn('la contraseña es: "secret" sin las comillas');        
        }
    }
}
