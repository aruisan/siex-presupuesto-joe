<?php
namespace App\Traits;

use App\Model\Hacienda\Presupuesto\Vigencia;

Class ConteoTraits
{
	public function conteoCdps($vigencia, $cdp_id){
        $vigenciaOld = Vigencia::where('vigencia',$vigencia-1)->where('tipo', 0)->first();
        return $cdp_id-$vigenciaOld->cdps->last()->id;
    }
}
