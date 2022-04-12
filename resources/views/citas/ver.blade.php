<form id="editarCitaForm" method='post' >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class='form-group'>
		<div class="row">
			
			<div class="col-md-6">
				<label>Cliente</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-users"></i></span>
					<input type='text' name='dni' required class='form-control' value="{{$cita->nombre_completo}}" readonly/>
				</div>
			</div>
			
			<div class="col-md-6">
				<label>Paciente</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-github"></i></span>
					<input type='text' name='dni' required class='form-control' value="{{$cita->mascota}}" readonly//>
				</div>
			</div>
			
			<div class="col-md-6">
				<label>Funcionario</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-users"></i></span>
					<input type='text' name='dni' required class='form-control' value="{{$cita->name}}" readonly//>
				</div>
			</div>
			
			<div class="col-md-6">
				<label>Servicio</label> 
				<input type='text' name='nombre' required class='form-control' value="{{$cita->nombre}}" readonly//>
			</div>
			
			<div class="col-md-12">
				<label>Descripción</label>
				<textarea name='observaciones' class='form-control' readonly>{{$cita->descripcion}}</textarea>
			</div>
			
			<div class="col-md-6">
				<label>Fecha</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type='text' name='nombre' required class='form-control' value="{{$cita->fecha}}" readonly//>
				</div>
			</div>
			
			<div class="col-md-6">
				<label>Hora</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
					<input type='text' name='nombre' required class='form-control' value="{{$cita->hora}}" readonly//>
				</div>
			</div>
			
			
			<div class="col-md-12"><br>
				<a class="btn btn-danger btn-block" href="javascript:void(0)" onclick="swal({
				title: '¿Quieres eliminar la cita?',
				type:'info',
				showCancelButton:true,
				allowOutsideClick:true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Aceptar',
				cancelButtonText: 'Cancelar',
				closeOnConfirm: false
				}, function(){
				location.href = '{{$url}}/eliminar/{{$id}}';
				
				});"
				
				><b><i class="fa fa-ban"></i> Eliminar Cita</b></a>
			</div>
		</div>
		
		
		
	</div>
</form>