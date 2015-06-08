<?php 

/**
 * 
 */
 class UsersController extends Controller{

 	public $layout = 'defaultUsers';	
 		
 	function login(){
 		ob_start();
 		$data = $this->request->data;
 		// debug($this->request->data);
 		if($this->request->data){
 			$this->loadModel('users');
 			// debug($this->users->validate);
 			// debug($data);

 			if($this->validates($this->users->validate,$data)){
	 			$data['password'] = sha1($data['password']);
		 		//var_dump($data);
		 		
		 		$conditions = array('email'=>$data['email'],'active'=> 1, 'password' => $data['password']
					);
		 		//debug($conditions);

		 		$user = $this->users->findFirst(array(
		 			
		 		'fields' => 'idUsers,admin',
				'conditions'=> $conditions));
		 		if(isset( $user['admin']) && $user['admin'] == 0){
		 			unset($user['admin']);
		 		}
				//debug($user);
				if (!empty($user)){

					$_SESSION['User'] = $user;
					$this->session->setFlash("Login reussi. ".$this->request->data['email'],'success');
					//$this->session->write('user',$user);
				}else{
					$this->session->setFlash("Aucun compte enregistré sous ".$this->request->data['email'].'.','danger');
				}
				//$this->request->data['password'] ='' ;
				//$this->render('user', $user);
				if($this->session->isLogged()){
	 			// $this->redirect(REFFERER.DS.'blog/index');
					//$this->redirect(REFFERER.DS.'blog/index');
				}
			} else {
				$this->session->setFlash("Erreur dans les données insérer".$this->request->data['email'].'.','danger');
			}

 		}
	 	//debug($_SESSION['User']);
		// debug($this->isAdmin());
		// debug($this->session->isAdmin());
		// debug($this->session->isLogged());
 		
 		ob_end_flush();
		
 	}

 	function logout(){
 		unset($_SESSION['User']);
 		$this->session->setFlash('vous etes maintenant déconnecté','success');
 		$this->redirect(REFFERER.DS.'blog/index');
 	}

 	function signin(){
 		ob_start();
 		$data = $this->request->data;
 		// debug($this->request->data);
 		if($this->request->data){
 			$this->loadModel('users');
 			$data['password'] = $this->request->data['password'] = sha1($this->request->data['password']);
 			$data['confirmpassword']= sha1($this->request->data['confirmpassword']);
 			// debug($this->users->validate);
 			// debug($data);
			if($this->validates($this->users->validate,$data)){
	 			$conditions = array('email'=>$data['email']
					);

		 		$user = $this->users->find(array(
				'conditions'=> $conditions));
		 		debug($user);
				if (!empty($user)){
						//unset($_SESSION['User']);
						$this->session->setFlash("Email deja utilisé. ".$this->request->data['email'],'danger');
						//$this->session->write('user',$user);
				}else{
					$user = $this->users->find(array(
					'conditions'=> $conditions));
			 		
			 		$conditions = array('username'=>$data['username']);
				 		$user = $this->users->find(array(
						'conditions'=> $conditions));
					// debug($user);
					if (!empty($user)){
						//unset($_SESSION['User']);
						$this->session->setFlash("username deja utilisé. ".$this->request->data['username'],'danger');
						//$this->session->write('user',$user);
					}else{
						unset($this->request->data['confirmpassword']);
						if($data['password'] != $data['confirmpassword']){
							$this->session->setFlash("Les mots de passes ne correspondent pas",'danger');
						}else{

							$token = sha1(uniqid(rand()));
							$this->request->data['token']= $token;
							debug($this->request->data);
							$id = $user = $this->users->save($this->request->data);
							unset($this->request->data['password']);
							debug($this->users->id);
							// if (!empty($id)){
								$this->session->setFlash("inscription réussi. Veuillez regarder votre boite mail pour activer votre compte.",'success');


								// $token = insertUser($_POST['firstname'], $_POST['email'], $_POST['password'], $db);
								$validation = Email::sendmailActivationCompte($this->request->data['email'], $this->request->data['token']);
							
									// var_dump($validation);
			
							// }
							// unset($this->request->data['token']);
							unset($data);
						}
					}
				}

 			}else{
 				$this->session->setFlash('Contient des erreurs veuillez vérifier ','danger');
 			}
 		
 		}
 		
 	}

 	function activate(){
 		$data=$this->request->data;
 		$this->loadmodel('users');
		$email= $data['email'];
		unset($data['email']);
		$data['active']=1;
		// debug($data);

		// tester la valeur de retour de l'update et envoyer le bon  message
 		$this->users->update($data,array('email'=>$email));
 		$this->session->setFlash('Votre compte a bien été activé','success');
 	}
 	function account(){
 		
 	}
 }