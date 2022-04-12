<select class="form-control" name="id_mascotas" id="id_mascotas" required>
	<?php foreach($mascotas as $val){?>
		<option value='{{$val->id}}'><?=$val->nombre?> (<?=$val->especie?>)</option>
	<?php }?>
</select>