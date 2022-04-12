function eliminarHistoria(id, id_mascotas)
{
	var formData = new FormData();
	formData.append('id', id);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/eliminar-historia',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			historialClinico(id_mascotas);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function estadoPlanificacion(id_estado, id_categoria, id_mascota, descripcion, id_planificacion)
{
	var formData = new FormData();
	formData.append('id_estado', id_estado);
	formData.append('id_planificacion', id_planificacion);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/planificacion/estado',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			planificacion(id_mascota,id_categoria,descripcion);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function planificacion(id_mascotas,id_categoria,descripcion)
{
	var formData = new FormData();
	formData.append('id_mascotas', id_mascotas);
	formData.append('id_categoria', id_categoria);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/planificacion',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#' + descripcion).html(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function detalleMascota(id_mascotas)
{
	var formData = new FormData();
	formData.append('id_mascotas', id_mascotas);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#detalleMascota').html(data);
			historialClinico(id_mascotas);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function historialClinico(id_mascotas)
{
	var formData = new FormData();
	formData.append('id_mascotas', id_mascotas);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/historial',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#historiaClinica').html(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function agregarHistorialClinico(id_mascotas)
{
	var formData = new FormData(document.getElementById('historialForm'));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/historial/agregar',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modal').modal('toggle');	
			historialClinico(id_mascotas);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function editarHistorialClinico(id_mascotas)
{
	var formData = new FormData(document.getElementById('historialForm'));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/historial/editar',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modal').modal('toggle');	
			historialClinico(id_mascotas);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function editarForm(id_cliente)
{
	var formData = new FormData();
	formData.append('id_cliente', id_cliente);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/editar-form',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modalTitle').html('Editar Cliente');
			$('#modalBody').html(data);
			$('#modal').modal('show');
			
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function editarCliente(id_cliente, url)
{
	var formData = new FormData(document.getElementById('editarClienteForm'));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: url,
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			location.reload();		
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function agregarPlanificacion(id_mascotas, id_categoria, descripcion)
{
	var formData = new FormData(document.getElementById(id_categoria + 'Form'));
	formData.append('id_categoria', id_categoria);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/planificacion/agregar',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			if(data == 'No'){
				planificacion(id_mascotas,id_categoria,descripcion);
				}else{
				alert("No se ingreso ninguna vacuna.");
			}
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function eliminarPlanificacion(id, id_mascotas, id_categoria, descripcion)
{
	var formData = new FormData();
	formData.append('id', id);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/planificacion/eliminar',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			planificacion(id_mascotas,id_categoria,descripcion);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function verCliente(url)
{
	window.location.replace(url);
}

function documentos(id_mascotas,id_tipo_documento,descripcion)
{
	var formData = new FormData();
	formData.append('id_mascotas', id_mascotas);
	formData.append('id_tipo_documento', id_tipo_documento);
	formData.append('descripcion', descripcion);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/documentos',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#' + descripcion).html(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function agregarDocumento(id_mascotas, id_tipo_documento, descripcion)
{	
	unirImagenes();
	
	setTimeout(()=>{
		
		var url = document.getElementById("canvas2").toDataURL();
		
		var formData = new FormData(document.getElementById('documentosForm'+id_tipo_documento));
		formData.append('url', url);
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			}
		});
		$.ajax({
			url: '/vet/public/admin/agregar-documento',
			type: 'POST',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data) {
				$('#modal').modal('toggle');
				documentos(id_mascotas,id_tipo_documento,descripcion);
			},
			error: function(data) {
				alert('Ha ocurrido un error');
			},
		});
		return false;
        
	},1000);
}

function unirImagenes()
{
	var canvasDiv = document.getElementById('canvasDiv2');
	canvas = document.createElement('canvas');
	canvas.setAttribute('id', 'canvas2');
	
	var canvas1 = document.getElementById('canvas');
	canvas.width = canvas1.width;
	canvas.height = canvas1.height;
	
	canvasDiv.appendChild(canvas);
	if(typeof G_vmlCanvasManager != 'undefined') {
		canvas = G_vmlCanvasManager.initElement(canvas);
	}
	var context = canvas.getContext('2d');
	
	var imageObj1 = new Image();
	imageObj1.src = $('#fondo').val();
	imageObj1.onload = function() {
		context.drawImage(imageObj1, 0, 0);
	};
	
	var imageObj2 = new Image();
	imageObj2.src = document.getElementById("canvas").toDataURL();
	imageObj2.onload = function() {
		context.drawImage(imageObj2, 0, 0);
	};
	
	return canvas.toDataURL();
}

function historialForm(id_mascotas)
{	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/historial-form/' + id_mascotas,
		type: 'GET',
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modalTitle').html('Nuevo Historial Clínico');
			$('#modalBody').html(data);
			$('#modal').modal('show');
			$('#comentarios-historial').summernote();
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function editarHistorialForm(id,id_mascotas)
{	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/editar-historial-form/' + id_mascotas + '/' + id,
		type: 'GET',
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modalTitle').html('Editar Historial Clínico');
			$('#modalBody').html(data);
			$('#modal').modal('show');
			$('#comentarios-historial').summernote();
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function documentoForm(id_mascotas,id_tipo_documento,descripcion)
{	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/clientes/mascota/documento-form/' + id_mascotas + '/' + id_tipo_documento + '/' + descripcion,
		type: 'GET',
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			//$('.modal-dialog').addClass('modal-lg');
			$('#modalTitle').html('Agregar Documento');
			$('#modalBody').html(data);
			$('#modal').modal('show');
			$('#comentarios-historial').summernote();
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function subirImagen(id_tipo_documento)
{
	var formData = new FormData(document.getElementById('documentosForm'+id_tipo_documento));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/subir-imagen',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#canvasDiv').replaceWith(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function prueba()
{
	const EL = (sel) => document.querySelector(sel);
	const ctx = EL("#canvas").getContext("2d");
	
	function readImage() {
		if (!this.files || !this.files[0]) return;
		
		const FR = new FileReader();
		FR.addEventListener("load", (evt) => {
			const img = new Image();
			img.addEventListener("load", () => {
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				ctx.drawImage(img, 0, 0);
			});
			img.src = evt.target.result;
		});
		FR.readAsDataURL(this.files[0]);
	}
	
	EL("#archivo").addEventListener("change", readImage);
}