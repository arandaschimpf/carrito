<?php 
	require 'includes/underscore.php';
	require 'includes/rb.php';
	R::setup( 'mysql:host=localhost:3307;dbname=carrito', 'root', 'usbw' );

	$file = fopen('vistas/email/email.ejs', 'r');
	$content = fread($file, filesize('vistas/email/email.ejs'));
	$request = R::findAll('request',' ORDER BY name ');
	$comp = __($content)->template(array('lista' => $request));
	echo $comp;
?>