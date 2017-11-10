@extends('admin.app')

@section('content container-fluid')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias de Productos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h3>Lista de Categorias <a href="{{ route('category.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
                            @include('category.search')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Estado</th>
                                                <th>nombre</th>
                                                <th>descripcion</th>
                
                                                <th width="250px">Opciones</th>   
                                            </thead>
                                            @foreach($categories as $cat)
                                            <tr>
                                                @if($cat->status==1)
                                                <td>Activo</td>
                                                @endif
                                                <td>{{$cat->name}}</td>
                                                <td>{{$cat->description}}</td>
                                               
                                                <td>    
                                                    <a href="{{ URL::action('CategoryController@edit',$cat->id)}}"><button class="btn btn-primary">Editar</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $cat->id],'style'=>'display:inline']) !!}
                                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                   @include('category.message')
                                                  {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    {{$categories->render()}}
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

