<?php
namespace App\Traits;

use App\Model\Hacienda\Presupuesto\Vigencia;

Class ConteoTraits
{
	public function conteoCdps($vigencia, $cdp_id){
        $conteo = $cdp_id;
        if($vigencia > 2019){
            $vigenciaOld = Vigencia::where('vigencia',$vigencia-1)->where('tipo', 0)->first();
            $conteo = $cdp_id-$vigenciaOld->cdps->last()->id;
        }

        return $conteo;
    }
}
