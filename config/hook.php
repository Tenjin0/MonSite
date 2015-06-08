<?php 
	if(isset($this->request->prefix) && $this->request->prefix == 'admin'){
  
		$this->layout ='admin';
		if($this->isAdmin()){
			
		}else{
			$this->redirect(REFFERER.DS.'users/login');
		}
	}
 ?>
