@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Pedidos Productos Sanvalentine</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3>Listado <a href="{{ route('purchase.create') }}"><button class="btn btn-success" aria-hidden="true">Nuevo</button></a></h3>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th>Fecha de Compra</th>
                                                <th>Fecha Requerida</th> 
                                                <th>Fecha de entrega</th> 
                                                <th>Proveedores</th> 
                                                <th>Empleados</th>  
                                                <th width="250px">Opciones</th>   
                                            </thead>
                                            @foreach($purchases as $p)
                                            <tr>
                                                @if($p->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$p->order_date}}</td>
                                                <td>{{$p->required_date}}</td>
                                                <td>{{$p->date_of_delivery}}</td>
                                                <td>{{$p->provider->name}}</td>
                                                <td>{{$p->employee->first_name}}{{$p->employee->first_last_name}}</td>
                                                <td>   
                                                    <a href="{{ URL::action('PurchaseOrderController@edit',$p->id)}}"><button class="btn btn-primary">Editar</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['purchase.destroy', $p->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                   @include('purchase.message')
                                                  {!! Form::close() !!}
                                                   <a href="{{ URL::action('PurchaseOrderController@show',$p->id)}}"><button class="btn btn-primary">Detalle</button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$purchases->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

