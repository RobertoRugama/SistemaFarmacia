@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Laboratorios</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h3>Listado Laboratorios <a href="{{ route('laboratory.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
                            @include('laboratory.search')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th>nombre</th>
                                                <th>tipo Laboratorio</th>
                                                <th>ubicacion</th> 
                                                <th width="250px">Opciones</th>   
                                            </thead>
                                            @foreach($laboratories as $lab)
                                            <tr>
                                                @if($lab->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$lab->name}}</td>
                                                <td>{{$lab->type}}</td>
                                                <td>{{$lab->location}}</td>
                                                <td>    
                                                    <a href="{{ URL::action('LaboratoryController@edit',$lab->id)}}"><button class="btn btn-primary">Editar</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['laboratory.destroy', $lab->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                   @include('laboratory.message')
                                                  {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$laboratories->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

