<div class="row">
	<form id="<?=$id_categoria?>Form" method="post" onsubmit="agregarPlanificacion({{ $id_mascotas }},{{ $id_categoria }},'{{ $descripcion }}'); return false;">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id_mascotas" value="{{ $id_mascotas }}">
		<div class="col-md-3">
			<label for="dosis">Dosis</label>
			<select class="form-control" name="dosis" id="dosis">
				<option>Seleccione una Dosis..</option>
				<?php foreach($articulos as $val){?>
					<option value="<?=$val->id?>"><?=$val->nombre?></option>
				<?php }?>
			</select>
		</div>
		<div class="col-md-2">
			<label for="fecha">F. Colocada</label>
			<input type="date" class="form-control" id="fecha" name="fecha">		
		</div>
		<div class="col-md-3">
			<label for="dosis_p">Próxima Dosis</label>
			<select class="form-control" name="dosis_p" id="dosis_p">
				<option>Seleccione una Dosis..</option>
				<?php foreach($articulos as $val){?>
					<option value="<?=$val->id?>"><?=$val->nombre?></option>
				<?php }?>
			</select>
		</div>
		<div class="col-md-2">
			<label for="fecha_p">Próxima Fec.</label>
			<input type="date" class="form-control" id="fecha_p" name="fecha_p">		
		</div>
		<div class="col-md-2"><br>
			<input type="submit" value='Agregar' class='btn btn-default'>
		</div>
	</form>
	
	<div class="col-md-12"><br>
		<div class="table-responsive">
			<table class="table no-margin">
				<thead>
					<tr>
						<th>Dosis</th>
						<th>Fecha Dosis</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($vacunas as $val){?>
						<tr class="{{$val->class}}">
							<td>{{$val->nombre}}</td>
							<td>{{$val->fecha}}</td>
							<td>
								<?php if($val->id_estado_vacunas == 1){?>
								<select class="form-control" name="estado" id="estado" onchange="estadoPlanificacion(this.value,{{ $id_categoria }},{{ $id_mascotas }},'{{ $descripcion }}',{{ $val->id }})">
										<?php foreach($estados as $val2){?>
											<option value="<?=$val2->id?>" <?php if($val->id_estado_vacunas == $val2->id){echo "selected";}?>><?=$val2->estado_vacuna?></option>
										<?php }?>
									</select>
									<?php }else{?>
									{{$val->estado_vacuna}}
								<?php }?>
							</td>
							<td><a class="btn btn-xs btn-warning btn-delete" title="Eliminar" href="javascript:eliminarPlanificacion({{$val->id}}, {{ $id_mascotas }}, {{ $id_categoria }},'{{ $descripcion }}')" ><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php }?>
				</tbody>
				</table>
			</div>
			</div>
			</div>
																