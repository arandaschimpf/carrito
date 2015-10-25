<?php 
	/**
	* 
	*/
	require 'modelos/Product.php';
	class ProductController{
		public static function lista(){
			global $vista, $product;
			$product = R::findAll('product',' ORDER BY name ');

			$vista = "/products/list.php";
		}

		public static function nuevo(){
			global $vista;
			$vista = "/products/nuevo.php";
		}

		public static function crear(){
			$product = R::dispense('product');
			$product->import($_POST['product'],'name');
			$_SESSION['flash'] = 'Producto creado exitosamente';			
			$id = R::store($product);
			header('Location:/admin/productos');
		}

		public static function destruir(){
			$product = R::load('product', $_GET['id']);
			R::trash($product);
		}

		public static function editar(){
			global $product, $vista;
			$product = R::load('product', $_GET['id']);
			$vista = "/products/editar.php";
		}

		public static function update(){
			$product = R::load('product', $_GET['id']);
			$nombre = $product->name;
			$product->import($_POST['product'],'name');
			$id = R::store($product);
			$_SESSION['flash'] = "Producto $nombre cambiado a $product->name";
			header("Location:/admin/productos");
		}
	}
?>