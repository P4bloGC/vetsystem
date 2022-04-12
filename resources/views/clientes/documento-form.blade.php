<div class="row">
	<form id="documentosForm{{ $id_tipo_documento }}" method="post" enctype="multipart/form-data" onsubmit="agregarDocumento({{ $id_mascotas }},{{ $id_tipo_documento }},'{{ $descripcion }}'); return false;">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id_mascotas" value="{{ $id_mascotas }}">
		<input type="hidden" name="id_tipo_documento" value="{{ $id_tipo_documento }}">
		<input type="hidden" name="fondo" id="fondo" value="{{ $imagen }}">
		<div class="col-md-12">
			<label for="archivo">Documento</label>
			<!--
				<input type="file" class="form-control" id="archivo" name="archivo" accept="image/*" onchange="subirImagen({{ $id_tipo_documento }});" capture required><br>
			-->
			<input type="file" class="form-control" id="archivo" name="archivo" accept="image/*" capture required><br>
			<div id="canvasDiv" class="embed-responsive embed-responsive-16by9 hide" style="position: relative; border:1px solid black; overflow-y: scroll; overflow-x: scroll;">
				<canvas id="canvas"></canvas>
			</div>
			<div id="canvasDiv2" class="embed-responsive embed-responsive-16by9 hide" style="position: relative; border:1px solid black;"></div>
		</div>
		<div class="col-md-12">
			<label for="comentarios">Comentarios</label>
			<textarea class="form-control" id="comentarios-historial" name="comentarios" rows="10"></textarea>
		</div>
		<div class="col-md-12"><br>
			<input type="submit" value='Agregar' class='btn btn-success btn-block'>
		</div>
	</form>
</div>

<script>
	let imgInput = document.getElementById('archivo');
	imgInput.addEventListener('change', function(e) {
		if(e.target.files) {
			let imageFile = e.target.files[0]; //here we get the image file
			var reader = new FileReader();
			reader.readAsDataURL(imageFile);
			reader.onloadend = function (e) {
				var myImage = new Image(); // Creates image object
				myImage.src = e.target.result; // Assigns converted image to image object
				myImage.onload = function(ev) {
					$('#canvasDiv').removeClass('hide');
					var myCanvas = document.getElementById("canvas"); // Creates a canvas object
					myCanvas.width = myImage.width; // Assigns image's width to canvas
					myCanvas.height = myImage.height; // Assigns image's height to canvas
					canvas.style.background = "url('"+myImage.src+"')";
					var context = myCanvas.getContext("2d"); // Creates a contect object
					$('#fondo').val(myImage.src);
					
					$('#canvas').mousedown(function(e){
						var offset = $(this).offset()
						var mouseX = e.pageX - this.offsetLeft;
						var mouseY = e.pageY - this.offsetTop;
						
						paint = true;
						addClick(e.pageX - offset.left, e.pageY - offset.top);
						redraw();
					});
					
					$('#canvas').mousemove(function(e){
						if(paint){
							var offset = $(this).offset()
							addClick(e.pageX - offset.left, e.pageY - offset.top,true);
							//console.log(e.pageX,offset.left, e.pageY,offset.top);
							redraw();
						}
					});
					
					$('#canvas').mouseup(function(e){
						paint = false;
					});
					
					$('#canvas').mouseleave(function(e){
						paint = false;
					});
					
					var clickX = new Array();
					var clickY = new Array();
					var clickDrag = new Array();
					var paint;
					
					function addClick(x, y, dragging)
					{
						clickX.push(x);
						clickY.push(y);
						clickDrag.push(dragging);
					}
					
					function redraw(){
						context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
						
						context.strokeStyle = "#df4b26";
						context.lineJoin = "round";
						context.lineWidth = 5;
						
						for(var i=0; i < clickX.length; i++) {
							context.beginPath();
							if(clickDrag[i] && i){
								context.moveTo(clickX[i-1], clickY[i-1]);
								}else{
								context.moveTo(clickX[i]-1, clickY[i]);
							}
							context.lineTo(clickX[i], clickY[i]);
							context.closePath();
							context.stroke();
						}
						
					}	
				}
			}
		}		
	});
</script>





