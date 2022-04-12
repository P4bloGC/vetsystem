function agregarArticulo(id_articulo, categoria, nombre, cantidadM)
{
	var formData = new FormData();
	formData.append('id_articulo', id_articulo);
	formData.append('categoria', categoria);
	formData.append('nombre', nombre);
	formData.append('cantidadM', cantidadM);
	formData.append('cantidad', $('#cantidad'+id_articulo).val());
	formData.append('precio', $('#precio'+id_articulo).val());
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/ventas/agregar-articulo',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#detalleVenta').replaceWith(data);
			sumarArticulos();
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function actualizarDetalle(id_articulo)
{
	var cantidad = $('#cantidadD'+id_articulo).val();
	var precio = $('#precioD'+id_articulo).val();
	var total = parseFloat(cantidad) * parseFloat(precio);
	$('#totalD'+id_articulo).val(total);
	sumarArticulos();
}

function eliminarArticulo(id_articulo)
{
	$('#articulo'+id_articulo).remove();
	sumarArticulos();
}

function sumarArticulos()
{
	var sum = 0;
	
	$('[class*="total"]').each(function() {
		sum += Number($(this).val()) || 0;
	});
	
	$('#subtotal').val(sum);
	var descuento = $('#descuento').val();
	var monto_venta = parseFloat(sum) - ((descuento * sum) / 100);
	$('#monto_venta').val(monto_venta);
	var monto_pagado = $('#monto_pagado').val();
	var vuelto = parseFloat(monto_pagado) - parseFloat(monto_venta);
	if(vuelto >=0){
		$('#vuelto').val(vuelto);
		}else{
		$('#vuelto').val(0);
	}
}

function ingresarDetalleVenta()
{
	var formData = new FormData(document.getElementById('form'));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/ventas/agregar-detalle',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function buscarArticulos(id_proveedor)
{
	var formData = new FormData();
	formData.append('id_proveedor', id_proveedor);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/compras/buscar-articulos',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#articulos').replaceWith(data);
			$('.datatables-simple').DataTable();
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function ingresarDetalleCompras()
{
	var formData = new FormData(document.getElementById('form'));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/compras/agregar-detalle',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}