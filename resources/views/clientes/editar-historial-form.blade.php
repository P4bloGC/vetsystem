<div class="row">
	<form id="historialForm" method="post" action="{{route('editarHistorialClinico')}}" onsubmit="editarHistorialClinico({{ $id_mascotas }}); return false;">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id_mascotas" value="{{ $id_mascotas }}">
		<input type="hidden" name="id" value="{{ $id }}">
		<div class="col-md-6">
			<label for="temperatura">Temperatura</label>
			<div class="input-group">
				<input type="number" class="form-control" id="temperatura" name="temperatura" step="any" value="{{$historial->temperatura}}" required>
				<span class="input-group-addon">C</span>
			</div>
		</div>
		<div class="col-md-6">
			<label for="peso">Peso</label>
			<div class="input-group">
				<input type="number" class="form-control" id="peso" name="peso" step="any" value="{{$historial->peso}}" required>
				<span class="input-group-addon">KG</span>
			</div>
		</div>
		<div class="col-md-12">
			<label for="comentarios">Comentarios</label>
			<textarea class="form-control" id="comentarios-historial" name="comentarios">{{$historial->comentarios}}</textarea>
		</div>
		<div class="col-md-12"><br>
			<input type="submit" value='Editar' class='btn btn-success btn-block'>
		</div>
	</form>
</div>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/summernote/summernote.css')}}">
<script type="text/javascript" src="{{asset('vendor/crudbooster/assets/summernote/summernote.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#comentarios-historial').summernote({
                height: ($(window).height() - 300),
                callbacks: {
                    onImageUpload: function (image) {
                        uploadImage{{$name}}(image[0]);
                    }
                }
            });

            function uploadImage{{$name}}(image) {
                var data = new FormData();
                data.append("userfile", image);
                $.ajax({
                    url: '{{CRUDBooster::mainpath("upload-summernote")}}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function (url) {
                        var image = $('<img>').attr('src', url);
                        $('#textarea_{{$name}}').summernote("insertNode", image[0]);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        })
    </script>