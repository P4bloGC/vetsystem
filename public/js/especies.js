function razasForm(id_especies)
{	
	var formData = new FormData();
	formData.append('id_especies', id_especies);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/especies/razas',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modalTitle').html('Listado de Razas');
			$('#modalBody').html(data);
			$('#modal').modal('show');
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;   	
}

function ingresarRaza(id_especies)
{	
	var formData = new FormData(document.getElementById('razaForm'));
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/especies/razas/ingresar',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modal').modal('toggle');
			razasForm(id_especies);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;   	
}