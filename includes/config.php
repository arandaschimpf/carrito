<?php 
	require 'includes/rb.php';
	session_start();
	R::setup( 'mysql:host=localhost:3307;dbname=carrito', 'root', 'usbw' );
	$BASEURL = '';


	if(isset($_SESSION['flash'])){
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
	}
 ?>