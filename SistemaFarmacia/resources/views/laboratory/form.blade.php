  <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Nombre del Laboratorio</label>
    <input type="text" name="name" class="form-control" placeholder="nombre....">
  </div>
  <div class="form-group">
    <label for="type">tipo de laboratorio</label>
    <input type="text" name="type" class="form-control" placeholder="Tipo de laboratorio">
  </div>
  <div class="form-group">
    <label for="location">Ubicacion</label>
    <input type="text" name="location" class="form-control" placeholder="ubicacion....">
  </div>
  <div class="for-group">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
  </form>
                     