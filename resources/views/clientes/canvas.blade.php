<input type="hidden" name="fondo" id="fondo" value="{{ $imagen }}">
<div id="canvasDiv" class="embed-responsive embed-responsive-16by9" style="position: relative; border:1px solid black;"></div>
<div id="canvasDiv2" class="embed-responsive embed-responsive-16by9 hide" style="position: relative; border:1px solid black;"></div>


<script>
    $(document).ready(function(){
		var canvasDiv = document.getElementById('canvasDiv');
        canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
		canvas.style.background = "url('{{$imagen}}')";
        canvasDiv.appendChild(canvas);
        if(typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
		}
		
        context = canvas.getContext("2d");		
		
		var img = new Image();
		img.src = "{{$imagen}}";
		
		img.onload = function(){
			canvas.width = img.width;
			canvas.height = img.height;
		}
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
	})
	
</script>	