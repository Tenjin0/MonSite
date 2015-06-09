<?php 
define('DEBUT',$debut = microtime(true));
define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('DS',DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
define('REFFERER',str_replace('/webroot', '', BASE_URL));

require(CORE.DS.'include.php');


new Dispatcher();
?>
<div style='background:#555;color:#FFF;line-height:30px; height:30px;left:0;right:0;padding-left:10px '>
<?php
echo 'Page générée en '.round(microtime(true) - $debut, 5).' secondes';
?>
</div>

