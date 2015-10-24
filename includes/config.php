<?php 
	require 'includes/rb.php';
	session_start();
	if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '192.168.1.55'){
		R::setup( 'mysql:host=localhost:3307;dbname=carrito', 'root', 'usbw' );
	}else{
		R::setup( 'mysql:host=mysql.hostinger.com.ar;dbname=u978455399_carr', 'u978455399_marti', 'qwerty1234' );				
	}
	$BASEURL = '';


	if(isset($_SESSION['flash'])){
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
	}
 ?>