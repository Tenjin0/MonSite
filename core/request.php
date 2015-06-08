<?php 

class Request{

	public $url; // URL appelé par le constructeur
	public $page = 1;
	public $prefix = false;
	public $data = array();

	function __construct(){
		// var_dump($_SERVER);
		// var_dump($_SERVER['REQUEST_URI']);
		if (!isset($_SERVER['REQUEST_URI'])) {
            $_SERVER['REQUEST_URI'] = '';
        }
  //       $_SERVER['PATH_INFO'] = substr(urldecode($_SERVER['REQUEST_URI']),-strlen($_SERVER['REQUEST_URI']));

		$this->url = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/blog/';
		// var_dump($this->url);
		// $this->url = $_SERVER['PATH_INFO'];
		if(isset($_GET['page'])){
		 	if(is_numeric($_GET['page'])){
		 		if($_GET['page'] > 0){
		 			$this->page = round($_GET['page']);
		 		} else {
		 			$this->page= 1;
		 		}
		 	}else{
		 		$this->page = 1;
		 	}
		}
		if(!empty($_POST)){
			$this->data = array();
			foreach ($_POST as $k => $v) {
				$this->data[$k] = $v;
				//$this->data = new stdClass();
				
			}
			//debug($this->data);
		}

		if(!empty($_GET)){
			$this->data = array();
			foreach ($_GET as $k => $v) {
					$this->data[$k] = $v;
					//$this->data = new stdClass();
				# code...
			}
			//debug($this->data);
		}
	}
}