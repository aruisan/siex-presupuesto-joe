@extends('layouts.dashboard')
@section('titulo')
    {{ $item->nombre }}
@stop
@section('content')
    <div class="breadcrumb text-center">
        <strong>
            <h4><b>{{ $item->nombre }}</b></h4>
        </strong>
    </div>
    <ul class="nav nav-pills">

        <li class="nav-item regresar">
            <a class="tituloTabs" href="{{ url('/administrativo/productos') }}">Volver a Productos</a>
        </li>
        <li class="nav-item active">
                <a class="nav-link" data-toggle="pill" href="#tabHome">{{ $item->nombre }}</a>
        </li>
    </ul>
    <div class="tab-content" style="background-color: white">
        <div id="tabHome" class="tab-pane active"><br>
            <div class="form-validation">
                <form class="form-valide"  enctype="multipart/form-data">
                    <div class="col-md-2 align-self-center"></div>
                    <div class="col-md-8 align-self-center">
                        <table class="table-bordered" width="100%">
                            <tbody>
                            <tr class="text-center">
                                <td rowspan="2"><img src="{{ asset('img/productos/'.$item->id.'.jpg')}}" width="30%" height="30%"></td>
                                <td colspan="3">Producto = {{ $item->nombre }}</td>
                            </tr>
                            <tr class="text-center">
                                <td>Cantidad Maxima = {{ $item->cant_maxima }}</td>
                                <td>Cantidad Minima = {{ $item->cant_minima }}</td>
                                <td>
                                    Método = @if($item->metodo == 0) U.E.P.S @else P.E.P.S @endif
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <br>
                        <table class="table-bordered" width="100%">
                            <tbody>
                            <tr class="text-center">
                                <td rowspan="2">NÚMERO</td>
                                <td rowspan="2">FECHA</td>
                                <td colspan="2">DETALLE</td>
                                <td colspan="3">ENTRADAS</td>
                                <td colspan="3">SALIDAS</td>
                                <td colspan="2">SALDOS</td>
                            </tr>
                            <tr class="text-center">
                                <td>CONCEPTO</td>
                                <td>FRAND</td>
                                <td>CANTIDAD</td>
                                <td>VR. UNITARIO</td>
                                <td>VR. TOTAL</td>
                                <td>CANTIDAD</td>
                                <td>VR. UNITARIO</td>
                                <td>VR. TOTAL</td>
                                <td>CANTIDAD</td>
                                <td>TOTAL</td>
                            </tr>
                            <tr class="text-center">
                                <td>0</td>
                                <td>{{ $item->created_at->Format('Y-m-d') }}</td>
                                <td>Producto inicial en la plataforma</td>
                                <td></td>
                                <td>{{ $item->cant_inicial }}</td>
                                <td></td>
                                <td>$<?php echo number_format($item->valor_inicial,0) ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $item->cant_inicial }}</td>
                                <td>$<?php echo number_format($item->valor_inicial,0) ?></td>
                            </tr>
                            @foreach($data as $key => $info)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $info->created_at->Format('Y-m-d') }}</td>
                                    <td>{{ $info->descripcion }}</td>
                                    <td></td>
                                    @if($info->tipo == 0)
                                        <td>{{ $info->cantidad }}</td>
                                        <td>$<?php echo number_format($info->valor_unidad,0) ?></td>
                                        <td>$<?php echo number_format($info->valor_final,0) ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if(!isset($cant))
                                            @php($cant = $item->cant_inicial + $info->cantidad )
                                            <td>{{ $cant }}</td>
                                        @else
                                            <td>{{ $cant + $info->cantidad }}</td>
                                        @endif
                                        @if(!isset($val))
                                            @php($val = $item->valor_inicial + $info->valor_final )
                                            <td>$<?php echo number_format($val,0) ?></td>
                                        @else
                                            <td>$<?php echo number_format($val + $info->valor_final,0) ?></td>
                                        @endif
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $info->cantidad }}</td>
                                        <td>$<?php echo number_format($info->valor_unidad,0) ?></td>
                                        <td>$<?php echo number_format($info->valor_final,0) ?></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <br>
                            <center>
                                <button type="submit" disabled class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop