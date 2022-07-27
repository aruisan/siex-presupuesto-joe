<?php

use App\Model\Administrativo\Cdp\Cdp;
use App\Model\Administrativo\Registro\CdpsRegistro;
use Illuminate\Database\Seeder;

class CdpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cdp::create([
        	'code' => '1',
        	'name' => 'cdps',
        	'valor' => '321320',
        	'fecha' => '2019-01-14',
        	'dependencia_id' => '1',
        	'secretaria_e' => '3',
        	'ff_secretaria_e' => '2019-01-14',
        	'jefe_e' => '2',
        	'ff_jefe_e' => '2019-01-14',
        	'motivo' => 'falta monto',
        	'observacion' => 'SEGURO',
        	'saldo' => '0',
        	'ruta' => '0',
        	'vigencia_id' => '1'
        ]);


        CdpsRegistro::create([
        	'valor' => '6280000',
        	'cdp_id' => '1',
        	'registro_id' => '1'
        ]);
    }
}
