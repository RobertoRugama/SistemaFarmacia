@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Proveedores</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h3>Listado de Proveedores <a href="provider/create"><button class="btn btn-success">Nuevo</button></a></h3>
                            @include('provider.search')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th>ruc</th>
                                                <th>nombre</th>
                                                <th>direccion</th> 
                                                <th>Opciones</th>   
                                            </thead>
                                            @foreach($providers as $p)
                                            <tr>
                                                @if($p->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$p->ruc}}</td>
                                                <td>{{$p->name}}</td>
                                                <td>{{$p->address}}</td>
                                                <td>    
                                                    <a href=""><button class="btn btn-info">Editar</button></a>

                                                    <a href=""><button class="btn btn-danger">Eliminar</button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$providers->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop

