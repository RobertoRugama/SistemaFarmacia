<template>	
    <div class="app container-fluid">
		<!-- -->
        <loading :show="show"
		 		  :label="label">
		 </loading>	
		 
		<div class="Aligner">
		    <div class="Aligner-item loading">
		   		 <i v-show="show" class="fa fa-spinner fa-pulse fa-5x fa-fw "></i>
			</div>
		</div>
	
		<div class="row spark-screen">
			<div class="col-md-12">
				<!-- Default box -->
				<div class="box">
					<!-- <div class="box-header with-border">
						<div class="Aligner">
							 <div class="Aligner-item"><span class="lead">{{ title }}</span> </div>
                        </div>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div> 
					</div> -->
                      
					<div class="box-body">
						<div class="container-fluid">
						    

							<!-- Tabs -->
						<ul class="nav nav-tabs nav-justified">
							<li :class="{ 'active': tabIndex === 1 }"><a @click.prevent="selectTab(1)"> <span>Datos Generales de Facturación</span> </a></li>
							<li :class="{ 'active': tabIndex === 2 }"><a @click.prevent="selectTab(2)"><span>Generar Fáctura de Productos</span> </a></li>
						</ul>
						<div class="tab-content">
							<!-- Init -->
							<div v-show="tabIndex === 1">
								<!-- Section Employee -->
								<div class="form-group">
									<div class="col-md-4">
										<label for="employee" class="control-label col-md-4">Vendedor</label>
										<div class="col-md-8">
											<select class="form-control" id="employee" v-model="data.selectedEmployeeId">
												<option v-for="employee in records.employees" :value="employee.id">
													{{ employee.first_name }} {{ employee.first_last_name }}
												</option>
											</select>  
										</div>
									</div>
									<div class="col-md-5">
										<label for="customer" class="control-label col-md-4">Cliente</label>
										<div class="col-md-8">  
											<input type="text" class="form-control" id="customer" v-model="data.customerName">
										</div>
									</div>
									<div class="col-md-2">
										<label class="control-label pull-right lead text-danger">{{ new Date().getDate() }} - 
										{{ new Date().getMonth() }} - {{ new Date().getFullYear() }}</label>
									</div>
								</div>
								
								<div class="col-md-12">
									<div v-show="records.products.length > 0" class="table-responsive m-top">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>Nombre</th>
													<th>Presentación</th>
													<th>Descripción</th>
													<th>Precio Unitario</th>
													<th>Existencia</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
												<tr v-for="product in records.products">
													<td>{{ product.name }}</td>
													<td>{{ product.presentation }}</td>
													<td>{{ product.description }}</td>
													<td>C$ {{ product.unit_price }}</td>
													<td>{{ product.existence }} und</td>		
													<td class="action">																	
														<button class="btn btn-success btn-xs" @click.prevent="showModalProduct(product.id, 'AddProductModal')">
															<em class="fa fa-plus"></em> 
														</button>
														<!-- <button  v-show="product.hasList" class="btn btn-info btn-xs" @click.prevent="showModalProduct(product.id, 'AddProductModal')">
															<em class="fa fa-edit"></em> 
														</button> -->
														<button v-show="product.hasList" class="btn btn-danger btn-xs" @click.prevent="removeProduct(product.id)">
															<em class="fa fa-trash-o"></em> 
														</button>	
													</td>
												</tr>
											</tbody>
										</table>
										<div class="col-md-12">
											<pagination v-show="pagination.last_page != 1" :pagination="pagination"
														@click.native="getDataForShow(pagination.current_page)"
														:offset="4">
											</pagination>
										</div>
									</div>
									<div class="container-fluid" v-show="records.products.length == 0">
										<div class="Aligner">
											<div class="Aligner-item"><h3 class="lead text-muted">No hay productos en el inventario</h3> </div>
										</div>	
									</div>
								</div>
								</br>
								
									
								<div class="col-md-12 card text-info lead">
								    <div class="col-md-12">
										Subtotal: C$ {{ parseFloat(Math.round(subtotal * 100) / 100).toFixed(2) }}
									</div>
									<div class="col-md-12">
										Impuesto: C$ {{ parseFloat(Math.round(tax * 100) / 100).toFixed(2) }}
									</div>
									<div class="col-md-12">
										Total: C$ {{ parseFloat(Math.round(total * 100) / 100).toFixed(2) }}
									</div>
									<div class="col-md-12">	
									    <br>
										<div class="col-md-4 pull-left">
											<input type="button" :disabled="data.products.length == 0" @click.prevent="invoiceProducts" class="btn btn-success" value="Facturar">
										</div>
									</div>
								</div>
								
							</div>
							<div v-show="tabIndex === 2">
								<div v-show="data.products.length > 0" class="table-responsive m-top">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Presentación</th>
												<th>Descripción</th>
												<th>Precio Unitario</th>
												<th>Cantidad</th>
												<th>Subtotal</th>
												<th>Impuesto</th>
												<th>Total</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="product in data.products">
												<td>{{ product.name }}</td>
												<td>{{ product.presentation }}</td>
												<td>{{ product.description }}</td>
												<td>C$ {{ product.unit_price }}</td>
												<td>{{ product.quantity }} und</td>	
												<td>{{ product.subtotal }}</td>	
												<td>{{ product.tax }}</td>	
												<td>{{ product.total }}</td>		
												<td class="action">
													<button class="btn btn-info btn-xs" @click.prevent="addProduct(product.id)">
														<em class="fa fa-plus"></em> 
													</button>
												</td>
											</tr>
										</tbody>
									</table>
								 </div>
								 <div class="container-fluid" v-show="data.products.length == 0">
									<div class="Aligner">
										<div class="Aligner-item"><h3 class="lead text-muted">Usted no ha agregado productos a su compra.</h3> </div>
									</div>	
								 </div>
							</div>
						</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
		<!-- MODAL ADD QUANTITY  -->
		<div class="modal fade" id="AddProductModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span class="modal-title text-success" id="exampleModalLabel">{{ productDescriptionModal }}</span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="m-top">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<div class="col-md-12">
										<label for="quantity" class="control-label col-md-3">Escribe la cantidad</label>
										<div class="col-md-8">
											<input type="number" class="form-control" v-model="selectedQuantity" id="quantity"></input>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success" @click.prevent="addProduct('AddProductModal')">Agregar</button>
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

<style scoped>
	.table td, th {
		text-align: center;   
	}		
	.action{
		width: 100px;
	}
	.card{
		border-radius: 2%;
		box-shadow: 5px 5px 10px #F5F5DC inset;
		padding: 20px 5px;
	}
</style>