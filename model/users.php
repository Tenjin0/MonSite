<?php 
	/**
	* 
	*/
	class Users extends Model{
		
		public $validate = array(
			'email' => array(
				'rule' => 'email',
				'message' => 'wrong format'
				),
			'password' => array(
				'rule' => '([a-z0-9]{5,})',
				'message' => '> 6 caracteres'
				),
			'username' => array(
				'rule' => '([a-zA-Z0-9][a-z0-9]{4,})',
				'message' => '> 6 caracteres'
				),
			'confirmpassword' => array(
				'rule' => '([a-z0-9]{5,})',
				'message' => '> 6 caracteres'
				),
		// 'url' => array(
		// 	'rule' => '([a-z0-9\-]+)',
		// 	'message' => "L'url n'est pas valide"
		// 	)
	);

	}
?>