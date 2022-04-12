<div class="box box-widget widget-user">
	
	<div class="widget-user-header bg-aqua-active">
		<h3 class="widget-user-username">{{$mascota->nombre}}</h3>
		<h5 class="widget-user-desc">{{$mascota->especie}}</h5>
	</div>
	<div class="widget-user-image">
		<img class="img-circle" src="{{$base_url.'/'.$mascota->avatar}}" alt="User Avatar">
	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-sm-4 border-right">
				<div class="description-block">
					<h5 class="description-header">Raza</h5>
					<span class="description-text">{{$mascota->raza}}</span>
				</div>
				
			</div>
			
			<div class="col-sm-4 border-right">
				<div class="description-block">
					<h5 class="description-header">Fecha de nacimiento</h5>
					<span class="description-text">{{$mascota->fecha_nacimiento}} ({{$edad}})</span>
				</div>
				
			</div>
			
			<div class="col-sm-4">
				<div class="description-block">
					<h5 class="description-header">Sexo</h5>
					<span class="description-text">{{$mascota->sexo}}</span>
				</div>
				
			</div>
			
			<div class="col-sm-12"><br>
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#historiaClinica" onclick="historialClinico({{$id_mascotas}})" data-toggle="tab">Historia Clínica</a></li>
						<li><a href="#vacunas" onclick="planificacion({{$id_mascotas}},1,'vacunas')"  data-toggle="tab">Vacunas</a></li>
						<li><a href="#antiparasitarios" onclick="planificacion({{$id_mascotas}},2,'antiparasitarios')" data-toggle="tab">Antiparasitarios</a></li>
						<li><a href="#anticonceptivos" onclick="planificacion({{$id_mascotas}},3,'anticonceptivos')" data-toggle="tab">Anticonceptivos</a></li>
						<li><a href="#radiografias" onclick="documentos({{$id_mascotas}},1,'radiografias')" data-toggle="tab">Radiografías</a></li>
						<li><a href="#ecografias" onclick="documentos({{$id_mascotas}},2,'ecografias')" data-toggle="tab">Ecografías</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="historiaClinica"></div>
						<div class="tab-pane" id="vacunas"></div>
						<div class="tab-pane" id="antiparasitarios"></div>
						<div class="tab-pane" id="anticonceptivos"></div>
						<div class="tab-pane" id="radiografias"></div>
						<div class="tab-pane" id="ecografias"></div>
					</div>
					
				</div>
			</div>
			
		</div>
		
	</div>
</div>
