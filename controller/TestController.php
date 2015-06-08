<?php 

/**
* 
*/
class TestController extends Controller
{
	public function test(){
		$this->loadModel('users');
		$email='patricepetit@hotmail.com';
		$validate = $this->users->validate;
		$data = array(
						'email' =>'patricepetit@hotmail.com',
  						//'password' =>'patman'
  						);
		//var_dump('http://localhost'.REFFERER.DS.'users/activate/?email');
		//$validation = Email::sendmailActivationCompte("patricepetit@hotmail.com","b660b3587f89bf08d94e66c8ae1f0a447d0ec052");
		//debug($validation);

		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo 'je m\'occupe des erreurs';
		} else {
			
			echo 'tout se passe bien';
		}
		debug($this->validates($validate, $data));
	}
}