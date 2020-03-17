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
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
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