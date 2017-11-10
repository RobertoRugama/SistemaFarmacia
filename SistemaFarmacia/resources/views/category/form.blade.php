  <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Categoria del producto</label>
    <input type="text" name="name" class="form-control" placeholder="nombre....">
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <input type="text" name="description" class="form-control" placeholder="Tipo de laboratorio">
  </div>
  
  <div class="for-group">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
  </form>
                     