<?php

function debug($var=null){
	if(Config::$debug > 0){
		$backtrace = debug_backtrace();
		echo '<p></p>';
		echo '<p><a href="#" onclick="$(this).parent().next(\'ul\').slideToggle(); return false"><strong>'.$backtrace[0]['file'].' </strong> l.'.$backtrace[0]['line'].'</a></p>';
		echo '<ul style=display:none;>';
		foreach ($backtrace as $key => $value) {
			if($key>0){
				echo '<li><strong>'.$value['file'].' </strong> l.'.$value['line'].'</li>';
		
			}
		
		}
		echo '</ul>';
		echo "<pre>";
		if (!isset($var)){
			var_dump($var);
			
		} else {
			echo  "Undefined";
		}
		echo "</pre>";	
	}	
}