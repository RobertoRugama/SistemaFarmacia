@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
             <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('charge.index') }}"> X </a>
             </div>
                <div class="panel-heading">Cargo</div>
  
                <div class="panel-body">
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Editar Cargo {{$charge->name}}</h3>
                        @include('Charge.error')
                        {!!Form::model($charge,['method'=>'PATCH','route'=>['charge.update',$charge->id]]) !!}
                        {{Form::token()}}
                            <div class="form-group">
                              <label for="name">Cargo</label>
                              <input type="text" name="name" class="form-control" value={{$charge->name}} placeholder="nombre del cargo">
                            </div>
                            <div class="form-group">
                              <label for="description">Descripcion</label>
                              <input type="text" name="description" class="form-control" value={{$charge->description}} placeholder="Descripcion de cargo...">
                            </div>
                            <div class="form-group">
                              <label for="salary">Salario</label>
                              <input type="text" name="salary" class="form-control" value={{$charge->salary}} placeholder="Salario del Cargo...">
                            </div>
                            <div class="for-group">
                                <button class="btn btn-primary" type="submit" >Editar</button>
                                <button class="btn btn-danger" type="reset" >Cancelar</button>
                            </div>
                         </form>
                         {!! Form::close() !!}
                          @include('charge.message')
                     </div>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

