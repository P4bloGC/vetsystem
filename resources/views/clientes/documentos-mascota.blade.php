<div class="row">
	<div class="col-md-2">
		<input type="button" value='Nuevo Documento' class='btn btn-default' onclick="documentoForm({{ $id_mascotas }}, {{ $id_tipo_documento }},'{{ $descripcion }}')">
	</div>	
	
	<div class="col-md-12"><br>
		<div class="table-responsive">
			<table class="table no-margin">
				
					<thead>
					<tr>
						<th>Documento</th>
						<th>Comentarios</th>
						<th>Fecha</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($documentos as $val){?>
						<tr>
							<td>
								<a data-lightbox="roadtrip" title="Documento" href="{{$base_url.'/'.$val->archivo}}"><img width="40px" height="40px" src="{{$base_url.'/'.$val->archivo}}"></a>
							</td>
							<td>{{$val->comentarios}}</td>
							<td>{{$val->fecha}}</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
