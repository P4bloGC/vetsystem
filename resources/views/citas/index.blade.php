<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
</head>
<!-- Your html goes here -->
<div class="row">
	
	<div class="col-md-3">
	<form id="form" method='post' action="{{route('agregar-cita')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="url" value="{{ $url }}">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Crear Cita</h3>
			</div>
			<div class="box-body">
				
				<div class="col-md-12">
					<label>Cliente</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<select class="form-control select2" name="id_clientes" id="id_clientes" onchange="buscarMascotas(this.value)" required>
							<option>Seleccione un Cliente..</option>
							<?php foreach($clientes as $val){?>
								<option value='{{$val->id}}'><?=$val->apellido_paterno?> <?=$val->apellido_materno?> <?=$val->nombre?></option>
							<?php }?>
						</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Paciente</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-github"></i></span>
						<select class="form-control" name="id_mascotas" id="id_mascotas" required>
							<option>Seleccione una Mascota..</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Funcionario</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<select class="form-control select2" name="funcionario" id="funcionario" onchange="agendaFuncionario()" required>
							<option>Seleccione un Funcionario..</option>
							<?php foreach($usuarios as $val){?>
								<option value='{{$val->id}}'><?=$val->name?></option>
							<?php }?>
						</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Servicio</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<select class="form-control select2" name="servicio" id="servicio" required>
							<option>Seleccione un Servicio..</option>
							<?php foreach($servicios as $val){?>
								<option value='{{$val->id}}'><?=$val->nombre?></option>
							<?php }?>
						</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Fecha</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="date" class="form-control" name="fecha" id="fecha" onchange="agendaFuncionario()" required>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Hora</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<input type="time" class="form-control" name="hora" id="hora" onchange="pintarHora(this.value)" required>
					</div>
				</div>
				
				<div class="col-md-12">
					<label>Descripción</label>
					<textarea class="form-control" name="descripcion" id="descripcion"></textarea>
				</div>
				
				<div class="col-md-12" id="agendaFuncionario"></div>
				
				<div class="col-md-12"><br>
					<button type="submit" class="btn btn-primary btn-block"><b>Ingresar Cita</b></button>
				</div>
				
			</div>
		</div>
		</form>
	</div>
	
    <div class="col-md-9" id="calendario">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h2 class="box-title"><?=$mes?> <?=$anho?></h2>
				
                <!-- /.box-tools -->
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" onclick="buscarCitas('<?=$semana_pasada?>')"> < </button>
                            <button type="button" class="btn btn-default" onclick="buscarCitas('<?=$semana_siguiente?>')"> > </button>
						</div>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						
						<table class="table table-condensed no-margin" id="tabla">
							<thead>
								<tr>
									<?php foreach($dias as $key => $val){?>
										<th><?=$val?> <?=date('d',strtotime($fechas[$key]))?></th>
									<?php }?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($horas as $key2 => $val){ $hora_fin = $horas[$key2+1]?>
									<tr>    
										<?php foreach($dias as $key => $val2){?>
											<td id="<?=$fechas[$key]?>_<?=$val?>">
												<?=$val?>00
												<?php 
													$f = $fechas[$key];
													$sql = "select *, citas.id from citas join cms_users on citas.id_cms_users=cms_users.id join clientes on citas.id_clientes=clientes.id where hora like '$val%' and (fecha='$f') order by fecha_completa asc"; 
													//echo $sql;
													$tareas = DB::select($sql);
													//$tareas = array();
												?>
												
												<div id="external-events">
													<?php foreach($tareas as $tarea){?>
													<a href="#" onclick="verCita({{$tarea->id}})">
														<span class="label label-info">
															<i class="fa fa-clock-o"></i><?=$tarea->hora?>
															<?=$tarea->nombre_completo?>
														</span>
														</a><br>
													<?php }?>
												</div>
											</div>
										</td>
									<?php }?>
								</tr>
							<?php }?>
						</tbody>
					</table>
					
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>

<script src="{{asset('js/citas.js')}}"></script>
<script>
    function calendario(fecha)
    {
		var url = 'citas?fecha=' + fecha;
		window.location.replace(url);
	}
</script>
<script type="text/javascript">
	$(function () {
		$(document).ready(function() {
			$('.select2').select2();
		});
	})
</script>

@endsection