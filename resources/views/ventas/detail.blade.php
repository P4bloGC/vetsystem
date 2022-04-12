<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your html goes here -->
<p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
&nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
<div class="row">
	<div class="col-md-12" id="ventaDiv">
		<section class="invoice">
			
			<div class="row">
				<div class="col-xs-12">
					<h2 class="page-header">
						<i class="fa fa-globe"></i> Detalle Venta #{{$id}}
						<small class="pull-right">Fecha: {{$venta[0]->fecha}}</small>
					</h2>
				</div>
				
			</div>
			
			<div class="row invoice-info">
				
				<div class="col-sm-4 invoice-col">
					<b>Cliente:</b> {{$venta[0]->nombre_completo}}<br>
					<b>Dirección:</b> {{$venta[0]->direccion}}<br>
					<b>Medio de Pago:</b> {{$venta[0]->medio_pago}}<br>
					<b>Documento:</b> {{$venta[0]->tipo_documento_tributario}}<br>
					<b>Nro. Documento:</b> {{$venta[0]->nro_documento}}
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col-xs-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Artículo</th>
								<th>Categoría</th>
								<th>Cantidad</th>
								<th>Precio Unitario</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($venta as $val){?>
								<tr>
									<td>{{$val->nombre}}</td>
									<td>{{$val->categoria_articulo}}</td>
									<td>{{$val->cantidad}}</td>
									<td>${{$val->precio}}</td>
									<td>${{$val->total}}</td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				
			</div>
			
			<div class="row">
				
				<div class="col-xs-6">
					<p class="lead">Comentarios:</p>
					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
						{{$venta[0]->comentarios}}
					</p>
				</div>
				
				<div class="col-xs-6">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<th style="width:50%">Subtotal:</th>
									<td>${{$venta[0]->subtotal}}</td>
								</tr>
								<tr>
									<th>Descuento ({{$venta[0]->descuento}}%)</th>
									<td>${{$venta[0]->subtotal - $venta[0]->monto_venta}}</td>
								</tr>
								<tr>
									<th>Total:</th>
									<td>${{$venta[0]->monto_venta}}</td>
								</tr>
								<tr>
									<th>Total Pagado:</th>
									<td>${{$venta[0]->monto_pagado}}</td>
								</tr>
								<tr>
									<th>Vuelto:</th>
									<td>${{$venta[0]->vuelto}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
			
			<div class="row no-print">
				<div class="col-xs-12">
					<a href="javascript:imprSelec('ventaDiv')" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
					<!--
					<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
					</button>
					<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
						<i class="fa fa-download"></i> Generate PDF
					</button>
					-->
				</div>
			</div>
		</section>
	</div>
	
	<script language="Javascript">
		function imprSelec(nombre) {
			var contenido= document.getElementById(nombre).innerHTML;
			var contenidoOriginal= document.body.innerHTML;
			
			document.body.innerHTML = contenido;
			
			window.print();
			
			//document.body.innerHTML = contenidoOriginal;
			 window.setInterval('location.reload()', 1000); 
	
		}
	</script>
	
@endsection			