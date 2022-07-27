<?php

use App\Model\Administrativo\Registro\Registro;
use Illuminate\Database\Seeder;

class RegistroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registro::create([
        	'code' => '1',
        	'objeto' => 'esto es un registro',
        	'persona_id' => '1',
        	'tipo_doc' => 'Contrato',
        	'num_doc' => '0',
        	'ff_doc' => '2019-07-02',
        	'ff_secretaria_e' => '2019-01-28',
        	'tipo_doc' => 'Contrato',
        	'ff_expedicion' => '2019-01-28',
        	'ruta' => 'Registros_1551469428.pdf',
        	'valor' => '176472',
        	'saldo' => '5940000',
        	'val_total' => '5940000',
        	'secretaria_e' => '3',
        	'iva' => '0'
        ]);
    }
}
