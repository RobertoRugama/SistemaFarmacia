    <form method="POST" action="store">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group col-md-6">
    <label for="order_date">Fecha de Compra</label>
     {!! Form::date('order_date', \Carbon\Carbon::now('America/Managua')) !!}
  </div>
  <div class="form-group col-md-6">
    <label for="required_date">Fecha requerida</label>
  {!! Form::date('required_date', \Carbon\Carbon::now('America/Managua')) !!}
  </div>
  <div class="form-group col-lg-12">
     <label for="date_of_delivery">Fecha de Entrega</label>
  {!! Form::date('date_of_delivery', \Carbon\Carbon::now('America/Managua')) !!}
  </div>
  <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
    <label for="provider">Proveedor</label>
      <select name="provider_id" class="form-control">
         @foreach($providers as $p)
           <option value=" {{$p->id}}">{{$p->name}}</option>
         @endforeach
      </select>
    </div>
   <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
    <label for="employee">Empleado</label>
      <select name="employee_id" class="form-control">
         @foreach($employees as $e)
           <option value=" {{$e->id}}">{{$e->first_name}} {{$e->first_last_name}}</option>
         @endforeach
      </select>
    </div>
    <div class="row">
      <div class="col-md-12 col-md-12-offset-2">
        <div class="panel panel-default">
          <div class="pull-right">
            <div class="panel-heading">
              <h4>Detalle Pedido</h4>
            </div>
              <div class="panel-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-lg-5 col-md-5 col-sm-4 col-xs-10">
                   <label for="product">Producto</label>
                          <select name="product_id" class="form-control" id="idproduct">
                            @foreach($products as $p)
                              <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                          </select>
                        </div>
                  <div class="form-group col-md-3">
                    <label for="requested_amount">Monto Requerido</label>
                      <input type="number" name="requested_amount" class="form-control" id="pmount" placeholder="monto requerido numerico">
                  </div>
                    <div class="form-group col-md-3">
                      <label for="unit_value">Valor unitario</label>
                        <input type="number" name="unit_value" class="form-control" id="pvalue" placeholder="valor unitario">
                    </div>
                     <div class="form-group col-md-3">
                      <label for="discount">Descuento</label>
                        <input type="number" name="discount" class="form-control" id="pdiscount" placeholder="valor de descuento">
                    </div>
                   
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                          <div class="form-group">
                          </br>
                            <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                          </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                          <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                             <thead style="background-color: #A9D0F5">
                             <th>Opciones</th>
                             <th>Producto</th>
                             <th>Monto Requerido</th>
                             <th>Valor Unitario</th>
                             <th>Valor descuento</th>
                             <th>subtotal</th>
                             <th>iva</th>
                             <th>Total</th>
                                <tfoot>
                                  <th>Total</th>
                                   <th></th>
                                    <th></th>
                                     <th></th>
                                      <th></th>
                                       <th></th>
                                        <th></th>
                                         <th><h4 id="total">C$/.0.00</h4></th>
                                </tfoot>
                                <tbody>
                                  
                                </tbody>
                             </thead>
                          </table>
                        </div>
                          <div class="for-group col-lg-12 col-md-12" id="guardar">
                          <input name="_token" value="{{csrf_token() }}" type="hidden"></input>
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-danger" type="reset" >Cancelar</button>
                          </div>
                        </div>
                      </div>
                   </div>
                </div>
              </div>
            </form> 

@push('script')
<script>
    $(document).ready(function(){
      $('#bt_add').click(function(){
        agregar();
      });
    });

    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();

    function add(){
      product_id=$("#idproduct").val();
      product=$("#idproduct opction:selected").text();
      requested_amount=$("#pmount").val();
      unit_value=$("#pvalue").val();
      discount=$("#pdiscount").val();
      if(idproduct!="" && requested_amount!="" && unit_value!="" && discount!=""){
        subtotal[cont]=(request_amount*unit_value);
        total=total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warnig" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idproduct[]" value="'+idproduct+'">'+product+'</td><td><input type="number" name="requested_amount[]" value="'+requested_amount+'"></td><td><input type="number" name="unit_value[]" value="'+unit_value+'"></td><td><input type="number" name="discount[]" value="'+discount+'"></td><td>'+subtotal[cont]+'</td></tr>';
        cont++; 
        limpiar();
        $('#total').html("$/."+ total);
        evalue();
        $('#detalle').append(fila);
      }
      else{
          alert("erro al ingresar el detalle del pedido de compra");
      }
    }
    function clar(){
      $("#pmount").val("");
      $("#value").val("");
      $("#pdiscount").val(""); 
    }
    function evalue(){
      if(total>0)
      {
        $("#guardar").show();

      }else{
        $("#guardar").hide();
      }
      }

      function() delete(index){
        total=total-subtotal[index];
        $("#total").html("$/. "+ total);
        $("#fila" + index).remove();
        evalue();
      }
</script>
@endpush            
