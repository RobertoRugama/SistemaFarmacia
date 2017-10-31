@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Proveedores</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3 class="page-header">Registrar Proveedor</h3>
                        @if(count($errors)>0)
                           <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {!! Form::open(array('url'=>'provider','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
                        <div class="form-group">
                            <label for="ruc">Numero RUC</label>
                            <input type="text" name="ruc" class="form-control" placeholder="numero ruc....">
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre del proveedor">
                        </div>
                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" class="form-control" placeholder="Direccion del proveedor">
                        </div>
                        <div class="for-group">
                              <button class="btn btn-primary" type="submit" >Guardar</button>
                              <button class="btn btn-danger" type="reset" >Cancelar</button>
                        </div>
                        {{Form::close()}}
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

