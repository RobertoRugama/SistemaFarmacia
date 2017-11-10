  <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="ruc">Numero RUC</label>
    <input type="text" name="ruc" class="form-control" placeholder="numero ruc....">
  </div>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control" placeholder="Nombre del proveedor 2 nombres y 2 apellidos">
  </div>
  <div class="form-group">
    <label for="address">Direccion</label>
    <input type="text" name="address" class="form-control" placeholder="Direccion del proveedor">
  </div>
  <div class="for-group">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
  </form>
                     