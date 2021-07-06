@extends('layouts.dashboard')

@section('title', 'CobroCoactivo')

@section('titulo')
    Configuración General
@stop

@section('content')
<div>
	<h4 class="text-center">En esta sección se encuentra la creacion de las firmas para los correspondientes PDF, al crear los nombres el software automaticamente actualiza las firmas
		para los correspondientes responsables dependiendo la fecha de inicio y fin del mismo, a su vez se actualiza la parte superior de la pagina principal con los
		nombres de la correspondiente mesa directiva del año actual.
		<br><br>
		Recuerda que si no hay ninguna firma almacenada los PDF saldran sin nombre.
	</h4>
</div>
<ul class="nav nav-pills">
	<li class="nav-item active">
		<a class="nav-link" data-toggle="pill" href="#personas"> Firmas</a>
	</li>
	<li class="nav-item ">
		<a class="nav-link"  href="{{route('configGeneral.create')}}">Nueva Firma</a>
	</li>
</ul>
<div class="tab-content" style="background-color: white">
	<div id="lista" class="tab-pane active">
		<div class="breadcrumb text-center">
			<strong>
                <h3><b>Firmas</b></h3>
            </strong>
		</div>
		<div class="container-fluid">
			<div class="table-responsive">
				<div class="box">
					<div class="box-body">
						<table class="table table-bordered cell-border table-hover text-center" id="example"  data-form="deleteForm">
							<thead>
								<tr class="active">
									<th class="text-center">#</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Cargo</th>
									<th class="text-center">Fecha Inicio</th>
									<th class="text-center">Fecha Final</th>
									<th class="text-center"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></th>
									<th class="text-center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
								</tr>
							</thead>
							<tbody>
							@foreach($configGeneral as $key => $firma)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$firma->nombres}}</td>
									<td>{{$firma->tipo}}</td>
									<td>{{date('d-m-y', strtotime($firma->fecha_inicio))}}</td>
									<td>{{date('d-m-y', strtotime($firma->fecha_fin))}}</td>
									<td><a href="{{ route("configGeneral.edit", $firma->id)}}" class="btn btn-xs btn-danger">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
									<td>
										@include('admin.configgeneral.delete', ['firma' => $firma])
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
   <script>
		     $('#example').DataTable( {
             language: {
			  "lengthMenu": "Mostrar _MENU_ registros",
			  "zeroRecords": "No se encontraron resultados",
			  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
			  "sSearch": "Buscar:",
			  "oPaginate": {
				  "sFirst": "Primero",
				  "sLast":"Último",
				  "sNext":"Siguiente",
				  "sPrevious": "Anterior"
			   },
			   "sProcessing":"Procesando...",
		  },
	  //para usar los botones   
      "pageLength": 10,
      responsive: "true",
	  dom: 'Bfrtilp',       
	  buttons:[ 
			  {
			  extend:    'copyHtml5',
			  text:      '<i class="fa fa-clone"></i> ',
			  titleAttr: 'Copiar',
			  className: 'btn btn-primary'
		  },
		  {
			  extend:    'excelHtml5',
			  text:      '<i class="fa fa-file-excel-o"></i> ',
			  titleAttr: 'Exportar a Excel',
			  className: 'btn btn-primary'
		  },
		  {
			  extend:    'pdfHtml5',
			  text:      '<i class="fa fa-file-pdf-o"></i> ',
			  titleAttr: 'Exportar a PDF',     
			  message : 'SIEX',
			  header :true,
              	exportOptions: {
				  columns: [ 0,1,2,3,4]
					},
			  pageSize: 'LEGAL',
			  className: 'btn btn-primary',
			   },
		  {
			  extend:    'print',
			  text:      '<i class="fa fa-print"></i> ',
			  titleAttr: 'Imprimir',
			  className: 'btn btn-primary'
		  },
	  ]	             

		 });

        $(document).ready(function() {
            var table = $('#example').DataTable();
		} );

		
   </script>
@stop
