@extends('admin.app')
@section('content container-fluid')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
            <div class="pull-right">
            <!-- Boton del formulario X redirecciona al index del conntent-->
             <a class="btn btn-primary" href="{{ route('charge.index') }}"> X </a>
             </div>
                <div class="panel-heading">Cargo de Empleados</div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Registrar Cargos</h3>
                          @include('charge.error')
                    {!! Form::open(array('route' => 'charge.store','method'=>'POST')) !!}
                        @include('charge.form')
                     {!! Form::close() !!}
                     @include('charge.message')
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

