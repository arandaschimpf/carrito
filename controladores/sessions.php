<?php 
	require 'modelos/User.php';
	require 'modelos/Session.php';
	/**
	* 
	*/
	class SessionController
	{
		public static function nueva(){
			global $vista, $logged;
			if(!isset($logged)){
				$vista = 'sessions/new.php';
			}else{
				header('Location:/');
			}
		}

		public static function crear(){
			if(isset($_POST['user']['name']) && isset($_POST['user']['password'])){
				$usuario = $_POST['user']['name'];
				$password = hash("sha256", $_POST['user']['password']);
				$user = R::findOne('user',' name = :name AND password = :password ',
				           array(':name' => $usuario, ':password' => $password )
				         );
				if($user == null){
					$_SESSION['flash'] = 'Error al autenticar. Usuario/Contraseña incorrectos.';
					header('Location:/entrar');
				}else{
					$_SESSION['flash'] = 'Autenticado correctamente';
					$session = R::dispense('session');
					$session->name = $user->name;
					$session->hora = R::isoDateTime();
					$session->ip = $_SERVER['REMOTE_ADDR'];
					$id = R::store($session);
					$session->id = $id;
					setcookie('logged',json_encode($session->export()), time()*2);
					header('Location:/');
				}
			}
		}

		public static function destruir(){
			global $session, $logged;
			if(isset($logged) && isset($session)){
				R::trash($session);
				setcookie("logged","",time()-1);
				$_SESSION['flash'] = 'Ha cerrado sesión correctamente';
			}
			header('Location:/');
		}
		
	}
?>