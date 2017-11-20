@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Productos Farmacia Sanvalentine</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3>Listado Productos <a href="{{ route('product.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
                            @include('product.search')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th>nombre</th>
                                                <th>Presentacion</th>
                                                <th>Descripcion</th> 
                                                <th>Existencia</th> 
                                                <th>Referencia</th> 
                                                <th>Proveedor</th> 
                                                <th>Categoria</th> 
                                                <th>Laboratorio</th> 
                                                <th width="250px">Opciones</th>   
                                            </thead>
                                            @foreach($products as $p)
                                            <tr>
                                                @if($p->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$p->name}}</td>
                                                <td>{{$p->presentation}}</td>
                                                <td>{{$p->description}}</td>
                                                <td>{{$p->existence}}</td>
                                                <td>{{$p->reference}}</td>
                                                <td>{{$p->provider->name}}</td> 
                                                <td>{{$p->category->name}}</td>
                                                <td>{{$p->laboratory->name}}</td>
                                                <td>   
                                                    <a href="{{ URL::action('ProductController@edit',$p->id)}}"><button class="btn btn-primary">Editar</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $p->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                   @include('product.message')
                                                  {!! Form::close() !!}

                                                   {!! Form::open(['method'=> 'STORE','route'=>['detail_product.store',$p->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Detalle', ['class' => 'btn btn-danger']) !!}
                                                        @include('detail_product.form')
                                                     {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$products->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

