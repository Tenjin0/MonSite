<?php
// var_dump(
//     file_exists("./images/flash.jpg"),
//     in_array('gd', get_loaded_extensions())
// ); //
// die( __FILE__.':'. __LINE__ ); //
header("Content-type: image/jpg");
// $image = imagecreate(200,50);
// $orange = imagecolorallocate($image, 255, 128, 0);
// imagejpeg($image, "images/monimage.jpg");
$source =  imagecreatefromjpeg("images/ATOMSK.jpg");
$destination =  imagecreatetruecolor(140, 120);
$largeurSource = imagesx($source);
$hauteurSource = imagesy($source);
$largeurDestination = imagesx($destination);
$hauteurDestination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeurDestination, $hauteurDestination, $largeurSource, $hauteurSource);

header("Content-type: image/png");
imagepng($destination,"images/mini_ATOMSK.png");

/*$source =  imagecreatefrompng("images/logo2.png");
$destination =  imagecreatetruecolor(60, 60);
$largeurSource = imagesx($source);
$hauteurSource = imagesy($source);
$largeurDestination = imagesx($destination);
$hauteurDestination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeurDestination, $hauteurDestination, $largeurSource, $hauteurSource);

header("Content-type: image/png");
imagepng($destination,"images/mini_logo2.png"); */
?>


