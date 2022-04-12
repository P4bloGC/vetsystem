
<div class="table-responsive" style="height: 300px; overflow-y: scroll;">
	<table class="table table-striped datatables-simple">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categoría</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($articulos as $val){?>
				<tr>
					<td>{{$val->nombre}}</td>
					<td>{{$val->categoria_articulo}}</td>
					<td><input type="number" title="Cantidad" class="form-control" name="cantidad{{$val->id}}" id="cantidad{{$val->id}}" value="1" min=1></td>
					<td>
						<input type="number" step="any" class="form-control" name="precio{{$val->id}}" id="precio{{$val->id}}" value=0>
					</td>
					<td>
						<input type="number" title="Total" class="form-control" name="total{{$val->id}}" id="total{{$val->id}}" value=0 readonly>						
					</td>
					<td>
						<a class="btn btn-xs btn-danger btn-delete" title="Agregar" href="javascript:agregarArticulo({{$val->id}},'{{$val->categoria_articulo}}','{{$val->nombre}}','{{$val->cantidad}}')" ><i class="fa fa-plus"></i></a>
					</td>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>


