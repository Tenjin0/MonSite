<?php
$REQUEST_URI = $_SERVER['REQUEST_URI'];
$URL = pathinfo("$REQUEST_URI");
var_dump($URL);
$URL["dirname"]=explode("/",$URL["dirname"]);
$URL["dirname"]=implode("", $URL["dirname"]);
var_dump($URL);

if(in_array("/monsite/", $REQUEST_URI)) {
	header("HTTP/1.0 200 OK");
	header('Location: webroot/index.php?id=about&sub='.$URL["dirname"].$URL["basename"]);
	break;
}
?>

