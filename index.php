<?php 
$debut = microtime(true);
define('WEBROOT',dirname(__FILE__));
define('ROOT',WEBROOT);
define('DS',DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
define('REFFERER',str_replace('/webroot', '', BASE_URL));

require(CORE.DS.'include.php');


new Dispatcher();
?>


