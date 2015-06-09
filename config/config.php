<?php

class Config{

	static $debug = 0;
 	static $database = array(
							'default' => array(
												'hostname' => 'localhost',
												'database' => 'MonSite',
												'login' => 'root',
												'password' => 'patman00'
												)
						);
 }
Rooter::prefixe('admin','admin');

 //Rooter::connect('blog/:action','posts/:action');
 //Rooter::connect('blog/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');