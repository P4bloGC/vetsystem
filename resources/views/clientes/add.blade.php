<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your html goes here -->
 <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
<div class='panel panel-default'>
    <div class='panel-heading'><strong><i class="fa fa-users"></i> Añadir Clientes</strong></div>
    <div class='panel-body'>
		<form method='post' action='{{CRUDBooster::mainpath('add-save')}}'>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class='form-group'>
			<div class="row">
				
				<div class="col-md-12">
					<label>Dni</label> <span class="text-danger" title="Este campo es requerido">*</span>
					<input type='text' name='dni' required class='form-control'/>
				</div>
				
				<div class="col-md-4"><br>
					<label>Nombre</label> <span class="text-danger" title="Este campo es requerido">*</span>
					<input type='text' name='nombre' required class='form-control'/>
				</div>
				
				<div class="col-md-4"><br>
					<label>Apellido Paterno</label> <span class="text-danger" title="Este campo es requerido">*</span>
					<input type='text' name='apellido_paterno' required class='form-control'/>
				</div>
				
				<div class="col-md-4"><br>
					<label>Apellido Materno</label> <span class="text-danger" title="Este campo es requerido">*</span>
					<input type='text' name='apellido_materno' required class='form-control'/>
				</div>
				
				<div class="col-md-4"><br>
					<label>Email</label> <span class="text-danger" title="Este campo es requerido">*</span>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="email" title="Email" required="" maxlength="255" class="form-control" name="email" id="email" value="">
					</div>
				</div>
				
				<div class="col-md-4"><br>
					<label>Teléfono Principal</label> <span class="text-danger" title="Este campo es requerido">*</span>	
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type='text' name='telefono_principal' required class='form-control'/>
					</div>
				</div>
				
				<div class="col-md-4"><br>
					<label>Teléfono Secundario</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type='text' name='telefono_secundario' class='form-control'/>
					</div>
				</div>
				
				<div class="col-md-12"><br>
					<label>Dirección</label>
				<textarea name='direccion' class='form-control'/></textarea>
			</div>
			
			<div class="col-md-12"><br>
				<label>Observaciones</label>
			<textarea name='observaciones' class='form-control'/></textarea>
		</div>
		
	</div>
</div>

<!-- etc .... -->


</div>

<div class="box-footer" style="background: #F5F5F5">
	<div class="form-group">
		<label class="control-label col-sm-2"></label>
		<div class="col-sm-10">
			
			<a href='{{g("return_url")}}' class='btn btn-default'><i
			class='fa fa-chevron-circle-left'></i> {{cbLang("button_back")}}</a>
			
			
			<input type="submit" name="submit" value='{{cbLang("button_save_more")}}' class='btn btn-success'>
			
			<input type="submit" name="submit" value='{{cbLang("button_save")}}' class='btn btn-success'>
			
		</div>
	</div>
</div><!-- /.box-footer-->
</div>
</form>
@endsection