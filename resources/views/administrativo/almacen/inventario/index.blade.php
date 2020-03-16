@extends('layouts.dashboard')
@section('titulo')
    Inventario
@stop
@section('content')
    <div class="breadcrumb text-center">
        <strong>
            <h4><b>Inventario</b></h4>
        </strong>
    </div>
    <ul class="nav nav-pills">
        <li class="nav-item active">
            <a class="nav-link" data-toggle="pill" href="#tabHome"><i class="fa fa-home"></i></a>
        </li>
        <li class="nav-item">
            <a class="tituloTabs" href="{{ url('/administrativo/Inventario/create') }}">NUEVO ITEM</a>
        </li>
    </ul>
    <div class="tab-content" style="background-color: white">
        <div id="tabHome" class="tab-pane active"><br>
            <div class="table-responsive">
                @if(count($items) > 0)
                    <table class="table table-bordered" id="tabla_INV">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Concepto</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Registro</th>
                            <th class="text-center">Tercero</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="text-center">
                                <td>{{ $ordenPagoT['info']->code }}</td>
                                <td>{{ $ordenPagoT['info']->nombre }}</td>
                                <td>$<?php echo number_format($ordenPagoT['info']->valor,0) ?></td>
                                <td>
                                    <span class="badge badge-pill badge-danger">
                                        @if($ordenPagoT['info']->estado == "0")
                                            Pendiente
                                        @elseif($ordenPagoT['info']->estado == "1")
                                            Finalizado
                                        @else
                                            Anulado
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center">{{ $ordenPagoT['info']->registros->objeto }}</td>
                                <td class="text-center">{{ $ordenPagoT['persona'] }}</td>
                                <td>
                                    <a href="{{ url('administrativo/ordenPagos/'.$ordenPagoT['info']->id.'/edit') }}" title="Editar" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('administrativo/ordenPagos/show/'.$ordenPagoT['info']->id) }}" title="Ver Orden de Pago" class="btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('administrativo/ordenPagos/monto/create/'.$ordenPagoT['info']->id) }}" title="Asignación de Monto" class="btn-sm btn-primary"><i class="fa fa-usd"></i></a>
                                    <a href="{{ url('administrativo/ordenPagos/descuento/create/'.$ordenPagoT['info']->id) }}" title="Descuentos" class="btn-sm btn-success"><i class="fa fa-usd"></i><i class="fa fa-arrow-down"></i></a>
                                    <a href="{{ url('administrativo/ordenPagos/liquidacion/create/'.$ordenPagoT['info']->id) }}" title="Contabilización" class="btn-sm btn-primary"><i class="fa fa-calculator"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <br><br>
                    <div class="alert alert-danger">
                        <center>
                            No se encuentra ningun item almacenado en el inventario.
                        </center>
                    </div>
                @endif
            </div>
        </div>
        @stop
        @section('js')
            <script>
                $('#tabla_INV').DataTable( {
                    responsive: true,
                    "searching": true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'print'
                    ]
                } );
            </script>
        @stop