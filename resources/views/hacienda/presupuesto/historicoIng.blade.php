@extends('layouts.dashboard')
@section('titulo')
    Vigencia: {{ $vigencia->vigencia }}
@stop
@section('content')
    <div class="row inputCenter">
        <ul class="nav nav-pills">
            <li class="nav-item principal">
                <a class="nav-link"  href=""> Presupuesto de Ingresos {{ $vigencia->vigencia }}</a>
            </li>
            <li class="nav-item pillPri">
                <a class="nav-link"  href="{{ url('/presupuesto/') }}"> Regresar al Presupuesto</a>
            </li>
            <li class="dropdown">
                <a class="nav-item dropdown-toggle pillPri" href="" data-toggle="dropdown">Historico &nbsp;<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu ">
                    @foreach($years as $year)
                        <li>
                            <a href="{{ url('/presupuesto/historico/'.$year['id']) }}" class="btn btn-drop text-left">{{ $year['info'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="col-md-12 align-self-center">
            <div class="row" >
                <div class="breadcrumb col-md-12 text-center" >
                    <strong>
                        <h4><b>Presupuesto de Ingresos {{ $vigencia->vigencia }}</b></h4>
                    </strong>
                </div>
            </div>
                <ul class="nav nav-pills">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="pill" href="#tabHome"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill"  href="@can('fuentes-list') #tabFuente @endcan">Fuentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="@can('rubros-list') #tabRubros @endcan">Rubros</a>
                    </li>
                    <li class="nav-item hidden">
                        <a class="nav-link" data-toggle="pill" href="@can('pac-list') #tabPAC @endcan">PAC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="@can('adiciones-list') #tabAddIng @endcan">Adiciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="@can('adiciones-list') #tabRedIng @endcan">Reducciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="@can('creditos-list') #tabCre @endcan">Creditos</a>
                    </li>
                    <li class="nav-item hidden">
                        <a class="nav-link disabled" data-toggle="pill" href="#tabApl">Aplazamientos</a>
                    </li>
                </ul>
                <div class="tab-content" style="background-color: white">
                    <div id="tabHome" class="tab-pane active"><br>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" align="100%" id="tabla_presupuesto" style="text-align: center">
                                <thead>
                                <tr>
                                    <th class="text-center">Rubro</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">P. Inicial</th>
                                    <th class="text-center">Adición</th>
                                    <th class="text-center">Reducción</th>
                                    <th class="text-center">P.Definitivo</th>
                                    <th class="text-center">Recaudo Mes</th>
                                    <th class="text-center">Recaudo Acumulado</th>
                                    <th class="text-center">Total Recaudado</th>
                                    <th class="text-center">Saldo Por Recaudar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($codigos as $codigo)
                                    <tr>
                                        @if($codigo['valor'])
                                            <td class="text-dark" style="vertical-align:middle;"><a href="{{ url('presupuesto/rubro/'.$codigo['id_rubro']) }}">{{ $codigo['codigo']}}</a></td>
                                        @else
                                            <td class="text-dark" style="vertical-align:middle;">{{ $codigo['codigo']}}</td>
                                        @endif
                                        <td class="text-dark" style="vertical-align:middle;">{{ $codigo['name']}}</td>
                                        <!-- PRESUPUESTO INICIAL-->
                                        @foreach($valoresIniciales as $valorInicial)
                                            @if($valorInicial['id'] == $codigo['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($valorInicial['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                        @if($codigo['valor'])
                                            <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($codigo['valor'],0);?></td>
                                        @endif
                                    <!-- ADICIÓN -->
                                        @foreach($valoresIniciales as $valorInicial)
                                            @if($valorInicial['id'] == $codigo['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ 0</td>
                                            @endif
                                        @endforeach
                                        @foreach($valoresAdd as $valorAdd)
                                            @if($codigo['id_rubro'] == $valorAdd['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($valorAdd['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                    <!-- REDUCCIÓN -->
                                        @foreach($valoresIniciales as $valorInicial)
                                            @if($valorInicial['id'] == $codigo['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ 0</td>
                                            @endif
                                        @endforeach
                                        @foreach($valoresRed as $valorRed)
                                            @if($codigo['id_rubro'] == $valorRed['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($valorRed['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                    <!-- PRESUPUESTO DEFINITIVO -->
                                        @foreach($valoresDisp as $valorDisponible)
                                            @if($valorDisponible['id'] == $codigo['id'])
                                                <td class="text-center" style="vertical-align:middle;">$ <?php echo number_format($valorDisponible['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                        @foreach($ArrayDispon as $valorPD)
                                            @if($codigo['id_rubro'] == $valorPD['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($valorPD['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                        <td class="text-center text-dark"></td>
                                        <td class="text-center text-dark"></td>
                                    <!-- TOTAL RECAUDADO-->
                                        @foreach($valoresFinRec as $valorFinRec)
                                            @if($valorFinRec['id'] == $codigo['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($valorFinRec['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                        @foreach($totalRecaud as $totalR)
                                            @if($codigo['id_rubro'] == $totalR['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($totalR['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                    <!-- SALDO POR RECAUDAR -->
                                        @foreach($valoresFinSald as $valorFinSald)
                                            @if($valorFinSald['id'] == $codigo['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($valorFinSald['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                        @foreach($saldoRecaudo as $saldoR)
                                            @if($codigo['id_rubro'] == $saldoR['id'])
                                                <td class="text-center text-dark" style="vertical-align:middle;">$ <?php echo number_format($saldoR['valor'],0);?></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLA DE FUENTES -->

                    <div id="tabFuente" class="tab-pane fade"><br>
                        <div class="table-responsive">
                            <br>
                            <table class="table table-hover table-bordered" align="100%" id="tabla_fuente">
                                <thead>
                                <tr>
                                    <th class="text-center">Rubro</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">P. Inicial</th>
                                    @foreach($fuentes as $fuente)
                                        <th class="text-center">{{ $fuente['name'] }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($codigos as $codigo)
                                    <tr>
                                        <td class="text-dark">{{ $codigo['codigo']}}</td>
                                        <td class="text-dark">{{ $codigo['name']}}</td>
                                        @foreach($valoresIniciales as $valorInicial)
                                            @if($valorInicial['id'] == $codigo['id'])
                                                <td class="text-center text-dark">$ <?php echo number_format($valorInicial['valor'],0);?>.00</td>
                                            @endif
                                        @endforeach
                                        @if($codigo['valor']!=null)
                                            <td class="text-center text-dark">$ <?php echo number_format($codigo['valor'],0);?>.00</td>
                                        @elseif($codigo['valor']==null)
                                            <td class="text-center text-dark"></td>
                                        @endif
                                        @foreach($FRubros as $FRubro)
                                            @if($FRubro['rubro_id'] == $codigo['id_rubro'])
                                                <td class="text-center text-dark">$ <?php echo number_format($FRubro["valor"],0);?>.00</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLA DE RUBROS -->

                    <div id="tabRubros" class="tab-pane fade"><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla_Rubros">
                                <thead>
                                <tr>
                                    <th class="text-center">Rubro</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Valor Inicial</th>
                                    <th class="text-center">Valor Final</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Rubros as  $Rubro)
                                    <tr>
                                        <td>{{ $Rubro['codigo'] }}</td>
                                        <td>{{ $Rubro['name'] }}</td>
                                        <td class="text-center">$ <?php echo number_format($Rubro['valor'],0);?>.00</td>
                                        <td class="text-center">$ <?php echo number_format($Rubro['valor_disp'],0);?>.00</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLA DE PAC -->

                    <div id="tabPAC" class="tab-pane fade"><br>
                        <h2 class="text-center">PAC</h2>
                    </div>

                    <!-- TABLAS DE ADICIONES -->

                    <div id="tabAddIng" class=" tab-pane fade"><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla_AddE">
                                <thead>
                                <tr>
                                    <th class="text-center">Rubro</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Valor Adición</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Rubros as  $Rubro)
                                    @foreach($valoresAdd as $valAdd)
                                        @if($valAdd['id'] == $Rubro['id_rubro'] and $valAdd['valor'] > 0)
                                            <tr>
                                                <td>{{ $Rubro['codigo'] }}</td>
                                                <td>{{ $Rubro['name'] }}</td>
                                                <td class="text-center">$ <?php echo number_format($valAdd['valor'],0);?>.00</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLAS DE REDUCCIONES -->

                    <div id="tabRedIng" class=" tab-pane fade"><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla_RedE">
                                <thead>
                                <tr>
                                    <th class="text-center">Rubro</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Valor Reducción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Rubros as  $Rubro)
                                    @foreach($valoresRed as $valRed)
                                        @if($valRed['id'] == $Rubro['id_rubro'] and $valRed['valor'] > 0)
                                            <tr>
                                                <td>{{ $Rubro['codigo'] }}</td>
                                                <td>{{ $Rubro['name'] }}</td>
                                                <td class="text-center">$ <?php echo number_format($valRed['valor'],0);?>.00</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLA DE CREDITOS Y CONTRACREDITOS -->

                    <div id="tabCre" class=" tab-pane fade"><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabla_Cyc">
                                <thead>
                                <tr>
                                    <th class="text-center">Rubro</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Valor Credito</th>
                                    <th class="text-center">Valor Contracredito</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Rubros as  $Rubro)
                                    @foreach($valoresCyC as $valCyC)
                                        @if($valCyC['id'] == $Rubro['id_rubro'])
                                            @if($valCyC['valorC'] == 0 and $valCyC['valorCC'] == 0)
                                            @else
                                                <tr>
                                                    <td>{{ $Rubro['codigo'] }}</td>
                                                    <td>{{ $Rubro['name'] }}</td>
                                                    <td class="text-center">$ <?php echo number_format($valCyC['valorC'],0);?>.00</td>
                                                    <td class="text-center">$ <?php echo number_format($valCyC['valorCC'],0);?>.00</td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLA DE APLAZAMIENTOS  -->

                    <div id="tabApl" class=" tab-pane fade"><br>
                        <h2 class="text-center">Aplazamientos</h2>
                    </div>

                </div>

        </div>
    </div>
@stop
@section('js')
    <script>
        $('#tabla_Rubros').DataTable( {
            responsive: true,
            "searching": true,
            "pageLength": 5,
            dom: 'Bfrtip',
            buttons: [
                'pdf' ,'copy', 'csv', 'excel', 'print'
            ]
        } );

        $('#tabla_presupuesto').DataTable( {
            responsive: true,
            "searching": false,
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        } );

        $('#tabla_fuentes').DataTable( {
            responsive: true,
            "searching": false,
            dom: 'Bfrtip',
            buttons: [
                'pdf' ,'copy', 'csv', 'excel', 'print'
            ]
        } );

        $('#tabla_AddE').DataTable( {
            responsive: true,
            "searching": true,
            "pageLength": 5,
            dom: 'Bfrtip',
            buttons: [
                'pdf' ,'copy', 'csv', 'excel', 'print'
            ]
        } );

        $('#tabla_RedE').DataTable( {
            responsive: true,
            "searching": true,
            "pageLength": 5,
            dom: 'Bfrtip',
            buttons: [
                'pdf' ,'copy', 'csv', 'excel', 'print'
            ]
        } );

        $('#tabla_Cyc').DataTable( {
            responsive: true,
            "searching": true,
            "pageLength": 5,
            dom: 'Bfrtip',
            buttons: [
                'pdf' ,'copy', 'csv', 'excel', 'print'
            ]
        } );
    </script>
@stop