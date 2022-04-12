<div class="col-md-12" id="agendaFuncionario">
	<p>Tareas existentes para la fecha seleccionada.</p>
	<div class="table-responsive">
		<table class="table table-condensed no-margin">
			<thead>
				<tr>
					
					<th>Hora</th>
					<th>Tarea</th>
		
				</tr>
			</thead>
			<tbody>
				<?php foreach($citas as $val){?>
					<tr id="{{str_replace(':','',$val->hora)}}">
				
						<td>{{$val->hora}}</td>
						<td>{{$val->nombre}}</td>
				
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>		