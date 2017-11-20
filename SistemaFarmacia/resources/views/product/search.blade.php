{!! Form::open(array('url'=>'product','method'=>'GET','autocomplete'=>'on','role'=>'search'))!!}
	<div class="form-group">
		<div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
			<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>

{{Form::close()}}