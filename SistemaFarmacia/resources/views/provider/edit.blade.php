@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
             <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('provider.index') }}"> X </a>
             </div>
                <div class="panel-heading">Proveedores</div>
  
                <div class="panel-body">
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Editar Proveedor {{$provider->name}}</h3>
                        @include('provider.error')

                        {!!Form::model($provider,['method'=>'PATCH','route'=>['provider.update',$provider->id]]) !!}
                        {{Form::token()}}
                            <div class="form-group">
                              <label for="ruc">Numero RUC</label>
                              <input type="text" name="ruc" class="form-control" value="{{$provider->ruc}}" placeholder="numero ruc....">
                            </div>
                            <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" name="name" class="form-control" value="{{$provider->name}}" placeholder="Nombre del proveedor">
                            </div>
                            <div class="form-group">
                              <label for="address">Direccion</label>
                              <input type="text" name="address" class="form-control" value="{{$provider->address}}" placeholder="Direccion del proveedor">
                            </div>
                            <div class="for-group">
                                <button class="btn btn-primary" type="submit" >Editar</button>
                                <button class="btn btn-danger" type="reset" >Cancelar</button>
                            </div>
                         </form>
                         {!! Form::close() !!}
                          @include('provider.message');
                     </div>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

