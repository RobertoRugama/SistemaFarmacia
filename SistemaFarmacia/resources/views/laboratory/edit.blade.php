@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
             <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('laboratory.index') }}"> X </a>
             </div>
                <div class="panel-heading">Laboratorio</div>
  
                <div class="panel-body">
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Editar Laboratorio {{$laboratory->name}}</h3>
                        @include('laboratory.error')

                        {!!Form::model($laboratory,['method'=>'PATCH','route'=>['laboratory.update',$laboratory->id]]) !!}
                        {{Form::token()}}
                            <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" name="name" class="form-control" value="{{$laboratory->name}}" placeholder="nombre del laboratorio">
                            </div>
                            <div class="form-group">
                              <label for="type">Tipo Laboratorio</label>
                              <input type="text" name="type" class="form-control" value="{{$laboratory->type}}" placeholder="Tipo de laboratorio">
                            </div>
                            <div class="form-group">
                              <label for="location">Direccion</label>
                              <input type="text" name="location" class="form-control" value="{{$laboratory->location}}" placeholder="Direccion del laboratorio">
                            </div>
                            <div class="for-group">
                                <button class="btn btn-primary" type="submit" >Editar</button>
                                <button class="btn btn-danger" type="reset" >Cancelar</button>
                            </div>
                         </form>
                         {!! Form::close() !!}
                          @include('laboratory.message')
                     </div>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

