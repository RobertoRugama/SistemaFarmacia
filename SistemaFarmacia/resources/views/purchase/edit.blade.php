@extends('admin.app')

@section('content container-fluid')

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-2">
      <div class="panel panel-default">
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('purchase.index') }}"> X </a>
        </div>
          <div class="panel-heading">Editar Orden de Compra</div>
            <div class="panel-body">
             @if (Session('status'))
                <div class="alert alert-success">
                  {{ Session('status') }}
                </div>
              @endif
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         
              {!!Form::model($purchases,['method'=>'PATCH','route'=>['purchase.update',$purchases->id]]) !!}
                              {{Form::token()}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group col-md-6">
                            <label for="order_date">Fecha de Compra</label>
                             {!! Form::date('order_date', \Carbon\Carbon::now('America/Managua')) !!}
                          </div>
                          <div class="form-group col-md-6">
                            <label for="required_date">Fecha requerida</label>
                          {!! Form::date('required_date', \Carbon\Carbon::now('America/Managua')) !!}
                          </div>
                          <div class="form-group col-lg-12">
                             <label for="date_of_delivery">Fecha de Entrega</label>
                          {!! Form::date('date_of_delivery', \Carbon\Carbon::now('America/Managua')) !!}
                          </div>
                          <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
                            <label for="provider">Proveedor</label>
                              <select name="provider_id" class="form-control">
                                 @foreach($providers as $p)
                                   <option value=" {{$p->id}}">{{$p->name}}</option>
                                 @endforeach
                              </select>
                            </div>
                           <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
                            <label for="employee">Empleado</label>
                              <select name="employee_id" class="form-control">
                                 @foreach($employees as $e)
                                   <option value=" {{$e->id}}">{{$e->first_name}} {{$e->first_last_name}}</option>
                                 @endforeach
                              </select>
                            </div>
                            <div class="for-group col-lg-12 col-md-12">
                              <button class="btn btn-primary" type="submit" >Guardar</button>
                              <button class="btn btn-danger" type="reset" >Cancelar</button>
                          </div>  
                          {!! Form::close() !!}
                          @include('purchase.message')
                     </div>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

