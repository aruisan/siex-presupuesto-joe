<?php

namespace App\Model\Administrativo\ComprobanteIngresos;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class CIRubros extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public function ComprobanteIng(){
        return $this->hasMany('App\Model\Administrativo\ComprobanteIngresos\ComprobanteIngresos','comprobante_ingreso_id');
    }

    public function rubro(){
        return $this->hasOne('App\Model\Hacienda\Presupuesto\Rubro','id');
    }

    public function fontsRubro(){
        return $this->hasMany('App\Model\Hacienda\Presupuesto\FontsRubro','id');
    }

}
