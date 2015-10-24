<?php 
	require 'includes/config.php';
	require 'includes/routes.php';

	if(isset($vista)){
		if(!isset($NOLAYOUT)){
			require 'includes/header.php';
			require 'vistas/'.$vista;
			require 'includes/footer.php';		
		}else{
			require 'vistas/'.$vista;
		}		
	}

?>