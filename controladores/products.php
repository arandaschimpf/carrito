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

			if(isset($_FILES['imagen'])){
				$file_ext=strtolower(end(explode('.',$_FILES['imagen']['name'])));
				$nombre = "img$id.".$file_ext;

				$dir = "cdn/images/products/";
				$direCompleta = $dir . basename($nombre);
				if(move_uploaded_file($_FILES['imagen']['tmp_name'], $direCompleta)){
					$product->imagen = "/".$direCompleta;
					$id = R::store($product);
				}				
			}

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
			if(isset($_FILES['imagen'])){

				$file_ext=strtolower(end(explode('.',$_FILES['imagen']['name'])));
				$nombre = "img$product->id.".$file_ext;

				$dir = "cdn/images/products/";
				$direCompleta = $dir . basename($nombre);
				unlink($direCompleta);
				if(move_uploaded_file($_FILES['imagen']['tmp_name'], $direCompleta)){
					$product->imagen = "/".$direCompleta . "?".mt_rand(1,10000);
				}
			}
			$id = R::store($product);
			$_SESSION['flash'] = "Se ha actializado el producto $product->name";

			header("Location:/admin/productos");
		}
	}
?>