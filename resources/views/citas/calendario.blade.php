<div class="col-md-9" id="calendario">
	<div class="box box-warning">
		<div class="box-header with-border">
			<h2 class="box-title"><?=$mes?> <?=$anho?></h2>
			
			<!-- /.box-tools -->
			<div class="pull-right">
				<div class="btn-group">
					<button type="button" class="btn btn-default" onclick="buscarCitas('<?=$semana_pasada?>')"> < </button>
						<button type="button" class="btn btn-default" onclick="buscarCitas('<?=$semana_siguiente?>')"> > </button>
					</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					
					<table class="table table-condensed no-margin" id="tabla">
						<thead>
							<tr>
								<?php foreach($dias as $key => $val){?>
									<th><?=$val?> <?=date('d',strtotime($fechas[$key]))?></th>
								<?php }?>
							</tr>
						</thead>
						<tbody>
							<?php foreach($horas as $key2 => $val){ $hora_fin = $horas[$key2+1]?>
								<tr>    
									<?php foreach($dias as $key => $val2){?>
											<td id="<?=$fechas[$key]?>_<?=$val?>">
												<?=$val?>00
												<?php 
													$f = $fechas[$key];
													$sql = "select * from citas join cms_users on citas.id_cms_users=cms_users.id join clientes on citas.id_clientes=clientes.id where hora like '$val%' and (fecha='$f') order by fecha_completa asc"; 
													//echo $sql;
													$tareas = DB::select($sql);
													//$tareas = array();
												?>
												
												<div id="external-events">
													<?php foreach($tareas as $tarea){?>
													<a href="#" onclick="verCita({{$tarea->id}})">
														<span class="label label-info">
															<i class="fa fa-clock-o"></i><?=$tarea->hora?>
															<?=$tarea->nombre_completo?>
														</span>
														</a><br>
													<?php }?>
												</div>
											</div>
										</td>
									<?php }?>
							</tr>
						<?php }?>
					</tbody>
				</table>
				
			</div>
			<!-- /.box-body -->
		</div>		