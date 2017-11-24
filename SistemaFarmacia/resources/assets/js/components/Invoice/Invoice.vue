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
														<button class="btn btn-info btn-sm" @click.prevent="addProduct(product.id)">
															<em class="fa fa-plus"></em> 
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
												<td>{{ product.existence }} und</td>	
												<td>{{ product.existence }} und</td>	
												<td>{{ product.existence }} und</td>	
												<td>{{ product.existence }} und</td>		
												<td class="action">
													<button class="btn btn-info btn-sm" @click.prevent="addProduct(product.id)">
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


						<!--<div class="col-md-12">
							<ul class="list-group">
								<template v-for="product in data.products">
									<li class="list-group-item">
										<span class="badge">14 und</span>
										{{ product.name }} - {{ product.presentation }} - {{ product.description }} 
										<span class="text-danger">C$ {{ product.unit_price }}</span>
									</li>
								</template>
							</ul>
						</div>
								-->
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
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
		width: 90px;
	}
</style>