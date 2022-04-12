function buscarMascotas(id_cliente)
{
	var formData = new FormData();
	formData.append('id_cliente', id_cliente);
		
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/citas/buscar-mascota',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#id_mascotas').replaceWith(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}
function buscarCitas(fecha)
{
	var formData = new FormData();
	formData.append('fecha', fecha);
		
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/citas/buscar',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#calendario').replaceWith(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function agendaFuncionario()
{
	var formData = new FormData();
	formData.append('id_funcionario', $('#funcionario').val());
	formData.append('fecha', $('#fecha').val());
		
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/citas/agenda-funcionario',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#agendaFuncionario').replaceWith(data);
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}

function pintarHora(hora)
{
	$('.danger').removeClass('danger');
	var id = hora.replace(':','');
	$('#' + id + '00').addClass('danger');
}

function verCita(id)
{
	var formData = new FormData();
	formData.append('id', id);
		
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/citas/ver',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			$('#modalTitle').html('Detalle de la Cita');
			$('#modalBody').html(data);
			$('#modal').modal('show');
		},
		error: function(data) {
			alert('Ha ocurrido un error');
		},
	});
	return false;
}