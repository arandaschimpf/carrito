<?php 
	/**
	* 
	*/
	require 'modelos/User.php';
	class UserController{
		public static function lista(){
			global $users, $vista;
			$users = R::findAll('user');
			$vista = '/users/list.php';
		}

		public static function nuevo(){
			global $user, $vista;
			$user = R::dispense('user');
			$vista = '/users/new.php';
		}

		public static function crear(){
			$user = R::dispense('user');
			$user->import($_POST['user'],'name,password,rol,email');
			$id = R::store($user);
			$_SESSION['flash'] = 'Usuario creado exitosamente';
			header('Location:/admin/usuarios');
		}

		public static function editar(){
			global $user, $vista;
			$user = R::load('user', $_GET['id']);
			$vista = '/users/edit.php';
		}

		public static function update(){
			$user = R::load('user', $_GET['id']);
			$user->import($_POST['user'],'name,password,email');
			$id = R::store($user);
			$_SESSION['flash'] = "Usuario $user->name editado exitosamente";
			header('Location:/admin/usuarios');
		}
		public static function eliminar(){
			if(isset($_GET['id'])){				
				$user = R::load('user', $_GET['id']);
				$username = $user->name;
				R::trash($user);
				//$_SESSION['flash'] = "Usuario $username eliminado exitosamente";
			}
		}

		public static function upgrade(){
			if(isset($_GET['id'])){
				$user = R::load('user', $_GET['id']);
				if($user->rol != 1){
					$user->rol = 1;
					$id = R::store($user);
					$_SESSION['flash'] = "Usuario $user->name es administrador ahora";
					echo "/admin/usuarios";
				}
			}
			//header('Location:/admin/usuarios');
		}

		public static function downgrade(){
			if(isset($_GET['id'])){
				$user = R::load('user', $_GET['id']);
				if($user->rol == 1){
					$user->rol = 0;
					$id = R::store($user);
					$_SESSION['flash'] = "Usuario $user->name ya no es administrador";
					echo "/admin/usuarios";
				}
			}			
		}
		
		
	}
?>