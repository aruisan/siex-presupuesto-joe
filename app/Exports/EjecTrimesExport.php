<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EjecTrimesExport implements FromView
{
    public function __construct(int $id, int $año, $codigos, $valoresIniciales, $valoresFinAdd, $valoresAdd, $valoresFinRed, $valoresRed, $valoresFinCred, $valoresCred, $valoresFinCCred, $valoresCcred,
                                $valoresDisp, $ArrayDispon, $valoresFinCdp, $valoresCdp, $valoresFinReg, $valoresRubro, $valorDisp, $saldoDisp, $valorFcdp,$valorDcdp, $valoresFinOp, $valOP, $valoresFinP, $valP,
                                $valoresFinC, $valCP, $valoresFinRes, $valR){

        $this->id = $id;$this->año = $año;$this->codigos = $codigos;$this->valoresIniciales = $valoresIniciales;$this->valoresFinAdd = $valoresFinAdd;$this->valoresAdd = $valoresAdd;
        $this->valoresFinRed = $valoresFinRed;$this->valoresRed = $valoresRed;$this->valoresFinCred = $valoresFinCred;$this->valoresCred = $valoresCred;$this->valoresFinCCred = $valoresFinCCred;
        $this->valoresCcred = $valoresCcred;$this->valoresDisp = $valoresDisp;$this->ArrayDispon = $ArrayDispon;$this->valoresFinCdp = $valoresFinCdp;$this->valoresCdp = $valoresCdp;
        $this->valoresFinReg = $valoresFinReg;$this->valoresRubro = $valoresRubro;$this->valorDisp = $valorDisp;$this->saldoDisp = $saldoDisp;$this->valorFcdp = $valorFcdp;
        $this->valorDcdp = $valorDcdp;$this->valoresFinOp = $valoresFinOp;$this->valOP = $valOP;$this->valoresFinP = $valoresFinP;$this->valP = $valP;$this->valoresFinC = $valoresFinC;
        $this->valCP = $valCP;$this->valoresFinRes = $valoresFinRes;$this->valR = $valR;
    }

    public function view(): View
    {
        if ($this->id == 1){
            $meses = "Enero - Marzo ".$this->año;
        } elseif ($this->id == 2){
            $meses = "Abril - Junio ".$this->año;
        } elseif($this->id == 3){
            $meses = "Julio - Septiembre ".$this->año;
        }else{
            $meses = "Octubre - Diciembre ".$this->año;
        }

        $codigos = $this->codigos;$valoresIniciales = $this->valoresIniciales;$valoresFinAdd = $this->valoresFinAdd;$valoresAdd = $this->valoresAdd;$valoresFinRed = $this->valoresFinRed;
        $valoresRed = $this->valoresRed;$valoresFinCred = $this->valoresFinCred;$valoresCred = $this->valoresCred;$valoresFinCCred = $this->valoresFinCCred;$valoresCcred = $this->valoresCcred;
        $valoresDisp = $this->valoresDisp;$ArrayDispon = $this->ArrayDispon;$valoresFinCdp = $this->valoresFinCdp;$valoresCdp = $this->valoresCdp;$valoresFinReg = $this->valoresFinReg;
        $valoresRubro = $this->valoresRubro;$valorDisp = $this->valorDisp;$saldoDisp = $this->saldoDisp;$valorFcdp = $this->valorFcdp;$valorDcdp = $this->valorDcdp;$valoresFinOp = $this->valoresFinOp;
        $valOP = $this->valOP;$valoresFinP = $this->valoresFinP;$valP = $this->valP;$valoresFinC = $this->valoresFinC;$valCP = $this->valCP;$valoresFinRes = $this->valoresFinRes;$valR = $this->valR;

        return view('exports.ejecucionTrim', compact('meses','codigos','valoresIniciales','valoresFinAdd', 'valoresAdd', 'valoresFinRed', 'valoresRed', 'valoresFinCred', 'valoresCred',
            'valoresFinCCred', 'valoresCcred', 'valoresDisp', 'ArrayDispon', 'valoresFinCdp', 'valoresCdp', 'valoresFinReg', 'valoresRubro', 'valorDisp', 'saldoDisp', 'valorFcdp','valorDcdp',
            'valoresFinOp', 'valOP', 'valoresFinP', 'valP', 'valoresFinC', 'valCP', 'valoresFinRes', 'valR'));
    }
}

