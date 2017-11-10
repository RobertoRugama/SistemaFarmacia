@extends('admin.app')
@section('content container-fluid')
<div class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Proveedores </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('provider.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
       <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>ruc: </strong>
             {{ $p->ruc}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name: </strong>   
            {{ $p->name}}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address: </strong>
               {{ $p->address}}
            </div> 
        </div>

    </div>
    
  
    
</div>
@endsection