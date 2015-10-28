<?php 
	/**
	* 
	*/
	require 'modelos/Product.php';
	class MainController
	{
		public static function main(){
			global $vista, $product;

				$product = R::findAll('product',' ORDER BY name ');
				
			
			$vista = 'main/main.php';
		}
	}
?>