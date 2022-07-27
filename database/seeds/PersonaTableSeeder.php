<?php

use App\Model\Persona;
use Illuminate\Database\Seeder;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 Persona::create([
           'nombre' => 'jhoy',
           'num_dc' => '24213452',
           'email' => '1',
           'direccion' => 'Providencia',
           'tipo' => 'NATURAL',
           'telefono' => '0'

        ]);
    }
}
