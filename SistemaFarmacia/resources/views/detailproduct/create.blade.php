@extends('admin.app')
@section('content container-fluid')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-2-offset-2">
            <div class="panel panel-default">
            <div class="pull-right">
            <!-- Boton del formulario X redirecciona al index del conntent-->
             <a class="btn btn-primary" href="{{ route('product.index') }}"> X </a>
             </div>
                <div class="panel-heading">Detalle Producto</div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Agregar detalle Producto</h3>
                          @include('product.error')
                    {!! Form::open(array('route' => 'detailproduct.store','method'=>'POST')) !!}
                        @include('detailproduct.formshow')
                     {!! Form::close() !!}
                     @include('product.message')
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection