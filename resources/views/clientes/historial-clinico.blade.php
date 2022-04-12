<div class="row">
	
	<div class="col-md-2">
		<input type="button" value='Nueva Historia Clínica' class='btn btn-default' onclick="historialForm({{ $id_mascotas }})">
	</div>	
	<!--
		<div class="col-md-12"><br>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tbody>
		<tr>
		<th>Temperatura</th>
		<th>Peso</th>
		<th>Comentarios</th>
		<th>Fecha</th>
		<th>Ingresado por</th>
		<th></th>
		</tr>
		<?php foreach($historial as $val){?>
			<tr>
			<td><span class="badge bg-light-blue">{{$val->temperatura}} C</span></td>
			<td><span class="badge bg-light-blue">{{$val->peso}} KG</span></td>
			<td>{{$val->comentarios}}</td>
			<td>{{$val->fecha}}</td>
			<td>{{$val->name}}</td>
			<td><a class="btn btn-xs btn-warning btn-delete" title="Eliminar" href="javascript:eliminarHistoriaClinica({{$val->id}})" ><i class="fa fa-trash"></i></a></td
			</tr>
		<?php }?>
		</tbody>
		</table>
		</div>
		</div>
	--->
	<div class="col-md-12"><br>
		
		<div style="height: 350px; overflow-y: scroll;">
		<ul class="timeline timeline-inverse">
			<?php foreach($historial as $key => $val){?>
			<!-- timeline time label -->
			<li class="time-label">
				<span class="bg-red">
					{{$val->fecha}}
				</span>
			</li>
			<!-- /.timeline-label -->
			
			<!-- timeline item -->
			<li>
				<!-- timeline icon -->
				<i class="fa fa-file bg-blue"></i>
				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> {{$val->hora}}</span>
					
					<h3 class="timeline-header"><a href="#">Temperatura:</a> {{$val->temperatura}} C /  <a href="#">Peso:</a> {{$val->peso}} KG</h3>
					
					<div class="timeline-body">
					<?=$val->comentarios?>
					</div>
					
					<div class="timeline-footer">
						<a class="btn btn-primary btn-xs">{{$val->name}}</a>
						<a class="btn btn-success btn-xs" href="javascript:void(0)" onclick="editarHistorialForm({{$val->id}},{{$val->id_mascotas}})"
						><i class="fa fa-edit"></i></a>
						<a class="btn btn-warning btn-xs" href="javascript:void(0)" onclick="swal({
                                        title: '¿Quieres eliminar la historia clínica?',
                                        type:'info',
                                        showCancelButton:true,
                                        allowOutsideClick:true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: 'Aceptar',
                                        cancelButtonText: 'Cancelar',
                                        closeOnConfirm: true
                                        }, function(){
                                        eliminarHistoria({{$val->id}},{{$val->id_mascotas}})

                                        });"
						
						><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</li>
			<?php }?>
			
		</ul>
		</div>
		<!--
		<div class="box-group" id="accordion">
			<?php foreach($historial as $key => $val){?>
				<div class="panel box">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#{{$key}}" class="collapsed" aria-expanded="false">
								{{$val->fecha}}  /  Temp: <span class="badge bg-light-blue">{{$val->temperatura}} C</span>  /  Peso: <span class="badge bg-light-blue">{{$val->peso}} KG</span>  /  Ingresado por: {{$val->name}}
							</a>
						</h4>
					</div>
					<div id="{{$key}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="box-body">
							{{$val->comentarios}}
						</div>
					</div>
				</div>
			<?php }?>
		</div>
		-->
	</div>
</div>
