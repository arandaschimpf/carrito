<?php 
	if(!isset($_GET['page']) || $_GET['page'] == ''){
		$ruta = $_SERVER['REQUEST_METHOD'] . " | /";
	}else{
		$ruta = $_SERVER['REQUEST_METHOD'] . " | " . $_GET['page'];		
	}
	switch ($ruta) {
		case 'GET | /':
			require 'controladores/main.php';
			MainController::main();
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
		case 'POST | user/promover':
			require 'controladores/users.php';
			autorizar();
			UserController::upgrade();
			break;
		case 'POST | user/degradar':
			require 'controladores/users.php';
			autorizar();
			UserController::downgrade();
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
		case 'GET | productos':
			autorizar();				
			require 'controladores/products.php';
			ProductController::lista();
			break;
		case 'GET | productos/nuevo':
			autorizar();		
			require 'controladores/products.php';
			ProductController::nuevo();
			break;
		case 'POST | productos':
			autorizar();		
			require 'controladores/products.php';
			ProductController::crear();
			break;
		case 'POST | productos/destruir':
			autorizar();		
			require 'controladores/products.php';
			ProductController::destruir();
			break;
		case 'GET | productos/editar':
			autorizar();		
			require 'controladores/products.php';
			ProductController::editar();
			break;
		case 'POST | producto':
			autorizar();		
			require 'controladores/products.php';
			ProductController::update();
			break;
		case 'GET | pedidos':
			autorizar(false);
			require 'controladores/requests.php';
			RequestController::lista();
			break;
		case 'POST | pedidos':
			autorizar(false);
			require 'controladores/requests.php';
			RequestController::crear();
			break;
		case 'POST | pedido/eliminar':
			autorizar(false);
			require 'controladores/requests.php';
			RequestController::eliminar();
			break;
		case 'POST | pedido/comprar':
			autorizar();
			require 'controladores/requests.php';
			RequestController::completar();
			break;
		case 'GET | email':
			require 'controladores/email.php';
			EmailController::enviar();
			break;
		default:
			$vista = '404.php';
			break;
	}
?>