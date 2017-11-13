    <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group col-md-6">
    <label for="name">Producto</label>
    <input type="text" name="name" class="form-control" placeholder="Nombre del producto....">
  </div>
  <div class="form-group col-md-6">
    <label for="presentation">Presentacion</label>
    <input type="text" name="presentation" class="form-control" placeholder="Presentacion del producto....">
  </div>
  <div class="form-group col-lg-12">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Descripcion del producto....">
  </div>
  <div class="form-group col-md-3">
    <label for="existence">Exitencia</label>
    <input type="text" name="existence" class="form-control" placeholder="Existencia del producto....">
  </div>
  <div class="form-group col-md-9">
    <label for="reference">Referencia</label>
    <input type="text" name="reference" class="form-control" placeholder="Referencia del producto....">
  </div>
   <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
    <label for="provider">Proveedor</label>
      <select name="provider_id" class="form-control">
         @foreach($providers as $provider)
           <option value="{{$provider->id}}">{{$provider->name}}</option>
         @endforeach
      </select>
    </div>
    <!-- boton para Agregar Proveedores llama al formulario form Provider-->
    <div class="for-group col-lg-1 col-md-1 col-sm-2 col-xs-2">
    </br>
    <a href="{{route('provider.create')}}"><button class="btn btn-success">+</button></a> 
    </div>
    {!! Form::open(['method' => 'POST','route' =>'product.store']) !!}
    <div class="form-group col-lg-5 col-md-5">
    <label for="laboratory">Laboratorio</label>
      <select name ="laboratory_id" class="form-control">
         @foreach($laboratories as $lab)
           <option value="{{$lab->id}}">{{$lab->name}}</option>
         @endforeach
      </select>
    </div>
    <!-- boton para Agregar Laboratorio llama al formulario form Laboratory-->
    <div class="for-group col-lg-1 col-md-1 col-sm-12 col-xs-12">
    </br>
    <a href="{{route('laboratory.create')}}"><button class="btn btn-success" >+</button></a>
    </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label for="category">Categoria</label>
      <select name = "category_id" class="form-control">
         @foreach($categories as $cat)
           <option value="{{$cat->id}}">{{$cat->name}}</option>
         @endforeach
      </select>
    </div>
    <!-- boton para Agregar Categoria llama al formulario form Category-->
     <div class="for-group col-lg-1 col-md-1 col-sm-12 col-xs-12">
    </br>
    <a href="{{route('category.create')}}"><button class="btn btn-success">+</button></a>
    </div>
    <div class="for-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
    </br>
        <button class="btn btn-primary" type="submit" >Guardar</button>
        <button class="btn btn-danger" type="reset" >Cancelar</button>
    </div>
</form>             