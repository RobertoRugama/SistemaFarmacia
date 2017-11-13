  <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Cargo del Empleado</label>
    <input type="text" name="name" class="form-control" placeholder="nombre....">
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <input type="text" name="description" class="form-control" placeholder="Descripcion del cargo">
  </div>
   <div class="form-group">
    <label for="salary">Salary</label>
    <input type="text" name="salary" class="form-control" placeholder="Salario a Ganar">
  </div>
  <div class="for-group">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
  </form>
                     