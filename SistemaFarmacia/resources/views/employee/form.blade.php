  <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group col-lg-6 col-md-6">
    <label for="date_register">Fecha de Registro</label>
  {!! Form::date('date_register', \Carbon\Carbon::now()) !!}
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="identification_card">Cedula</label>
    <input type="text" name="identification_card" class="form-control" placeholder="Cedula del empleado">
  </div>
   <div class="form-group col-lg-6 col-md-6">
    <label for="first_name">Primer Nombre</label>
    <input type="text" name="first_name" class="form-control" placeholder="Primer Nombre">
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="second_name">Segundo Nombre</label>
    <input type="text" name="second_name" class="form-control" placeholder="Segundo Nombre">
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="first_last_name">Primer Apellido</label>
    <input type="text" name="first_last_name" class="form-control" placeholder="Primer Apellido">
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="second_last_name">Segundo Apellido</label>
    <input type="text" name="second_last_name" class="form-control" placeholder="Segundo Apellido">
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="address">Direccion</label>
    <input type="text" name="address" class="form-control" placeholder="Direccion">
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="user">Usuario</label>
    <input type="text" name="user" class="form-control" placeholder="Usuario">
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label for="previleges">Permisos</label>
    <input type="text" name="previleges" class="form-control" placeholder="Privilegios de acceso">
  </div>

  <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
    <label for="charge">Cago</label>
      <select name="charge_id" class="form-control">
         @foreach($charges as $charge)
           <option value="{{$charge->id}}">{{$charge->name}}</option>
         @endforeach
      </select>
    </div>
  <div class="for-group col-lg-12 col-md-12">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
  </form>
                     