<div class="row">
	<form id="vacunaForm" method="post" action="{{route('agregarVacuna')}}" onsubmit="agregarVacuna({{ $id_mascotas }}); return false;">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id_mascotas" value="{{ $id_mascotas }}">
		<div class="col-md-3">
			<label for="dosis">Dosis</label>
			<select class="form-control" name="dosis" id="dosis">
			<option>Seleccione una Vacuna..</option>
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
			<option>Seleccione una Vacuna..</option>
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
			<input type="submit" value='Agregar' class='btn btn-success'>
		</div>
	</form>
	
	<div class="col-md-12"><br>
		<div class="table-responsive">
			<table class="table"> 
				<tbody>
					<!--
						<tr>
						<th cospan=4><input type="button" value='Nuevo' class='btn btn-success'></th>
						</tr>
					-->
					<tr>
						<th>Dosis</th>
						<th>Fecha Vacunación</th>
						<th>Estado</th>
					</tr>
					<?php foreach($vacunas as $val){?>
						<tr class="{{$val->class}}">
							<td>{{$val->nombre}}</td>
							<td>{{$val->fecha}}</td>
							<td>{{$val->estado_vacuna}}</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
