@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
             <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('employee.index') }}"> X </a>
             </div>
                <div class="panel-heading">Empleado</div>
  
                <div class="panel-body">
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Editar Empleado {{$employee->name}}</h3>
                         {!!Form::model($employee,['method'=>'PATCH','route'=>['employee.update',$employee->id]]) !!}
                        {{Form::token()}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="date_register">Fecha de Registro</label>
                              {!! Form::date('date_register', \Carbon\Carbon::now()) !!}
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="identification_card">Cedula</label>
                                <input type="text" name="identification_card" value="{{$employee->identification_card}}" class="form-control" placeholder="Cedula del empleado">
                              </div>
                               <div class="form-group col-lg-6 col-md-6">
                                <label for="first_name">Primer Nombre</label>
                                <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control" placeholder="Primer Nombre">
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="second_name">Segundo Nombre</label>
                                <input type="text" name="second_name" value="{{$employee->second_name}}" class="form-control" placeholder="Segundo Nombre">
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="first_last_name">Primer Apellido</label>
                                <input type="text" name="first_last_name" value="{{$employee->first_last_name}}" class="form-control" placeholder="Primer Apellido">
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="second_last_name">Segundo Apellido</label>
                                <input type="text" name="second_last_name" value="{{$employee->second_last_name}}" class="form-control" placeholder="Segundo Apellido">
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="address">Direccion</label>
                                <input type="text" name="address" value="{{$employee->second_last_name}}" class="form-control" placeholder="Direccion">
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="user">Usuario</label>
                                <input type="text" name="user" value="{{$employee->user}}" class="form-control" placeholder="Usuario">
                              </div>
                              <div class="form-group col-lg-6 col-md-6">
                                <label for="previleges">Permisos</label>
                                <input type="text" name="previleges" value="{{$employee->previleges}}" class="form-control" placeholder="Privilegios de acceso">
                              </div>
                              <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
                                <label for="charge">Cago</label>
                                  <select name="charge_id" class="form-control">
                                     @foreach($charges as $charge)
                                     @if($charge->id==$employee->charge_id)
                                       <option value="{{$charge->id}}" selected>{{$charge->name}}</option>
                                       @else
                                       <option value="{{$charge->id}}">{{$charge->name}}</option>
                                       @endif
                                     @endforeach
                                  </select>
                                </div>
                              <div class="for-group col-lg-12 col-md-12">
                                  <button class="btn btn-primary" type="submit" >Guardar</button>
                                  <button class="btn btn-danger" type="reset" >Cancelar</button>
                              </div>
                         {!! Form::close() !!}
                          @include('employee.message')
                     </div>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

