
<form id="editarClienteForm" method='post' action="{{CRUDBooster::mainpath('edit-save/'.$cliente->id)}}" onsubmit="editarCliente(<?=$cliente->id?>, '<?=CRUDBooster::mainpath('edit-save/'.$cliente->id)?>'); return false;">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class='form-group'>
	<div class="row">
		
		<div class="col-md-12">
			<label>Dni</label> <span class="text-danger" title="Este campo es requerido">*</span>
			<input type='text' name='dni' required class='form-control' value="{{$cliente->dni}}"/>
		</div>
		
		<div class="col-md-4"><br>
			<label>Nombre</label> <span class="text-danger" title="Este campo es requerido">*</span>
			<input type='text' name='nombre' required class='form-control' value="{{$cliente->nombre}}"/>
		</div>
		
		<div class="col-md-4"><br>
			<label>Apellido Paterno</label> <span class="text-danger" title="Este campo es requerido">*</span>
			<input type='text' name='apellido_paterno' required class='form-control' value="{{$cliente->apellido_paterno}}"/>
		</div>
		
		<div class="col-md-4"><br>
			<label>Apellido Materno</label> <span class="text-danger" title="Este campo es requerido">*</span>
			<input type='text' name='apellido_materno' required class='form-control' value="{{$cliente->apellido_materno}}"/>
		</div>
		
		<div class="col-md-4"><br>
			<label>Email</label> <span class="text-danger" title="Este campo es requerido">*</span>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="email" title="Email" required="" maxlength="255" class="form-control" name="email" id="email" value="{{$cliente->email}}">
			</div>
		</div>
		
		<div class="col-md-4"><br>
			<label>Teléfono Principal</label> <span class="text-danger" title="Este campo es requerido">*</span>	
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
				<input type='text' name='telefono_principal' required class='form-control' value="{{$cliente->telefono_principal}}"/>
			</div>
		</div>
		
		<div class="col-md-4"><br>
			<label>Teléfono Secundario</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
				<input type='text' name='telefono_secundario' class='form-control' value="{{$cliente->telefono_secundario}}"/>
			</div>
		</div>
		
		<div class="col-md-12"><br>
			<label>Dirección</label>
			<textarea name='direccion' class='form-control'>{{$cliente->direccion}}</textarea>
		</div>
		
		<div class="col-md-12"><br>
			<label>Observaciones</label>
			<textarea name='observaciones' class='form-control'>{{$cliente->observaciones}}</textarea>
		</div>
		
		<div class="col-md-12"><br>
			<input type="submit" name="submit" value='{{cbLang("button_save")}}' class='btn btn-success btn-block'>		
		</div>
		
	</div>
	
	
	
</div>
</form>