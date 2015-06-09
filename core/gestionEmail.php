<?php

class Email{
	
	public static function sendmailActivationCompte($email, $token){

		$to = $email;

		$sujet = "activation de votre compte";
		$message = '
	     <html>
	      <head>
	       <title>Activation du compte</title>
	      </head>
	      <body>
	      		<div>Bonjour cliquez sur ce lien pour activer votre compte</div>
	      		<a href="http://localhost'.REFFERER.DS.'users/activate/?email=' .$to. '&token=' .$token. '">Activation de compte</a>
	      </body>
	     </html>
	     ';

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

		// En-têtes additionnels
		$headers .= "To: $to". "\r\n";
		$headers .= 'From: Patrice PETIT <petitpatrice@gmail.com>' . "\r\n";

		return mail($to,$sujet,$message,$headers);
	}
}