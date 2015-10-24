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
			$user->import($_POST['user'],'name,password');
			$id = R::store($user);
			$_SESSION['flash'] = 'Usuario creado exitosamente';
			header('Location:/usuarios');
		}

		public static function editar(){
			global $user, $vista;
			$user = R::load('user', $_GET['id']);
			$vista = '/users/edit.php';
		}

		public static function update(){
			$user = R::load('user', $_GET['id']);
			$user->import($_POST['user'],'name,password');
			$id = R::store($user);
			$_SESSION['flash'] = "Usuario $user->name editado exitosamente";
			header('Location:/usuarios');
		}
		
	}
?>