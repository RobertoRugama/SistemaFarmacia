<template>	
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-10 col-md-2-offset-2">
                <div class="panel panel-default">
                <div class="pull-right">
                <!-- Boton del formulario X redirecciona al index del conntent-->
                <a class="btn btn-primary" href="#"> X </a>
                </div>
                    <div class="panel-heading">Empleados</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3 class="page-header">Registrar Empleados</h3>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	 import invoiceController from './InvoiceController'
    export default {
		mixins: [invoiceController]
	}
</script>