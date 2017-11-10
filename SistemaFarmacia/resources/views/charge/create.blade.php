@extends('admin.app')
@section('content container-fluid')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
            <div class="pull-right">
            <!-- Boton del formulario X redirecciona al index del conntent-->
             <a class="btn btn-primary" href="{{ route('category.index') }}"> X </a>
             </div>
                <div class="panel-heading">Categorias</div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Registrar Categorias</h3>
                          @include('category.error')
                    {!! Form::open(array('route' => 'category.store','method'=>'POST')) !!}
                        @include('category.form')
                     {!! Form::close() !!}
                     @include('category.message')
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

