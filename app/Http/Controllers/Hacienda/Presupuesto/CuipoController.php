<?php

namespace App\Http\Controllers\Hacienda\Presupuesto;

use App\Model\Hacienda\Presupuesto\BudgetSection;
use App\Model\Hacienda\Presupuesto\Cpc;
use App\Model\Hacienda\Presupuesto\CpcsRubro;
use App\Model\Hacienda\Presupuesto\FontsRubro;
use App\Model\Hacienda\Presupuesto\FontsVigencia;
use App\Model\Hacienda\Presupuesto\SourceFunding;
use App\Model\Hacienda\Presupuesto\Terceros;
use App\Model\Hacienda\Presupuesto\TipoNorma;
use App\Model\Hacienda\Presupuesto\Vigencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Hacienda\Presupuesto\Rubro;
use Session;

class CuipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paso ,$vigencia_id)
    {
        if ($paso == "1"){
            $rubros = Rubro::where('vigencia_id',$vigencia_id)->with('cpcs')->get();
            $vigencia = Vigencia::findOrFail($vigencia_id);
            $CPCs = Cpc::select(['id','code','class'])->get();
            $CPCsRubro = CpcsRubro::all();
            return view('hacienda.presupuesto.cuipo.index', compact('vigencia', 'rubros','CPCs','CPCsRubro','paso'));
        } else {
            $rubros = Rubro::where('vigencia_id',$vigencia_id)->with('fontsRubro')->get();
            $vigencia = Vigencia::findOrFail($vigencia_id);
            $terceros = Terceros::all()->take(10);
            $tipoNormas = TipoNorma::all();
            $fuentes = SourceFunding::all();
            $fontRubro = FontsRubro::where('source_fundings_id','!=',null)->get();
            return view('hacienda.presupuesto.cuipo.index', compact('vigencia', 'rubros','terceros','paso','vigencia','fuentes','tipoNormas','fontRubro'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCPC(Request $request)
    {
        foreach ($request->code as $item){
            $cpc = new CpcsRubro();
            $cpc->cpc_id = $item;
            $cpc->rubro_id = $request->rubroID;
            $cpc->save();
        }

        Session::flash('success','Se han asignado los CPCs al rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/1/'.$request->vigencia_id);
    }

    /**
     * Remove the specified resource from cpcrubros.
     *
     * @param  int  $id
     * @param  int  $vigencia
     * @return \Illuminate\Http\Response
     */
    public function deleteCPCRubro($id, $vigencia)
    {
        $cpcRubroDelete = CpcsRubro::where('id',$id)->first();
        $cpcRubroDelete->delete();

        Session::flash('warning','Se ha eliminado el CPC del rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/1/'.$vigencia);
    }

    /**
     * Remove the specified resource from cpcrubros.
     *
     * @param  int  $idRubro
     * @param  int  $vigencia
     * @return \Illuminate\Http\Response
     */
    public function deleteAllCPCRubro($idRubro, $vigencia)
    {
        $cpcRubroDelete = CpcsRubro::where('rubro_id',$idRubro)->get();
        foreach ($cpcRubroDelete as $item) $item->delete();

        Session::flash('warning','Se ha eliminado todos los CPCs del rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/1/'.$vigencia);
    }

    /**
     * Store a newly source fundings in the rubro
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveSourceFundings(Request $request)
    {
        $fontVigen = FontsVigencia::where('vigencia_id',$request->vigencia_id)->first();
        foreach ($request->code as $item){
            $sourcefunding = new FontsRubro();
            $sourcefunding->source_fundings_id = $item;
            $sourcefunding->rubro_id = $request->rubroID;
            $sourcefunding->valor = 0;
            $sourcefunding->valor_disp = 1;
            $sourcefunding->font_vigencia_id = $fontVigen->id;
            $sourcefunding->save();
        }

        Session::flash('success','Se han asignado las fuentes de financiación al rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/2/'.$request->vigencia_id);
    }

    /**
     * Remove the specified resource from fontrubros.
     *
     * @param  int  $id
     * @param  int  $vigencia
     * @return \Illuminate\Http\Response
     */
    public function deleteFontRubro($id, $vigencia)
    {
        $fontRubroDelete = FontsRubro::where('id',$id)->first();
        $fontRubroDelete->delete();

        Session::flash('warning','Se ha eliminado la fuente del rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/2/'.$vigencia);
    }

    /**
     * Remove the specified resource from cpcrubros.
     *
     * @param  int  $idRubro
     * @param  int  $vigencia
     * @return \Illuminate\Http\Response
     */
    public function deleteAllFontsRubro($idRubro, $vigencia)
    {
        $fontRubroDelete = FontsRubro::where('rubro_id',$idRubro)->get();
        foreach ($fontRubroDelete as $item) $item->delete();

        Session::flash('warning','Se ha eliminado todas las fuentes del rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/2/'.$vigencia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveTipoNorma(Request $request)
    {
        $rubro = Rubro::where('id',$request->rubroIDTN)->get();
        $rubro[0]->tipo_normas_id = $request->codeTN;
        $rubro[0]->save();

        Session::flash('success','Se ha asignado el tipo de norma al rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/1/'.$request->vigencia_idTN);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveTercero(Request $request)
    {
        $rubro = Rubro::where('id',$request->rubroIDT)->get();
        $rubro[0]->terceros_id = $request->codeT;
        $rubro[0]->save();

        Session::flash('success','Se ha asignado el tercero al rubro correctamente');
        return redirect('/presupuesto/rubro/CUIPO/2/'.$request->vigencia_idT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}