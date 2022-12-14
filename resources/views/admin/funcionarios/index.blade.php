@extends('layouts.dashboard')
@section('titulo')
    Funcionarios
@stop
@section('sidebar')
  {{-- @include('admin.funcionarios.cuerpo.aside') --}}
@stop
@section('content')

        <div class="breadcrumb text-center">
            <strong>
                <h4><b>Administración Funcionarios</b></h4>
            </strong>
        </div>
            <ul class="nav nav-pills">
                <li class="nav-item active">
                    <a class="nav-link " data-toggle="pill" href="#lista"> Funcionarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('funcionarios.create')}}">Crear Funcionario</a>
                </li>
             
            </ul>
     
            <div class="tab-content" style="background-color: white">
                <div id="lista" class="tab-pane active"><br>
                    <div class="table-responsive">
                        <br>
                  <div class="table-responsive">
                          <div class="box">
                                    <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    </div><!-- /.box-header -->
                                <div class="box-body">

                                  <table class="table table-bordered">
                                  <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Roles</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Jefe</th>
                                    <th class="text-center">Asignar</th>
                                    <th class="text-center"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></th>
                                    <th class="text-center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                  </tr>
                                  @foreach ($data as $key => $user)
                                    <tr>
                                      <td class="text-center">{{ ++$i }}</td>
                                      <td class="text-center">{{ $user->name }}</td>
                                      <td class="text-center">{{ $user->email }}</td>
                                      <td class="text-center">
                                        @if(!empty($user->roles))
                                          @foreach($user->roles as $rol)
                                            <a href="{{ route('roles.show', $rol->id) }}"><label class="badge badge-success">{{ $rol->name }}</label></a>
                                          @endforeach
                                        @endif
                                      </td>
                                      <td class="text-center">@if($user->type) {{$user->type->nombre}} @endif</td>
                                      <td class="text-center">@if($user->user_boss) {{$user->user_boss->boss->name}} @endif</td>
                                      <td class="text-center">
                                        @if(isset($user->type) && $user->type->asignar == 1)
                                          <a href="{{url('asignar/'.$user->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-users"></i></a>
                                        @endif
                                      </td>
                                      <td class="text-center">
                                        <a href="{{ route('funcionarios.edit',$user->id) }}" class="btn btn-sm btn-danger">
                                          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                      </td>
                                      <td>
                                          {!! Form::open(['method' => 'DELETE','route' => ['funcionarios.destroy', $user->id],'style'=>'display:inline']) !!}
                                            <button type="submit" name="delete_modal" class="btn btn-sm btn-danger delete" >
                                              <span class="glyphicon glyphicon-remove " aria-hidden="true"></span>
                                            </button>
                                          {!! Form::close() !!}
                                      </td>
                                    </tr>
                                  @endforeach
                                  </table>

                                  </div>
                               </div>
                            </div>
                                 </div>
                               </div>


{!! $data->render() !!}


@endsection