<?php namespace App\Http\Controllers;
	
	
	use Illuminate\Http\Request;
	use CRUDBooster;
	use DB;
	use Illuminate\Support\Facades\Validator;
	use PDF;
	//use DateTime;
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;
	
	class MainController extends Controller
	{
		public function activo(Request $request)
		{
			$tabla = $request->get('tabla');
			$id = $request->get('id');
			$activo = $request->get('activo');
			
			DB::table($tabla)
			->where('id', $id)
			->update([
			'activo' => $activo,
			]);
		}
		
		public function agregarDocumento(Request $request)
		{
			$upload_dir = base_path() . '/storage/app/uploads/documentos/';
			$img = $_POST['url'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$name = uniqid() . ".png";
			$file = $upload_dir . $name;
			file_put_contents($file, $data);
		
			$dir = 'uploads/documentos/'.$name;
			
			DB::table('documentos_mascotas')->insert([
			'id_mascotas' => $request->get('id_mascotas'),
			'id_tipo_documentos' => $request->get('id_tipo_documento'),
			'fecha' => date('Y-m-d'),
			'archivo' => $dir,
			'extension' => $ext,
			'comentarios' => $request->get('comentarios'),
			]);	
		}
		
		public function juntarImagenes($fondo,$dibujo)
		{
			
		}
		
		public function kardex($id_articulo,$movimiento,$entrada,$salida,$id_tipo_movimiento,$id_tipo_documento,$nro_documento)
		{
			$producto = DB::table('articulos')
            ->select('*')
            ->where('id',$id_articulo)->first();
			
			if($producto->control_stock == 'Si'){
				if($movimiento == 'ENTRADA')
				{
					DB::table('articulos')
                    ->where('id',$id_articulo)
                    ->increment('cantidad', $entrada);    
				}
				
				if($movimiento == 'SALIDA')
				{
					DB::table('articulos')
                    ->where('id',$id_articulo)
                    ->decrement('cantidad', $salida);    
				}
				
				$stock = DB::table('articulos')
                ->select('*')
                ->where('id',$id_articulo)->first();
				
				$cantidad_actual = $stock->cantidad;
				$fecha = date('Y-m-d');
				
			DB::table('movimiento_articulos')->insert([
			'id_articulos' => $id_articulo,
			'movimiento' => $movimiento,
			'entrada' => $entrada,
			'salida' => $salida,
			'cantidad_actual' => $cantidad_actual,
			'id_tipo_movimientos' => $id_tipo_movimiento,
			'fecha' => $fecha,
			'id_tipo_documentos' => $id_tipo_documento,
			'nro_documento' => $nro_documento,
			]);
			}
		}
	}				