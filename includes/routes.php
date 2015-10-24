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
			UserController::lista();
			break;
		case 'GET | users/new':
			require 'controladores/users.php';
			UserController::nuevo();
			break;
		case 'POST | users':
			require 'controladores/users.php';
			UserController::crear();
			break;
		case 'GET | users/editar':
			require 'controladores/users.php';
			UserController::editar();
			break;
		case 'POST | user':
			require 'controladores/users.php';
			UserController::update();
			break;
		default:
			$vista = '404.php';
			break;
	}
?>