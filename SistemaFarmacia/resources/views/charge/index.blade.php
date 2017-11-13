@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Cargo de Empleados</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h3>Cargos <a href="{{ route('charge.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
                            @include('charge.search')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th>Cargo</th>
                                                <th>Descripcion</th>
                                                <th>Salario</th>
                                                <th width="250px">Opciones</th>   
                                            </thead>
                                            @foreach($charges as $charge)
                                            <tr>
                                                @if($charge->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$charge->name}}</td>
                                                <td>{{$charge->description}}</td>
                                                <td>{{$charge->salary}}</td>
                                                <td>    
                                                    <a href="{{ URL::action('ChargeController@edit',$charge->id)}}"><button class="btn btn-primary">Editar</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['charge.destroy', $charge->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                   @include('charge.message')
                                                  {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$charges->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

