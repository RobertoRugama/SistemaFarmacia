@extends('admin.app')
@section('content container-fluid')
<div class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <label for="provider">Proveedor</label>
                     <select name="id" class="form-control">
                         @foreach($products as $p)
                         <option value="{{$p->id}}" selected>{{$p->name}}</option>                          
                        @endforeach
                    </select>
                </div>
            <div class="pull-left">
                <h2>Producto  {{$p->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}">X</a>
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
     @include('product.formshow')
</div>
@endsection