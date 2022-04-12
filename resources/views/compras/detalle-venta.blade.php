<tr id="articulo{{$id_articulo}}">
	<td>{{$nombre}}
		<input type="hidden" name="articulo[{{$id_articulo}}]" id="articuloD{{$id_articulo}}" value="{{$id_articulo}}">
	</td>
	<td>{{$categoria}}</td>
	<td><input type="number" title="Cantidad" class="form-control" name="cantidad[{{$id_articulo}}]" id="cantidadD{{$id_articulo}}" value="{{$cantidad}}" min=1 max={{$cantidadM}} onchange="actualizarDetalle({{$id_articulo}})"></td>
	<td><input type="number" title="Precio" class="form-control" name="precio[{{$id_articulo}}]" id="precioD{{$id_articulo}}" value="{{$precio}}" min=1 readonly></td>
	<td><input type="number" title="Total" class="form-control total" name="total[{{$id_articulo}}]" id="totalD{{$id_articulo}}" value="{{$total}}" readonly></td>
	<td><a class="btn btn-xs btn-danger btn-delete" title="Quitar" href="javascript:eliminarArticulo({{$id_articulo}})" ><i class="fa fa-trash"></i></a></td>
</tr>
<tr id="detalleVenta"></tr>