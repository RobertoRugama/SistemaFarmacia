    <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group col-md-6">
    <label for="requested_amount">Monto Requerido</label>
    <input type="text" name="requested_amount" class="form-control" placeholder="monto requerido numerico">
  </div>
  <div class="form-group col-md-6">
    <label for="unit_vlaue">Valor unitario</label>
  <input type="text" name="unit_value" class="form-control" placeholder="valor unitario">
  </div>
  <div class="form-group col-lg-12">
     <label for="discount">Descuento</label>
    <input type="text" class="discount" class="form-control" placeholder="Descuento">
  </div>
  <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
    <label for="product">Producto</label>
      
    </div>
    <div class="for-group col-lg-12 col-md-12">
      <button class="btn btn-primary" type="submit" >Guardar</button>
      <button class="btn btn-danger" type="reset" >Cancelar</button>
  </div>
</form>             