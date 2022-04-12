<?php namespace App\Http\Controllers;
	
	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
	use App\Http\Controllers\MainController;
	
	class AdminVentasController extends \crocodicstudio\crudbooster\controllers\CBController {
		
	    public function cbInit() {
			
			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = false;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "ventas";
			# END CONFIGURATION DO NOT REMOVE THIS LINE
			
			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Cliente","name"=>"id_clientes","join"=>"clientes,nombre_completo"];
			$this->col[] = ["label"=>"Fecha","name"=>"fecha"];
			$this->col[] = ["label"=>"Medio de Pago","name"=>"id_medio_pagos","join"=>"medio_pagos,medio_pago"];
			$this->col[] = ["label"=>"Documento","name"=>"id_tipo_documento_tributario","join"=>"tipo_documento_tributario,tipo_documento_tributario"];
			$this->col[] = ["label"=>"Monto Venta","name"=>"monto_venta"];
			$this->col[] = ["label"=>"Monto Pagado","name"=>"monto_pagado"];
			$this->col[] = ["label"=>"Vuelto","name"=>"vuelto"];
			$this->col[] = ["label"=>"Anulado","name"=>"anulado","visible" => false]; 
			$this->col[] = ["label"=>"SecretId","name"=>"secret_id","visible" => false]; 
		
			# END COLUMNS DO NOT REMOVE THIS LINE
			
			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Cliente','name'=>'id_clientes','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'clientes,nombre_completo'];
			$this->form[] = ['label'=>'Medio Pagos','name'=>'id_medio_pagos','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'medio_pagos,medio_pago'];
			$this->form[] = ['label'=>'Documento Tributario','name'=>'id_tipo_documento_tributario','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tipo_documento_tributario,tipo_documento_tributario'];
			$this->form[] = ['label'=>'Monto Venta','name'=>'monto_venta','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Monto Pagado','name'=>'monto_pagado','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Vuelto','name'=>'vuelto','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Descuento','name'=>'descuento','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Subtotal','name'=>'subtotal','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'SecretId','name'=>'secret_id','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nro. Documento','name'=>'nro_documento','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Comentarios','name'=>'comentarios','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha','name'=>'fecha','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE
			
			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Clientes","name"=>"id_clientes","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"clientes,id"];
			//$this->form[] = ["label"=>"Medio Pagos","name"=>"id_medio_pagos","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"medio_pagos,id"];
			//$this->form[] = ["label"=>"Tipo Documento Tributario","name"=>"id_tipo_documento_tributario","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"tipo_documento_tributario,id"];
			//$this->form[] = ["label"=>"Monto Venta","name"=>"monto_venta","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Monto Pagado","name"=>"monto_pagado","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Vuelto","name"=>"vuelto","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			# OLD END FORM
			
			/* 
				| ---------------------------------------------------------------------- 
				| Sub Module
				| ----------------------------------------------------------------------     
				| @label          = Label of action 
				| @path           = Path of sub module
				| @foreign_key 	  = foreign key of sub table/module
				| @button_color   = Bootstrap Class (primary,success,warning,danger)
				| @button_icon    = Font Awesome Class  
				| @parent_columns = Sparate with comma, e.g : name,created_at
				| 
			*/
	        $this->sub_module = array();
			
			
	        /* 
				| ---------------------------------------------------------------------- 
				| Add More Action Button / Menu
				| ----------------------------------------------------------------------     
				| @label       = Label of action 
				| @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
				| @icon        = Font awesome class icon. e.g : fa fa-bars
				| @color 	   = Default is primary. (primary, warning, succecss, info)     
				| @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
				| 
			*/
	        $this->addaction = array();
			$this->addaction[] = ['label'=>'Anular','url'=>CRUDBooster::mainpath('anular/[secret_id]'),'icon'=>'fa fa-ban','color'=>'danger', 'showIf'=>"[anulado] == 'No'", 'confirmation' => true]; 
			
			
	        /* 
				| ---------------------------------------------------------------------- 
				| Add More Button Selected
				| ----------------------------------------------------------------------     
				| @label       = Label of action 
				| @icon 	   = Icon from fontawesome
				| @name 	   = Name of button 
				| Then about the action, you should code at actionButtonSelected method 
				| 
			*/
	        $this->button_selected = array();
			
			
	        /* 
				| ---------------------------------------------------------------------- 
				| Add alert message to this module at overheader
				| ----------------------------------------------------------------------     
				| @message = Text of message 
				| @type    = warning,success,danger,info        
				| 
			*/
	        $this->alert        = array();
			
			
	        
	        /* 
				| ---------------------------------------------------------------------- 
				| Add more button to header button 
				| ----------------------------------------------------------------------     
				| @label = Name of button 
				| @url   = URL Target
				| @icon  = Icon from Awesome.
				| 
			*/
	        $this->index_button = array();
			
			
			
	        /* 
				| ---------------------------------------------------------------------- 
				| Customize Table Row Color
				| ----------------------------------------------------------------------     
				| @condition = If condition. You may use field alias. E.g : [id] == 1
				| @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
				| 
			*/
	        $this->table_row_color = array();     	          
			$this->table_row_color[] = ['condition'=>"[anulado] == 'Si'","color"=>"danger"];
	        
	        /*
				| ---------------------------------------------------------------------- 
				| You may use this bellow array to add statistic at dashboard 
				| ---------------------------------------------------------------------- 
				| @label, @count, @icon, @color 
				|
			*/
	        $this->index_statistic = array();
			
			
			
	        /*
				| ---------------------------------------------------------------------- 
				| Add javascript at body 
				| ---------------------------------------------------------------------- 
				| javascript code in the variable 
				| $this->script_js = "function() { ... }";
				|
			*/
	        $this->script_js = NULL;
			
			
            /*
				| ---------------------------------------------------------------------- 
				| Include HTML Code before index table 
				| ---------------------------------------------------------------------- 
				| html code to display it before index table
				| $this->pre_index_html = "<p>test</p>";
				|
			*/
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
				| ---------------------------------------------------------------------- 
				| Include HTML Code after index table 
				| ---------------------------------------------------------------------- 
				| html code to display it after index table
				| $this->post_index_html = "<p>test</p>";
				|
			*/
	        $this->post_index_html = null;
	        
	        
	        
	        /*
				| ---------------------------------------------------------------------- 
				| Include Javascript File 
				| ---------------------------------------------------------------------- 
				| URL of your javascript each array 
				| $this->load_js[] = asset("myfile.js");
				|
			*/
	        $this->load_js = array();
	        
	        
	        
	        /*
				| ---------------------------------------------------------------------- 
				| Add css style at body 
				| ---------------------------------------------------------------------- 
				| css code in the variable 
				| $this->style_css = ".style{....}";
				|
			*/
	        $this->style_css = NULL;
	        
	        
	        
	        /*
				| ---------------------------------------------------------------------- 
				| Include css File 
				| ---------------------------------------------------------------------- 
				| URL of your css each array 
				| $this->load_css[] = asset("myfile.css");
				|
			*/
	        $this->load_css = array();
	        
	        
		}
		
		
	    /*
			| ---------------------------------------------------------------------- 
			| Hook for button selected
			| ---------------------------------------------------------------------- 
			| @id_selected = the id selected
			| @button_name = the name of button
			|
		*/
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
			
		}
		
		
	    /*
			| ---------------------------------------------------------------------- 
			| Hook for manipulate query of index result 
			| ---------------------------------------------------------------------- 
			| @query = current sql query 
			|
		*/
	    public function hook_query_index(&$query) {
	        //Your code here
			
		}
		
	    /*
			| ---------------------------------------------------------------------- 
			| Hook for manipulate row of index table html 
			| ---------------------------------------------------------------------- 
			|
		*/    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
		}
		
	    /*
			| ---------------------------------------------------------------------- 
			| Hook for manipulate data input before add data is execute
			| ---------------------------------------------------------------------- 
			| @arr
			|
		*/
	    public function hook_before_add(&$postdata) {        
	        //Your code here
			$postdata['fecha'] = date('Y-m-d h:i:s');
			
		}
		
	    /* 
			| ---------------------------------------------------------------------- 
			| Hook for execute command after add public static function called 
			| ---------------------------------------------------------------------- 
			| @id = last insert id
			| 
		*/
	    public function hook_after_add($id) {        
	        //Your code here
			
		}
		
	    /* 
			| ---------------------------------------------------------------------- 
			| Hook for manipulate data input before update data is execute
			| ---------------------------------------------------------------------- 
			| @postdata = input post data 
			| @id       = current id 
			| 
		*/
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here
			
		}
		
	    /* 
			| ---------------------------------------------------------------------- 
			| Hook for execute command after edit public static function called
			| ----------------------------------------------------------------------     
			| @id       = current id 
			| 
		*/
	    public function hook_after_edit($id) {
	        //Your code here 
			
		}
		
	    /* 
			| ---------------------------------------------------------------------- 
			| Hook for execute command before delete public static function called
			| ----------------------------------------------------------------------     
			| @id       = current id 
			| 
		*/
	    public function hook_before_delete($id) {
	        //Your code here
			
		}
		
	    /* 
			| ---------------------------------------------------------------------- 
			| Hook for execute command after delete public static function called
			| ----------------------------------------------------------------------     
			| @id       = current id 
			| 
		*/
	    public function hook_after_delete($id) {
	        //Your code here
			
		}
		
		
		
	    //By the way, you can still create your own method in here... :) 
		public function getAdd() 
		{
			//Create an Auth
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			
			$data = [];
			$data['page_title'] = 'Añadir Venta';
			
			$data['clientes'] = DB::table('clientes')
			->orderBy('apellido_paterno','asc')
			->orderBy('apellido_materno','asc')
			->orderBy('nombre','asc')->get();
			
			$data['medio_pagos'] = DB::table('medio_pagos')
			->orderBy('medio_pago','asc')->get();
			
			$data['tipo_documentos'] = DB::table('tipo_documento_tributario')
			->orderBy('tipo_documento_tributario','asc')->get();
			
			$data['articulos'] = DB::table('articulos')
			->select('*','articulos.id')
			->join('categoria_articulos','articulos.id_categoria_articulos','=','categoria_articulos.id')
			->where('articulos.activo','Si')
			->where('articulos.cantidad','>',0)
			->orderBy('nombre','asc')->get();
			
			//Please use cbView method instead view method from laravel
			return view('ventas/add',$data);
		}
		
		public function agregarArticulo(Request $request)
		{
			$data['id_articulo'] = $request->get('id_articulo');
			$data['cantidad'] = $request->get('cantidad');
			$data['cantidadM'] = $request->get('cantidadM');
			$data['precio'] = $request->get('precio');
			$data['total'] = $data['precio'] * $data['cantidad'];
			$data['categoria'] = $request->get('categoria');
			$data['nombre'] = $request->get('nombre');
			
			return view('ventas/detalle-venta',$data);
		}
		
		public function agregarDetalle(Request $request)
		{
			$id_articulos = $request->get('articulo');
			$cantidad = $request->get('cantidad');
			$precio = $request->get('precio');
			$total = $request->get('total');
			$secretId = $request->get('secret_id');
			$id_tipo_documento = $request->get('id_tipo_documento_tributario');
			$nro_documento = $request->get('nro_documento');
			
			foreach($id_articulos as $id)
			{
				DB::table('detalle_ventas')->insert([
				'secret_id' => $secretId,
				'id_articulos' => $id,
				'cantidad' => $cantidad[$id],
				'precio' => $precio[$id],
				'total' => $total[$id],
				]);
				
				(new MainController)->kardex($id,'SALIDA',0,$cantidad[$id],3,$id_tipo_documento,$nro_documento);
			}
		}
		
		public function getDetail($id) 
		{
			//Create an Auth
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			
			$data = [];
			$data['page_title'] = 'Detalle Venta';
			$data['id'] = $id;
			
			$data['venta'] = DB::table('ventas')
			->select('*','detalle_ventas.precio','detalle_ventas.cantidad','detalle_ventas.total','articulos.nombre')
			->join('detalle_ventas','detalle_ventas.secret_id','=','ventas.secret_id')
			->join('articulos','detalle_ventas.id_articulos','=','articulos.id')
			->join('categoria_articulos','articulos.id_categoria_articulos','=','categoria_articulos.id')
			->join('clientes','clientes.id','=','ventas.id_clientes')
			->join('medio_pagos','medio_pagos.id','=','ventas.id_medio_pagos')
			->join('tipo_documento_tributario','tipo_documento_tributario.id','=','ventas.id_tipo_documento_tributario')
			->where('ventas.id',$id)->get();
			
			//$data['detalle'] = DB::table('detalle_ventas')->where('secret_id',$data['venta']->secret_id)->get();
			return view('ventas/detail',$data);
			
		}
		
		public function anularVenta($id)
		{
			DB::table('ventas')
			->where('secret_id',$id)
			->update([
				'anulado' => 'Si'
			]);
			
			
			$venta = DB::table('ventas')->where('secret_id',$id)->first();
			$productos = DB::table('detalle_ventas')->where('secret_id',$id)->get();
			
			foreach($productos as $val)
			{
				(new MainController)->kardex($val->id_articulos,'ENTRADA',$val->cantidad,0,4,$venta->id_tipo_documento_tributario,$venta->nro_documento);
			}
			
			$mensaje = "<script>
			window.onload=function() {
			swal({
			title: 'Venta anulada exitosamente. Se ha repuesto el stock de productos',
			type:'success',
			showCancelButton:false,
			allowOutsideClick:true,
			confirmButtonColor: '#28a745',
			cancelButtonColor: '#17a2b8',
			confirmButtonText: 'Aceptar',
			cancelButtonText: 'Aceptar',
			closeOnConfirm: true
			}, function(){
			});
			}
			</script>";
			
			CRUDBooster::redirect(CRUDBooster::mainpath(),"Venta anulada exitosamente. Se ha repuesto el stock de productos.".$mensaje,"success");
		}
		
	}	