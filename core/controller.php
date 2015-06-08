<?php

class Controller{

	public $request;
	private $vars = array(); // vairiable qui seront accessible dans la page
	public $layout = 'defaultBlog';
	private $rendered = false;
	public $errors = array();

	public function __construct($request=null){
		if($request){
			$this->request = $request;	
		}
		$this->session = new Session();
		$this->form = new Form($this);
		
		require ROOT.DS.'config'.DS.'hook.php';
	}
	public function render($view){
		if($this->rendered){return false;}
		extract($this->vars);
		if(strpos($view,'/')=== 0){
			$view = ROOT.DS.'view'.$view.'.php';
		}else{
			$view = ROOT . DS .'view'.DS.$this->request->controller . DS .$view .'.php';
		}
		// var_dump($this->vars);
		ob_start();
		// var_dump($view);
		require($view);
		$content_for_layout = ob_get_clean();
		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
		$this->rendered = true;
	}

	public function set($key,$value=null){
		if(is_array($key)){
			$this->vars += $key;
		}else{
			$this->vars[$key]= $value;
		}
		// var_dump($this->vars);
	}


	public function loadModel($name){
		$file = ROOT.DS.'model'.DS.$name.'.php';
		//debug($file);
		require_once($file);
		if(!isset($this->$name)){
			$this->$name = new $name();
		}else{
			echo "Model est deja chargé chargé\n";
		}
	}

	function e404($message){
		$this->set('message',$message);
		$this->render('/errors/404');
	}

	/**
	 * Appeler un controller depuis une vue
	 */
	public function request($controller, $action){
		$controller .= 'Controller';
		require_once(ROOT.DS.'controller'.DS .$controller.'.php');
		$c = new $controller();
		//var_dump($c->getmenu());
		return $c->$action();
	}


	function isAdmin(){
		if(isset($_SESSION['User']['id'])){
			// debug($id);
			$id = $_SESSION['User']['id'];
			$this->loadModel('users');
 			$conditions = array('id'=>$id, 'admin' => 1
				);

 			$user = $this->users->find(array(
 				'conditions'=>$conditions));
 			//debug($user);

	 		if(isset($user)){
	 			//debug($user);
	 			$_SESSION['User']['admin'] = 1;
	 		}else{
	 			// var_dump(false);
	 			unset($_SESSION['User']['admin']);
	 		}
		}
 		if (isset($_SESSION['User']['admin'])){
 			return true;
 		}
 		return false;
 	}

	public function texte_resume_html($texte, $nbreCar){
			if(is_numeric($nbreCar)){
				$PointSuspension		= '...';
				$LongueurAvantSansHtml	= strlen(trim(strip_tags($texte)));
				$MasqueHtmlSplit		= '#</?([a-zA-Z1-6]+)(?: +[a-zA-Z]+="[^"]*")*( ?/)?>#';
				$MasqueHtmlMatch		= '#<(?:/([a-zA-Z1-6]+)|([a-zA-Z1-6]+)(?: +[a-zA-Z]+="[^"]*")*( ?/)?)>#';
				$texte					.= ' ';
				$BoutsTexte				= preg_split($MasqueHtmlSplit, $texte, -1,  PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_NO_EMPTY);
				$NombreBouts			= count($BoutsTexte);
				if( $NombreBouts == 1 ){
					$texte				.= ' ';
					$LongueurAvant		= strlen($texte);
					$texte 				= substr($texte, 0, strpos($texte, ' ', $LongueurAvant > $nbreCar ? $nbreCar : $LongueurAvant));
					if ($PointSuspension!='' && $LongueurAvant > $nbreCar) {
						$texte			.= $PointSuspension;
					}
				} else {
					$longueur				= 0;
					$indexDernierBout		= $NombreBouts - 1;
					$position				= $BoutsTexte[$indexDernierBout][1] + strlen($BoutsTexte[$indexDernierBout][0]) - 1;
					$indexBout				= $indexDernierBout;
					$rechercheEspace		= true;
					foreach( $BoutsTexte as $index => $bout )
					{
						$longueur += strlen($bout[0]);
						if( $longueur >= $nbreCar )
						{
							 $position_fin_bout = $bout[1] + strlen($bout[0]) - 1;
							 $position = $position_fin_bout - ($longueur - $nbreCar);
							 if( ($positionEspace = strpos($bout[0], ' ', $position - $bout[1])) !== false  )
							 {
									$position	= $bout[1] + $positionEspace;
									$rechercheEspace = false;
							 }
							 if( $index != $indexDernierBout )
									$indexBout	= $index + 1;
							 break;
						}
					}
					if( $rechercheEspace === true ){
						for( $i=$indexBout; $i<=$indexDernierBout; $i++ ){
							 $position = $BoutsTexte[$i][1];
							 if( ($positionEspace = strpos($BoutsTexte[$i][0], ' ')) !== false ){
									$position += $positionEspace;
									break;
							 }
						}
					}
					$texte					= substr($texte, 0, $position);
					preg_match_all($MasqueHtmlMatch, $texte, $retour, PREG_OFFSET_CAPTURE);
					$BoutsTag				= array();
					foreach( $retour[0] as $index => $tag ){
						if( isset($retour[3][$index][0]) ){
							 continue;
						}
						if( $retour[0][$index][0][1] != '/' ){
							 array_unshift($BoutsTag, $retour[2][$index][0]);
						} else {
							 array_shift($BoutsTag);
						}
					}
					if( !empty($BoutsTag) ){
						foreach( $BoutsTag as $tag ){
							 $texte		.= '</'.$tag.'>';
						}
					}
					if ($PointSuspension!='' && $LongueurAvantSansHtml > $nbreCar) {
						$texte				.= 'ReplacePointSuspension';
						$pattern			= '#((</[^>]*>[\n\t\r ]*)?(</[^>]*>[\n\t\r ]*)?((</[^>]*>)[\n\t\r ]*)?(</[^>]*>)[\n\t\r ]*ReplacePointSuspension)#i';
						$texte				= preg_replace($pattern, $PointSuspension.'${2}${3}${5}', $texte);
					}
				}
			}
			return $texte;
	}

	public function validates($validate, $data){
		//debug($validate);
		//debug( $data);
		
		$errors = array();
		foreach ($validate as $k => $v) {
			//debug($v['rule']);
			//debug($data[$k]);
			//debug(preg_match('/^'.$v['rule'].'$/', $data[$k]));
			if(!isset($data[$k])){
				//$errors[$k] = $v['message'];
				// debug($v);
			} else {
				// var_dump(empty($data[$k]));
				if($v['rule'] == 'email'){
					//debug(filter_var($data[$k],FILTER_VALIDATE_EMAIL));
					if(!filter_var($data[$k],FILTER_VALIDATE_EMAIL)){
						$errors[$k] = $v['message'];
					}
				}elseif($v['rule'] == 'notEmpty'){
					if(empty($data[$k])){
						$errors[$k] = $v['message'];
					}
				}elseif(!preg_match('/^'.$v['rule'].'$/', $data[$k])){
					//debug($errors);
					$errors[$k] = $v['message']; 
					//echo 'toto';
				}else{
					//debug($errors);
				}
			}
		}
		//debug($errors);
		$this->errors = $errors;
		if(empty($errors)){
			return true;
		}
		return false;
	}
	public function redirect($url,$code=null){
		if($code == 301){
			header('HTTP/1.1 301 Moved Permanently');
		}
		header("Location: $url");
	}
}
