function activo2(id, tabla)
{
	var formData = new FormData();
	formData.append('id', id);
	formData.append('tabla', tabla);
	
	if ($('#activo').is(':checked')) 
	{
		formData.append('activo', 'Si');
		}else{
		formData.append('activo', 'No');
	}
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		}
	});
	$.ajax({
		url: '/vet/public/admin/activo/cambiar',
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