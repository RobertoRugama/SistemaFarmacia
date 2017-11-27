@extends('admin.app')
@section('content container-fluid')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12-offset-2 col-sm-12">
            <div class="panel panel-default">
            <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('purchase.index') }}"> X </a>
             </div>
                <div class="panel-heading">Pedido</div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Registrar Nuevo Pedido</h3>
                          @include('purchase.error')
                    {!! Form::open(array('route' => 'purchase.store','method'=>'POST')) !!}
                        @include('purchase.form')
                     {!! Form::close() !!}
                     @include('purchase.message')
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


