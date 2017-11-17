@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Registros de Empleados</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3>Listado Empleados <a href="{{ route('employee.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
                            @include('employee.search')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th width="250px">Fecha de Registro</th>
                                                <th width="250px">Cedula</th>
                                                <th>Primer Nombre</th>
                                                <th>Segundo Nombre</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th width="250px">Direccion</th>
                                                <th>Usuario</th>
                                                <th>Privilegios</th>
                                                <th>Cargo</th>
                                                <th width="250px"></th>   
                                            </thead>
                                            @foreach($employees as $e)
                                            <tr>
                                                @if($e->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$e->date_register}}</td>
                                                <td>{{$e->identification_card}}</td>
                                                <td>{{$e->first_name}}</td>
                                                <td>{{$e->second_name}}</td>
                                                <td>{{$e->first_last_name}}</td>
                                                <td>{{$e->second_last_name}}</td>
                                                <td>{{$e->address}}</td>
                                                <td>{{$e->user}}</td>
                                                <td>{{$e->previleges}}</td>
                                                <td>{{$e->charge->name}}</td>
                                                <td>    
                                                    <a href="{{ URL::action('EmployeeController@edit',$e->id)}}"><button class="btn btn-primary">Editar</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $e->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                   @include('employee.message')
                                                  {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$employees->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

