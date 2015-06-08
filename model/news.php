<?php 
/**
* 
*/
class News extends Model{
	
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez préciser un titre'
			),
		'content' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez mettre un contenu'
			)

		// 'url' => array(
		// 	'rule' => '([a-z0-9\-]+)',
		// 	'message' => "L'url n'est pas valide"
		// 	)
	);
}
?>