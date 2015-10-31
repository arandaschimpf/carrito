<?php 
	/**
	* 
	*/
	require 'modelos/Request.php';
	require 'modelos/User.php';
	require 'includes/underscore.php';
	class EmailController
	{
		public static function enviar(){
			global $request;
			$request = R::findAll('request',' ORDER BY name ');
			$user = R::findAll('user');
			$lista = [];

	        $subject = "Lista del super";
			$file = fopen('vistas/email/email.ejs', 'r');
			$content = fread($file, filesize('vistas/email/email.ejs'));
			$message = __($content)->template(array('lista' => $request));
	        $header = "From:lista@carrito.esy.es\r\n";
	        $header .= "MIME-Version: 1.0\r\n";
	        $header .= "Content-type: text/html\r\n";

			foreach ($user as $key => $value) {
				if(isset($value->email) && $value->email != "" && $value->rol == 1){
					$lista[] = $value->email;
					$to = $value->email;


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