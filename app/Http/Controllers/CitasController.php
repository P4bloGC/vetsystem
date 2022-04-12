<?php namespace App\Http\Controllers;
	
	
	use Illuminate\Http\Request;
	use CRUDBooster;
	use DB;
	use Illuminate\Support\Facades\Validator;
	use PDF;
	//use DateTime;
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;
	
	class CitasController extends Controller
	{
		public function index(Request $request)
		{
			$data['page_title'] = 'Citas Semanales';
			
			if(!empty($request->all()))
			{
				$fecha = $request->get('fecha');
				}else{
				$fecha = date('Y-m-d'); 
			}
			
			$diaInicio="Monday";
			$strFecha = strtotime($fecha);
			$fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
			
			if(date("l",$strFecha) == $diaInicio){
				$fechaInicio = date("Y-m-d",$strFecha);
			}
			
			$dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado','Domingo');
			
			foreach($dias as $key => $val)
			{
				$data['fechas'][] = date("Y-m-d",strtotime($fechaInicio."+ ".$key." days"));     
			}
			
			$data['dias'] = $dias;
			$data['horas'] = array('00:','01:','02:','03:','04:','05:','06:','07:','08:','09:','10:','11:','12:','13:','14:','15: ','16:','17:','18:','19:','20:','21:','22:','23:');
			$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			$data['mes'] = $meses[date("m",strtotime($fecha)) - 1];
			$data['anho'] = date("Y",strtotime($fecha));
			$data['semana_pasada'] = date("Y-m-d",strtotime($fechaInicio."- 1 days"));
			$data['semana_siguiente'] = date("Y-m-d",strtotime($fechaInicio."+ 7 days"));
			
			$data['usuarios'] = DB::table('cms_users')->orderBy('name','asc')->get();
			
			$data['servicios'] = DB::table('articulos')
			->where('id_categoria_articulos',4)
			->where('activo','Si')
			->orderBy('nombre','asc')->get();
			
			$data['clientes'] = DB::table('clientes')
			->orderBy('apellido_paterno','asc')
			->orderBy('apellido_materno','asc')
			->orderBy('nombre','asc')->get();
			
			$host= $_SERVER["HTTP_HOST"];
			$url= $_SERVER["REQUEST_URI"];
			$data['url'] = "http://" . $host . $url;
			
			return view('citas/index',$data);
		}
		
		public function buscarCitas(Request $request)
		{
			$fecha = $request->get('fecha');
			
			$diaInicio="Monday";
			$strFecha = strtotime($fecha);
			$fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
			
			if(date("l",$strFecha) == $diaInicio){
				$fechaInicio = date("Y-m-d",$strFecha);
			}
			
			$dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado','Domingo');
			
			foreach($dias as $key => $val)
			{
				$data['fechas'][] = date("Y-m-d",strtotime($fechaInicio."+ ".$key." days"));     
			}
			
			$data['dias'] = $dias;
			$data['horas'] = array('00:','01:','02:','03:','04:','05:','06:','07:','08:','09:','10:','11:','12:','13:','14:','15: ','16:','17:','18:','19:','20:','21:','22:','23:');
			$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			$data['mes'] = $meses[date("m",strtotime($fecha)) - 1];
			$data['anho'] = date("Y",strtotime($fecha));
			$data['semana_pasada'] = date("Y-m-d",strtotime($fechaInicio."- 1 days"));
			$data['semana_siguiente'] = date("Y-m-d",strtotime($fechaInicio."+ 7 days"));	
			
			return view('citas/calendario',$data);
		}
		
		public function agregarCita(Request $request)
		{
			DB::table('citas')->insert([
			'id_clientes' => $request->get('id_clientes'),
			'id_mascotas' => $request->get('id_mascotas'),
			'id_cms_users' => $request->get('funcionario'),
			'id_articulos' => $request->get('servicio'),
			'fecha' => $request->get('fecha'),
			'hora' => $request->get('hora'),
			'descripcion' => $request->get('descripcion'),
			'fecha_completa' => $request->get('fecha').' '.$request->get('hora'),
			]);
			
			$mensaje = "<script>
			window.onload=function() {
			swal({
			title: 'Cita agendada exitosamente.',
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
			
			CRUDBooster::redirect($request->get('url'),"Cita agendada exitosamente.".$mensaje,"success");
			
		}
		
		public function agendaFuncionario(Request $request)
		{
			$id = $request->get('id_funcionario');
			$fecha = $request->get('fecha');
			
			if(!empty($id) && !empty($fecha)){
				$data['citas'] = DB::table('citas')
				->join('clientes','citas.id_clientes','=','clientes.id')
				->join('articulos','citas.id_articulos','=','articulos.id')
				->where('id_cms_users',$id)
				->where('fecha',$fecha)
				->orderBy('fecha_completa','asc')->get();
				
				return view('citas/agenda-funcionario',$data);
			}
			
			echo "<div id='agendaFuncionario'></div>";
		}
		
		public function verCita(Request $request)
		{
			$data['cita'] = DB::table('citas')
			->select('*','mascotas.nombre as mascota')
			->join('clientes','citas.id_clientes','=','clientes.id')
			->leftjoin('mascotas','citas.id_mascotas','=','mascotas.id')
			->join('articulos','citas.id_articulos','=','articulos.id')
			->join('cms_users','citas.id_cms_users','=','cms_users.id')
			->where('citas.id', $request->get('id'))->first();
			
			$host= $_SERVER["HTTP_HOST"];
			$url= $_SERVER["REQUEST_URI"];
			$data['url'] = "http://" . $host . $url;
			$data['id'] = $request->get('id');
			
			return view('citas/ver',$data);
		}
		
		public function eliminarCita($id)
		{
			DB::table('citas')->where('citas.id', $id)->delete();
				
			$mensaje = "<script>
			window.onload=function() {
			swal({
			title: 'Cita eliminada exitosamente.',
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
			
			CRUDBooster::redirect(route('citas'),"Cita eliminada exitosamente.".$mensaje,"success");
		}
		
		public function buscarMascotas(Request $request)
		{
			$id_cliente = $request->get('id_cliente');
			
			$data['mascotas'] = DB::table('mascotas')
			->select('mascotas.id','especies.especie','razas.raza','especies.avatar','mascotas.nombre')
			->join('especies','mascotas.id_especies','=','especies.id')
			->join('razas','mascotas.id_razas','=','razas.id')
			->where('id_clientes',$id_cliente)
			->where('mascotas.activo','Si')->get();
			
			return view('citas/mascotas',$data);
		}
	}							