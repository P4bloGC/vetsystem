<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your html goes here -->
<p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
&nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>

<form id="form" method='post' action="{{CRUDBooster::mainpath('add-save')}}" onsubmit="ingresarDetalleVenta();">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="secret_id" id="secret_id" value="{{ uniqid() }}">
	
	<div class="col-md-3">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Nueva Venta</h3>
			</div>
			<div class="box-body">
				
				<div class="col-md-12">
					<label>Cliente</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<select class="form-control" name="id_clientes" id="id_clientes">
							<option>Seleccione un Cliente..</option>
							<?php foreach($clientes as $val){?>
								<option value='{{$val->id}}'><?=$val->apellido_paterno?> <?=$val->apellido_materno?> <?=$val->nombre?></option>
							<?php }?>
						</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Medio de Pago</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<select class="form-control" name="id_medio_pagos" id="id_medio_pagos" required>
							<option>Seleccione un Medio de Pago..</option>
							<?php foreach($medio_pagos as $val){?>
								<option value='{{$val->id}}'><?=$val->medio_pago?></option>
							<?php }?>
						</select>
					</div>
				</div>
				
				<div class="col-md-6">
					<label>Tipo de Documento</label>
					<select class="form-control" name="id_tipo_documento_tributario" id="id_tipo_documento_tributario" required>
						<option>Seleccione un Tipo de Documento..</option>
						<?php foreach($tipo_documentos as $val){?>
							<option value='{{$val->id}}'><?=$val->tipo_documento_tributario?></option>
						<?php }?>
					</select>
				</div>
				
				<div class="col-md-6">
					<label>Nro. Documento</label>
					<input type="text" class="form-control" name="nro_documento" id="nro_documento">
				</div>
				
				<div class="col-md-12">
					<label>Subtotal</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
						<input type="number" class="form-control" name="subtotal" id="subtotal" value=0 readonly>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Descuento</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-percent"></i></span>
					<input type="number" class="form-control" name="descuento" id="descuento" value=0 min=0 max=100 onchange="sumarArticulos()">
				</div>
				</div>
				
				<div class="col-md-12">
					<label>Total</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
					<input type="number" class="form-control" name="monto_venta" id="monto_venta" value=0 min=0 readonly>
				</div>
				</div>
				
				<div class="col-md-6">
					<label>Monto Pagado</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
						<input type="number" class="form-control" name="monto_pagado" id="monto_pagado" value=0 min=0 onchange="sumarArticulos()">
					</div>
				</div>
				
				<div class="col-md-6">
					<label>Vuelto</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
						<input type="number" class="form-control" name="vuelto" id="vuelto" value=0 min=0 readonly>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Comentarios</label>
					<textarea class="form-control" name="comentarios" id="comentarios"></textarea>
				</div>
				
				<div class="col-md-12"><br>
					<button type="submit" class="btn btn-primary btn-block"><b>Ingresar Venta</b></button>
				</div>
			</div>	
		</div>
		</div>
			
			<div class="col-md-9">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Listado de Artículos/Servicios</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive" style="height: 350px; overflow-y: scroll;">
							<table class="table no-margin datatables-simple">
								<thead>
									<tr>
										<th>Artículo ID</th>
										<th>Nombre</th>
										<th>Categoría</th>
										<th>Cantidad Disponible</th>
										<th>Precios</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($articulos as $key => $val){ if($val->cantidad <= $val->cantidad_minima){$class="warning";}?>
										<tr class="{{$class}}">
											<td>{{$val->id}}</td>
											<td>{{$val->nombre}}</td>
											<td>{{$val->categoria_articulo}}</td>
											<td>{{$val->cantidad}}</td>
											<td>
												<select class="form-control" name="precio{{$val->id}}" id="precio{{$val->id}}">
													<option value='{{$val->precio1}}'>P1: {{$val->precio1}}</option>
													<option value='{{$val->precio2}}'>P2: {{$val->precio2}}</option>	
													<option value='{{$val->precio3}}'>P3: {{$val->precio3}}</option>	
													<option value='{{$val->precio4}}'>P4: {{$val->precio4}}</option>	
												</select>
											</td>
											<td>
												<div class="input-group">
													<input type="number" title="Cantidad" max="{{$val->cantidad}}" class="form-control" name="cantidad{{$val->id}}" id="cantidad{{$val->id}}" value="1" min=1>
													<span class="input-group-addon">
														<a class="btn btn-xs btn-danger btn-delete" title="Agregar" href="javascript:agregarArticulo({{$val->id}},'{{$val->categoria_articulo}}','{{$val->nombre}}','{{$val->cantidad}}')" ><i class="fa fa-plus"></i></a>
													</span>
												</div>
											</td>
										</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>	
				</div>
				
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Detalle Venta</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin">
								<tbody>
									<tr>
										<th>Nombre</th>
										<th>Categoría</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Total</th>
										<th></th>
									</tr>
									<tr id="detalleVenta"></tr>
								</tbody>
							</table>
						</div>
					</div>	
				</div>
			</div>
</form>

<!-- jQuery 2.2.3 -->
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<!-- Bootstrap 3.4.1 JS -->
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--DATATABLE-->
<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
	$(function () {
        $('.datatables-simple').DataTable();
	})
</script>

<script src="{{asset('js/ventas.js')}}"></script>
@endsection