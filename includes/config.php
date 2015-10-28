<?php 
	require 'includes/rb.php';
	session_start();
	if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '192.168.1.55' || $_SERVER['HTTP_HOST'] == '192.168.0.105'){
		R::setup( 'mysql:host=localhost:3307;dbname=carrito', 'root', 'usbw' );
	}else{
		R::setup( 'mysql:host=mysql.hostinger.com.ar;dbname=u978455399_carr', 'u978455399_marti', 'qwerty1234' );				
	}
	$BASEURL = '';
	$js = [];

	if(isset($_SESSION['flash'])){
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
	}
	if(isset($_COOKIE['logged'])){
		$sec = json_decode($_COOKIE['logged']);
		$session = R::load('session', $sec->id);
		if($session != null && $session->name == $sec->name){
			$logged = R::findOne('user',' name = :name ',
			           array(':name' => $session->name )
			         );
			unset($logged->password);
		}
	}
	function autorizar($admin = true){
		global $logged;
		if(!isset($logged)){
			$_SESSION['flash'] = "No tiene permiso para acceder a esa sección.";
			header('Location:/');
		}else{
			if($admin && $logged->rol != 1){
				$_SESSION['flash'] = "No tiene permiso para acceder a esa sección.";
				header('Location:/');
			}			
		}
	}
 ?>