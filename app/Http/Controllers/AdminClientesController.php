<?php namespace App\Http\Controllers;
	
	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
	use DateTime;
	
	class AdminClientesController extends \crocodicstudio\crudbooster\controllers\CBController {
		
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
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "clientes";
			# END CONFIGURATION DO NOT REMOVE THIS LINE
			
			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Dni","name"=>"dni"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre_completo"];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			$this->col[] = ["label"=>"Teléfono Principal","name"=>"telefono_principal"];
			$this->col[] = ["label"=>"Teléfono Secundario","name"=>"telefono_secundario"];
			# END COLUMNS DO NOT REMOVE THIS LINE
			
			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Dni','name'=>'dni','type'=>'text','validation'=>'required|min:1|max:13|unique:clientes,dni','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Apellido Paterno','name'=>'apellido_paterno','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Apellido Materno','name'=>'apellido_materno','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:clientes','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Dirección','name'=>'direccion','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			$this->form[] = ['label'=>'Teléfono Principal','name'=>'telefono_principal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Teléfono Secundario','name'=>'telefono_secundario','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Observaciones','name'=>'observaciones','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE
			
			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Dni","name"=>"dni","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Nombre","name"=>"nombre","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Apellidos","name"=>"apellidos","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Nombre Completo","name"=>"nombre_completo","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Email","name"=>"email","type"=>"email","required"=>TRUE,"validation"=>"required|min:1|max:255|email|unique:clientes","placeholder"=>"Introduce una dirección de correo electrónico válida"];
			//$this->form[] = ["label"=>"Direccion","name"=>"direccion","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Telefono Principal","name"=>"telefono_principal","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Telefono Secundario","name"=>"telefono_secundario","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Observaciones","name"=>"observaciones","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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
	        $this->load_js[] = asset("js/clientes.js");
	        
	        
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
			$postdata['nombre_completo'] = $this->nombreCompleto($postdata);
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
			$data['page_title'] = 'Añadir Clientes';
			
			//Please use cbView method instead view method from laravel
			return view('clientes/add',$data);
		}
		
		public function nombreCompleto($array)
		{
			return $array['nombre']." ".$array['apellido_paterno']." ".$array['apellido_materno'];		
		}
		
		public function getDetail($id) 
		{
			//Create an Auth
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			
			$data = [];
			$data['page_title'] = 'Detalle Clientes';
			
			$data['cliente'] = DB::table('clientes')->where('id',$id)->first();
			
			$data['clientes'] = DB::table('clientes')
			->orderBy('apellido_paterno','asc')
			->orderBy('apellido_materno','asc')
			->orderBy('nombre','asc')->get();
			
			$data['mascotas'] = DB::table('mascotas')
			->select('mascotas.id','especies.especie','razas.raza','especies.avatar','mascotas.nombre')
			->join('especies','mascotas.id_especies','=','especies.id')
			->join('razas','mascotas.id_razas','=','razas.id')
			->where('id_clientes',$id)
			->where('mascotas.activo','Si')->get();
			
			$data['base_url'] = str_replace('/admin', '', CRUDBooster::adminPath($slug=NULL));
			
			//Please use cbView method instead view method from laravel
			return view('clientes/detail',$data);
		}
		
		public function detalleMascota(Request $request)
		{
			$data['id_mascotas'] = $request->get('id_mascotas');
			
			$data['mascota'] = DB::table('mascotas')
			->select('mascotas.id','especies.especie','razas.raza','especies.avatar','mascotas.nombre','mascotas.fecha_nacimiento','sexos.sexo','especies.avatar')
			->join('especies','mascotas.id_especies','=','especies.id')
			->join('razas','mascotas.id_razas','=','razas.id')
			->join('sexos','mascotas.id_sexos','=','sexos.id')
			->where('mascotas.id',$data['id_mascotas'])->first();
			
			$data['edad'] = $this->obtenerEdad($data['mascota']->fecha_nacimiento);
			
			$data['base_url'] = str_replace('/admin', '', CRUDBooster::adminPath($slug=NULL));
			
			return view('clientes/detalle-mascota',$data);
		}
		
		public function obtenerEdad($fecha_nacimiento)
		{
			$fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha_nacimiento))); // Creo un objeto DateTime de la fecha ingresada
			$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
			$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
			return "{$edad->format('%Y')} años y {$edad->format('%m')} meses";
		}
		
		public function historialClinico(Request $request)
		{
			$id_mascotas = $request->get('id_mascotas');
			
			$data['historial'] = DB::table('historial_clinico')
			->select('*','historial_clinico.id')
			->join('cms_users','historial_clinico.id_cms_users','=','cms_users.id')
			->where('id_mascotas',$id_mascotas)->orderBy('historial_clinico.id','desc')->get();
			
			$data['id_mascotas'] = $id_mascotas;
			
			return view('clientes/historial-clinico',$data);
		}
		
		public function historialClinicoForm($id_mascota)
		{
			$data['id_mascotas'] = $id_mascota;
			
			$mascota = DB::table('mascotas')->where('mascotas.id',$id_mascota)->first();
			
			$data['edad'] = $this->obtenerEdad($mascota->fecha_nacimiento);
			
			return view('clientes/historial-form',$data);
		}
		
		public function editarHistorialClinicoForm($id_mascota,$id)
		{
			$data['id_mascotas'] = $id_mascota;
			$data['id'] = $id;
			$data['historial'] = DB::table('historial_clinico')->where('id',$id)->first();
			
			return view('clientes/editar-historial-form',$data);
		}
		
		public function documentoForm($id_mascota,$id_tipo_documento,$descripcion)
		{
			$data['id_mascotas'] = $id_mascota;
			$data['id_tipo_documento'] = $id_tipo_documento;
			$data['descripcion'] = $descripcion;
			
			return view('clientes/documento-form',$data);
		}
		
		public function agregarHistorialClinico(Request $request)
		{
			$comentarios = $request->get('comentarios');
			
			if(empty($comentarios))
			{
				$comentarios = "Sin comentarios.";
			}
			
			DB::table('historial_clinico')->insert([
			'id_mascotas' => $request->get('id_mascotas'),
			'temperatura' => $request->get('temperatura'),
			'peso' => $request->get('peso'),
			'comentarios' => $comentarios,
			'fecha' => date('Y-m-d'),
			'hora' => date('h:i:s'),
			'fecha_completa' => date('Y-m-d h:i:s'),
			'id_cms_users' => CRUDBooster::myId()
			]);
		}
		
		public function editarHistorialClinico(Request $request)
		{
			$comentarios = $request->get('comentarios');
			
			if(empty($comentarios))
			{
				$comentarios = "Sin comentarios.";
			}
			
			DB::table('historial_clinico')
			->where('id',$request->get('id'))
			->update([
			'id_mascotas' => $request->get('id_mascotas'),
			'temperatura' => $request->get('temperatura'),
			'peso' => $request->get('peso'),
			'comentarios' => $comentarios,
			]);
		}
		
		
		public function editarForm(Request $request)
		{
			$id_cliente = $request->get('id_cliente');
			$data['cliente'] = DB::table('clientes')->where('id',$id_cliente)->first();
			return view('clientes/editar-form',$data);
		}
		
		public function planificacion(Request $request)
		{
			$id_mascotas = $request->get('id_mascotas');
			$id_categoria = $request->get('id_categoria');
			
			$data['vacunas'] = DB::table('planificacion')
			->select('*','planificacion.id')
			->join('articulos','planificacion.id_articulos','=','articulos.id')
			->join('estado_vacunas','planificacion.id_estado_vacunas','=','estado_vacunas.id')
			->where('id_mascotas',$id_mascotas)
			->where('planificacion.id_categoria_articulos',$id_categoria)->orderBy('planificacion.fecha','desc')->get();
			
			$data['estados'] = DB::table('estado_vacunas')->orderBy('estado_vacuna','asc')->get();
			
			$data['articulos'] = DB::table('articulos')
			->join('categoria_articulos','categoria_articulos.id','=','articulos.id_categoria_articulos')
			->where('id_categoria_articulos',$id_categoria)
			->where('cantidad','>',0)
			->where('articulos.activo','Si')->orderBy('articulos.nombre','desc')->get();
			
			$data['id_mascotas'] = $id_mascotas;
			$data['id_categoria'] = $id_categoria;
			$data['descripcion'] = strtolower($data['articulos'][0]->categoria_articulo);
			
			return view('clientes/planificacion',$data);
		}
		
		public function estadoPlanificacion(Request $request)
		{
			$id_estado = $request->get('id_estado');
			$id = $request->get('id_planificacion');
			
			DB::table('planificacion')
			->where('id',$id)
			->update([
				'id_estado_vacunas' => $id_estado,
			]);
		
		
		}
		
		public function agregarPlanificacion(Request $request)
		{
			$dosis = $request->get('dosis');
			$fecha = $request->get('fecha');
			$dosis_p = $request->get('dosis_p');
			$fecha_p = $request->get('fecha_p');
			$mensaje = "Si";
			
			if(!empty($dosis) && !empty($fecha))
			{
				DB::table('planificacion')->insert([
				'id_mascotas' => $request->get('id_mascotas'),
				'id_articulos' => $dosis,
				'fecha' => $fecha,
				'id_estado_vacunas' => 2,
				'id_categoria_articulos' => $request->get('id_categoria'),
				]);
				
				$mensaje = "No";
			}
			
			if(!empty($dosis_p) && !empty($fecha_p))
			{
				DB::table('planificacion')->insert([
				'id_mascotas' => $request->get('id_mascotas'),
				'id_articulos' => $dosis_p,
				'fecha' => $fecha_p,
				'id_estado_vacunas' => 1,
				'id_categoria_articulos' => $request->get('id_categoria'),
				]);
				
				$mensaje = "No";
			}
			
			echo $mensaje;
		}
		
		public function eliminarPlanificacion(Request $request)
		{
			$id = $request->get('id');
			
			DB::table('planificacion')->where('id', $id)->delete();		
		}
		
		public function documentosMascota(Request $request)
		{
			$id_mascotas = $request->get('id_mascotas');
			$id_tipo_documento = $request->get('id_tipo_documento');
			
			$data['documentos'] = DB::table('documentos_mascotas')
			->select('*')
			->where('id_mascotas',$id_mascotas)
			->where('id_tipo_documentos',$id_tipo_documento)->orderBy('documentos_mascotas.id','desc')->get();
			
			$data['id_mascotas'] = $id_mascotas;
			$data['id_tipo_documento'] = $id_tipo_documento;
			$data['descripcion'] = $request->get('descripcion');
			$data['base_url'] = str_replace('/admin', '', CRUDBooster::adminPath($slug=NULL));
			
			return view('clientes/documentos-mascota',$data);
		}
		
		public function eliminarHistoria(Request $request)
		{
			$id= $request->get('id');
			
			DB::table('historial_clinico')->where('id', $id)->delete();
		}
		
		public function subirImagen(Request $request)
		{
			$archivo = $request->file('archivo');
			$nombre = $archivo->getClientOriginalName();
			$ext = \File::extension($nombre);
			$nombre = uniqid().'.'.$ext;
			\Storage::disk('archivos')->put($nombre,  \File::get($archivo));
			$url = 'uploads/1/'.Date('Y-m').'/'.$nombre;
			$base_url = str_replace('/admin', '', CRUDBooster::adminPath($slug=NULL));
			
			$data['imagen'] = $base_url.'/'.$url;
			//$data['url'] = $url;
			
			return view('clientes/canvas',$data);
		}
	}						