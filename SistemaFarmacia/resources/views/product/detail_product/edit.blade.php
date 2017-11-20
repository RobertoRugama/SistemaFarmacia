@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
             <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('product.index') }}"> X </a>
             </div>
                <div class="panel-heading">Producto</div>
  
                <div class="panel-body">
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Editar Producto {{$p->name}}</h3>
                        
                        {!!Form::model($p,['method'=>'PATCH','route'=>['product.update',$p->id]]) !!}
                        {{Form::token()}}
                            <div class="form-group col-md-6">
                              <label for="name">Producto</label>
                              <input type="text" name="name" class="form-control" value="{{$p->name}}" placeholder="Nombre del producto....">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="presentation">Presentacion</label>
                              <input type="text" name="presentation" class="form-control" value="{{$p->presentation}}" placeholder="Presentacion del producto....">
                            </div>
                            <div class="form-group col-lg-12">
                              <label for="description">Description</label>
                              <input type="text" name="description" class="form-control" value="{{$p->description}}" placeholder="Descripcion del producto....">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="existence">Exitencia</label>
                              <input type="text" name="existence" class="form-control" value="{{$p->existence}}" placeholder="Existencia del producto....">
                            </div>
                            <div class="form-group col-md-9">
                              <label for="reference">Referencia</label>
                              <input type="text" name="reference" class="form-control" value="{{$p->reference}}" placeholder="Referencia del producto....">
                            </div>
                             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="provider">Proveedor</label>
                                <select name="provider_id" class="form-control">
                                   @foreach($providers as $provider)
                                     <option value="{{$provider->id}}">{{$provider->name}}</option>
                                   @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                              <label for="laboratory">Laboratorio</label>
                                <select name ="laboratory_id" class="form-control">
                                   @foreach($laboratories as $lab)
                                     <option value="{{$lab->id}}">{{$lab->name}}</option>
                                   @endforeach
                                </select>
                              </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="category">Categoria</label>
                                <select name = "category_id" class="form-control">
                                   @foreach($categories as $cat)
                                     <option value="{{$cat->id}}">{{$cat->name}}</option>
                                   @endforeach
                                </select>
                              </div>
                              <div class="for-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                              </br>
                                  <button class="btn btn-primary" type="submit" >Guardar</button>
                                  <button class="btn btn-danger" type="reset" >Cancelar</button>
                              </div>
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

