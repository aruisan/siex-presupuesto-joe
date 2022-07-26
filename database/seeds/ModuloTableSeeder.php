<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Modulo;

class ModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modulo::create(['name' => 'Roles']);
        Modulo::create(['name' => 'Funcionarios']);
        Modulo::create(['name' => 'Dependencias']);
        Modulo::create(['name' => 'Correspondencias']);
        Modulo::create(['name' => 'Archivos']);
        Modulo::create(['name' => 'Boletines']);
        Modulo::create(['name' => 'Acuerdos']);
        Modulo::create(['name' => 'Contractual']);
        Modulo::create(['name' => 'Presupuesto']);
        Modulo::create(['name' => 'Fuentes']);
        Modulo::create(['name' => 'Rubros']);
        Modulo::create(['name' => 'Pac']);
        Modulo::create(['name' => 'Cdps']);
        Modulo::create(['name' => 'Registro']);
        Modulo::create(['name' => 'ManualContrataciones']);
        Modulo::create(['name' => 'PlanAdquisiciones']);
        Modulo::create(['name' => 'ProyectosAcuerdos']);
        Modulo::create(['name' => 'Actas']);
        Modulo::create(['name' => 'Resoluciones']);
        Modulo::create(['name' => 'Adiciones']);
        Modulo::create(['name' => 'Reducciones']);
        Modulo::create(['name' => 'Creditos']);
        Modulo::create(['name' => 'OrdenDia']);
        Modulo::create(['name' => 'Concejales']);
        Modulo::create(['name' => 'Terceros']);
    }
}
