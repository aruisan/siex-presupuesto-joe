<?php

namespace App\Http\Controllers\Hacienda\Presupuesto;

use App\Http\Controllers\Controller;
use App\Model\Hacienda\Presupuesto\FontsVigencia;
use App\Model\Hacienda\Presupuesto\PlantillaCuipo;
use App\Model\Hacienda\Presupuesto\RubrosMov;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Model\Hacienda\Presupuesto\Rubro;
use App\Model\Hacienda\Presupuesto\Font;
use App\Model\Planeacion\Pdd\SubProyecto;
use App\Model\Dependencia;
use App\Model\Hacienda\Presupuesto\Vigencia;
use App\Model\Hacienda\Presupuesto\Level;
use App\Model\Hacienda\Presupuesto\Register;
use Carbon\Carbon;

use Session;

class RubrosController extends Controller
{
    public function create($vigencia_id)
    {
        $vigencia = Vigencia::findOrFail($vigencia_id);
        $fonts = FontsVigencia::where('vigencia_id', $vigencia_id)->get();
        $niveles = Level::where('vigencia_id', $vigencia_id)->get();
        $subProy = SubProyecto::all();
        $ultimoLevel = Level::where('vigencia_id', $vigencia_id)->get()->last();
        $registers = Register::where('level_id', $ultimoLevel->id)->get();

        foreach ($registers as $register){
            $register_id = $register->code_padre->registers->id;
            $code = $register->code_padre->registers->code.$register->code;
            $ultimo = $register->code_padre->registers->level->level;
            while($ultimo > 1){
                $registro = Register::findOrFail($register_id);
                $register_id = $registro->code_padre->registers->id;
                $code = $registro->code_padre->registers->code.$code;

                $ultimo =  $registro->code_padre->registers->level->level;

            }
            $codigos[] = collect(['id' => $register->id , 'codigo' => $code]);
        }


        $levels = Rubro::where('vigencia_id', $vigencia_id)->count();
        if($levels == 0){
            $fila = $vigencia->ultimo;
        }else if($levels >= $vigencia->ultimo){
            $fila = 0;
        }else if( $vigencia->ultimo > $levels){
            $fila = $vigencia->ultimo - $levels;
        }

        // PLANTILLA PARA EGRESOS E INGRESOS
        if ($vigencia->tipo == 0) $plantilla = PlantillaCuipo::where('id','>=',318)->get();
        else $plantilla = PlantillaCuipo::where('id','<',318)->get();

        $rubrosChecked = Rubro::where('plantilla_cuipos_id','!=',null)->where('vigencia_id', $vigencia_id)->select(['plantilla_cuipos_id'])->get();
        $validate = false;

        return view('hacienda.presupuesto.vigencia.createRubros', compact('vigencia', 'fonts', 'subProy', 'fila', 'niveles', 'registers', 'codigos','vigencia_id',
            'plantilla','rubrosChecked','validate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rubrosChecked = Rubro::where('plantilla_cuipos_id','!=',null)->where('vigencia_id', $request->vigencia_id)->get();

        foreach ($request->checkedIDs as $checked){
            $validate = false;
            foreach ($rubrosChecked as $rubroChecked){
                if ($rubroChecked->plantilla_cuipos_id == $checked){
                    $validate = true;
                    break;
                }
            }
            if ($validate == false){

                $dataPlantilla = PlantillaCuipo::findOrFail($checked);

                $rubro = new Rubro();
                $rubro->name =  $dataPlantilla->name;
                $rubro->cod = $dataPlantilla->code;
                $rubro->subproyecto_id = 1;
                $rubro->vigencia_id = $request->vigencia_id;
                $rubro->plantilla_cuipos_id = $checked;
                $rubro->save();

            }
        }

        Session::flash('success','Los rubros han sido actualizados exitosamente');
        return redirect('/presupuesto/rubro/create/'.$request->vigencia_id);
        /**
        ANTERIOR LOGICA
            $id         = $request->rubro_id;
            $name       = $request->nombre;
            $subProy    = 1;
            $code       = $request->code;
            $register   = $request->register_id;
            $vigencia   = $request->vigencia_id;
            $count = count($register);

            for($i = 0; $i < $count; $i++){

                if($id[$i]){
                    $this->update($id[$i], $name[$i], $code[$i], $register[$i], $subProy[$i]);
                }else{
                    $rubro = new Rubro();
                    $rubro->name = $name[$i];
                    $rubro->cod = $code[$i];
                    $rubro->register_id = $register[$i];
                    $rubro->subproyecto_id = $subProy[$i];
                    $rubro->vigencia_id = $vigencia;
                    $rubro->save();
                }
            }
         */

        //return  back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = auth()->user()->roles;
        foreach ($roles as $role){
            $rol= $role->id;
        }
        $rubro = Rubro::findOrFail($id);
        $rubros = Rubro::where('id', '!=', $id)->where('vigencia_id', $rubro->vigencia_id)->get();
        $fuentesR = $rubro->Fontsrubro;
        $add = rubrosMov::where([['rubro_id','=',$id],['movimiento','=','2']])->get();
        $red = rubrosMov::where([['rubro_id','=',$id],['movimiento','=','3']])->get();
        $vigens = Vigencia::findOrFail($rubro->vigencia_id);
        $fuentesAll = FontsVigencia::where('vigencia_id', $vigens->id)->get();
        $valor = $fuentesR->sum('valor');
        $valorDisp = $fuentesR->sum('valor_disp');

        foreach ($fuentesR as $fuente){
            $suma[] = null;
            $sumaC[] = null;
            $resta[] = null;
            $restaC[] = null;

            if ($rubro->rubrosMov->count() > 0){
                foreach($rubro->rubrosMov as $RM){
                    if ($RM->fonts_rubro_id == $fuente->id){
                        if ($RM->movimiento == 1){
                            $suma[] = $RM->valor;
                        } elseif($RM->movimiento == 2){
                            $sumaC[] = $RM->valor;
                        }
                    } else{
                        if ($RM->movimiento == 1){
                            $suma[] = 0;
                        } elseif($RM->movimiento == 2){
                            $sumaC[] = 0;
                        }
                    }
                }
            } else{
                $suma[] = 0;
                $sumaC[] = 0;
            }
            $val = array_sum($suma);
            $Cred = array_sum($sumaC);
            if ($fuente->rubrosMov->count() > 0){
                foreach ($fuente->rubrosMov as $item) {
                    if ($item->movimiento == 1){
                        $resta[] = $item->valor;
                    } elseif($item->movimiento == 3){
                        $restaC[] = $item->valor;
                    }
                }
            }else{
                $resta[] = 0;
                $restaC[] = 0;
            }
            $val2 = array_sum($resta);
            $CCred = array_sum($restaC);
            $valores[] = collect(['id' => $fuente->font_vigencia_id , 'credito' => $val, 'ccredito' => $val2, 'adicion' => $Cred, 'reduccion' => $CCred]);
            unset($suma, $resta, $Cred, $CCred);
        }
        $RubrosM = RubrosMov::where([['rubro_id','=',$rubro->id],['valor','>','0']])->get();
        foreach ($RubrosM as $data){
            $files[] = collect(['idResource' => $data->resource_id , 'ruta' => $data->Resource->ruta, 'mov' => $data->movimiento]);
        }
        if (!isset($files)){
            foreach ($rubro->fontsRubro as $fr){
                $RubrosMov = RubrosMov::where([['fonts_rubro_id','=',$fr->id],['valor','>','0']])->get();
                foreach ($RubrosMov as $data2){
                    $files[] = collect(['idResource' => $data2->resource_id , 'ruta' => $data2->Resource->ruta, 'mov' => $data2->movimiento]);
                }
            }
            if (!isset($files)){
                $files = 0;
            }
        }

        $contadorRubDisp = 0;
        foreach ($rubros as $rub){
            if ($rub->fontsRubro->sum('valor_disp') > 0){
                $contadorRubDisp = $contadorRubDisp + 1;
            }
        }


        return view('hacienda.presupuesto.rubro.show', compact('rubro','fuentesR','valor','valorDisp','rol','rubros','fuentesAll','valores','files','add','red','contadorRubDisp','vigens'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $name, $code, $register, $subproyecto_id)
    {
        $rubro = Rubro::findOrFail($id);
        $rubro->name = $name;
        $rubro->cod = $code;
        $rubro->register_id = $register;
        $rubro->subproyecto_id = $subproyecto_id;
        $rubro->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRubro($id, $vigencia)
    {
        $rubrosDelete = Rubro::where('plantilla_cuipos_id',$id)->where('vigencia_id', $vigencia)->get();
        $rubrosDelete[0]->delete();
    }

    public function index()
    {
        $dependencia = auth()->user()->dependencia_id;
        $usuario = auth()->id();
        $rubros = Rubro::all();

        foreach ($rubros as $rubro){
            if ($dependencia == $rubro->subProyecto->dependencia->id){
                $datas[]= collect(['idRubro'=>$rubro->id,'codRubro'=> $rubro->cod,'name' => $rubro->name, 'dep' => $rubro->subProyecto->dependencia->name, 'subP' => $rubro->subProyecto->name, 'valor' => $rubro->fontsRubro->sum('valor')]);
            }
        }

        return view('administrativo.contractual.rubrosAsignados', compact('datas'));
    }

}