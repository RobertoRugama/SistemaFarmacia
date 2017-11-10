@extends('admin.app')

@section('content container-fluid')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
             <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('category.index') }}"> X </a>
             </div>
                <div class="panel-heading">Categoria</div>
  
                <div class="panel-body">
                    @if (Session('status'))
                        <div class="alert alert-success">
                            {{ Session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="page-header">Editar Categoria {{$category->name}}</h3>
                        @include('category.error')

                        {!!Form::model($category,['method'=>'PATCH','route'=>['category.update',$category->id]]) !!}
                        {{Form::token()}}
                            <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" name="name" class="form-control" value={{$category->name}} placeholder="nombre del la categoria">
                            </div>
                            <div class="form-group">
                              <label for="description">Descripcion</label>
                              <input type="text" name="description" class="form-control" value={{$category->description}} placeholder="Descripcion de categoria">
                            </div>
                            
                            <div class="for-group">
                                <button class="btn btn-primary" type="submit" >Editar</button>
                                <button class="btn btn-danger" type="reset" >Cancelar</button>
                            </div>
                         </form>
                         {!! Form::close() !!}
                          @include('category.message')
                     </div>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

