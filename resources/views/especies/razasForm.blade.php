<form id="razaForm" onsubmit="ingresarRaza(<?=$id_especies?>); return false;">
	<input type="hidden" class="form-control" name="id_especies" value="<?=$id_especies?>" required>
	<div class="row">
		<div class="col-md-9">
			<input type="text" class="form-control" placeholder="Ingrese una Raza" name="raza" required>
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-success">Agregar</button>
		</div>
		<div class="col-md-12"><br>
			<div class="table-responsive">
				<table class="table table-hover">
					<tbody>
						<tr>
							<th>Raza ID</th>
							<th>Raza</th>
							<th>Especie</th>
							<th></th>
						</tr>
						<?php foreach($razas as $val){?>
							<tr>
								<td><?=$val->id?></td>
								<td><?=$val->raza?></td>
								<td><?=$val->especie?></td>
								<td></td>
							</tr>
						<?php }?>				
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</form>
