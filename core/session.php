 <?php 

class Session{

	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
			
		}


	}

	public function setFlash($message, $type){

		$_SESSION['flash'] = array(
			'message' => $message,
			'type' => $type
			);
 	}

 	public function flash(){
 		// var_dump($_SESSION);
 		if(isset($_SESSION['flash']['message'])){
 			$html = '<div class="alert alert-block alert-'.$_SESSION['flash']['type'].' "><p>' .$_SESSION['flash']['message'].'</p></div>';
 			$_SESSION['flash'] = array();
 			return $html;
 		}
		
 	}

 	public function write($key,$value){
 		$_SESSION[$key] =$value;
 	}

 	public function read($key = null){
 		if($key){
 			if (isset($_SESSION[$key])){
 				return $_SESSION[$key];
 			}else{
 				return false;
 			}
 		}else{
 			return $_SESSION;
 		}
 	}

 	public function islogged(){
 		//debug($_SESSION['User']['id']);
 		if (isset($_SESSION['User']['id'])){
 			return true;
 		}
 		return false;
 	}

 	public function isAdmin(){
 		//debug($_SESSION['User']['admin'] == 1)
 		if (isset($_SESSION['User']['admin'])){
 			return true;
 		}
 		return false;
 	}
}