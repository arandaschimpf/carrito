<?php 
	/**
	* 
	*/
	require 'modelos/Request.php';
	require 'modelos/User.php';
	class EmailController
	{
		public static function enviar(){
			global $request;
			$request = R::findAll('request',' ORDER BY name ');
			$user = R::findAll('user');
			$lista = [];
			foreach ($user as $key => $value) {
				if(isset($value->email) && $value->email != "" && $value->rol == 1){
					$lista[] = $value->email;
					$to = $value->email;
			        $subject = "Lista del super";
			        $message = "<h2>Lista del supermercado</h2>";
			        $message .= "<a href='http://carrito.esy.es'>Ir a la aplicacion</a><hr>";
			        $message .= "<ul>";
			        foreach ($request as $pedido) {
			        	$message .= "<li>$pedido->name</li>";
			        }
			        $message .= "</ul>";

			        $header = "From:lista@carrito.esy.es\r\n";
			        $header .= "MIME-Version: 1.0\r\n";
			        $header .= "Content-type: text/html\r\n";

			        $retval = mail ($to,$subject,$message,$header);
         
			        if( $retval == true ){
            			echo json_encode($lista);
			        }else{
			            echo "Message could not be sent...";
			        }
				}
			}
		}
	}
?>