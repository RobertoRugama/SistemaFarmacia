  <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Producto</label>
    <input type="text" name="name" class="form-control" placeholder="Nombre del producto....">
  </div>
  <div class="form-group">
    <label for="presentation">Presentacion</label>
    <input type="text" name="presentation" class="form-control" placeholder="Presentacion del producto....">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Descripcion del producto....">
  </div>
  <div class="form-group">
    <label for="existence">Exitencia</label>
    <input type="text" name="existence" class="form-control" placeholder="Existencia del producto....">
  </div>
  <div class="form-group">
    <label for="reference">Referencia</label>
    <input type="text" name="reference" class="form-control" placeholder="Referencia del producto....">
  </div>
   <div class="form-group">
    <label for="provider">Proveedor</label>
      <select class="form-control">
         @foreach($providers as $provider)
           <option>{{$provider->name}}</option>
         @endforeach
      </select>
    </div>
  <div class="form-group">
    <label for="category">Categoria</label>
      <select class="form-control">
         @foreach($categories as $cat)
           <option>{{$cat->name}}</option>
         @endforeach
      </select>
    </div>
   <div class="form-group">
    <label for="laboratory">Laboratorio</label>
      <select class="form-control">
         @foreach($laboratories as $lab)
           <option>{{$lab->name}}</option>
         @endforeach
      </select>
    </div>
  <div class="for-group">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
  </form>
                     