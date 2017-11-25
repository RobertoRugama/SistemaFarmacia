@extends('admin.app')
@section('content container-fluid')
<div class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Producto  {{$product->name}}</h2>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                            </thead>
                            <tr>
                                @if($product->status==1)
                                    <td>Activo</td>
                                @endif
                                 <td>{{$product->name}}</td>
                                 <td>{{$product->presentation}}</td>
                                 <td>{{$product->description}}</td>
                                 <td>{{$product->existence}}</td>
                                 <td>{{$product->reference}}</td>
                                 <td>{{$product->provider->name}}</td> 
                                 <td>{{$product->category->name}}</td>
                                 <td>{{$product->laboratory->name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(array('route'=>'detailproduct.store','method'=>'POST')) !!}
     @include('detailproduct.formshow')
     {!!Form::close()!!}
</div>
@endsection