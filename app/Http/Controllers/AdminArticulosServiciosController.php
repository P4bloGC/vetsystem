<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminArticulosServiciosController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->table = "articulos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Artículo ID","name"=>"id"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre"];
			$this->col[] = ["label"=>"Categoría","name"=>"id_categoria_articulos","join"=>"categoria_articulos,categoria_articulo"];
			$this->col[] = ["label"=>"Stock","name"=>"cantidad"];
			$this->col[] = ["label"=>"Unidad de Medida","name"=>"id_unidad_medidas","join"=>"unidad_medidas,unidad_medida"];
			$this->col[] = ["label"=>"Proveedor","name"=>"id_proveedores","join"=>"proveedores,razon_social"];
			$this->col[] = ["label"=>"Activo","name"=>"activo","callback_php"=>'$this->checkbox($row->id,$row->activo)'];
			$this->col[] = ["label"=>"Cantidad Mínima","name"=>"cantidad_minima", "visible" => false];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Proveedor','name'=>'id_proveedores','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'proveedores,razon_social'];
			$this->form[] = ['label'=>'Categoría','name'=>'id_categoria_articulos','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'categoria_articulos,categoria_articulo'];
			$this->form[] = ['label'=>'Cantidad','name'=>'cantidad','type'=>'number','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Unidad de Medida','name'=>'id_unidad_medidas','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'unidad_medidas,unidad_medida'];
			$this->form[] = ['label'=>'Cantidad x Unidad','name'=>'cantidad_unidad','type'=>'number','validation'=>'required|min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Precio1','name'=>'precio1','type'=>'number','validation'=>'required|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Precio2','name'=>'precio2','type'=>'number','validation'=>'min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Precio3','name'=>'precio3','type'=>'number','validation'=>'min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Precio4','name'=>'precio4','type'=>'number','validation'=>'min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cantidad Mínima','name'=>'cantidad_minima','type'=>'number','validation'=>'min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Código de Barras','name'=>'codigo_barras','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Fecha de Vencimiento','name'=>'fecha_vencimiento','type'=>'date','validation'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Control Stock','name'=>'control_stock','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Si;No'];
			$this->form[] = ['label'=>'Activo','name'=>'activo','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Si;No'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Nombre","name"=>"nombre","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Categoria Articulos","name"=>"id_categoria_articulos","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"categoria_articulos,id"];
			//$this->form[] = ["label"=>"Cantidad","name"=>"cantidad","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Unidad Medidas","name"=>"id_unidad_medidas","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"unidad_medidas,id"];
			//$this->form[] = ["label"=>"Cantidad Unidad","name"=>"cantidad_unidad","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Precio1","name"=>"precio1","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Precio2","name"=>"precio2","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Precio3","name"=>"precio3","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Precio4","name"=>"precio4","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cantidad Minima","name"=>"cantidad_minima","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Codigo Barras","name"=>"codigo_barras","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Fecha Vencimiento","name"=>"fecha_vencimiento","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			//$this->form[] = ["label"=>"Vencimiento","name"=>"vencimiento","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
			$this->sub_module[] = ['label'=>'Kardex','path'=>'kardex','parent_columns'=>'nombre','foreign_key'=>'id_articulos','button_color'=>'info','button_icon'=>'fa fa-arrows-h'];


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
			$this->table_row_color[] = ['condition'=>'[cantidad] == 0','color'=>'danger'];
			$this->table_row_color[] = ['condition'=>'[cantidad] <= [cantidad_minima]','color'=>'warning'];

	        
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
			$this->load_js[] = asset("js/main.js");
	        
	        
	        
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
			if($postdata['control_stock'] == 'No')
			{
				$postdata['cantidad'] = 999;
			}
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
			if($postdata['control_stock'] == 'No')
			{
				$postdata['cantidad'] = 999;
			}

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
		public function checkbox($id,$activo)
		{
			if($activo == 'Si')
			{
				return '<input type="checkbox" id="activo" value="first_checkbox" onclick="activo2('.$id.',\'articulos\')" checked> '.$activo;
				}else{
				return '<input type="checkbox" id="activo" value="first_checkbox" onclick="activo2('.$id.',\'articulos\')"> '.$activo;
			}
		}

	}