<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete'
        ];

        $fun = [
           'funcionario-list',
           'funcionario-create',
           'funcionario-edit',
           'funcionario-delete'
        ];

        $dep = [
           'dependencia-list',
           'dependencia-create',
           'dependencia-edit',
           'dependencia-delete'
        ];

        $correspondencias = [
           'correspondencias-list',
           'correspondencias-create',
           'correspondencias-edit',
           'correspondencias-delete'
        ];

        $archivos = [
           'archivos-list',
           'archivos-create',
           'archivos-edit',
           'archivos-delete'
        ];

        $boletines = [
           'boletines-list',
           'boletines-create',
           'boletines-edit',
           'boletines-delete'
        ];

        $acuerdos = [
           'acuerdos-list',
           'acuerdos-create',
           'acuerdos-edit',
           'acuerdos-delete'
        ];

        $contractual = [
           'contractual-list',
           'contractual-create',
           'contractual-edit',
           'contractual-delete'
        ];

        $presupuesto = [
           'presupuesto-list',
           'presupuesto-create',
           'presupuesto-edit',
           'presupuesto-delete'
        ];

        $fuentes = [
           'fuentes-list',
           'fuentes-create',
           'fuentes-edit',
           'fuentes-delete'
        ];

        $rubros = [
           'rubros-list',
           'rubros-create',
           'rubros-edit',
           'rubros-delete'
        ];

        $pac = [
           'pac-list',
           'pac-create',
           'pac-edit',
           'pac-delete'
        ];

        $cdps = [
           'cdps-list',
           'cdps-create',
           'cdps-edit',
           'cdps-delete'
        ];

        $registros = [
           'registros-list',
           'registros-create',
           'registros-edit',
           'registros-delete'
        ];

        $manual = [
           'manualContrataciones-list',
           'manualContrataciones-create',
           'manualContrataciones-edit',
           'manualContrataciones-delete'
        ];

        $plan = [
           'planAdquisiciones-list',
           'planAdquisiciones-create',
           'planAdquisiciones-edit',
           'planAdquisiciones-delete'
        ];

        $proyectos = [
           'proyectosAcuerdos-list',
           'proyectosAcuerdos-create',
           'proyectosAcuerdos-edit',
           'proyectosAcuerdos-delete'
        ];

        $actas = [
           'actas-list',
           'actas-create',
           'actas-edit',
           'actas-delete'
        ];

        $resoluciones = [
           'resoluciones-list',
           'resoluciones-create',
           'resoluciones-edit',
           'resoluciones-delete'
        ];

        $adiciones = [
           'adiciones-list',
           'adiciones-create',
           'adiciones-edit',
           'adiciones-delete'
        ];

        $reducciones = [
           'reducciones-list',
           'reducciones-create',
           'reducciones-edit',
           'reducciones-delete'
        ];

        $creditos = [
           'creditos-list',
           'creditos-create',
           'creditos-edit',
           'creditos-delete'
        ];

        $orden = [
           'ordenDias-list',
           'ordenDias-create',
           'ordenDias-edit',
           'ordenDias-delete'
        ];

        $concejales = [
           'concejales-list',
           'concejales-create',
           'concejales-edit',
           'concejales-delete'
        ];

        $terceros = [
           'terceros-list',
           'terceros-create',
           'terceros-edit',
           'terceros-delete'
        ];

        $role = Role::create(['name' => 'administrador']);

        foreach ($roles as $rol) {
            $permission = Permission::create([
                                  'name' => $rol,
                                  'modulo_id' => 1
                                ]);
            $role->givePermissionTo($permission);
        }

        foreach ($fun as $f) {
            $permissionf = Permission::create([
                                   'name' => $f,
                                   'modulo_id' => 2
                                 ]);
            $role->givePermissionTo($permissionf);
        }

        foreach ($dep as $d) {
            $permissiond = Permission::create([
                                   'name' => $d,
                                   'modulo_id' => 3
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($correspondencias as $corr) {
            $permissiond = Permission::create([
                                   'name' => $corr,
                                   'modulo_id' => 4
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($archivos as $arc) {
            $permissiond = Permission::create([
                                   'name' => $arc,
                                   'modulo_id' => 5
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($boletines as $bole) {
            $permissiond = Permission::create([
                                   'name' => $bole,
                                   'modulo_id' => 6
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($acuerdos as $acu) {
            $permissiond = Permission::create([
                                   'name' => $acu,
                                   'modulo_id' => 7
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($contractual as $cont) {
            $permissiond = Permission::create([
                                   'name' => $cont,
                                   'modulo_id' => 8
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($presupuesto as $presu) {
            $permissiond = Permission::create([
                                   'name' => $presu,
                                   'modulo_id' => 9
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($fuentes as $fue) {
            $permissiond = Permission::create([
                                   'name' => $fue,
                                   'modulo_id' => 10
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($rubros as $rub) {
            $permissiond = Permission::create([
                                   'name' => $rub,
                                   'modulo_id' => 11
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($pac as $pa) {
            $permissiond = Permission::create([
                                   'name' => $pa,
                                   'modulo_id' => 12
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($cdps as $cd) {
            $permissiond = Permission::create([
                                   'name' => $cd,
                                   'modulo_id' => 13
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($registros as $regis) {
            $permissiond = Permission::create([
                                   'name' => $regis,
                                   'modulo_id' => 14
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($manual as $ma) {
            $permissiond = Permission::create([
                                   'name' => $ma,
                                   'modulo_id' => 15
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($plan as $pl) {
            $permissiond = Permission::create([
                                   'name' => $pl,
                                   'modulo_id' => 16
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($proyectos as $proy) {
            $permissiond = Permission::create([
                                   'name' => $proy,
                                   'modulo_id' => 17
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($actas as $act) {
            $permissiond = Permission::create([
                                   'name' => $act,
                                   'modulo_id' => 18
                                 ]);
            $role->givePermissionTo($permissiond);
        }
        foreach ($resoluciones as $resoluc) {
            $permissiond = Permission::create([
                                   'name' => $resoluc,
                                   'modulo_id' => 19
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($adiciones as $adi) {
            $permissiond = Permission::create([
                                   'name' => $adi,
                                   'modulo_id' => 20
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($reducciones as $reduc) {
            $permissiond = Permission::create([
                                   'name' => $reduc,
                                   'modulo_id' => 21
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($creditos as $credit) {
            $permissiond = Permission::create([
                                   'name' => $credit,
                                   'modulo_id' => 22
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($orden as $ord) {
            $permissiond = Permission::create([
                                   'name' => $ord,
                                   'modulo_id' => 23
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($concejales as $conce) {
            $permissiond = Permission::create([
                                   'name' => $conce,
                                   'modulo_id' => 24
                                 ]);
            $role->givePermissionTo($permissiond);
        }

        foreach ($terceros as $terc) {
            $permissiond = Permission::create([
                                   'name' => $terc,
                                   'modulo_id' => 25
                                 ]);
            $role->givePermissionTo($permissiond);
        }

       








        foreach ($roles as $rol){
            $permission = Permission::where('name', $rol)->first();
            $role->givePermissionTo($permission);
        }

        foreach ($fun as $f) {
            $permissionf = Permission::where('name', $f)->first();
            $role->givePermissionTo($permissionf);
        }

        foreach ($dep as $d) {
            $permissiond = Permission::where('name', $d)->first();
            $role->givePermissionTo($permissiond);
        }



        foreach ($correspondencias as $corr) {
            $permissiond = Permission::where('name', $corr)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($archivos as $arc) {
            $permissiond = Permission::where('name', $arc)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($boletines as $bole) {
            $permissiond = Permission::where('name', $bole)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($acuerdos as $acu) {
            $permissiond = Permission::where('name', $acu)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($contractual as $cont) {
            $permissiond = Permission::where('name', $cont)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($presupuesto as $presu) {
            $permissiond = Permission::where('name', $presu)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($fuentes as $fue) {
            $permissiond = Permission::where('name', $fue)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($rubros as $rub) {
            $permissiond = Permission::where('name', $rub)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($pac as $pa) {
            $permissiond = Permission::where('name', $pa)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($cdps as $cd) {
            $permissiond = Permission::where('name', $cd)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($registros as $regis) {
            $permissiond = Permission::where('name', $regis)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($manual as $ma) {
            $permissiond = Permission::where('name', $ma)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($plan as $pl) {
            $permissiond = Permission::where('name', $pl)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($proyectos as $proy) {
            $permissiond = Permission::where('name', $proy)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($actas as $act) {
            $permissiond = Permission::where('name', $act)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($resoluciones as $resoluc) {
            $permissiond = Permission::where('name', $resoluc)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($adiciones as $adi) {
            $permissiond = Permission::where('name', $adi)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($reducciones as $reduc) {
            $permissiond = Permission::where('name', $reduc)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($creditos as $credit) {
            $permissiond = Permission::where('name', $credit)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($orden as $ord) {
            $permissiond = Permission::where('name', $ord)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($concejales as $conce) {
            $permissiond = Permission::where('name', $conce)->first();
            $role->givePermissionTo($permissiond);
        }

        foreach ($terceros as $terc) {
            $permissiond = Permission::where('name', $terc)->first();
            $role->givePermissionTo($permissiond);
        }
    }
}
