<?php

use App\Model\Administrativo\OrdenPago\OrdenPagos;
use Illuminate\Database\Seeder;

class OrdenPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrdenPagos::create([
        	'code' => '1',
        	'nombre' => 'orden pagos',
        	'valor' => '1450324',
        	'saldo' => '0',
        	'iva' => '0',
        	'estado' => '1',
        	'registros_id' => '1',
        	'user_id'=> '1'
        ]);

       
    }
}
