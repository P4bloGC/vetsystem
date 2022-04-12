<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your html goes here -->
<p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
&nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>

<form id="form" method='post' action="{{CRUDBooster::mainpath('add-save')}}" onsubmit="ingresarDetalleCompras();">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="secret_id" id="secret_id" value="{{ uniqid() }}">
	
	<div class="col-md-4">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Nueva Compra</h3>
			</div>
			<div class="box-body">
				
				<div class="col-md-12">
					<label>Proveedor</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<select class="form-control" name="id_proveedores" id="id_proveedores" onchange="buscarArticulos(this.value)">
							<option>Seleccione un Proveedor..</option>
							<?php foreach($proveedores as $val){?>
								<option value='{{$val->id}}'><?=$val->razon_social?></option>
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
					<button type="submit" class="btn btn-primary btn-block"><b>Ingresar Compra</b></button>
				</div>
			</div>	
		</div>
		</div>
			
			<div class="col-md-8">
				<div class="box box-warning box">
					<div class="box-header with-border">
						<h3 class="box-title">Listado de Artículos</h3>
					</div>
					<div class="box-body" id="articulos">
						Seleccione un proveedor para desplegar los artículos..
					</div>	
				</div>
				
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Detalle Compra</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Nombre</th>
										<th>Categoría</th>
										<th>Cantidad</th>
										<th>Costo</th>
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