<?php 
	if(!isset($_GET['page']) || $_GET['page'] == ''){
		$ruta = $_SERVER['REQUEST_METHOD'] . " | /";
	}else{
		$ruta = $_SERVER['REQUEST_METHOD'] . " | " . $_GET['page'];		
	}
	switch ($ruta) {
		case 'GET | /':
			$vista = 'main.php';
			break;
		case 'GET | users':
			require 'controladores/users.php';
			autorizar();
			UserController::lista();
			break;
		case 'GET | users/new':
			require 'controladores/users.php';
			autorizar();
			UserController::nuevo();
			break;
		case 'POST | users':
			require 'controladores/users.php';
			autorizar();
			UserController::crear();
			break;
		case 'GET | users/editar':
			require 'controladores/users.php';
			autorizar();
			UserController::editar();
			break;
		case 'POST | user':
			require 'controladores/users.php';
			autorizar();
			UserController::update();
			break;
		case 'POST | user/delete':
			require 'controladores/users.php';
			autorizar();
			UserController::eliminar();
			break;
		case 'GET | entrar':
			require 'controladores/sessions.php';
			SessionController::nueva();
			break;
		case 'POST | entrar':
			require 'controladores/sessions.php';
			SessionController::crear();
			break;
		case 'GET | salir':
			require 'controladores/sessions.php';
			SessionController::destruir();
			break;
		default:
			$vista = '404.php';
			break;
	}
?>