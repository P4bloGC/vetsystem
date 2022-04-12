<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
</head>

<!-- Your html goes here -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/summernote/summernote.css')}}">
<p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
&nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
<div class="row">
	
	<div class="col-md-3">
		<select class="form-control select2" name="cliente" id="cliente" onchange="verCliente(this.value)">
			<option>Seleccione un Cliente..</option>
			<?php foreach($clientes as $val){?>
				<option value='{{CRUDBooster::mainpath("detail/$val->id")}}'><?=$val->apellido_paterno?> <?=$val->apellido_materno?> <?=$val->nombre?></option>
			<?php }?>
		</select><br><br>
		
		<div class="box box-warning">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="http://localhost/vet/public/uploads/1/2022-02/avatar.png" alt="User profile picture">
				<h3 class="profile-username text-center">{{$cliente->nombre_completo}}</h3>
				<p class="text-muted text-center">Propietario</p>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>DNI</b> <a class="pull-right">{{$cliente->dni}}</a>
					</li>
					<li class="list-group-item">
						<b>Nombre</b> <a class="pull-right">{{$cliente->nombre_completo}}</a>
					</li>
					<li class="list-group-item">
						<b>Email</b> <a class="pull-right">{{$cliente->email}}</a>
					</li>
					<li class="list-group-item">
						<b>Teléfono</b> <a class="pull-right">{{$cliente->telefono_principal}}</a>
					</li>
					<li class="list-group-item">
						<b>Dirección</b> <a class="pull-right">{{$cliente->direccion}}</a>
					</li>
				</ul>
				<a href="javascript:editarForm({{$cliente->id}})" class="btn btn-primary btn-block"><b>Editar</b> <i class="fa fa-pencil"></i></a>
			</div>
			
		</div>
		
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Mascotas</h3>
				<div class="box-tools pull-right">
					<span class="label label-danger">8 New Members</span>
				</div>
			</div>
			
			<div class="box-body no-padding">
				<ul class="users-list clearfix">
					<?php foreach($mascotas as $val){?>
						<li>
							<img src="{{$base_url.'/'.$val->avatar}}" alt="User Image">
							<a class="users-list-name" href="javascript:detalleMascota({{$val->id}})">{{$val->nombre}}</a>
							<span class="users-list-date">{{$val->especie}} ({{$val->raza}})</span>
						</li>
					<?php }?>	
				</ul>
			</div>
			<div class="box-footer text-center">
				<a href="javascript:void(0)" class="uppercase">Ver todas</a>
			</div>	
		</div>		
		
	</div>
	
	<div class="col-md-9"><br><br><br>			
		<div id="detalleMascota">
			Seleccione una mascota para ver su ficha..
		</div>
	</div>
	
</div>

<script src="{{asset('js/clientes.js')}}"></script>

<script type="text/javascript" src="{{asset('vendor/crudbooster/assets/summernote/summernote.min.js')}}"></script>

<script type="text/javascript">
	$(function () {
		$(document).ready(function() {
			$('.select2').select2();
		});
	})
</script>
@endsection			