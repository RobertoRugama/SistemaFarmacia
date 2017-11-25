      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <label for="product">Producto</label>
                     <select name="id" class="form-control">
                         @foreach($products as $p)
                         <option value="{{$p->id}}" selected>{{$p->name}}</option>                          
                        @endforeach
                    </select>
                </div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="quantity">Cantidad</label>
            <input type="text" name="quantity" class="form-control" placeholder="Cantidad....">
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="restriction">Restriccion</label>
            <input type="text" name="restriction" class="form-control" placeholder="Restriccion">
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label for="aviable">Disponible</label>
            <input type="text" name="aviable" class="form-control" placeholder="Disponoble....">
          </div>
          <div class="for-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
          </br>
              <button class="btn btn-primary" type="submit" >Agregar</button>
              <button class="btn btn-danger" type="reset" >Cancelar</button>
          </div>
     </div>
  </div>