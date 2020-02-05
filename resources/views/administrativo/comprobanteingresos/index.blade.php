@extends('layouts.dashboard')
@section('titulo')
    Comprobantes de Ingresos
@stop
@section('sidebar')
@stop
@section('content')
    <div class="breadcrumb text-center">
        <strong>
            <h4><b>Comprobantes de Ingresos Vigencia {{ $vigencia->vigencia }}</b></h4>
        </strong>
    </div>

    <ul class="nav nav-pills">
        <li class="nav-item regresar">
            <a class="nav-link" href="{{ url('/presupuestoIng') }}" >Volver a Presupuesto de Ingresos</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" data-toggle="pill" href="#tabTareas">TAREAS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#tabHistorico">HISTORICO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/administrativo/CIngresos/create/'.$vigencia->id) }}" >NUEVO COMPROBANTE DE INGRESOS</a>
        </li>
    </ul>

    <div class="tab-content" >
        <div id="tabTareas" class="tab-pane fade in active">
            <div class="table-responsive">
                @if(count($CIngresosT) > 0)
                    <table class="table table-bordered" id="tabla_CDP">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Objeto</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Valor Total</th>
                            <th class="text-center"><i class="fa fa-usd"></i></th>
                            <th class="text-center"><i class="fa fa-edit"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CIngresosT as $index => $CI)
                            <tr>
                                <td class="text-center">{{ $CI->code }}</td>
                                <td class="text-center">{{ $CI->concepto }}</td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-danger">
                                        @if($CI->estado == "0")
                                            Pendiente
                                        @elseif($CI->estado == "1")
                                            Rechazado
                                        @elseif($CI->estado == "2")
                                            Anulado
                                        @else
                                            Enviado
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center">$<?php echo number_format($CI->val_total,0) ?></td>
                                <td class="text-center">
                                    <a href="{{ url('administrativo/CIngresos/show/'.$CI->id) }}" title="Ingresar Dinero al CDP" class="btn-sm btn-primary"><i class="fa fa-usd"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('administrativo/CIngresos/'.$CI->id.'/edit') }}" title="Editar CDP" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <br><br>
                    <div class="alert alert-danger">
                        <center>
                            No hay Comprobantes de Ingresos Pendientes.
                        </center>
                    </div>
                @endif
            </div>
        </div>
        <div id="tabHistorico" class="tab-pane fade">
            <div class="table-responsive">
                @if(count($CIngresos) > 0)
                    <table class="table table-bordered" id="tabla_Historico">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Objeto</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Saldo</th>
                            <th class="text-center">Ver</th>
                            <th class="text-center">PDF</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CIngresos as $cdp)
                            <tr>
                                <td class="text-center">{{ $cdp->code }}</td>
                                <td class="text-center">{{ $cdp->name }}</td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-danger">
                                        @if($cdp->jefe_e == "0")
                                            Pendiente
                                        @elseif($cdp->jefe_e == "1")
                                            Rechazado
                                        @elseif($cdp->jefe_e == "2")
                                            Anulado
                                        @elseif($cdp->jefe_e == "3")
                                            Aprobado
                                        @else
                                            En Espera
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center">$<?php echo number_format($cdp->valor,0) ?></td>
                                <td class="text-center">$<?php echo number_format($cdp->saldo,0) ?></td>
                                <td class="text-center">
                                    <a href="{{ url('administrativo/cdp/'.$vigencia_id.'/'.$cdp->id) }}" title="Ver CDP" class="btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('administrativo/cdp/pdf/'.$cdp['id'].'/'.$vigencia_id) }}" title="File" class="btn-sm btn-primary"><i class="fa fa-file-pdf-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <br><br>
                    <div class="alert alert-danger">
                        <center>
                            No hay Comprobantes de Ingresos finalizados
                        </center>
                    </div>
                @endif
            </div>
        </div>

    </div>
@stop
@section('js')

    <script type="text/javascript" >

        $(document).ready(function(){

            $('.nav-tabs a[href="#tabTareas"]').tab('show')
        });

    </script>

    <script>
        $('#tabla_CDP').DataTable( {
            responsive: true,
            "searching": true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        } );

        $('#tabla_Historico').DataTable( {
            responsive: true,
            "searching": true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        } );

    </script>
@stop
