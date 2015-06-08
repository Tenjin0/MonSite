<?php 

class Dispatcher{

	var $request;

	public function __construct(){
		$this->request = new Request();
		Rooter::parse($this->request->url, $this->request);
		// var_dump($this->request);
		$controller = $this->loadController();
		// var_dump($controller);
		// var_dump(new PagesController($this->request));
		//print_r(get_class_methods($controller)); 
		$action = $this->request->action;
		if($this->request->prefix){
			$action = $this->request->prefix.'_'. $action;

		}
		if(!in_array($action,array_diff(get_class_methods($controller),get_class_methods('Controller')))){
				$this->error('Le controlleur ' .$this->request->controller.' n\'a pas de methode '. $action );
		} 
		call_user_func_array(array($controller,$action), $this->request->params);
		$controller->render($action);// pourquoi devoir faire ca ?
	
	}

	function error($message){
		header("HTTP/1.0 404 NOT FOUND");
		$controller = new Controller($this->request);
		$controller->session = new Session();

		$controller->e404($message);
	}
	public function loadController(){
		$name = ucfirst($this->request->controller).'Controller';
		$file = ROOT.DS.'controller'.DS.$name.'.php';
		// var_dump($name);
		// debug($this->request);
		if(!file_exists($file)){
			$this->error('Le controller '.$this->request->controller.' n\'existe pas');
		}
		require($file);
		$controller =  new $name($this->request);
	
		$controller->session = new Session();
		$controller->form = new Form($controller);
		return $controller;
	}

	function toto($m){

	}
	
}