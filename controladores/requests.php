<?php /**
* 
*/
require 'modelos/Request.php';
class RequestController
{
	public static function lista(){
		$request = R::findAll('request',' ORDER BY name ');
		$product = R::findAll('request',' ORDER BY name ');
		echo json_encode(R::exportAll($request));
	}

	public static function crear(){
		global $logged;
		if (isset($_POST['request']) && isset($logged)) {
			$request = R::dispense('request');
			$request->import($_POST['request'],'name');
			$request->user = $logged;
			$request->date = R::isoDateTime();
			$id = R::store($request);
			$request->id = $id;
			$reqq = $request->export();
			$reqq['user'] = $request->user->name;
			echo json_encode($reqq);
		}
	}

	public static function eliminar(){
		global $logged;
		if (isset($_POST['id'])){
			$request = R::load('request', $_POST['id']);
			if($request->user_id == $logged->id || $logged->rol == 1){
				R::trash($request);
				echo json_encode(["exito" => 1]);
			}
		}
	}

	public static function completar(){
		//global $logged;
		if(isset($_POST['id'])){
			$request = R::load('request', $_POST['id']);
			$completed = R::dispense('completed');
			$completed->import($request->export(), 'name, user_id');
			$completed->date = R::isoDateTime();
			$completed->agregado = $request->date;
			$id = R::store($completed);
			R::trash($request);
			echo json_encode(["exito" => 1]);
		}
	}
} ?>